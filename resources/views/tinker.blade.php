<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <!-- new --> <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BotMan Studio</title>
 @php
     header('Content-Type: text/html; charset=utf-8');
 @endphp
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
      

        body {
            font-family: "Source Sans Pro", sans-serif;
            margin: 0;
            padding: 0;
            background: radial-gradient(#57bfc7, #45a6b3);
        }

        .container {
            
            display: flex;
           height: 100vh;
          
            align-items: center;
            justify-content: center;
            flex-wrap:wrap;
        }

        .content {
          
            /*text-align: center;
            text-align: center;*/
            text-align: right;
            
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content" id="app" class="my-3 p-3 bg-white rounded shadow-sm">
       {{-- <botman-tinker api-endpoint="/botman"></botman-tinker>--}}
       <tinker ></tinker>
    </div>
</div>

<script src={{ asset("/js/app.js") }}></script>
<script src={{ asset("/js/bootstrap.js") }}></script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</body>
</html>