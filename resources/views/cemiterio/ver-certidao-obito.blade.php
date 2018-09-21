<!doctype html>

<html lang="pt-br">
<head>
  <meta charset="utf-8">

  <title>CERTIDÃO DE ÓBITO DE {{ $sepultamento->falecido }}</title>
  <meta name="description" content="CERTIDÃO DE ÓBITO DE {{ $sepultamento->falecido }}">
  <meta name="author" content="Robison Pereira Machado">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->


    <style>
        body{
            width: 100%;
            height: 100%;
        }

        .container{
            width:21cm;
            height: 29.7cm;
            background-color: white;
            border: solid thin black;
        }

        img{
            width:100%;
            height: 100%;
        }

        .img-responsive {
            display: inline-block;
        }

        .col-center{
            margin:0 auto;
        }

        @media print {
            .container{
                border: none;
            }
        }

    </style>
  <!-- <link rel="stylesheet" href="css/styles.css?v=1.0"> -->

</head>

<!-- <body class="d-flex justify-content-center"> -->
<body class=""> 
    <div class="container col-center">
        
        <img class="" src="{{ $url_certidao_obito }}" alt="CERTIDÃO DE ÓBITO DE {{ $sepultamento->falecido }}">
    
    </div>
        
    
        
    
        
</body>
</html>