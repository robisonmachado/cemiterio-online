<?php

namespace App;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class Sepultamento extends Model
{
    public function cova(){
        return $this->belongsTo(Cova::class);
    }

    public static function addSepultamento(Request $request){
        $quadra = Quadra::where('numero', $request->get('quadra'))->first();
        $fila = Fila::where('numero', $request->get('fila'))->first();
        $cova = Quadra::where('numero', $request->get('cova'))->first();

        if(empty($quadra)){
            $quadraObj = Quadra::create(['numero' => $request->get('quadra')]);
            
            $filaObj = Fila::create([
                'numero' => $request->get('fila'),
                'quadra_id' => $quadraObj->id,
                ]);

            $covaObj = Cova::create([
                'numero' => $request->get('cova'),
                'fila_id' => $filaObj->id,
                ]);

            dd($covaObj);

        }

    }

}
