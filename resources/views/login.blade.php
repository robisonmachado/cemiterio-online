<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Laravel</title>

        <!-- Fonts -->
        
        
        <!-- Styles -->
        <link href="css/app.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
     
        <!-- Javascript -->
        <script src="js/app.js"></script>
        <script src="js/login.js"></script>

    </head>
    <body>
        
  

<div class="container">
    <div class="row justify-content-center">

        <form class="form-signin">
        <h2 class="form-signin-heading">CEMITÉRIO ONLINE</h2>
        <label for="inputCPF" >CPF</label>
        <input type="text" id="inputCPF" class="form-control" placeholder="Digite seu CPF" required autofocus>
        
        <label for="inputPassword">Senha</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha de acesso" required>

        <div class="row justify-content-center">
            <button class="btn btn-md btn-primary" type="submit">ENTRAR</button>
        </div>
            
        </form>
    </div>

</div> 
<!-- /container -->


    </body>
</html>
