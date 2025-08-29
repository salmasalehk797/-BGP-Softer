<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\projects;

class pagescontroller extends Controller
{
    public function home(){
    	return view('FrontEnd.HOME Page - ( )Softer');
    }
    public function templates(){
    	return view('FrontEnd.Templates - ( )Softer');
    }
    public function services(){
    	return view('FrontEnd.Services - ( )Softer');
    }
    public function createwebsite(){
    	return view('FrontEnd.Create WebSite - ( )Softer');
    }
    public function createapp(){
    	return view('FrontEnd.Create Mobile Apps - ( )Softer');
    }
    public function domainhosting(){
    	return view('FrontEnd.Rent Domain & Host WebSite - ( )Softer');
    }
    public function programs(){
    	return view('FrontEnd.Programs - ( )Softer');
    }
    public function streaming(){
        $examples = DB::Table('examples')->where('program', 'Streaming & Blogging')->get();
        return view('FrontEnd.Streaming & Blogging - ( )Softer')->with(compact('examples'));
    }
    public function about(){
    	return view('FrontEnd.About - ( )Softer');
    }
    public function contact(){
    	return view('FrontEnd.Contact - ( )Softer');
    }
    public function signup(){
    	return view('FrontEnd.SIGN UP - ( )Softer');
    }
    public function log(){
    	return view('FrontEnd.LOG IN - ( )Softer');
    }
    public function dashboard(){
        $usr = auth()->user();
        if(!$usr)
            return redirect('/login');
        else if($usr->usertype == 'customer')
            return view('BackEnd.usrAdminLTE.dashboard')->with(compact('usr'));
        else{
            $reports = DB::Table('reports')->where(['devp_id' => $usr->id,'status'=> 'unread'])->paginate(1);

            return view('BackEnd.AdminLTE.dashboard')->with(compact('usr','reports'));
        }
    }
    public function myprojects(){
        $usr = auth()->user();
        if(!$usr)
            return redirect('/login');
        else{
            $reports = array();
            $projects = DB::Table('projects')->where('developer_id', $usr->id)->paginate(10);
            return view('BackEnd.AdminLTE.myprojects')->with(compact('projects','usr','reports'));
        }
        
    }
    public function single_project($id){
        $usr = auth()->user();
        if(!$usr)
            return redirect('/login');
        else{
            $project = DB::Table('projects')->where('id', $id)->get();
            $feedbacks = DB::Table('reports')->where(['project_id' => $id, 'report_type' => 'Feedback'])->paginate(1);
            $changes = DB::Table('reports')->where(['project_id' => $id, 'report_type' => 'Change Request'])->paginate(1);
            if($usr->usertype == 'customer')
                return view('BackEnd.usrAdminLTE.single')->with(compact('project','usr','feedbacks','changes'));
            else
                return view('BackEnd.AdminLTE.single')->with(compact('project','usr','feedbacks','changes'));
        }
        
    }
    public function feedback($id){
        $usr = auth()->user();
        if(!$usr)
            return redirect('/login');
        else{
            $project = DB::Table('projects')->where('id', $id)->get();
            return view('BackEnd.usrAdminLTE.feedback')->with(compact('project','usr'));
        }
        
    }
    public function requestchange($id){
        $usr = auth()->user();
        if(!$usr)
            return redirect('/login');
        else{
            $project = DB::Table('projects')->where('id', $id)->get();
            return view('BackEnd.usrAdminLTE.changerequest')->with(compact('project','usr'));
        }
        
    }
}
