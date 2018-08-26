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
            <form method="POST" action="sepultamento" enctype="multipart/form-data" class="form-registrar-sepultamento">
            <div class="alert alert-info text-center"> <strong>REGISTRAR SEPULTAMENTO</strong> </div>
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
            <form method="POST" action="sepultamento/pesquisar" class="form-pesquisar-sepultamento">
                <div class="alert alert-info text-center"> <strong>PESQUISAR SEPULTAMENTOS</strong> </div>
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="falecido">FALECIDO</label>
                        <input class="form-control" id="falecido" name="falecido" value="{{ old('falecido') }}" placeholder="Nome ou parte do nome do falecido">
                    </div>
                
                </div>
                                
                <div class="form-group row">                    
                        <div class="col-4">
                            <label for="ano_falecimento">ANO DO ÓBITO</label>
                            <input type="number" min="0" class="form-control" id="ano_falecimento" name="ano_falecimento" value="{{ old('ano_falecimento') }}">
                        </div>
                    
                    
                        <div class="col-4">
                            <label for="dia_falecimento">MÊS DO ÓBITO</label>
                            <input type="number" min="0" class="form-control" id="mes_falecimento" name="mes_falecimento" value="{{ old('mes_falecimento') }}">
                        </div>
                    
                        <div class="col-4">                 
                            <label for="dia_falecimento">DIA DO ÓBITO</label>                        
                            <input type="number" min="0" class="form-control" id="dia_falecimento" name="dia_falecimento" value="{{ old('dia_falecimento') }}">
                        </div>
                    
                </div>
                    
                    
                

                <div class="form-row">
                    <div class="form-group col-3">
                        <label for="quadra">QUADRA</label>
                        <input type="number" min="0" class="form-control" id="quadra" name="quadra" value="{{ old('quadra') }}">
                    </div>
                    <div class="form-group col-3">
                        <label for="fila">FILA</label>
                        <input type="number" min="0" class="form-control" id="fila" name="fila" value="{{ old('fila') }}">
                    </div>
                    <div class="form-group col-3">
                        <label for="cova">COVA / JAZIGO</label>
                        <input type="number" min="0" class="form-control" id="cova" name="cova" value="{{ old('cova') }}">
                    </div>
                    <div class="form-group col-3">
                        <label for="numero_sepultamento">Nº SEPULTAMENTO</label>
                        <input type="number" min="0" class="form-control" id="numero_sepultamento" name="numero_sepultamento" value="{{ old('numero_sepultamento') }}">
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">PESQUISAR</button>
                
            </form>
        </div>
        <!-- FIM FORMULÁRIO PESQUISAR SEPULTAMENTO -->


    </div>
    


</div>


@endsection
