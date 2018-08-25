<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Quadra extends Model
{
    protected $fillable = ['numero'];

    public function filas(){
        return $this->hasMany(Fila::class);
    }

}
