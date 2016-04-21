<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
	
    protected $fillable = [
        'title', 'description', 'message_id', 'from', 'to', 'price'
    ];

    public static function createListingFromTwilio() {
    	
    	$listing = new Listing;
    	$listing->message_id = request()->MessageSid;
    	$listing->from = urldecode(request()->From);
    	$listing->to = urldecode(request()->To);
    	
    	if ( isset( request()->Body) )
    	{
    		$body = explode('$', urldecode(request()->Body));
			$listing->title = $body[0];
			$listing->price = isset($body[1]) ? $body[1] : NULL;
    	}
    	
	    $success = $listing->save();

    	if ( $success && isset( request()->MediaUrl0) )
    	{
    		$url = urldecode(request()->MediaUrl0);
    		$photo = new Photo;
    		$photo->attach($url, $listing);
    		// Add verification that photo saved or return error
    	}

    	return "Success";
    }

    public function photos(){

        return $this->hasMany(Photo::class);

    }

}
