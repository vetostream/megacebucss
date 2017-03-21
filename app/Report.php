<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $table = 'reports';

        protected $fillable = [
        'post_id','number_of_reps'
    ];

    public function User()
    {
        return $this->belongsToMany('App\User', 'reportsdtl', 'report_id', 'user_id');
    }
}
