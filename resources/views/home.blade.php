@extends('layouts.app')

@section('content')

<!-- STATUS -->
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<!-- FIM STATUS -->

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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    AÇÕES DE SEPULTAMENTO
                </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">REGISTRAR SEPULTAMENTO</a>
                        <a class="dropdown-item" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">PESQUISAR SEPULTAMENTOS</a>
                </div>
            </div>
        </div>
    </div>

    
    <div id="accordion">
        <!-- FORMULÁRIO REGISTRAR SEPULTAMENTO -->
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <form method="POST" action="sepultamento" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="falecido">FALECIDO</label>
                    <input class="form-control" id="falecido" name="falecido" value="{{ old('falecido') }}" placeholder="Nome do falecido">
                </div>
               
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="data_falecimento">DATA DE FALECIMENTO</label>
                    <input type="date" class="form-control" id="data_falecimento" name="data_falecimento" value="{{ old('data_falecimento') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="data_sepultamento">DATA DE SEPULTAMENTO</label>
                    <input type="date" class="form-control" id="data_sepultamento" name="data_sepultamento" value="{{ old('data_sepultamento') }}">
                </div>
                
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="quadra">QUADRA</label>
                    <input type="number" min="0" class="form-control" id="quadra" name="quadra" value="{{ old('quadra') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="fila">FILA</label>
                    <input type="number" min="0" class="form-control" id="fila" name="fila" value="{{ old('fila') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="cova">COVA / JAZIGO</label>
                    <input type="number" min="0" class="form-control" id="cova" name="cova" value="{{ old('cova') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="numero_sepultamento">Nº SEPULTAMENTO</label>
                    <input type="number" min="0" class="form-control" id="numero_sepultamento" name="numero_sepultamento" value="{{ old('numero_sepultamento') }}">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="atestado_obito">ATESTADO DE ÓBITO</label>
                    <input type="file" class="" id="atestado_obito" name="atestado_obito">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">REGISTRAR</button>
            
        </form>
        </div>
        <!-- FIM FORMULÁRIO REGISTRAR SEPULTAMENTO -->


        <!-- FORMULÁRIO PESQUISAR SEPULTAMENTO -->
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
        <!-- FIM FORMULÁRIO PESQUISAR SEPULTAMENTO -->


    </div>
    


</div>


@endsection
