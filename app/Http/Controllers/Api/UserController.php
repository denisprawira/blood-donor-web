<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Event;
use App\Models\Pmi;
use App\Models\HelpRequest;

use Illuminate\Support\Facades\Auth;

use Exception;
class UserController extends Controller{

    public function register(Request $request){
        $user;
        try{
            if($request->hasFile('file')){
                $file = $request->file('file');
                $file->store('public/documents');
                $fileName = $file->hashName();
                $user = User::create([
                    'name'          => $request->name,
                    'email'         => $request->email,
                    'phone'         => $request->phone,
                    'address'       => $request->address,
                    'blood_type'    => $request->blood_type,
                    'password'      => bcrypt($request->password),
                    'img'           => $fileName,
                    'roles'         => $request->roles,
                    'status'        => $request->status,
                ]); 
            }else{
                $user = User::create([
                    'name'          => $request->name,
                    'email'         => $request->email,
                    'phone'         => $request->phone,
                    'address'       => $request->address,
                    'blood_type'    => $request->blood_type,
                    'password'      => bcrypt($request->password),
                    'roles'         => $request->roles,
                    'status'        => $request->status,
                ]); 
            }


            $token = $user->createToken('mytoken')->plainTextToken;
            if($user){
                return response()->json([
                    'status' => 'success',
                    'message' => "data inserted",
                    'token' =>$token
                ]);
            }
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            
        ]);
        
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('mytoken')->plainTextToken;
            return response()->json([
                "status"    => 'success',
                "message"   => "you have logged in",
                'token'     => $token,
                "userStatus" => $user->role
            ],200);
        }

        return response()->json([
            "status"    => 'fails to login',
            "message"   => "the provided credential do not math record" 
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return [
            "status"=>"success",
            "message"=>"you have been logged out"];
    }

    public function update(Request $request){
        try{
            $user = User::find($request->id);
            if($request->hasFile('file')){
                $file = $request->file('file');
                $file->store('public/documents');
                $fileName = $file->hashName();
                if(!empty($user->img)){
                    unlink('storage/documents/'.$user->img);
                }
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->blood_type = $request->bloodType;
                $user->img = $fileName;
                $user->save();
                return response()->json(['status'=>'success','message'=>"berhasil mengedit data"]);
            }else{
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->blood_type = $request->bloodType;
                $user->save();
                return response()->json(['status'=>'success','message'=>"berhasil mengedit data"]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }

    }

    public function loadCurrentUser(Request $request){
        $user = User::where('email',$request->email)->first();
        $user->img = asset('storage/documents/'.$user->img);
        $user->blood;
        return $user;
    }

    public function loadUserPmi(Request $request){
        $user = User::find($request->userId);
        return $user->userHasPmi->first();
    }

    public function updateFirebaseToken(Request $request){
        try{
            $user = User::find($request->id);
            $user->token = $request->token;
            if($user->save()){
                return response()->json(['status'=>'success','message'=>"berhasil update data"]);
            }else{
                return response()->json(['status'=>'error','message'=>"gagal update data"]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }



    
}
