<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <title>{{ config('app.name', 'CEMITÉRIO MUNICIPAL DE MARATAÍZES') }}</title>

        <!-- Fonts -->
        
        
        <!-- Styles -->
        <link href="css/app.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
     
        <!-- Javascript -->
        <script src="js/app.js"></script>
        <script src="js/login.js"></script>

    </head>
    <body>
        
  
@auth

@else

<div class="container">
    <div class="row justify-content-center">
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf
            <p class="form-signin-heading">CEMITÉRIO MUNICIPAL DE MARATAÍZES</p>
            <label for="cpf" >CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control text-center" placeholder="Digite seu CPF" required autofocus>
           

            <label for="password">Senha</label>
            <input type="password" id="password" name="password" class="form-control text-center" placeholder="Senha de acesso" required>
            
            @if ($errors->all())
            <div class="alert alert-danger" role="alert">
                <strong>CPF ou senha inválidos!</strong>
            </div>
            @endif

            <div class="row justify-content-center">
                <button class="btn btn-md btn-primary" type="submit">ENTRAR</button>
            </div>
            
        </form>
    </div>

</div> 
<!-- /container -->

@endauth


    </body>
</html>
