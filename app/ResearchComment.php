<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchComment extends Model
{
    //
    protected $table = 'researchcom';
    //public $timestamps = false;

        protected $fillable = [
        'content','research_id','user_comment'
    ];

    public function User()
    {
        return $this->belongsTo('App\User','id','user_comment');
    }

}
