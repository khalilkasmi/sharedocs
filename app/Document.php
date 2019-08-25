<?php

namespace App;

use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    use Taggable;

    protected $fillable = [
        'title', 'description', 'path'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
