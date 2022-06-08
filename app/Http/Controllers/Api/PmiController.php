<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Pmi;
use Illuminate\Support\Facades\Auth;
class PmiController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            
        ]);
        
        if(Auth::guard('pmi')->attempt($credentials)){
            $user = Auth::guard('pmi')->user();
            $token = $user->createToken('mytoken')->plainTextToken;
            return response()->json([
                "status"    => 'success',
                "message"   => "you have logged in" ,
                'token'     => $token
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

    public function loadCurrentUser(Request $request){
        $user = Pmi::where('email',$request->email)->first();
        $user->blood;
        return response()->json($user);

        // return response()->json([
        //     'id'=>1,
        //     'name'=>'data outer name',
        //     'dataOuter'=>['id'=>2,'name'=>'data outer']
        // ]);
    }
    
}
