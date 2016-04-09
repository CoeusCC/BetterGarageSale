<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

use App\Http\Requests;
use Twilio;

class MessageController extends Controller
{
    public function quickMessage(Request $request)
    {
    	dd($request);
    	//$test = Twilio::message('+19795716568', 'FOO');
    }

    public function incoming(Request $request)
    {
    	Log::info('Log message: '. $request);
    	//$test = Twilio::message('+19795716568', 'FOO');
    }
}
