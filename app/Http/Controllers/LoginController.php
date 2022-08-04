<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function index(Request $request){
        session()->forget('id');
        session()->forget('email');
        session()->forget('name');
        session()->forget('lastname');
        session()->forget('image');
        session()->forget('role_id');
        return view('login');
    }
    public function submitlogin(Request $request){
        $this->validate($request, [
            // 'email' =>'required|unique:users,users_email',
            'email'     =>'required',
            'password'  => 'required',
        ]);
        $task = DB::table('users')
        ->select('*')
        ->where('users_email','=',$request->email)
        ->where('users_password','=',$request->password)
        ->where('status_id','=',1)
        ->first();
        if($task){
            session()->put([
                'id'        => $task->users_id ,
                'email'     => $task->users_email,
                'name'      => $task->users_name,
                'lastname'  => $task->users_lastname,
                'image'     => $task->users_image,
                'role_id'   => $task->role_id,
            ]);
            if($task->role_id == 1){
                return redirect('/admindashboard');
            }elseif($task->role_id == 2){
                return redirect('/clientdashboard');
            }else{
                return redirect('/vadashboard');
            }
        }else{
            return redirect('/')->with('message', 'Login Failed, Please Try Again!');
        }
    }
    public function logout(){
        session()->forget('id');
        session()->forget('email');
        session()->forget('name');
        session()->forget('lastname');
        session()->forget('image');
        session()->forget('role_id');
        return redirect('/')->with('message', 'Logout Successfully');
    }
}
