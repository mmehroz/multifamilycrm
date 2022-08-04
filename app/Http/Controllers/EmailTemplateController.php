<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmailTemplateController extends Controller
{
    public function submitemailtemplate(Request $request){
        if (session()->get('role_id') == 1) {
            $this->redirect = new \stdClass();
            $this->redirect->to = 'adminresources';
        }else{
            $this->redirect = new \stdClass();
            $this->redirect->to = 'clientresources';
        }
        $info[] = array(
            'emailtemplate_title'      => $request->emailtemplate_title,
            'emailtemplate_subject'    => $request->emailtemplate_subject,
            'emailtemplate_fromname'   => $request->emailtemplate_fromname, 
            'emailtemplate_fromemail'  => $request->emailtemplate_fromemail,
            'emailtemplate_message'    => $request->emailtemplate_message,
            'emailtemplate_message'    => $request->emailtemplate_message,
            'status_id'                => 1,
            'created_by'               => session()->get('id'),
            'created_at'               => date('Y-m-d h:i:s'),
        );
        $save = DB::table('emailtemplate')->insert($info);
        if($save){
            return redirect($this->redirect->to)->with('message', 'Email Template Added Successfully');
        }else{
            return redirect($this->redirect->to)->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function editemailtemplate($id,$type){
        $info = DB::table('emailtemplate')
        ->select('*')
        ->where('emailtemplate_id','=',$id)
        ->first();
        return view('user.edittemplate',['data' => $info,'type' => $type]);
    }
    public function submiteditemailtemplate(Request $request){
        if (session()->get('role_id') == 1) {
            if ($request->hidden_type == "Dashboard") {
            $this->redirect = new \stdClass();
            $this->redirect->to = 'admindashboard';
            }else{
            $this->redirect = new \stdClass();
            $this->redirect->to = 'adminresources';
            }
        }else{
            $this->redirect = new \stdClass();
            $this->redirect->to = 'clientresources';
        }
        $save = DB::table('emailtemplate')
            ->where('emailtemplate_id','=',$request->hidden_emailtemplate_id)
            ->update(['emailtemplate_title'   => $request->emailtemplate_title,
            'emailtemplate_subject'           => $request->emailtemplate_subject,
            'emailtemplate_fromname'          => $request->emailtemplate_fromname,
            'emailtemplate_fromemail'         => $request->emailtemplate_fromemail, 
            'emailtemplate_message'           => $request->emailtemplate_message,
            'updated_by'                      => session()->get('id'),
            'updated_at'                      => date('Y-m-d h:i:s'),
        ]);
        if($save){
            return redirect($this->redirect->to)->with('message', 'Email Template Updated Successfully');
        }else{
            return redirect($this->redirect->to)->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function deleteemailtemplate($id,$type){
        if (session()->get('role_id') == 1) {
            if ($type == "Dashboard") {
            $this->redirect = new \stdClass();
            $this->redirect->to = 'admindashboard';    
            }else{
            $this->redirect = new \stdClass();
            $this->redirect->to = 'adminresources';
            }
        }else{
            $this->redirect = new \stdClass();
            $this->redirect->to = 'clientresources';
        }
        $save = DB::table('emailtemplate')
            ->where('emailtemplate_id','=',$id)
            ->update(['status_id'   => 2,
            'deleted_by'            => session()->get('id'),
            'deleted_at'            => date('Y-m-d h:i:s'),
        ]);
        if($save){
            return redirect($this->redirect->to)->with('message', 'Email Template Deleted Successfully');
        }else{
            return redirect($this->redirect->to)->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function emailtemplatelist(){
        $emailtemplate = DB::table('emailtemplate')
        ->select('*')
        ->where('created_by','=',session()->get('id'))
        ->where('status_id','=',1)
        ->orderBy('emailtemplate_id', 'DESC')
        ->get();
        return view('emailtemplate.list',['emailtemplate' => $emailtemplate]);
    }
}