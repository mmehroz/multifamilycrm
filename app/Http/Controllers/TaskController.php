<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TaskController extends Controller
{
    public function tasklist(){
        $task = DB::table('assigntasklist')
        ->select('*')
        ->where('status_id','=',1)
        ->where('created_by','=',session()->get('id'))
        ->orderBy('assigntask_id', 'DESC')
        ->get();
        $va = DB::table('users')
        ->select('*')
        ->where('status_id','=',1)
        ->where('role_id','=',3)
        ->where('created_by','=',session()->get('id'))
        ->get();
        $property = DB::table('property')
        ->select('property_id','property_name')
        ->where('status_id','=',1)
        ->where('property_uploadedfor','=',session()->get('id'))
        ->get();
        $invester = DB::table('investerinfo')
        ->select('investerinfo_id','investerinfo_fname')
        ->where('status_id','=',1)
        ->where('created_by','=',session()->get('id'))
        ->get();
        return view('task.list',['task' => $task, 'va' => $va, 'property' => $property, 'invester' => $invester]);
    }
    public function task(){
        $task = DB::table('assigntasklist')
        ->select('*')
        ->where('status_id','=',1)
        ->where('created_by','=',session()->get('id'))
        ->orderBy('assigntask_id', 'DESC')
        ->limit(10)
        ->get();
        return view('invester.task',['task' => $task]);
    }
    public function submittask($name,$to,$at, $type, $for){
        if ($type == "I") {
        $adds[] = array(
            'assigntask_name'  => $name,
            'assigntask_to'    => $to,
            'assigntask_at'    => $at,
            'taskstatus_id'    => 1,
            'investerinfo_id'  => $for,
            'status_id'        => 1,
            'created_by'       => session()->get('id'),
            'created_at'       => date('Y-m-d h:i:s'),
        );    
        }else{
        $adds[] = array(
            'assigntask_name'  => $name,
            'assigntask_to'    => $to,
            'assigntask_at'    => $at,
            'taskstatus_id'    => 1,
            'property_id'      => $for,
            'status_id'        => 1,
            'created_by'       => session()->get('id'),
            'created_at'       => date('Y-m-d h:i:s'),
        );
        }
        $save = DB::table('assigntask')->insert($adds);
        if($save){
                return redirect('/task');
        }else{
            return redirect('/investerlist')->with('message', 'Oops! Something Went Wrong');
        }
    }
}