<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\reportsdtl;
use App\UserRequest;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','first_name','last_name','middle_name','mobile_no','birthdate','user_type_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Report()
    {
        return $this->belongsToMany('App\Report', 'reportsdtl', 'user_id', 'report_id')->withPivot('message')->withTimestamps();
    }

    public function ResearchComment(){
        return $this->hasMany('App\ResearchComment');
    }

    public function Post(){
        return $this->hasMany('App\Post');
    }
    
    public function userRequests(){
        return $this->hasOne('App\UserRequest');
    }

}
