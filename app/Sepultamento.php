<?php

namespace App;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class Sepultamento extends Model
{
    protected $fillable = [
            'falecido', 'data_falecimento', 'data_sepultamento', 
            'numero_sepultamento', 'atestado_obito'
        ];

    public function cova(){
        return $this->belongsTo(Cova::class);
    }

    public function fila(){
        return $this->cova->fila();
    }

    public function quadra(){
        return $this->fila->quadra();
    }

    public static function addSepultamento(Request $request): ?Sepultamento {
        //dd($request->all());
        $quadra = Quadra::where('numero', $request->get('quadra'))->first();
                
        if(empty($quadra)){
            $sepultamentoObj = Quadra::create(['numero' => $request->get('quadra')])
                            ->filas()->create(['numero' => $request->get('fila')])
                            ->covas()->create(['numero' => $request->get('cova')])
                            ->sepultamentos()->create($request->only([
                                                            'falecido', 
                                                            'data_falecimento',
                                                            'data_sepultamento',
                                                            'numero_sepultamento',
                                                        ]));
            
            $sepultamentoObj->addCertidaoObito($request);
            return $sepultamentoObj;
        }

        $fila = $quadra->filas()->where('numero', $request->get('fila'))->first();
        
        if(empty($fila)){
            $sepultamentoObj = $quadra->filas()->create(['numero' => $request->get('fila')])
                                ->covas()->create(['numero' => $request->get('cova')])
                                ->sepultamentos()->create($request->only([
                                                                'falecido', 
                                                                'data_falecimento',
                                                                'data_sepultamento',
                                                                'numero_sepultamento',
                                                            ]));
            $sepultamentoObj->addCertidaoObito($request);
            return $sepultamentoObj;
    
        }

        $cova = $fila->covas()->where('numero', $request->get('cova'))->first();

        if(empty($cova)){
            $sepultamentoObj = $fila->covas()->create(['numero' => $request->get('cova')])
                                ->sepultamentos()->create($request->only([
                                                                'falecido', 
                                                                'data_falecimento',
                                                                'data_sepultamento',
                                                                'numero_sepultamento',
                                                            ]));

                $sepultamentoObj->addCertidaoObito($request);
                return $sepultamentoObj;
        }else{
            $sepultamentoObj = $cova->sepultamentos()->create($request->only([
                                                                'falecido', 
                                                                'data_falecimento',
                                                                'data_sepultamento',
                                                                'numero_sepultamento',
                                                            ]));
                            
            $sepultamentoObj->addCertidaoObito($request);
            return $sepultamentoObj;
        }

    }


    public function addCertidaoObito(Request $request): ?self{
        if($request->hasFile('atestado_obito')){
            $arquivoObito = $request->file('atestado_obito');
            $nomeArquivo = "CERTIDAO DE OBITO ID-".$this->id
                        ." Q".$this->quadra->numero
                        ."F".$this->fila->numero
                        ."C".$this->cova->numero
                        ."S".$this->numero_sepultamento
                        .".".$arquivoObito->clientExtension();
            
            $pathArquivoSalvo = $arquivoObito->storeAs('obitos', $nomeArquivo);
            
            if($pathArquivoSalvo){
                $this->atestado_obito = $pathArquivoSalvo;
                if($this->save()){
                    return $this;
                }else{
                    return null;
                }
            }

            return null;
            
        }
        return null;
    }



}
