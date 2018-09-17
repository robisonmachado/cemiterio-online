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
        <form enctype="multipart/form-data" class="form-registrar-sepultamento" disabled>
            <div class="alert alert-info text-center"> <strong>VISUALIZAR SEPULTAMENTO</strong> </div>
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="falecido">FALECIDO</label>
                    <input class="form-control" id="falecido" name="falecido" value="{{ $sepultamento->falecido }}" placeholder="Nome do falecido" readonly>
                </div>
                
            </div>
                
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="data_falecimento">DATA DE FALECIMENTO</label>
                    <input type="date" class="form-control" id="data_falecimento" name="data_falecimento" value="{{ $sepultamento->data_falecimento }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="data_sepultamento">DATA DE SEPULTAMENTO</label>
                    <input type="date" class="form-control" id="data_sepultamento" name="data_sepultamento" value="{{ $sepultamento->data_sepultamento }}">
                </div>
                    
            </div>
        
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="quadra">QUADRA</label>
                    <input type="number" min="0" class="form-control" id="quadra" name="quadra" value="{{ $sepultamento->quadra->numero }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="fila">FILA</label>
                    <input type="number" min="0" class="form-control" id="fila" name="fila" value="{{ $sepultamento->fila->numero }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="cova">COVA / JAZIGO</label>
                    <input type="number" min="0" class="form-control" id="cova" name="cova" value="{{ $sepultamento->cova->numero }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="numero_sepultamento">Nº SEPULTAMENTO</label>
                    <input type="number" min="0" class="form-control" id="numero_sepultamento" name="numero_sepultamento" value="{{ $sepultamento->numero_sepultamento }}">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="certidao_obito">CERIDÃO DE ÓBITO</label>
                    <input type="file" class="" id="certidao_obito" name="certidao_obito">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">REGISTRAR</button>
            
        </form>
      
    <!-- FIM FORMULÁRIO REGISTRAR SEPULTAMENTO -->
@else
    <div class="alert alert-danger text-center"> <strong>NENHUM SEPULTAMENTO PARA VISUALIZAR</strong> </div>

@endif

        


    </div>
    


</div>


@endsection
