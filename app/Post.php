<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    //public $timestamps = false;

        protected $fillable = [
        'postinfo','title','content','user_id','post_type_id'
    ];

    public function Tag()
    {
        return $this->belongsToMany('App\Tag', 'postdtl', 'post_id', 'tag_id');
    }

    public function Report()
    {
        return $this->hasMany('App\Report');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
