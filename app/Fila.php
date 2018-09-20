<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Fila extends Model
{
    protected $fillable = ['numero', 'quadra_id'];
    
    
    public function quadra(){
        return $this->belongsTo(Quadra::class);
    }

    public function covas(){
        return $this->hasMany(Cova::class);
    }

    public function sepultamentos(){
        return $this->hasManyThrough(sepultamento::class, Cova::class);
    }
    
}
