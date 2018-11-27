<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\comment ;

class Post extends Model
{
    //

    protected $fillable = [
        'img_url','body','user_id'
    ];


    public function comments() {
        return $this->hasMany(\App\comment::class);
    }
	public function user(){
		return $this->belongsTo(\App\User::class); 
	}
}
