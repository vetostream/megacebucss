<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tags';
    public $timestamps = false;

        protected $fillable = [
        'tag_name'
    ];

    public function Post()
    {
        return $this->belongsToMany('App\Post', 'postdtl', 'post_id', 'tag_id');
    }
}
