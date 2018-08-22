<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fila extends Model
{
    public function quadra(){
        return $this->belongsTo(Quadra::class);
    }
    
}
