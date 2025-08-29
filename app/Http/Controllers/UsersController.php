<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usr = auth()->user();
        $usrs = User::all();
        $reports = array();
        if(!$usr){
            return redirect('/login');
        }
        else if($usr->usertype == 'admin')
            return view('BackEnd.AdminLTE.users.index')->with(compact('usrs','usr','reports'));
        else
            return redirect('/dashboard')->withErrors('Illegal access!');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usr = auth()->user();
        $reports = array();
        if(!$usr){
            return redirect('/login');
        }
        else if($usr->usertype == 'admin')
            return view('BackEnd.AdminLTE.users.create')->with(compact('usr','reports'));
        else
            return redirect('/dashboard')->withErrors('Illegal access!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('profile_img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('profile_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('profile_img')->storeAs('public/profile_img', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $pass = Hash::make($request->input('password'));
        $user = new User;
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = $pass;
        $user->usertype = $request->input('job');
        $user->profile_img = $fileNameToStore;
        $user->save();
        return redirect('/users')->with('success', 'User Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $usr = auth()->user();
        $reports = array();
        if(!$usr)
            return redirect('/login');
        else
            return view('BackEnd.AdminLTE.users.view')->with(compact('user','usr','reports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $usr = auth()->user();
        $reports = array();
        if(!$usr)
            return redirect('/login');
        else if($usr->usertype == 'customer')
            return view('BackEnd.usrAdminLTE.edit')->with(compact('user','usr','reports'));
        else
            return view('BackEnd.AdminLTE.users.edit')->with(compact('user','usr','reports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['firstname' => 'required', 'email' => 'required|unique:users,id,'.$id,]);
        $user = User::find($id);
        $usr = auth()->user();
        
        if($request->input('password') && Hash::check($request->input('old_password'), $user->password)){
            // if($request->input('password')){
                $this->validate($request,['password' => 'min:8|confirmed']);
                $pass = Hash::make($request->input('password'));
                $user->password = $pass;
            // }
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->save();
            return redirect('/users')->with('success', 'User Successfully Updated');
        }
        else if(!$request->input('password')){
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->save();
            if($usr->usertype == 'admin')
                return redirect('/users')->with('success', 'User Successfully Updated');
            else
                return redirect('/dashboard')->with('success', 'User Successfully Updated');
        }
        else if($request->input('password') && !Hash::check($request->input('old_password'), $user->password))
            return redirect('/users/create')->withErrors('Old Password incorrect, please re-enter');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        //$usr
        return redirect('/users')->with('success', 'User Successfully Deleted');
    }
}
