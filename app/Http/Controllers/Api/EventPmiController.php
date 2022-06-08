<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HelpRequest;

class EventPmiController extends Controller
{
    public function findHelpRequest(){
        $helpRequest = HelpRequest::find(1);
        $helpRequest->pmi;
        $helpRequest->blood;
        $helpRequest->user->blood;
        return $helpRequest;


    }
}
