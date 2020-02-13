<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cellar extends Model
{
    public function beer(){
        return $this->belongsto('App\Beer');
    }
}
