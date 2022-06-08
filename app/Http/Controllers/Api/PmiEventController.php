<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\NotificationController;
use Illuminate\Http\Request;
use App\Models\Event;

class PmiEventController extends Controller
{

    public function update(Request $request){
        try{
            $event = Event::find($request->id);
            $event->title       = $request->title;
            $event->institution = $request->institution;
            $event->description = $request->description;
            $event->lat         = $request->lat;
            $event->lng         = $request->lng;
            $event->address     = $request->address;
            $event->target       = $request->target;
            $event->date_start  = $request->dateStart;
            $event->date_end    = $request->dateEnd; 
            $result = $event->save();
            if($result){
                return response()->json(['status'=>'success','message'=>"berhasil mengedit data"]);
            }else{
                return response()->json(['status'=>'error','message'=>"Data gagal disimpan"]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }


    public function loadEvent(Request $request){
        $event = Event::where("id_pmi",$request->idPmi)->where('status',$request->status)->get();
        return $event;
    }

    public function acceptEvent(Request $request){
        $event = Event::find($request->idEvent);
        $event->status = $request->status;
        $result = $event->save();
        if($result){
            return response()->json(['status'=>'success','message'=>"Berhasil Mengubah Data"]);
        }else{
            return response()->json(['status'=>'error','message'=>"Gagal Mengubah/menambah Data"]);
        }
        
    }

    public function testPmiEvent(){
        return (new NotificationController)->test();
    }

    


}
