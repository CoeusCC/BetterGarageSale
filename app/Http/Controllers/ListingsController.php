<?php

namespace App\Http\Controllers;

use Log;

use Twilio;
use App\Listing;

class ListingsController extends Controller
{

    public function incoming()
    {
    	$listing = Listing::createListingFromTwilio(request()->all());


    	// Save info to listing
    		// Sid
    		// From/To
    		// Does it have media attached?
    			// Save media
    		// Body
    			// Title
    			// $Price
    	
/*    	$payload->id = $request->MessageSid;
    	$payload->from = urldecode($request->From);
    	$payload->to = urldecode($request->To);*/

    	Log::info('Listing saved = ' . $listing);
    }

}
