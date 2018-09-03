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


        
  
@auth


<div class="container">
    <nav class="navbar navbar-light bg-light">
        <a class="btn btn-dark" href="/"> VOLTAR </a>   
        <div class="col-10 alert alert-dark text-center"> <strong>RESULTADOS DA PESQUISA</strong> </div>
    </nav>
    
    @if($sepultamentos)
    <table class="table table-hover table-dark">
        <thead class="">
            <tr class="text-center">
                <th scope="col">FALECIDO</th>
                <th scope="col">DATA DE FALECIMENTO</th>
                <th scope="col">QUADRA</th>
                <th scope="col">FILA</th>
                <th scope="col">COVA</th>
                <th scope="col">Nº SEPULTAMENTO</th>
                @if(Auth::user()->isDiretor())
                    <th scope="col">EDITAR</th>
                @endif
            </tr>                    
        </thead>
        <tbody>
        @foreach ($sepultamentos as $sepultamento)
            <tr>
                <td>{{ $sepultamento->falecido }}</td>
                <td class="text-center">{{ $sepultamento->data_falecimento }}</td>
                <td class="text-center">{{ $sepultamento->quadra_numero }}</td>
                <td class="text-center">{{ $sepultamento->fila_numero }}</td>
                <td class="text-center">{{ $sepultamento->cova_numero }}</td>
                <td class="text-center">{{ $sepultamento->numero_sepultamento }}</td>
                @if(Auth::user()->isDiretor())
                    <td class="d-flex justify-content-around">
                        <span class="fa fa-edit"></span>
                        <span class="fa fa-trash-alt"></span>
                    </td>
                @endif
            </tr>                    
        @endforeach

        </tbody>    
    </table>


    <div class="d-flex justify-content-between ">

        <form action="/sepultamento/pesquisar" method="POST">
            @csrf
            
            <input type="hidden" id="falecido" name="falecido" value="{{ old('falecido') }}">
            
            <input type="hidden" id="ano_falecimento" name="ano_falecimento" value="{{ old('ano_falecimento') }}">
                       
            <input type="hidden" id="mes_falecimento" name="mes_falecimento" value="{{ old('mes_falecimento') }}">
                                               
            <input type="hidden" id="dia_falecimento" name="dia_falecimento" value="{{ old('dia_falecimento') }}">
           
            <input type="hidden" id="quadra" name="quadra" value="{{ old('quadra') }}">
            
            <input type="hidden" id="fila" name="fila" value="{{ old('fila') }}">
            
            <input type="hidden" id="cova" name="cova" value="{{ old('cova') }}">
            
            <input type="hidden" id="numero_sepultamento" name="numero_sepultamento" value="{{ old('numero_sepultamento') }}">
            
            <input type="hidden" id="action" name="action" value="back">

            <input type="hidden" id="offset" name="offset" value="{{ $offset }}">

            <input type="hidden" id="limit" name="limit" value="{{ $limit }}">

            <input type="{{ ( ($offset-$limit) < 0 ) ? 'button' : 'submit' }}" class="btn btn-dark {{ ( ($offset-$limit) < 0 ) ? 'disabled' : null }}" value="<<">

        </form>
        
        <span class="btn btn-dark disabled">{{ $offset }} a {{ ( ($offset+$limit-1) <= $count ) ? ($offset+$limit-1) : ($count) }} de {{ $count }} encontrados </span>
        
        <form action="/sepultamento/pesquisar" method="POST">
            @csrf
            <input type="hidden" id="falecido" name="falecido" value="{{ old('falecido') }}">
            
            <input type="hidden" id="ano_falecimento" name="ano_falecimento" value="{{ old('ano_falecimento') }}">
                       
            <input type="hidden" id="mes_falecimento" name="mes_falecimento" value="{{ old('mes_falecimento') }}">
                                               
            <input type="hidden" id="dia_falecimento" name="dia_falecimento" value="{{ old('dia_falecimento') }}">
           
            <input type="hidden" id="quadra" name="quadra" value="{{ old('quadra') }}">
            
            <input type="hidden" id="fila" name="fila" value="{{ old('fila') }}">
            
            <input type="hidden" id="cova" name="cova" value="{{ old('cova') }}">
            
            <input type="hidden" id="numero_sepultamento" name="numero_sepultamento" value="{{ old('numero_sepultamento') }}">
            
            <input type="hidden" id="action" name="action" value="next">

            <input type="hidden" id="offset" name="offset" value="{{ $offset }}">

            <input type="hidden" id="limit" name="limit" value="{{ $limit }}">

            <input type="{{ ( ($offset+$limit-1) <= $count ) ? 'submit' : 'button' }}" class="btn btn-dark {{ ( ($offset+$limit-1) <= $count ) ? null : 'disabled' }}" value=">>">

        
        </form>
        
    
    </div>
    @else
    <div class="alert alert-danger text-center">
        <strong>Não há resultados para serem exibidos!</strong>
    </div>
       
    @endif
    
</div>


@endauth

@endsection
