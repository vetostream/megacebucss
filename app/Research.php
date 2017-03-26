<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    //
    protected $table = 'researches';
    //public $timestamps = false;

        protected $fillable = [
        'title','research_abstract','document_file_name','user_id','fund_goal'
    ];

    public function Tag()
    {
        return $this->belongsToMany('App\Tag', 'researchdtl', 'research_id', 'tag_id');
    }

    public function funders(){
        return $this->belongsToMany('App\Funds', 'funds', 'research_id','funder_id');
    }

    public function ResearchComment(){
        return $this->hasMany('App\ResearchComment');
    }

}
