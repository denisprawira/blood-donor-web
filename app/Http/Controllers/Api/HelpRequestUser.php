<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HelpRequest;

class HelpRequestUser extends Controller
{
    public function findByUser(Request $request){
        $result = HelpRequest::where('id_user',$request->idUser)->get();
        return response()->json($result);
    }

    
}
