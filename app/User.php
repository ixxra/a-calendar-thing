<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
//class User extends Model
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function events() {
        return $this->belongsToMany('App\Event', 'users_events', 'user_id', 'event_id');
        #return $this->belongsToMany('Event', 'users_events', 'user_id', 'event_id');
        #return $this->hasMany('App\Event');
    }

    //public function setPasswordAttribute($password) {
    //    $this->attributes['password'] = bcrypt($password);
    //}
}
