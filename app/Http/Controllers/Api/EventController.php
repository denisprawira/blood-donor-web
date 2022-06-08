<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function displayAll(){
        return Event::all();
    }

    public function getRequestedEvent(){
        return Event::where('id_user','=','1')->get();
    }
}
