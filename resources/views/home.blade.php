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
       
            <div class="dropdown p-1">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuFalecimentos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    SEPULTAMENTO
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuFalecimentos">
                    <a class="dropdown-item" data-toggle="collapse" data-target="#formRegistrarSepultamento" aria-expanded="false" aria-controls="formRegistrarSepultamento">REGISTRAR SEPULTAMENTO</a>
                    <a class="dropdown-item" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">PESQUISAR SEPULTAMENTOS</a>
                </div>
                
            </div>


            <div class="dropdown p-1">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuJazigos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    JAZIGOS
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuJazigos">
                    <a class="dropdown-item" data-toggle="collapse" data-target="#formRegistrarJazigo" aria-expanded="false" aria-controls="formRegistrarJazigo">REGISTRAR JAZIGO</a>
                    <a class="dropdown-item" data-toggle="collapse" data-target="#formPesquisarJazigo" aria-expanded="false" aria-controls="formPesquisarJazigo">PESQUISAR JAZIGOS</a>
                </div>
                
            </div>


            
        
    </div>

    
    <div id="accordion">
        <!-- FORMULÁRIO REGISTRAR SEPULTAMENTO -->
        <div id="formRegistrarSepultamento" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <form method="POST" action="sepultamentos" enctype="multipart/form-data" class="form-registrar-sepultamento">
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
                    <label for="certidao_obito">CERIDÃO DE ÓBITO</label>
                    <input type="file" class="" id="certidao_obito" name="certidao_obito">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">REGISTRAR</button>
            
        </form>
        </div>
        <!-- FIM FORMULÁRIO REGISTRAR SEPULTAMENTO -->


        <!-- FORMULÁRIO PESQUISAR SEPULTAMENTO -->
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <form method="POST" action="sepultamentos/pesquisar" class="form-pesquisar-sepultamento">
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


        <!-- FORMULÁRIO REGISTRAR JAZIGO -->
        <div id="formRegistrarJazigo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            
            <form method="POST" action="sepultamentos" enctype="multipart/form-data" class="form-registrar-sepultamento">
            <div class="alert alert-info text-center"> <strong>REGISTRAR JAZIGO</strong> </div>
            <p class="text-center">EM BREVE FORMULÁRIO DE REGISTRO DE JAZIGOS</p>
            
            @csrf
            
        </form> 
        </div>
        <!-- FIM FORMULÁRIO REGISTRAR JAZIGO -->


        <!-- FORMULÁRIO PESQUISAR JAZIGO -->
        <div id="formPesquisarJazigo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <form method="POST" action="sepultamentos/pesquisar" class="form-pesquisar-sepultamento">
                <div class="alert alert-info text-center"> <strong>PESQUISAR JAZIGOS</strong> </div>
                <p class="text-center">EM BREVE FORMULÁRIO DE PESQUISA DE JAZIGOS</p>
                
                @csrf
                        
                
            </form>
        </div>
        <!-- FIM FORMULÁRIO PESQUISAR JAZIGO -->


    </div>
    


</div>


@endsection
