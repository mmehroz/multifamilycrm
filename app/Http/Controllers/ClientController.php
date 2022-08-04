<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClientController extends Controller
{
    public function clientresources(){
        $va = DB::table('userlist')
        ->select('*')
        ->where('created_by','=',session()->get('id'))
        ->where('role_id','=',3)
        ->where('status_id','=',1)
        ->orderBy('users_id', 'DESC')
        ->limit(10)
        ->get();
        $emailtemplate = DB::table('emailtemplate')
        ->select('*')
        ->where('created_by','=',session()->get('id'))
        ->where('status_id','=',1)
        ->orderBy('emailtemplate_id', 'DESC')
        ->limit(10)
        ->get();
        $task = DB::table('assigntasklist')
        ->select('*')
        ->where('status_id','=',1)
        ->where('created_by','=',session()->get('id'))
        ->orderBy('assigntask_id', 'DESC')
        ->limit(10)
        ->get();
        return view('resources.client',['va' => $va, 'emailtemplate' => $emailtemplate, 'task' => $task]);
    }
    public function varesources(){
        $task = DB::table('assigntasklist')
        ->select('*')
        ->where('status_id','=',1)
        ->where('assigntask_to','=',session()->get('id'))
        ->orderBy('assigntask_id', 'DESC')
        ->get();
        return view('resources.va',['task' => $task]);
    }
    public function valist(Request $request){
        $va = DB::table('userlist')
        ->select('*')
        ->where('role_id','=',3)
        ->where('created_by','=',session()->get('id'))
        ->where('status_id','=',1)
        ->get();
        return view('va.list',['va' => $va]);
    }
    public function removeva(Request $request){
        $info = array(
            'status_id'   => 2,
            'deleted_by'  => session()->get('id'),
            'deleted_at'  => date('Y-m-d h:i:s'),
        );
        $save = DB::connection('mysql')->table('users')
        ->where('users_id', $request->users_id)
        ->update($info);
        if($save){
            return redirect('/valist')->with('message', 'User Deleted Successfully');
        }else{
            return redirect('/valist')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function editva($id){
        $va = DB::table('users')
        ->select('*')
        ->where('users_id','=',$id)
        ->first();
        return view('va.edit',['va' => $va]);
    }
}