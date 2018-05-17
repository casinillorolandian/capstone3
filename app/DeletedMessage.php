<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletedMessage extends Model
{
	protected $table = 'deletedmessages';
    function replies(){
    	return $this->hasMany('App\Reply');
    }

    function user(){
    	return $this->belongsto('App\User');
    }
}
