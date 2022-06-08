<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pmi;

class UserPmiController extends Controller
{
    public function loadAllPmi(){
        $result =  Pmi::all();
        return $result;
    } 

    public function loadPmi(Request $request ){
        $result =  Pmi::find($request->id);
        return $result;
    }
}
