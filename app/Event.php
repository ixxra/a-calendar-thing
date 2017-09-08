<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    
    public function creator() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'users_events', 'event_id', 'user_id')->withTimeStamps();
    }
}
