<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $fillable = [
        'name',
        'category',
        'comment',
        'brewary',
        'price',
        'pic1',
        'pic3',
        'pic2'

    ];

    public function cellars(){
        return $this->hasMany('App\Cellar');
    }
}
