<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function tags(){
        return $this->morphToMany('App\Tags','taggable');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
