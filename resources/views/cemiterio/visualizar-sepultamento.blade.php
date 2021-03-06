@extends('layouts.app')

@section('content')

<!-- STATUS -->
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<!-- FIM STATUS -->

<!-- EXCEPTION -->
@if (session('exception'))
    <div class="alert alert-danger">
        {{ session('exception') }}
    </div>
@endif
<!-- FIM EXCEPTION -->

<!-- ERRORS -->
@if ($errors->any())
    <div class="alert alert-danger">
        <p>ERROS ENCONTRADOS</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- FIM ERRORS -->

<div class="container">
    
@if(!empty($sepultamento))
    <!-- FORMULÁRIO VISUALIZAR SEPULTAMENTO -->        
        <form enctype="multipart/form-data" class="form-registrar-sepultamento">
            <nav class="navbar navbar-light bg-light">
            <i class="btn btn-dark fas fa-chevron-left" onclick="window.history.go(-1); return false;"></i> 
                <div class="col-10 alert alert-info text-center"> <strong>VISUALIZAR SEPULTAMENTO</strong> </div>
            </nav>
            
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="falecido">FALECIDO</label>
                    <input class="form-control font-weight-bold" id="falecido" name="falecido" value="{{ $sepultamento->falecido }}" placeholder="Nome do falecido" readonly>
                </div>
                
            </div>
                
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="data_falecimento">DATA DE FALECIMENTO</label>
                    <input type="date" class="form-control" id="data_falecimento" name="data_falecimento" value="{{ $sepultamento->data_falecimento }}" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="data_sepultamento">DATA DE SEPULTAMENTO</label>
                    <input type="date" class="form-control" id="data_sepultamento" name="data_sepultamento" value="{{ $sepultamento->data_sepultamento }}" readonly>
                </div>
                    
            </div>
        
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="quadra">QUADRA</label>
                    <input type="number" min="0" class="form-control" id="quadra" name="quadra" value="{{ $sepultamento->quadra->numero }}" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="fila">FILA</label>
                    <input type="number" min="0" class="form-control" id="fila" name="fila" value="{{ $sepultamento->fila->numero }}" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="cova">COVA / JAZIGO</label>
                    <input type="number" min="0" class="form-control" id="cova" name="cova" value="{{ $sepultamento->cova->numero }}" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="numero_sepultamento">Nº SEPULTAMENTO</label>
                    <input type="number" min="0" class="form-control" id="numero_sepultamento" name="numero_sepultamento" value="{{ $sepultamento->numero_sepultamento }}" readonly>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-12">
                    <label for="certidao_obito" class="col-12">CERTIDÃO DE ÓBITO</label>
                    @if($sepultamento->hasCertidaoObito())
                    <input class="font-weight-bold col-10" id="certidao_obito" name="certidao_obito" value="{{ $sepultamento->certidao_obito }}" readonly>
                
                    <i class="text-center fas fa-check text-success m-1"></i>
                    
                    <a href="/sepultamentos/{{ $sepultamento->id }}/ver_certidao_obito" class="text-dark" target="_blank">
                        <i class="text-center far fa-eye cursor-pointer m-2"></i>
                    </a>

                    <a href="/sepultamentos/{{ $sepultamento->id }}/download_certidao_obito" class="text-dark">
                        <i class="text-center fas fa-file-download cursor-pointer m-1"></i>
                    </a>
                                 
                    @else
                    <input class="font-weight-bold col-10" id="certidao_obito" name="certidao_obito" value="CERTIDÃO DE ÓBITO NÃO CADASTRADA" readonly>
                        <i class="fas fa-times col-1 text-danger"></i>
                    @endif
                </div>
            </div>

            
        </form>
      
    <!-- FIM FORMULÁRIO REGISTRAR SEPULTAMENTO -->
@else
    <div class="alert alert-danger text-center"> <strong>NENHUM SEPULTAMENTO PARA VISUALIZAR</strong> </div>

@endif

        


    </div>
    


</div>


@endsection
