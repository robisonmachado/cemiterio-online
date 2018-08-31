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
    <h1>RESULTADOS DA PESQUISA</h1>
    @if($sepultamentos)
    <table class="table table-hover table-dark">
        <thead class="">
            <tr>
                <th scope="col">FALECIDO</th>
                <th scope="col">DATA DE FALECIMENTO</th>
                <th scope="col">QUADRA</th>
                <th scope="col">FILA</th>
                <th scope="col">COVA</th>
                <th scope="col">Nº SEPULTAMENTO</th>
            </tr>                    
        </thead>
        <tbody>
        @foreach ($sepultamentos as $sepultamento)
            <tr>
                <td>{{ $sepultamento->falecido }}</td>
                <td>{{ $sepultamento->data_falecimento }}</td>
                <td>{{ $sepultamento->quadra_numero }}</td>
                <td>{{ $sepultamento->fila_numero }}</td>
                <td>{{ $sepultamento->cova_numero }}</td>
                <td>{{ $sepultamento->numero_sepultamento }}</td>
            </tr>                    
        @endforeach

        </tbody>
    
    </table>
    @else   
        <p>Não há resultados para serem exibidos!</p>
    @endif
    
</div>


@endauth

@endsection
