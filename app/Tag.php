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

    public function Post()//switched 3rd and 4th parameters
    {
        //Take note of the path to the post model
        return $this->belongsToMany('App\Models\Post', 'postdtl', 'tag_id', 'post_id');
    }

    public function Research()
    {
        return $this->belongsToMany('App\Research', 'researchdtl', 'tag_id', 'research_id');
    }
}
