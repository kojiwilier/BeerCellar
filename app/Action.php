<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'user_id',
        'beer_id'
    ];

    public function beer(){
        return $this->belongsto('App\Beer');
    }

    public function user(){
        return $this->belongsto('App\User');
    }
}
