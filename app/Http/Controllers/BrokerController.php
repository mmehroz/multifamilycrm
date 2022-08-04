<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BrokerController extends Controller
{
   public function brokerlist(Request $request){
        if(session()->get('role_id') == 1){
            $data = DB::table('brookerlist')
            ->select('*')
            ->where('status_id','=',1)
            ->orderBy('brooker_id', 'DESC')
            ->get();
            return view('brooker.list',['data' => $data]);
        }elseif(session()->get('role_id') == 2){
            $data = DB::table('brookerlist')
            ->select('*')
            ->where('status_id','=',1)
            ->where('created_by','=',session()->get('id'))
            ->orderBy('brooker_id', 'DESC')
            ->get();
            return view('brooker.listforclient',['data' => $data]);
        }else{
            $getcreatorid = DB::table('users')
            ->select('created_by')
            ->where('users_id','=',session()->get('id'))
            ->first();
            $data = DB::table('brookerlist')
            ->select('*')
            ->where('status_id','=',1)
            ->where('created_by','=',$getcreatorid->created_by)
            ->orderBy('brooker_id', 'DESC')
            ->get();
            return view('brooker.listforva',['data' => $data]);
        }
    }
    public function addbroker(){
        $role = DB::table('role')
        ->select('*')
        ->get();
        return view('brooker.add',['role' => $role]);
    }
    public function submitbroker(Request $request){
        $this->validate($request, [
            'brooker_email' =>'required|unique:brooker,brooker_email',
        ]);
        $this->validate($request, [
            'brooker_image'=>'mimes:jpeg,bmp,png,jpg|max:20024|required'
        ]);
         if($request->hasFile('brooker_image') && $request->brooker_image->isValid()){
            $number = rand(1,999);
            $numb = $number / 7 ;
            $extension = $request->brooker_image->extension();
            $brooker_image  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
            $brooker_image  = $request->brooker_image->move(public_path('brokerimage'),$brooker_image);
            // $img = Image::make($brooker_image)->resize(800,800, function($constraint) {
            //     $constraint->aspectRatio();
            // });
            // $img->save($brooker_image);
            $brooker_image = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
        }else{
            $brooker_image = 'noimage.jpg';    
        }
        $info[] = array(
            'brooker_firstname'     => $request->brooker_firstname,
            'brooker_lastname'      => $request->brooker_lastname,
            'brooker_age'           => $request->brooker_age, 
            'brooker_email'         => $request->brooker_email,
            'brooker_phonenumber'   => $request->brooker_phonenumber,
            'brooker_image'         => $brooker_image,
            'status_id'             => 1,
            'created_by'            => session()->get('id'),
            'created_at'            => date('Y-m-d h:i:s'),
        );
        $save = DB::table('brooker')->insert($info);
        if($save){
            return redirect('/brokerlist')->with('message', 'Broker Added Successfully');
        }else{
            return redirect('/brokerlist')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function editbroker($id){
        $info = DB::table('brooker')
        ->select('*')
        ->where('brooker_id','=',$id)
        ->first();
        return view('brooker.edit',['data' => $info]);
    }
    public function submiteditbroker(Request $request){
       if ($request->hidden_brooker_email != $request->brooker_email) {
        $this->validate($request, [
            'brooker_email' =>'required|unique:brooker,brooker_email',
        ]);
        }
        if($request->hasFile('brooker_image') && $request->brooker_image->isValid()){
            $this->validate($request, [
                'brooker_image'=>'mimes:jpeg,bmp,png,jpg|max:20024'
            ]);
            $number = rand(1,999);
            $numb = $number / 7 ;
            $extension = $request->brooker_image->extension();
            $brooker_image  = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
            $brooker_image = $request->brooker_image->move(public_path('brokerimage'),$brooker_image);
            // $img = Image::make($brooker_image)->resize(800,800, function($constraint) {
            //     $constraint->aspectRatio();
            // });
            // $img->save($brooker_image);
            $brooker_image = session()->get("email")."_".date('Y-m-d')."_.".$numb."_.".$extension;
        }else{
            $brooker_image = $request->hidden_brooker_image;    
        }
        $save = DB::table('brooker')
            ->where('brooker_id','=',$request->hidden_brooker_id)
            ->update(['brooker_firstname'   => $request->brooker_firstname,
            'brooker_lastname'              => $request->brooker_lastname,
            'brooker_age'                   => $request->brooker_age,
            'brooker_email'                 => $request->brooker_email, 
            'brooker_phonenumber'           => $request->brooker_phonenumber,
            'brooker_image'                 => $brooker_image,
            'updated_by'                    => session()->get('id'),
            'updated_at'                    => date('Y-m-d h:i:s'),
        ]);
        if($save){
            return redirect('/brokerlist')->with('message', 'Broker Updated Successfully');
        }else{
            return redirect('/brokerlist')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function deletebroker($id){
        $save = DB::table('brooker')
            ->where('brooker_id','=',$id)
            ->update(['status_id'   => 2,
            'deleted_by'            => session()->get('id'),
            'deleted_at'            => date('Y-m-d h:i:s'),
        ]);
        if($save){
            return redirect('/brokerlist')->with('message', 'Broker Deleted Successfully');
        }else{
            return redirect('/brokerlist')->with('message', 'Oops! Something Went Wrong');
        }
    }
    public function brokeruploader(Request $request)
    {
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
                $location = 'brokeruploads'; //Created an "uploads" folder for that
                // Upload file
                $file->move(public_path('brokeruploads/'),$filename);
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
                        'brooker_firstname'     => $importData[0],
                        'brooker_lastname'      => $importData[1],
                        'brooker_age'           => $importData[2],
                        'brooker_email'         => $importData[3],
                        'brooker_phonenumber'   => $importData[4],
                        'brooker_image'         => "noimage.jpg",
                        'brooker_comment'       => "",
                        'status_id'             => 1,
                        'created_by'            => session()->get('id'),
                        'created_at'            => date('Y-m-d h:i:s'),
                        );
                    } catch (\Exception $e) {
                        DB::rollBack();
                    }
                        DB::table('brooker')->insert($adds);
                }
                    return redirect('/brokerlist')->with('message', 'Broker Uploaded Successfully');
                } else {
                    return redirect('/brokerlist')->with('message', 'File Size Too Large');
                }
            } else {
                return redirect('/brokerlist')->with('message', 'Invalid Format');
            }
            
        } else {
            return redirect('/brokerlist')->with('message', 'No file Was Uploaded');
        }
    }
}