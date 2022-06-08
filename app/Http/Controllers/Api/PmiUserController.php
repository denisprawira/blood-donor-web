<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PmiUserController extends Controller
{
    public function loadUserEvent(Request $request){
        $user = User::find($request->idUser);
        return $user;
    }
}
