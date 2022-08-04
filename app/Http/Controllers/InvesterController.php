<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;

class InvesterController extends Controller
{
    public function investerlist(Request $request){
        if(session()->get('role_id') == 1){
            $data = DB::table('investerlist')
            ->select('*')
            ->where('status_id','=',1)
            ->orderBy('investerinfo_id', 'DESC')
            ->get();
            return view('invester.list',['data' => $data]);
        }elseif(session()->get('role_id') == 2){
            $data = DB::table('investerlist')
            ->select('*')
            ->where('created_by','=',session()->get('id'))
            ->where('status_id','=',1)
            ->orderBy('investerinfo_id', 'DESC')
            ->get();
            return view('invester.listforclient',['data' => $data]);
        }else{
            $getcreatorid = DB::table('users')
            ->select('created_by')
            ->where('users_id','=',session()->get('id'))
            ->first();
            $data = DB::table('investerlist')
            ->select('*')
            ->where('created_by','=',$getcreatorid->created_by)
            ->where('status_id','=',1)
            ->orderBy('investerinfo_id', 'DESC')
            ->get();
            return view('invester.listforva',['data' => $data]);
        }
    }
    public function addinvester(Request $request){
        return view('invester.add');
    }
    public function submitinvester(Request $request){
        $this->validate($request, [
            'investerinfo_email' =>'required|unique:investerinfo,investerinfo_email',
        ]);
        $info[] = array(
            'investerinfo_fname'        => $request->investerinfo_fname,
            'investerinfo_lname'        => $request->investerinfo_lname,
            'investerinfo_email'        => $request->investerinfo_email,
            'investerinfo_phone'        => $request->investerinfo_phone, 
            'investerinfo_addressone'   => $request->investerinfo_addressone,
            'investerinfo_addresstwo'   => $request->investerinfo_addresstwo,
            'investerinfo_city'         => $request->investerinfo_city,
            'investerinfo_state'        => $request->investerinfo_state,
            'investerinfo_postal'       => $request->investerinfo_postal,
            'investerinfo_canwesendsms' => $request->investerinfo_canwesendsms,
            'status_id'                 => 1,
            'created_by'                => session()->get('id'),
            'created_at'                => date('Y-m-d h:i:s'),
        );
        $save = DB::table('investerinfo')->insert($info);
        $investerinfo_id  = DB::getPdo()->lastInsertId();
        $obj[] = array(
            'investerobj_goals'             => $request->investerobj_goals,
            'investerobj_timeline'          => $request->investerobj_timeline,
            'investerobj_invest'            => $request->investerobj_invest,
            'investerobj_firstcapital'      => $request->investerobj_firstcapital, 
            'investerobj_twoyearcapital'    => $request->investerobj_twoyearcapital,
            'investerobj_additionalinfo'    => $request->investerobj_additionalinfo,
            'investerobj_evaluation'        => $request->investerobj_evaluation,
            'investerinfo_id'               => $investerinfo_id,
            'status_id'                     => 1,
            'created_by'                    => session()->get('id'),
            'created_at'                    => date('Y-m-d h:i:s'),
        );
        DB::table('investerobj')->insert($obj);
        $question[] = array(
            'investerquestion_principalresidence'   => $request->investerquestion_principalresidence,
            'investerquestion_principalbussiness'   => $request->investerquestion_principalbussiness,
            'investerquestion_education'            => $request->investerquestion_education,
            'investerquestion_networth'             => $request->investerquestion_networth, 
            'investerquestion_incomelasttwoyear'    => $request->investerquestion_incomelasttwoyear,
            'investerquestion_incomewithspouse'     => $request->investerquestion_incomewithspouse,
            'investerquestion_levelofincome'        => $request->investerquestion_levelofincome,
            'investerinfo_id'                       => $investerinfo_id,
            'status_id'                             => 1,
            'created_by'                            => session()->get('id'),
            'created_at'                            => date('Y-m-d h:i:s'),
        );
        DB::table('investerquestion')->insert($question);
        $other[] = array(
            'investerotherinfo_advisortitle'        => $request->investerotherinfo_advisortitle,
            'investerotherinfo_advisorbussiness'    => $request->investerotherinfo_advisorbussiness,
            'investerotherinfo_age'                 => $request->investerotherinfo_age,
            'investerotherinfo_maritalstatus'       => $request->investerotherinfo_maritalstatus, 
            'investerotherinfo_numberofdependent'   => $request->investerotherinfo_numberofdependent,
            'investerotherinfo_rulea'               => $request->investerotherinfo_rulea,
            'investerotherinfo_adequate'            => $request->investerotherinfo_adequate,
            'investerotherinfo_sophisticated'       => $request->investerotherinfo_sophisticated,
            'investerotherinfo_certifying'          => $request->investerotherinfo_certifying,
            'investerotherinfo_withadvisor'         => $request->investerotherinfo_withadvisor,
            'investerinfo_id'                       => $investerinfo_id,
            'status_id'                             => 1,
            'created_by'                            => session()->get('id'),
            'created_at'                            => date('Y-m-d h:i:s'),
        );
        DB::table('investerotherinfo')->insert($other);
        if($save){
            return redirect('/investerlist')->with('message', 'Invester Added Successfully');
        }else{
            return redirect('/investerlist')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function editinvester($id){
        $data = DB::table('investerdetails')
        ->select('*')
        ->where('investerinfo_id','=',$id)
        ->first();
        $comments = DB::table('commentinvester')
        ->select('commentinvester_text','commentinvester_id','created_at')
        ->where('status_id','=',1)
        ->where('investerinfo_id','=',$id)
        ->get();
        $task = DB::table('assigntasklist')
        ->select('*')
        ->where('status_id','=',1)
        ->where('investerinfo_id','=',$id)
        ->get();
        $va = DB::table('users')
        ->select('*')
        ->where('status_id','=',1)
        ->where('role_id','=',3)
        ->get();
        return view('invester.edit',['data' => $data, 'comment' => $comments, 'task' => $task, 'va' => $va]);
    }
    public function submiteditinvester(Request $request){
        $info = array(
            'investerinfo_fname'        => $request->investerinfo_fname,
            'investerinfo_lname'        => $request->investerinfo_lname,
            'investerinfo_email'        => $request->investerinfo_email,
            'investerinfo_phone'        => $request->investerinfo_phone, 
            'investerinfo_addressone'   => $request->investerinfo_addressone,
            'investerinfo_addresstwo'   => $request->investerinfo_addresstwo,
            'investerinfo_city'         => $request->investerinfo_city,
            'investerinfo_state'        => $request->investerinfo_state,
            'investerinfo_postal'       => $request->investerinfo_postal,
            'investerinfo_canwesendsms' => $request->investerinfo_canwesendsms,
            'updated_by'                => session()->get('id'),
            'updated_at'                => date('Y-m-d h:i:s'),
        );
        $save = DB::connection('mysql')->table('investerinfo')
        ->where('investerinfo_id', $request->investerinfo_id)
        ->update($info);
        $obj = array(
            'investerobj_goals'             => $request->investerobj_goals,
            'investerobj_timeline'          => $request->investerobj_timeline,
            'investerobj_invest'            => $request->investerobj_invest,
            'investerobj_firstcapital'      => $request->investerobj_firstcapital, 
            'investerobj_twoyearcapital'    => $request->investerobj_twoyearcapital,
            'investerobj_additionalinfo'    => $request->investerobj_additionalinfo,
            'investerobj_evaluation'        => $request->investerobj_evaluation,
            'updated_by'                    => session()->get('id'),
            'updated_at'                    => date('Y-m-d h:i:s'),
        );
        DB::connection('mysql')->table('investerobj')
        ->where('investerinfo_id', $request->investerinfo_id)
        ->update($obj);
        $question = array(
            'investerquestion_principalresidence'   => $request->investerquestion_principalresidence,
            'investerquestion_principalbussiness'   => $request->investerquestion_principalbussiness,
            'investerquestion_education'            => $request->investerquestion_education,
            'investerquestion_networth'             => $request->investerquestion_networth, 
            'investerquestion_incomelasttwoyear'    => $request->investerquestion_incomelasttwoyear,
            'investerquestion_incomewithspouse'     => $request->investerquestion_incomewithspouse,
            'investerquestion_levelofincome'        => $request->investerquestion_levelofincome,
            'updated_by'                            => session()->get('id'),
            'updated_at'                            => date('Y-m-d h:i:s'),
        );
        DB::connection('mysql')->table('investerquestion')
        ->where('investerinfo_id', $request->investerinfo_id)
        ->update($question);
        $other = array(
            'investerotherinfo_advisortitle'        => $request->investerotherinfo_advisortitle,
            'investerotherinfo_advisorbussiness'    => $request->investerotherinfo_advisorbussiness,
            'investerotherinfo_age'                 => $request->investerotherinfo_age,
            'investerotherinfo_maritalstatus'       => $request->investerotherinfo_maritalstatus, 
            'investerotherinfo_numberofdependent'   => $request->investerotherinfo_numberofdependent,
            'investerotherinfo_rulea'               => $request->investerotherinfo_rulea,
            'investerotherinfo_adequate'            => $request->investerotherinfo_adequate,
            'investerotherinfo_sophisticated'       => $request->investerotherinfo_sophisticated,
            'investerotherinfo_certifying'          => $request->investerotherinfo_certifying,
            'investerotherinfo_withadvisor'         => $request->investerotherinfo_withadvisor,
            'updated_by'                            => session()->get('id'),
            'updated_at'                            => date('Y-m-d h:i:s'),
        );
        DB::connection('mysql')->table('investerotherinfo')
        ->where('investerinfo_id', $request->investerinfo_id)
        ->update($other);
        if($save){
            return redirect('/investerlist')->with('message', 'Invester Updated Successfully');
        }else{
            return redirect('/investerlist')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function deleteinvester($id){
        $info = array(
            'status_id'   => 2,
            'deleted_by'  => session()->get('id'),
            'deleted_at'  => date('Y-m-d h:i:s'),
        );
        $save = DB::connection('mysql')->table('investerinfo')
        ->where('investerinfo_id', $id)
        ->update($info);
        $obj = array(
            'status_id'   => 2,
            'deleted_by'  => session()->get('id'),
            'deleted_at'  => date('Y-m-d h:i:s'),
        );
        DB::connection('mysql')->table('investerobj')
        ->where('investerinfo_id', $id)
        ->update($obj);
         $que = array(
            'status_id'   => 2,
            'deleted_by'  => session()->get('id'),
            'deleted_at'  => date('Y-m-d h:i:s'),
        );
        DB::connection('mysql')->table('investerquestion')
        ->where('investerinfo_id', $id)
        ->update($que);
        $other = array(
            'status_id'   => 2,
            'deleted_by'  => session()->get('id'),
            'deleted_at'  => date('Y-m-d h:i:s'),
        );
        DB::connection('mysql')->table('investerotherinfo')
        ->where('investerinfo_id', $id)
        ->update($other);
        if($save){
            return redirect('/investerlist')->with('message', 'Invester Deleted Successfully');
        }else{
            return redirect('/investerlist')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function submitcommentinvester($id,$comment){
        $adds[] = array(
            'commentinvester_text'  => $comment,
            'investerinfo_id'       => $id,
            'status_id'             => 1,
            'created_by'            => session()->get('id'),
            'created_at'            => date('Y-m-d h:i:s'),
        );
        $save = DB::table('commentinvester')->insert($adds);
        if($save){
            return redirect('/commentinvester/'.$id);
        }else{
            return redirect('/investerlist')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function commentinvester($id){
        $comments = DB::table('commentinvester')
        ->select('commentinvester_text','commentinvester_id')
        ->where('status_id','=',1)
        ->where('investerinfo_id','=',$id)
        ->get();
        return view('invester.comments',['comment' => $comments]);
    }
    public function submitassigntask($id,$name,$to,$at){
        $adds[] = array(
            'assigntask_name'  => $name,
            'assigntask_to'    => $to,
            'assigntask_at'    => $at,
            'investerinfo_id'  => $id,
            'taskstatus_id'    => 1,
            'status_id'        => 1,
            'created_by'       => session()->get('id'),
            'created_at'       => date('Y-m-d h:i:s'),
        );
        $save = DB::table('assigntask')->insert($adds);
        if($save){
            return redirect('/taskinvester/'.$id);
        }else{
            return redirect('/investerlist')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function taskinvester($id){
        $task = DB::table('assigntasklist')
        ->select('*')
        ->where('status_id','=',1)
        ->where('investerinfo_id','=',$id)
        ->orderBy('assigntask_id', 'DESC')
        ->get();
        return view('invester.task',['task' => $task]);
    }
    public function generateinvesterlink(Request $request){
        $verify_token =  $this->generateRandomString(100);
        $info[] = array(
            'investerinfo_fname'        => "",
            'investerinfo_lname'        => "",
            'investerinfo_email'        => "",
            'investerinfo_phone'        => 0, 
            'investerinfo_addressone'   => "",
            'investerinfo_addresstwo'   => "",
            'investerinfo_city'         => "",
            'investerinfo_state'        => "",
            'investerinfo_postal'       => "",
            'investerinfo_canwesendsms' => "",
            'investerinfo_verifytoken'  => $verify_token,
            'status_id'                 => 3,
            'created_by'                => session()->get('id'),
            'created_at'                => date('Y-m-d h:i:s'),
        );
        $save = DB::table('investerinfo')->insert($info);
        $investerinfo_id  = DB::getPdo()->lastInsertId();
        $obj[] = array(
            'investerobj_goals'             => "",
            'investerobj_timeline'          => "",
            'investerobj_invest'            => "",
            'investerobj_firstcapital'      => "", 
            'investerobj_twoyearcapital'    => "",
            'investerobj_additionalinfo'    => "",
            'investerobj_evaluation'        => "",
            'investerinfo_id'               => $investerinfo_id,
            'status_id'                     => 3,
            'created_by'                    => session()->get('id'),
            'created_at'                    => date('Y-m-d h:i:s'),
        );
        DB::table('investerobj')->insert($obj);
        $question[] = array(
            'investerquestion_principalresidence'   => "",
            'investerquestion_principalbussiness'   => "",
            'investerquestion_education'            => "",
            'investerquestion_networth'             => "", 
            'investerquestion_incomelasttwoyear'    => "",
            'investerquestion_incomewithspouse'     => "",
            'investerquestion_levelofincome'        => "",
            'investerinfo_id'                       => $investerinfo_id,
            'status_id'                             => 3,
            'created_by'                            => session()->get('id'),
            'created_at'                            => date('Y-m-d h:i:s'),
        );
        DB::table('investerquestion')->insert($question);
        $other[] = array(
            'investerotherinfo_advisortitle'        => "",
            'investerotherinfo_advisorbussiness'    => "",
            'investerotherinfo_age'                 => "",
            'investerotherinfo_maritalstatus'       => "", 
            'investerotherinfo_numberofdependent'   => "",
            'investerotherinfo_rulea'               => "",
            'investerotherinfo_adequate'            => "",
            'investerotherinfo_sophisticated'       => "",
            'investerotherinfo_certifying'          => "",
            'investerotherinfo_withadvisor'         => "",
            'investerinfo_id'                       => $investerinfo_id,
            'status_id'                             => 3,
            'created_by'                            => session()->get('id'),
            'created_at'                            => date('Y-m-d h:i:s'),
        );
        DB::table('investerotherinfo')->insert($other);
        $message = URL::to('/')."/sentinvesterlink"."/".$verify_token;
        if($save){
            return redirect('/investerlist')->with('investerlink', $message);
        }else{
            return redirect('/investerlist')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public  function generateRandomString($length = 20){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
     public function sentinvesterlink($token){
        $checktoken = DB::table('investerinfo')
        ->select('*')
        ->where('investerinfo_verifytoken','=',$token)
        ->count();
        if($checktoken == 1){
            return view('invester.linkform',['token' => $token]);
        }else{
            return view('invester.linkexpired');
        }
    }
    public function submitlinkinvester(Request $request){
        $getid = DB::table('investerinfo')
        ->select('*')
        ->where('investerinfo_verifytoken','=',$request->hdn_token)
        ->first();
        $info = array(
            'investerinfo_fname'        => $request->investerinfo_fname,
            'investerinfo_lname'        => $request->investerinfo_lname,
            'investerinfo_email'        => $request->investerinfo_email,
            'investerinfo_phone'        => $request->investerinfo_phone, 
            'investerinfo_addressone'   => $request->investerinfo_addressone,
            'investerinfo_addresstwo'   => $request->investerinfo_addresstwo,
            'investerinfo_city'         => $request->investerinfo_city,
            'investerinfo_state'        => $request->investerinfo_state,
            'investerinfo_postal'       => $request->investerinfo_postal,
            'investerinfo_canwesendsms' => $request->investerinfo_canwesendsms,
            'investerinfo_verifytoken'  => "",
            'status_id'                 => 1,
            'updated_at'                => date('Y-m-d h:i:s'),
        );
        $save = DB::connection('mysql')->table('investerinfo')
        ->where('investerinfo_id', $getid->investerinfo_id)
        ->update($info);
        $obj = array(
            'investerobj_goals'             => $request->investerobj_goals,
            'investerobj_timeline'          => $request->investerobj_timeline,
            'investerobj_invest'            => $request->investerobj_invest,
            'investerobj_firstcapital'      => $request->investerobj_firstcapital, 
            'investerobj_twoyearcapital'    => $request->investerobj_twoyearcapital,
            'investerobj_additionalinfo'    => $request->investerobj_additionalinfo,
            'investerobj_evaluation'        => $request->investerobj_evaluation,
            'status_id'                     => 1,
        );
        DB::connection('mysql')->table('investerobj')
        ->where('investerinfo_id', $getid->investerinfo_id)
        ->update($obj);
        $question = array(
            'investerquestion_principalresidence'   => $request->investerquestion_principalresidence,
            'investerquestion_principalbussiness'   => $request->investerquestion_principalbussiness,
            'investerquestion_education'            => $request->investerquestion_education,
            'investerquestion_networth'             => $request->investerquestion_networth, 
            'investerquestion_incomelasttwoyear'    => $request->investerquestion_incomelasttwoyear,
            'investerquestion_incomewithspouse'     => $request->investerquestion_incomewithspouse,
            'investerquestion_levelofincome'        => $request->investerquestion_levelofincome,
            'status_id'                             => 1,
        );
        DB::connection('mysql')->table('investerquestion')
        ->where('investerinfo_id', $getid->investerinfo_id)
        ->update($question);
        $other = array(
            'investerotherinfo_advisortitle'        => $request->investerotherinfo_advisortitle,
            'investerotherinfo_advisorbussiness'    => $request->investerotherinfo_advisorbussiness,
            'investerotherinfo_age'                 => $request->investerotherinfo_age,
            'investerotherinfo_maritalstatus'       => $request->investerotherinfo_maritalstatus, 
            'investerotherinfo_numberofdependent'   => $request->investerotherinfo_numberofdependent,
            'investerotherinfo_rulea'               => $request->investerotherinfo_rulea,
            'investerotherinfo_adequate'            => $request->investerotherinfo_adequate,
            'investerotherinfo_sophisticated'       => $request->investerotherinfo_sophisticated,
            'investerotherinfo_certifying'          => $request->investerotherinfo_certifying,
            'investerotherinfo_withadvisor'         => $request->investerotherinfo_withadvisor,
            'status_id'                             => 1,
        );
        DB::connection('mysql')->table('investerotherinfo')
        ->where('investerinfo_id', $getid->investerinfo_id)
        ->update($other);
        if($save){
            return redirect()->back()->with('message', 'Thank You For Submiting');
        }else{
            return redirect()->back()->with('message', 'Oops! Something Went Wrong');
        }
    }
}