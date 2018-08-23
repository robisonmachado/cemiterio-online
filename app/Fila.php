<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fila extends Model
{
    protected $fillable = ['numero', 'quadra_id'];
    
    public function quadra(){
        return $this->belongsTo(Quadra::class);
    }
    
}
