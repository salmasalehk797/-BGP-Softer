<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\projects;
use Session;
use Mail;

class projectscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usr = auth()->user();
        if(!$usr){
            return redirect('/login');
        }
        else{
            if($usr->usertype == 'customer'){
                $projects = projects::where('ownerid',$usr->id)->get();
                return view('BackEnd.usrAdminLTE.index')->with(compact('projects','usr'));
            }
            else{
                $projects = projects::all();
                $reports = array();
                return view('BackEnd.AdminLTE.index')->with(compact('projects','usr','reports'));
            }
        }
        
        //return view('FrontEnd.Create WebSite - ( )Softer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new projects;
        $usr = auth()->user();

        $project->projectname = $request->input('name');
        $project->projectowner = "{$usr->firstname} {$usr->lastname}";
        $project->ownerid = $usr->id;
        $project->projecttype = $request->input('type');
        $project->program = $request->input('program');
        if($request->input('platform'))
            $project->platform = $request->input('platform');
        $project->description = $request->input('descrp');
        $project->requirements = $request->input('req');
        $project->status = $request->input('status');

        $project->save();

        return redirect('/projects')->with('success', 'Request Successfully Submitted');

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
    public function edit(Request $request, $id)
    {
        $project = projects::find($id);
        $usr = auth()->user();
        $reports = array();
        if(!$usr)
            return redirect('/login');
        else
            return view('BackEnd.AdminLTE.edit')->with(compact('project','usr','reports'));
        
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
        $project = projects::find($id);
        $usr = auth()->user();
        if($usr->usertype == 'developer')
            $project->developer_id = $usr->id;
        if($request->input('update_url'))
            $project->updateurl = $request->input('update_url');
        if($request->input('req'))
            $project->requirements = $request->input('req');
        if($request->input('status'))
            $project->status = $request->input('status');
        $project->save();

        return redirect('/dashboard')->with('success', 'Request Successfully Submitted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = projects::find($id);
        $usr = auth()->user();
        
        // $data = array('text'=>"Projects {{$project->projectname}} has been deleted.");
        // if($usr->usertype == 'customer'){
        //     return redirect('/delete/{$developer}/{$project}');
        // }
        $project->delete();
        return redirect('/dashboard')->with('success', 'Project Successfully Deleted');
    }
    public function mail($project){
        $proj = projects::find($project);
        $developer =  DB::Table('users')->where('id', $proj->developer_id)->get();
        $details = [
                'title' => 'Mail from Softer.com',
                'body' => 'Project {{$project->projectname}} has been deleted by owner.'
            ];
           
            Mail::to('salma.saleh.khalil@gmail.com')->send(new \App\Mail\ProjectDeleteMail($details));
   
    dd("Email is Sent.");
    destroy($project);
    }
}


