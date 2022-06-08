<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HelpRequest;

class UserHelpRequestController extends Controller
{
    public function store(Request $request){
        try{
            date_default_timezone_set("Asia/Ujung_Pandang");
            $helprequest;
            if($request->hasFile('file')){
                $file = $request->file('file');
                $file->store('public/documents');
                $fileName = $file->hashName();
                $helprequest = HelpRequest::create([
                    'id_user'       => $request->idUser,
                    'id_pmi'        => $request->idPmi,
                    'blood_type'    => $request->bloodType,
                    'description'   => $request->description,
                    'patient_name'  => $request->patientName,
                    'target'        => $request->target,
                    'img'           => $fileName,
                    'post_at'       => date('Y-m-d H:i:s'),
                    'status'        => $request->status 
                ]); 
                if($helprequest){
                    return response()->json(['status'=>'success','message'=>"Berhasil Menambah Data"]);
                }else{
                    return response()->json(['status'=>'error','message'=>"gagal input data"]);
                }
            }else{
                $helprequest = HelpRequest::create([
                    'id_user'       => $request->idUser,
                    'id_pmi'        => $request->idPmi,
                    'blood_type'    => $request->bloodType,
                    'description'   => $request->description,
                    'patient_name'  => $request->patientName,
                    'target'        => $request->target,
                    'post_at'       => date('Y-m-d H:i:s'),
                    'status'        => $request->status 
                ]); 
                if($helprequest){
                    return response()->json(['status'=>'success','message'=>"Berhasil Menambah Data"]);
                }else{
                    return response()->json(['status'=>'error','message'=>"gagal input data"]);
                }
            }
        }catch(Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }

    public function show(Request $request){
        $helpRequests = HelpRequest::where('id_user',$request->idUser)->where('status',$request->status)->get();
        $result =[];
        foreach($helpRequests as $helpRequest){
            $helpRequest->user;
            
            array_push($result, $helpRequest);
        }
        return $result;
    }

    public function update(Request $request){
        try{
            $helpRequest = HelpRequest::find($request->id);
            if($request->hasFile('file')){
                $file = $request->file('file');
                $file->store('public/documents');
                $fileName = $file->hashName();
                if(!empty($helpRequest->img)){
                    unlink('storage/documents/'.$helpRequest->img);
                }
                $helpRequest->id_pmi        = $request->idPmi;
                $helpRequest->blood_type    = $request->bloodType;
                $helpRequest->description   = $request->description;
                $helpRequest->patient_name  = $request->patientName;
                $helpRequest->target        = $request->target;
                $helpRequest->img           = $fileName;  
                $helpRequest->status        = $request->status;
                $result = $helpRequest->save();
                if($result){
                    return response()->json(['status'=>'success','message'=>"berhasil mengedit data"]);
                }else{
                    return response()->json(['status'=>'error','message'=>"Data gagal disimpan"]);
                }
            }else{
                $helpRequest->id_pmi        = $request->idPmi;
                $helpRequest->blood_type    = $request->bloodType;
                $helpRequest->description   = $request->description;
                $helpRequest->patient_name  = $request->patientName;
                $helpRequest->target        = $request->target;
                $helpRequest->status        = $request->status;
                $result = $helpRequest->save();
                if($result){
                    return response()->json(['status'=>'success','message'=>"berhasil mengedit data"]);
                }else{
                    return response()->json(['status'=>'error','message'=>"Data gagal disimpan"]);
                }
            }
        }catch(Exception $e){

        }
    }

    public function delete(Request $request){
        $event = HelpRequest::find($request->id);
        $result = $event->delete();
        if($result){
            return response()->json(['status'=>'success','message'=>"Berhasil Menghapus Data"]);
        }else{
            return response()->json(['status'=>'error','message'=>"Gagal menghapus acara"]);
        }
    }

    ///additional function
    public function showHelpRequestByUserId(Request $request){
        $helpRequest = HelpRequest::where('id_user',$request->id)->get();
        return $helpRequest;
    }

    public function joinHelpRequest(){
        
    }
}
