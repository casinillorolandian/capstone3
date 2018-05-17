<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    function replies(){
    	return $this->hasMany('App\Reply');
    }

    function user(){
    	return $this->belongsTo('App\User');
    }

    
}
