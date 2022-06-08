<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\User;

class UserEventController extends Controller
{
    //basic action for controller:: index, show, create, store, edit, update, destroy
    //calculate the distance between two point in km     // -8.588641, 115.297787  
    public function twoPoint($latitudeFrom, $longitudeFrom,$latitudeTo,  $longitudeTo){
        $long1 = deg2rad($longitudeFrom);
        $long2 = deg2rad($longitudeTo);
        $lat1 = deg2rad($latitudeFrom);
        $lat2 = deg2rad($latitudeTo);

        //Haversine Formula
        $dlong = $long2 - $long1;
        $dlati = $lat2 - $lat1;

        $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);
        
        $res = 2 * asin(sqrt($val));
        $radius = 6371;
        return (round($res*$radius,2));
    }
    

    //load all event with distance 
    public function show(Request $request){
        $lat = $request->lat;
        $lng = $request->lng;
        $events = Event::where('status','approved')->get();
        $result =[];
        foreach($events as $event){
            $distance = $this->twoPoint($lat,$lng,$event->lat,$event->lng);
            $event->distance = $distance;
            $event->pmis = $event->pmi;
            array_push($result,$event);
        }
        return $result;
    }

    public function store(Request $request){
        try{
            date_default_timezone_set("Asia/Ujung_Pandang");
            $user;
            if($request->hasFile('file')){
                $file = $request->file('file');
                $file->store('public/documents');
                $fileName = $file->hashName();
                $user = Event::create([
                    'id_user'       => $request->eventUserId,
                    'id_pmi'        => $request->eventPmiId,
                    'title'         => $request->eventTitle,
                    'institution'   => $request->eventInstitution,
                    'description'   => $request->eventDescription,
                    'img'           => $fileName,
                    'lat'           => $request->eventLat,
                    'lng'           => $request->eventLng,
                    'address'       => $request->eventAddress,
                    'target'        => $request->eventTarget,
                    'post_at'       => date('Y-m-d H:i:s'),
                    'date_start'    => $request->eventDateStart,
                    'date_end'      => $request->eventDateEnd,
                    'status'        => $request->eventStatus 
                ]); 
                if($user){
                    return response()->json(['status'=>'success','message'=>"Permintaan Anda Terkirim"]);
                }else{
                    return response()->json(['status'=>'error','message'=>"gagal input data"]);
                }
            }else{
                $user = Event::create([
                    'id_user'       => $request->eventUserId,
                    'id_pmi'        => $request->eventPmiId,
                    'title'         => $request->eventTitle,
                    'institution'   => $request->eventInstitution,
                    'description'   => $request->eventDescription,
                    'lat'           => $request->eventLat,
                    'lng'           => $request->eventLng,
                    'address'       => $request->eventAddress,
                    'target'        => $request->eventTarget,
                    'post_at'       => date('Y-m-d H:i:s'),
                    'date_start'    => $request->eventDateStart,
                    'date_end'      => $request->eventDateEnd,
                    'status'        => $request->eventStatus 
                ]); 
                if($user){
                    return response()->json(['status'=>'success','message'=>"Permintaan Anda Terkirim"]);
                }else{
                    return response()->json(['status'=>'error','message'=>"gagal input data"]);
                }
            }
        }catch(Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }


    }

    public function update(Request $request){
        try{
            $event = Event::find($request->id);
            if($request->hasFile('file')){
                $file = $request->file('file');
                $file->store('public/documents');
                $fileName = $file->hashName();
                if(!empty($event->img)){
                    unlink('storage/documents/'.$event->img);
                }
                $event->title       = $request->title;
                $event->institution = $request->institution;
                $event->description = $request->description;
                $event->img         = $fileName;
                $event->lat         = $request->lat;
                $event->lng         = $request->lng;
                $event->address     = $request->address;
                $event->target      = $request->target;
                $event->date_start  = $request->dateStart;
                $event->date_end    = $request->dateEnd; 
                $result = $event->save();
                if($result){
                    return response()->json(['status'=>'success','message'=>"berhasil mengedit data"]);
                }else{
                    return response()->json(['status'=>'error','message'=>"Data gagal disimpan"]);
                }
            }else{
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
            }
        }catch(Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }

    public function delete(Request $request){
        $event = Event::find($request->id);
        $result = $event->delete();
        if($result){
            return response()->json(['status'=>'success','message'=>"Acara berhasil dihapus"]);
        }else{
            return response()->json(['status'=>'error','message'=>"Gagal menghapus acara"]);
        }
    }

    //additional function
    public function showByUserId(Request $request){
        $event = Event::where('id_user',$request->userId)->where('status',$request->status)->get();
        return $event;
    }

    public function showJoined(Request $request){
        $event =  User::find($request->userId)->joinedEvents()->where("status","approved")->get();
        return $event;
    }

    public function joinEvent(Request $request){
        $event = Event::find($request->idEvent);
        $result;
        if(!$event->users()->where("id_user",$request->idUser)->exists() && $request->status){
            $result = $event->users()->attach($request->idUser);
            return response()->json(['status'=>'success','message'=>"Anda Sudah Mendaftar"]);
        }else if($event->users()->where("id_user",$request->idUser)->exists() && $request->status==false){
            $result = $event->users()->detach($request->idUser);
            return response()->json(['status'=>'success','message'=>"Anda Batal mengikuti Acara"]);
        }else{
            return response()->json(['status'=>'error','message'=>"Gagal Mengubah/menambah Data"]);
        }

        // if(!$result && $request->status){
        //      return response()->json(['status'=>'success','message'=>"Anda Sudah Mendaftar"]);
        // }else if($result && !$request->status){
        //      return response()->json(['status'=>'success','message'=>"Anda Batal mengikuti Acara"]);
        // }else{
        //     return response()->json(['status'=>'error','message'=>"Gagal Mengubah/menambah Data"]);
        // }
    }

    public function checkJoinedEvent(Request $request){
        $event = Event::find($request->idEvent);
        if($event->users()->where("id_user",$request->idUser)->exists()!=null){
            return response()->json(['status'=>'success','message'=>"User Exist"]);
        }else{
            return response()->json(['status'=>'error','message'=>"User Not Exist"]);
        }
    }



    public function returnImage(){
        $event = Event::find(6);
       // $fileName = pathinfo('public/documents').$event->img;
        return asset('storage/documents/'.$event->img);
    }
}




    



