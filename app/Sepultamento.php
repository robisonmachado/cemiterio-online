<?php

namespace App;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function pesquisar(Request $request){
        $falecido = $request->input('falecido');
        $ano_falecimento = $request->input('ano_falecimento');
        $mes_falecimento = $request->input('mes_falecimento');
        $dia_falecimento = $request->input('dia_falecimento');
        $quadra = $request->input('quadra');
        $fila = $request->input('fila');
        $cova = $request->input('cova');
        $numero_sepultamento = $request->input('numero_sepultamento');

        $hasDate = ( !empty($dia_falecimento) && !empty($mes_falecimento) && !empty($ano_falecimento) );
        $hasValidDate = false;
        $dateString = null;
        if($hasDate){
            $hasValidDate = checkdate($mes_falecimento, $dia_falecimento, $ano_falecimento);
            if($hasValidDate){
                $dateString = "{$ano_falecimento}-{$mes_falecimento}-{$dia_falecimento}";
            }
        }

        //dd($request->all());

        $results = Quadra::sepultamentosByQuadra($quadra);

        if(!empty($fila)){
            $results->where('filas.numero', $fila);
        }

        if(!empty($cova)){
            $results->where('covas.numero', $cova); 
        }

        if(!empty($numero_sepultamento)){
            $results->where('sepultamentos.numero_sepultamento', $numero_sepultamento);
        }

        //dd($results->get());

        if(!empty($falecido)){
            $results->where('sepultamentos.falecido', 'like', "%{$request->falecido}%");
        }

        //dd($results->get());

        
        if(!empty($ano_falecimento)){
            $results->whereYear('sepultamentos.data_falecimento', $ano_falecimento);
        }

        if(!empty($mes_falecimento)){
            $results->whereMonth('sepultamentos.data_falecimento', $mes_falecimento);   
        }


        if(!empty($dia_falecimento)){
            $results->whereDay('sepultamentos.data_falecimento', $dia_falecimento);  
        }

        if(!empty($numero_sepultamento)){
            $results->where('sepultamentos.numero_sepultamento', $numero_sepultamento); 
        }

        //dd($results->get());

        if(!empty($results) and ($results->count() > 0)){
            return $results->orderby('sepultamentos.data_falecimento')
                            ->orderby('sepultamentos.falecido')->get();
                           
        }else{
            return null;
        } 
        

    }



}
