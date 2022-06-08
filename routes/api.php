<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//=========================================//
//          User Controller                //
//=========================================//
    Route::post('user/register','Api\UserController@register');
    Route::post('user/login','Api\UserController@login');
    Route::post('user/update','Api\UserController@update');
    Route::post('user/loadCurrentUser','Api\UserController@loadCurrentUser');
    // additional action
    Route::post('user/loadUserPmi','Api\UserController@loadUserPmi');
    Route::post('user/updateFirebaseToken','Api\UserController@updateFirebaseToken');

    
//=========================================//
//          User Event Controller          //
//=========================================//
    Route::post('user/event/show','Api\UserEventController@show');
    Route::post('user/event/store','Api\UserEventController@store');
    Route::post('user/event/update','Api\UserEventController@update');
    Route::post('user/event/delete','Api\UserEventController@delete');
    //Additional Action
    Route::post('user/event/showByUserId','Api\UserEventController@showByUserId');
    Route::post('user/event/showJoined','Api\UserEventController@showJoined');
    Route::post('user/event/returnImage','Api\UserEventController@returnImage');
    Route::post('user/event/joinEvent','Api\UserEventController@joinEvent');
    Route::post('user/event/checkJoinedEvent','Api\UserEventController@checkJoinedEvent');


//=========================================//
//        User Help Request Controller     //
//=========================================//
    Route::post('user/helprequest/show','Api\UserHelpRequestController@show');
    Route::post('user/helprequest/store','Api\UserHelpRequestController@store');
    Route::post('user/helprequest/update','Api\UserHelpRequestController@update');
    Route::post('user/helprequest/delete','Api\UserHelpRequestController@delete');
    // additional action
    Route::post('user/helprequest/showHelpRequestByUserId','Api\UserHelpRequestController@showHelpRequestByUserId');

Route::group(['middleware'=>['auth:sanctum']],function(){
    
    // USER AUTH
    Route::post('user/logout','Api\UserController@logout');
    
    //PMI AUTH
    Route::post('pmi/logout','Api\PmiController@logout');

});

Route::post('pmi/login','Api\PmiController@login');

//user PMI
Route::post('user/pmi/loadAllPmi','Api\UserPmiController@loadAllPmi');
Route::post('user/pmi/loadPmi','Api\UserPmiController@loadPmi');

//PMI
Route::post('pmi/loadCurrentUser','Api\PmiController@loadCurrentUser');

//PMI Event
Route::post('pmi/event/loadEvent','Api\PmiEventController@loadEvent');
Route::post('pmi/event/acceptEvent','Api\PmiEventController@acceptEvent');
Route::post('pmi/event/update','Api\PmiEventController@update');


//Notification 
Route::post('notification/sendNotificationEventAccepted','Api\NotificationController@sendNotificationEventAccepted');
//Route::post('notification/test', 'Api\NotificationController@test');
Route::post('eventPmi/test','Api\PmiEventController@testPmiEvent');
//PMI user
Route::post('pmi/user/loadUserEvent','Api\PmiUserController@loadUserEvent');

