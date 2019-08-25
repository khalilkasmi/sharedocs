<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{

    public function documents(){
        return $this->morphedByMany('App\Document','taggable');
    }

}
