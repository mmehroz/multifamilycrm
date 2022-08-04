<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function adminresources(Request $request){
        $data = DB::table('userlist')
        ->select('*')
        ->where('status_id','=',1)
        ->orderBy('users_id', 'DESC')
        ->get();
        $emaildata = DB::table('emailtemplate')
        ->select('*')
        ->where('status_id','=',1)
        ->orderBy('emailtemplate_id', 'DESC')
        ->get();
        return view('user.list',['data' => $data, 'emaildata' => $emaildata]);
    }
    public function adduser(){
        $role = DB::table('role')
        ->select('*')
        ->get();
        return view('user.add',['role' => $role]);
    }
    public function submituser(Request $request){
        if (session()->get('role_id') == 1) {
            $this->redirect = new \stdClass();
            $this->redirect->to = 'adminresources';
        }else{
            $this->redirect = new \stdClass();
            $this->redirect->to = 'valist';
        }
        $this->validate($request, [
            'users_email' =>'required|unique:users,users_email',
        ]);
        $this->validate($request, [
            'users_image'=>'mimes:jpeg,bmp,png,jpg|max:20024'
        ]);
         if($request->hasFile('users_image') && $request->users_image->isValid()){
            $number = rand(1,999);
            $numb = $number / 7 ;
            $extension = $request->users_image->extension();
            $users_image  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
            $users_image = $request->users_image->move(public_path('userimage'),$users_image);
            // $img = Image::make($users_image)->resize(800,800, function($constraint) {
            //     $constraint->aspectRatio();
            // });
            // $img->save($users_image);
            $users_image = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
        }else{
            $users_image = 'noimage.jpg';    
        }
        $info[] = array(
            'users_name'            => $request->users_name,
            'users_lastname'        => $request->users_lastname,
            'users_image'           => $users_image,
            'users_email'           => $request->users_email, 
            'users_password'        => $request->users_password,
            'users_phone'           => $request->users_phone,
            'users_companyname'     => $request->users_companyname,
            'users_companyaddress'  => $request->users_companyaddress,
            'users_website'         => $request->users_website,
            'role_id'               => $request->role_id,
            'status_id'             => 1,
            'created_by'            => session()->get('id'),
            'created_at'            => date('Y-m-d h:i:s'),
        );
        $save = DB::table('users')->insert($info);
        $property_uploadedfor  = DB::getPdo()->lastInsertId();
        // Property Upload
        $file = $request->file('uploaded_file');
        if ($file) {
            $filename = $file->getClientOriginalName();
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
                        'property_uploadedfor'              => $property_uploadedfor,
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
            return redirect($this->redirect->to)->with('message', 'User Added Successfully');
        }
        if($save){
            return redirect($this->redirect->to)->with('message', 'User Added And Property Uploaded Successfully');
        }else{
            return redirect($this->redirect->to)->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function edituser($id){
        $userinfo = DB::table('users')
        ->select('*')
        ->where('users_id','=',$id)
        ->first();
        $role = DB::table('role')
        ->select('*')
        ->get();
        $upload = DB::table('property')
        ->select('property_token')
        ->where('status_id','=',1)
        ->where('property_uploadedfor','=',$id)
        ->groupBy('property_token')
        ->get();
        return view('user.edit',['data' => $userinfo, 'role' => $role, 'upload' => $upload]);
    }
    public function submitedituser(Request $request){
        if (session()->get('role_id') == 1) {
            $this->redirect = new \stdClass();
            $this->redirect->to = 'adminresources';
        }else{
            $this->redirect = new \stdClass();
            $this->redirect->to = 'valist';
        }
       if ($request->hidden_users_email != $request->users_email) {
        $this->validate($request, [
            'users_email' =>'required|unique:users,users_email',
        ]);
        }
        if($request->hasFile('users_image') && $request->users_image->isValid()){
            $this->validate($request, [
                'users_image'=>'mimes:jpeg,bmp,png,jpg|max:20024'
            ]);
            $number = rand(1,999);
            $numb = $number / 7 ;
            $extension = $request->users_image->extension();
            $users_image  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
            $users_image = $request->users_image->move(public_path('userimage'),$users_image);
            // $img = Image::make($users_image)->resize(800,800, function($constraint) {
            //     $constraint->aspectRatio();
            // });
            // $img->save($users_image);
            $users_image = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
        }else{
            $users_image = $request->hidden_users_image;    
        }
        $save = DB::table('users')
            ->where('users_id','=',$request->hidden_users_id)
            ->update(['users_name'  => $request->users_name,
            'users_lastname'        => $request->users_lastname,
            'users_image'           => $users_image,
            'users_email'           => $request->users_email, 
            'users_password'        => $request->users_password,
            'users_phone'           => $request->users_phone,
            'users_companyname'     => $request->users_companyname,
            'users_companyaddress'  => $request->users_companyaddress,
            'users_website'         => $request->users_website,
            'role_id'               => $request->role_id,
            'status_id'             => 1,
            'updated_by'            => session()->get('id'),
            'updated_at'            => date('Y-m-d h:i:s'),
        ]);
        $file = $request->file('uploaded_file');
        if ($file) {
            $filename = $file->getClientOriginalName();
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
                        'property_uploadedfor'              => $request->hidden_users_id,
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
            return redirect($this->redirect->to)->with('message', 'User Updated Successfully');
        }
        if($save){
            return redirect($this->redirect->to)->with('message', 'User Updated And Property Uploaded Successfully');
        }else{
            return redirect($this->redirect->to)->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function viewprofile($id){
        $userinfo = DB::table('users')
        ->select('*')
        ->where('users_id','=',$id)
        ->first();
        $role = DB::table('role')
        ->select('*')
        ->get();
        return view('user.view',['data' => $userinfo, 'role' => $role]);
    }
}