@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            AÇÕES
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" data-toggle="collapse" href="#formAdicionarSepultamento" role="button" aria-expanded="false" aria-controls="formAdicionarSepultamento">ADICIONAR SEPULTAMENTO</a>
                            <a class="dropdown-item" data-toggle="collapse" href="#formPesquisarSepultamento" role="button" aria-expanded="false" aria-controls="formPesquisarSepultamento">PESQUISAR</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!


                    <div class="collapse" id="formAdicionarSepultamento">
                        <div class="card card-body">
                            FORMULÁRIO ADICIONAR SEPULTAMENTO
                        </div>
                    </div>

                    <div class="collapse" id="formPesquisarSepultamento">
                        <div class="card card-body">
                            FORMULÁRIO PESQUISAR
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
