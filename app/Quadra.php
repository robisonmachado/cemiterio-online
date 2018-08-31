<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Quadra extends Model
{
    protected $fillable = ['numero'];

    public function filas(){
        return $this->hasMany(Fila::class);
    }

    public function covas(){
        return $this->hasManyThrough(Cova::class, Fila::class);
    }

    public static function sepultamentosByQuadra(int $quadra=null){

        if(empty($quadra)){
            return Sepultamento::join('covas', 'sepultamentos.cova_id', '=', 'covas.id' )
                        ->join('filas', 'filas.id', '=', 'covas.fila_id' )
                        ->join('quadras', 'quadras.id', '=', 'filas.quadra_id' )
                        ->select(
                            'sepultamentos.*','covas.numero as cova_numero', 
                            'filas.numero as fila_numero', 'quadras.numero as quadra_numero')
                        ;
        }
        
        return Sepultamento::join('covas', 'sepultamentos.cova_id', '=', 'covas.id' )
                        ->join('filas', 'filas.id', '=', 'covas.fila_id' )
                        ->join('quadras', 'quadras.id', '=', 'filas.quadra_id' )
                        ->where('quadras.numero', $quadra)
                        ->select(
                            'sepultamentos.*','covas.numero as cova_numero', 
                            'filas.numero as fila_numero', 'quadras.numero as quadra_numero')
                        ;
            
    }

}
