<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    //
    protected $table = 'postscom';
    //public $timestamps = false;

        protected $fillable = [
        'content','research_id','user_comment'
    ];

    public function User()
    {
        return $this->belongsTo('App\User','id','user_comment');
    }

}
