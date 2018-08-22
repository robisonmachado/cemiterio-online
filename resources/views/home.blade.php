@extends('layouts.app')

@section('content')
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
            <form>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="falecido">Falecido</label>
                    <input class="form-control" id="falecido" placeholder="Nome do falecido">
                </div>
               
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="dataFalecimento">DATA DE FALECIMENTO</label>
                    <input type="date" class="form-control" id="dataFalecimento" name="dataFalecimento">
                </div>
                <div class="form-group col-md-3">
                    <label for="dataSepultamento">DATA DE SEPULTAMENTO</label>
                    <input type="date" class="form-control" id="dataSepultamento" name="dataSepultamento">
                </div>
                
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="quadra">QUADRA</label>
                    <input type="number" min="0" class="form-control" id="quadra">
                </div>
                <div class="form-group col-md-3">
                    <label for="quadra">FILA</label>
                    <input type="number" min="0" class="form-control" id="quadra">
                </div>
                <div class="form-group col-md-3">
                    <label for="quadra">COVA / TUMULO</label>
                    <input type="number" min="0" class="form-control" id="quadra">
                </div>
                <div class="form-group col-md-3">
                    <label for="quadra">SEPULTAMENTO</label>
                    <input type="number" min="0" class="form-control" id="quadra">
                </div>
            </div>

            <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile04">
                <label class="custom-file-label" for="inputGroupFile04">ANEXAR CERTIDÃO DE ÓBITO</label>
            </div>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">ANEXAR</button>
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
