<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Image;
use DB;
use Input;
use App\Item;
use Session;
use Response;
use Validator;

class PropertyController extends Controller
{
    public function propertyuploader(Request $request)
    {
        $file = $request->file('uploaded_file');
        if ($file) {
            $filename = $file->getClientOriginalName().'-'.date('Y-m-d h:i:s');
            $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize(); //Get size of uploaded file in bytes
            //Check for file extension and size
            // $this->checkUploadedFileProperties($extension, $fileSize);
            $valid_extension = "csv"; //Only want csv and excel files
            $maxFileSize = 2097152; // Uploaded file size limit is 2mb
            if ($extension == $valid_extension) {
                if ($fileSize <= $maxFileSize) {
                //Where uploaded file will be stored on the server 
                $location = 'propertyuploads'; //Created an "uploads" folder for that
                // Upload file
                $file->move(public_path('propertyuploads/'),$filename);
                // $file->move($location, $filename);
                // In case the uploaded file path is to be stored in the database 
                $filepath = public_path($location . "/" . $filename);
                // Reading file
                $file = fopen($filepath, "r");
                $importData_arr = array(); // Read through the file and store the contents as an array
                $i = 0;
                //Read the contents of the uploaded file 
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);
                    // Skip first row (Remove below comment if you want to skip the first row)
                    if ($i == 0) {
                        $i++;
                        continue;
                    }
                    for ($c = 0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata[$c];
                    }
                        $i++;
                }
                fclose($file); //Close after reading
                $refrencebytes = random_bytes(10);
                $propertyrefrencenumber = (bin2hex($refrencebytes));
                $j = 0;
                foreach ($importData_arr as $importData) {
                    try {
                       $adds = array(
                        'property_address'                  => $importData[0],
                        'property_name'                     => $importData[1],
                        'property_noofunit'                 => $importData[2],
                        'property_class'                    => $importData[3],
                        'property_city'                     => $importData[4],
                        'property_state'                    => $importData[5],
                        'property_zip'                      => $importData[6],
                        'property_unitsf'                   => $importData[7],
                        'property_askingsf'                 => $importData[8],
                        'property_askingunit'               => $importData[9],
                        'property_forsaleprice'             => $importData[10],
                        'property_caprate'                  => $importData[11],
                        'property_spriceunit'               => $importData[12],
                        'property_salecname'                => $importData[13],
                        'property_salecphone'               => $importData[14],
                        'property_saleccontact'             => $importData[15],
                        'property_vacancy'                  => $importData[16],
                        'property_yearbuilt'                => $importData[17],
                        'property_yearrenovated'            => $importData[18],
                        'property_noofonebed'               => $importData[19],
                        'property_nooftwobed'               => $importData[20],
                        'property_noofthreebed'             => $importData[21],
                        'property_nooffourbed'              => $importData[22],
                        'property_ownername'                => $importData[23],
                        'property_owneraddress'             => $importData[24],
                        'property_ownercitystatezip'        => $importData[25],
                        'property_ownercontact'             => $importData[26],
                        'property_ownerphone'               => $importData[27],
                        'property_managername'              => $importData[28],
                        'property_managerphone'             => $importData[29],
                        'property_recordedname'             => $importData[30],
                        'property_recordedcontact'          => $importData[31],
                        'property_recordedphone'            => $importData[32],
                        'property_recordedaddress'          => $importData[33],
                        'property_recordedcitystatezip'     => $importData[34],
                        'property_onebedrentunit'           => $importData[35],
                        'property_studiorentunit'           => $importData[36],
                        'property_twobedaskingrentunit'     => $importData[37],
                        'property_threebedaskingrentunit'   => $importData[38],
                        'property_uploadedfor'              => session()->get('id'),
                        'property_token'                    => $propertyrefrencenumber,
                        'status_id'                         => 1,
                        'created_by'                        => session()->get('id'),
                        'created_at'                        => date('Y-m-d h:i:s'),
                        );
                    } catch (\Exception $e) {
                        DB::rollBack();
                    }
                        DB::table('property')->insert($adds);
                }
                    
                } else {
                    return redirect($this->redirect->to)->with('message', 'File Size Too Large');
                }
            } else {
                return redirect($this->redirect->to)->with('message', 'Invalid Format');
            }
        } else {
            return redirect($this->redirect->to)->with('message', 'No file Was Uploaded');
        }
    }
    public function propertylist(Request $request){
             $data = DB::table('property')
            ->select('*')
            ->where('status_id','=',1)
            ->where('created_by','=',session()->get('id'))
            ->orderBy('property_id', 'DESC')
            ->get();
            $totalcount = DB::table('property')
            ->select('property_id')
            ->where('status_id','=',1)
            ->where('created_by','=',session()->get('id'))
            ->count();
         return view('property.list',['data' => $data, 'totalcount' => $totalcount]);
    }
    public function deleteproperty($id,$type){
        $save = DB::table('property')
            ->where('property_id','=',$id)
            ->update(['status_id'   => 2,
            'deleted_by'            => session()->get('id'),
            'deleted_at'            => date('Y-m-d h:i:s'),
        ]);
        if ($type == "Property") {
            $redirectback = "propertylist";
        }else{
            $redirectback = "admindashboard";
        }
        if($save){
            return redirect($redirectback)->with('message', 'Property Deleted Successfully');
        }else{
            return redirect($redirectback)->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function deletepropertyupload($id){
        $save = DB::table('property')
            ->where('property_token','=',$id)
            ->update(['status_id'   => 2,
            'deleted_by'            => session()->get('id'),
            'deleted_at'            => date('Y-m-d h:i:s'),
        ]);
        if($save){
            return redirect('/adminresources')->with('message', 'Property Upload Deleted Successfully');
        }else{
            return redirect('/adminresources')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function propertyboard(Request $request){
        if (session()->get('role_id') == 2) {
            $data = DB::table('property')
            ->select('*')
            ->where('status_id','=',1)
            ->where('property_uploadedfor','=',session()->get('id'))
            ->orderBy('property_id', 'DESC')
            ->limit(10)
            ->get();
            $totalcount = DB::table('property')
            ->select('property_id')
            ->where('status_id','=',1)
            ->where('property_uploadedfor','=',session()->get('id'))
            ->count();
            return view('property.board',['data' => $data, 'totalcount' => $totalcount]);
        }else{
            $getcreatorid = DB::table('users')
            ->select('created_by')
            ->where('users_id','=',session()->get('id'))
            ->first();
            $data = DB::table('property')
            ->select('*')
            ->where('status_id','=',1)
            ->where('property_uploadedfor','=',$getcreatorid->created_by)
            ->orderBy('property_id', 'DESC')
            ->limit(10)
            ->get();
            $totalcount = DB::table('property')
            ->select('property_id')
            ->where('status_id','=',1)
            ->where('property_uploadedfor','=',$getcreatorid->created_by)
            ->count();
            return view('property.listforva',['data' => $data, 'totalcount' => $totalcount]);
        }
    }
    public function propertydetails($id){
        $data = DB::table('property')
        ->select('*')
        ->where('status_id','=',1)
        ->where('property_id','=',$id)
        ->first();
        $comments = DB::table('commentinvester')
        ->select('commentinvester_text','commentinvester_id','created_at')
        ->where('status_id','=',1)
        ->where('property_id','=',$id)
        ->get();
        $task = DB::table('assigntasklist')
        ->select('*')
        ->where('status_id','=',1)
        ->where('property_id','=',$id)
        ->get();
        $va = DB::table('users')
        ->select('*')
        ->where('status_id','=',1)
        ->where('role_id','=',3)
        ->get();
        return view('property.details',['data' => $data, 'comment' => $comments, 'task' => $task, 'va' => $va]);
    }
    public function editproperty($id,$type){
        $data = DB::table('property')
        ->select('*')
        ->where('status_id','=',1)
        ->where('property_id','=',$id)
        ->first();
        return view('property.edit',['data' => $data, 'type' => $type]);
    }
    public function submiteditproperty(Request $request){
        $adds = array(
        'property_name'                     => $request->property_name,
        'property_address'                  => $request->property_address,
        'property_city'                     => $request->property_city,
        'property_state'                    => $request->property_state,
        'property_zip'                      => $request->property_zip,
        'property_noofunit'                 => $request->property_noofunit,
        'property_class'                    => $request->property_class,
        'property_yearbuilt'                => $request->property_yearbuilt,
        'property_yearrenovated'            => $request->property_yearrenovated,
        'property_unitsf'                   => $request->property_unitsf,
        'property_askingsf'                 => $request->property_askingsf,
        'property_askingunit'               => $request->property_askingunit,
        'property_forsaleprice'             => $request->property_forsaleprice,
        'property_caprate'                  => $request->property_caprate,
        'property_vacancy'                  => $request->property_vacancy,
        'property_spriceunit'               => $request->property_spriceunit,
        'property_studiorentunit'           => $request->property_studiorentunit,
        'property_noofonebed'               => $request->property_noofonebed,
        'property_nooftwobed'               => $request->property_nooftwobed,
        'property_noofthreebed'             => $request->property_noofthreebed,
        'property_nooffourbed'              => $request->property_nooffourbed,
        'property_onebedrentunit'           => $request->property_onebedrentunit,
        'property_twobedaskingrentunit'     => $request->property_twobedaskingrentunit,
        'property_threebedaskingrentunit'   => $request->property_threebedaskingrentunit,
        'property_ownername'                => $request->property_ownername,
        'property_owneraddress'             => $request->property_owneraddress,
        'property_ownercitystatezip'        => $request->property_ownercitystatezip,
        'property_ownercontact'             => $request->property_ownercontact,
        'property_ownerphone'               => $request->property_ownerphone,
        'property_managername'              => $request->property_managername,
        'property_managerphone'             => $request->property_managerphone,
        'property_recordedname'             => $request->property_recordedname,
        'property_recordedcontact'          => $request->property_recordedcontact,
        'property_recordedphone'            => $request->property_recordedphone,
        'property_recordedaddress'          => $request->property_recordedaddress,
        'property_recordedcitystatezip'     => $request->property_recordedcitystatezip,
        'property_salecname'                => $request->property_salecname,
        'property_salecphone'               => $request->property_salecphone,
        'property_saleccontact'             => $request->property_saleccontact,
        'updated_by'                        => session()->get('id'),
        'updated_at'                        => date('Y-m-d h:i:s'),
        );
        $save = DB::connection('mysql')->table('property')
        ->where('property_id', $request->hdn_property_id)
        ->update($adds);
        if ($request->hdn_type == "Dashboard") {
            $redirectback = "/admindashboard";
        }else{
            $redirectback = "/propertylist";
        }
        if($save){
            return redirect($redirectback)->with('message', 'Property Updated Successfully');
        }else{
            return redirect($redirectback)->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function submitcommentproperty($id,$comment){
        $adds[] = array(
            'commentinvester_text'  => $comment,
            'property_id'           => $id,
            'status_id'             => 1,
            'created_by'            => session()->get('id'),
            'created_at'            => date('Y-m-d h:i:s'),
        );
        $save = DB::table('commentinvester')->insert($adds);
        if($save){
            return redirect('/commentproperty/'.$id);
        }else{
            return redirect('/propertyboard')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function commentproperty($id){
        $comments = DB::table('commentinvester')
        ->select('commentinvester_text','commentinvester_id','created_at')
        ->where('status_id','=',1)
        ->where('property_id','=',$id)
        ->get();
        return view('invester.comments',['comment' => $comments]);
    }
    public function submitpropertyassigntask($id,$name,$to,$at){
        $adds[] = array(
            'assigntask_name'  => $name,
            'assigntask_to'    => $to,
            'assigntask_at'    => $at,
            'property_id'      => $id,
            'taskstatus_id'    => 1,
            'status_id'        => 1,
            'created_by'       => session()->get('id'),
            'created_at'       => date('Y-m-d h:i:s'),
        );
        $save = DB::table('assigntask')->insert($adds);
        if($save){
            return redirect('/taskproperty/'.$id);
        }else{
            return redirect('/propertyboard')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function taskproperty($id){
        $task = DB::table('assigntasklist')
        ->select('*')
        ->where('status_id','=',1)
        ->where('property_id','=',$id)
        ->orderBy('assigntask_id', 'DESC')
        ->get();
        return view('invester.task',['task' => $task]);
    }
}