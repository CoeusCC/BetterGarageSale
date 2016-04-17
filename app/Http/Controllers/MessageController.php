<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

use App\Http\Requests;
use Twilio;
use App\Message;

class MessageController extends Controller
{
    public function quickMessage(Request $request)
    {
    	dd($request);
    	//$test = Twilio::message('+19795716568', 'FOO');
    }

    public function incoming(Request $request)
    {
    	$payload = new Message();
    	
    	$payload->id = $request->SmsSid;
    	$payload->from = urldecode($request->From);
    	$payload->to = urldecode($request->To);

    	$success = $payload->save();

    	Log::info('Message saved = ' . $success." with ID = ".$payload->id);
    }

    public function import(Request $request)
    {
    	$url = urldecode("https%3A%2F%2Fapi.twilio.com%2F2010-04-01%2FAccounts%2FACde727e039c854d96e1309250a492a974%2FMessages%2FMM69b8c033c59c830af83df0136343d501%2FMedia%2FME0fca7129f4c366f08561cba736ed210b");
		$title = urldecode("And+we%27re+back");
		$extension = pathinfo($url, PATHINFO_EXTENSION);
		$filename = str_random(4).'-'.str_slug($title).'.'. $extension;
		//get file content from url
		$file = file_get_contents($url);
		$save = file_put_contents('images/'.$filename, $file);
		if($save){
			//transaction......
			DB::beginTransaction();
			try {
				Photo::create([
					'title' => $title,
					'filename'=> $filename
				]);
				var_dump('file downloaded to images folder and saved to database as well.......');
				DB::commit();
			} catch (Exception $e) {
				//delete if no db things........
				File::delete('images/'. $filename);
				DB::rollback();
			}
		}

    }


}
