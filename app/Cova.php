<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cova extends Model
{
    protected $fillable = ['numero', 'fila_id'];
    
    public function fila(){
        return $this->belongsTo(Fila::class);
    }

    public function sepultamentos(){
        return $this->hasMany(Sepultamento::class);
    }

}
