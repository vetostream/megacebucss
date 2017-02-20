<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    //
    protected $table = 'researches';
    //public $timestamps = false;

        protected $fillable = [
        'title','research_abstract','document_file_name','user_id'
    ];

    public function Tag()
    {
        return $this->belongsToMany('App\Tag', 'researchdtl', 'research_id', 'tag_id');
    }

}
