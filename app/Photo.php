<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $fillable = [
	    'title', 'description', 'message_id', 'from', 'to', 'price'
	];

    public function attach($url, $listing)
    {
		$photo = new Photo;

		$extension = pathinfo($url, PATHINFO_EXTENSION);
		$photo->filename = str_random(4).'-'.str_slug($listing->title).'.'. $extension;

		//get file content from url
		$file = file_get_contents($url);
		$save = file_put_contents('images/'.$photo->filename, $file);

		if($save){
			//transaction......
			DB::beginTransaction();
			try {
				$try = $listing->photos()->save($photo);
				DB::commit();
			} catch (Exception $e) {
				//delete if no db things........
				File::delete('images/'. $filename);
				DB::rollback();
			}
		}
		
		return true;

    }

    /*
	 *	Return the total number of photos currently in the databse
    */
    public static function totalUploaded() {

    	return Photo::all()->count();

    }

    public function listing() {

        return $this->belongsTo(Listing::class);

    }

}
