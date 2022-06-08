<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{

    // Send Notification
	public function sendNotificationEventAccepted(Request $request){
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array (
			'to' => $request->token,
			'data' => array (
                "title"         => $request->title,
                "type"          => $request->type,
				"typeId"        => $request->typeId,
                "message" 		=> $request->message,
                "senderId"      => $request->senderId,
                "senderName"    => $request->senderName,
                "senderPhoto"  	=> $request->senderPhoto,
				"senderStatus"  => $request->senderStatus,
                "receiverStatus" => $request->receiverStatus
			)
		);

		$headers = array(
			"Authorization: key=AAAAnss9Bps:APA91bGYWpdwJWjur-ccnf1sdLsrKck7eTK7IJbFABKbMXT5-eOlvOlJDT3hc_SfMyWwioOJnFQi8CIFbfPpzqGUX_oZXPMfT1FeGINfPAIbOhWH9RRwwsW93W3Rh_Wxo2m3vLJCCxuw",
			"Content-Type: application/json"
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		if ($result === FALSE) {
			die('FCM Send Error: ' . curl_error($ch));
		}
		curl_close($ch);
		return $result;
	}

	public function test(){
		return "this is notification controller";
	}
}
