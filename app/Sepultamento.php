<?php

namespace App;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Sepultamento extends Model
{
    protected $fillable = [
            'falecido', 'data_falecimento', 'data_sepultamento', 
            'numero_sepultamento', 'certidao_obito'
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
        
        $quadra = Quadra::firstOrCreate(['numero' => $request->get('quadra')]);
        
        $fila = $quadra->filas()->firstOrCreate(['numero' => $request->get('fila')]);
        
        $cova = $fila->covas()->firstOrCreate(['numero' => $request->get('cova')]);
        
        //dd($cova);
        
        $sepultamento = $cova->sepultamentos()->firstOrCreate($request->only([
                                                                'falecido', 
                                                                'data_falecimento',
                                                                'data_sepultamento',
                                                                'numero_sepultamento',
                                                            ]));
        
        //dd($sepultamento);
        $sepultamento->addCertidaoObito($request);
        return $sepultamento;
       

    }


    public static function updateSepultamento(Request $request, Sepultamento $sepultamento): ?Sepultamento {
        //dd($request);
        $falecido = $request->input('falecido');
        $data_falecimento = $request->input('data_falecimento');
        $data_sepultamento = $request->input('data_sepultamento');
        $quadra = $request->input('quadra');
        $fila = $request->input('fila');
        $cova = $request->input('cova');
        $numero_sepultamento = $request->input('numero_sepultamento');

        
        if(empty($quadra)){
            $quadra = $sepultamento->quadra->numero;
        }
        
        
        $quadraObj = Quadra::firstOrCreate(['numero' => $quadra]);
        
        //dd($quadraObj);
            
        
        //dd($fila);
        if(empty($fila)){
            //dd($fila);
            $fila = $sepultamento->fila->numero;
        }
        
        $filaObj = $quadraObj->filas()->where('filas.numero', $fila)->firstOrCreate(['numero' => $fila]);
                
        //dd($filaObj);
           
        if(empty($cova)){
            $cova = $sepultamento->cova->numero;
        }

        $covaObj = $filaObj->covas()->where('covas.numero', $cova)->firstOrCreate(['numero' => $cova]);

        //dd($covaObj);

        $sepultamento->update($request->except('certidao_obito'));
        $sepultamento->cova()->associate($covaObj);
        $sepultamento->save();
        $sepultamento->addCertidaoObito($request);

        return $sepultamento;
    }


    public function addCertidaoObito(Request $request): ?self{
        //dd($request);
        if($request->hasFile('certidao_obito')){
            if ($request->file('certidao_obito')->isValid()) {
                
                $arquivoObito = $request->file('certidao_obito');
                //dd($arquivoObito);
                $nomeArquivo = "CERTIDAO_DE_OBITO_ID-".$this->id
                            ."_Q".$this->quadra->numero
                            ."F".$this->fila->numero
                            ."C".$this->cova->numero
                            ."S".$this->numero_sepultamento
                            .".".$arquivoObito->clientExtension();
                
                $pathArquivoSalvo = $arquivoObito->storeAs('public/obitos', $nomeArquivo);
                
                if($pathArquivoSalvo){
                    $this->certidao_obito = $pathArquivoSalvo;
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
                            ->orderby('sepultamentos.falecido');
                            
                           
        }else{
            return null;
        } 
        

    }


    public function hasCertidaoObito():bool {
        //dd($this);
        if(!empty($this->certidao_obito)){
            if(Storage::exists($this->certidao_obito)){
                return true;
            }
            return false;
        }

        return false;
    }


    public static function deletarCertidaoObito(int $sepultamentoId): bool{
        $sepultamento = Sepultamento::find($sepultamentoId);

        if(!empty($sepultamento)){
            if($sepultamento->hasCertidaoObito()){
                if(Storage::exists($sepultamento->certidao_obito)){
                    echo 'existe arquivo: deletando certidão de óbito';
                    $fileIsDeleted = Storage::delete($sepultamento->certidao_obito);
                    $sepultamento->certidao_obito = null;
                    $sepultamento->save();
                    if($fileIsDeleted == true){
                        return true;
                    }else{
                        return false;
                    }
    
                }else{
                    return false;
                }
                    
                //return Storage::download($sepultamento->certidao_obito);
                    
            }else{
                return false;
            }
                
        }else{
            return false;
        }
        return false;
    }
    
    



}
