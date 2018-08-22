<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cova extends Model
{
    public function fila(){
        return $this->belongsTo(Fila::class);
    }
}
