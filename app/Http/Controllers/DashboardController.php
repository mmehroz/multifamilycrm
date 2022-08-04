<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function admindashboard(){
        $invester = DB::table('investerlist')
        ->select('*')
        ->where('status_id','=',1)
        ->orderBy('investerinfo_id', 'DESC')
        ->limit(10)
        ->get();
        $user = DB::table('userlist')
        ->select('*')
        ->where('status_id','=',1)
        ->orderBy('users_id', 'DESC')
        ->limit(10)
        ->get();
        $email = DB::table('emailtemplate')
        ->select('*')
        ->where('status_id','=',1)
        ->orderBy('emailtemplate_id', 'DESC')
        ->limit(10)
        ->get();
        $broker = DB::table('brookerlist')
        ->select('*')
        ->where('status_id','=',1)
        ->orderBy('brooker_id', 'DESC')
        ->limit(10)
        ->get();
        $property = DB::table('property')
        ->select('*')
        ->where('status_id','=',1)
        ->orderBy('property_id', 'DESC')
        ->limit(10)
        ->get();
        return view('dashboard.admin',['invester' => $invester, 'user' => $user, 'email' => $email, 'broker' => $broker,'property' => $property]);
    }
    public function clientdashboard(){
        $task = DB::table('assigntasklist')
        ->select('*')
        ->where('status_id','=',1)
        ->where('created_by','=',session()->get('id'))
        ->orderBy('assigntask_id', 'DESC')
        ->limit(10)
        ->get();
        $noofbrokers = DB::table('brooker')
        ->select('brooker_id')
        ->where('status_id','=',1)
        ->where('created_by','=',session()->get('id'))
        ->count();
        $noofinvestor = DB::table('investerinfo')
        ->select('investerinfo_id')
        ->where('status_id','=',1)
        ->where('created_by','=',session()->get('id'))
        ->count();
        $nooftask = DB::table('assigntask')
        ->select('assigntask_id')
        ->where('status_id','=',1)
        ->where('created_by','=',session()->get('id'))
        ->count();
        $noofproperty = DB::table('property')
        ->select('property_id')
        ->where('status_id','=',1)
        ->where('property_uploadedfor','=',session()->get('id'))
        ->count();
        return view('dashboard.client',['task' => $task, 'noofbrokers' => $noofbrokers, 'noofinvestor' => $noofinvestor, 'nooftask' => $nooftask, 'noofproperty' => $noofproperty]);
    }
    public function vadashboard(){
        $task = DB::table('assigntasklist')
        ->select('*')
        ->where('status_id','=',1)
        ->where('assigntask_to','=',session()->get('id'))
        ->orderBy('assigntask_id', 'DESC')
        ->limit(10)
        ->get();
        return view('dashboard.va',['task' => $task]);
    }
}