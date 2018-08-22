<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sepultamento extends Model
{
    public function cova(){
        return $this->belongsTo(Cova::class);
    }
}
