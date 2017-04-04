<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    protected $table = 'studrequests';
    public $timestamps = false;
    
    protected $fillable = [
        'user_id','ack_status'
    ];
    
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    
}
