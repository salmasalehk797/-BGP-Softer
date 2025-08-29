<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Examples;

class ExamplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usr = auth()->user();
        $reports = array();
        $examples = Examples::all();
        if(!$usr)
            return redirect('/login');
        else
            return view('BackEnd.AdminLTE.examples.index')->with(compact('reports','usr','examples'));
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
        else
            return view('BackEnd.AdminLTE.examples.create')->with(compact('reports','usr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('bkg_img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('bkg_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('bkg_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('bkg_img')->storeAs('public/bkg_img', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $example = new Examples;
        $example->program = $request->input('program');
        $example->url = $request->input('url');
        $example->bkg_img = $fileNameToStore;
        $example->save();
        return redirect('/example')->with('success', 'Example Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $example = Examples::find($id);
        $example->delete();
        return redirect('/dashboard')->with('success', 'Example Sucessfully Removed');
    }
}
