<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <!-- new --> <meta http-equiv="Content-Type" content="text/html;
        charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
     
        
     @php
         header('Content-Type: text/html;charset=utf-8'); 
              
     @endphp
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
       <link rel="stylesheet"  href="/css/app.css" type="text/css">
    
@yield('head')
  
</head>
<body>
    @include('layout.header')
    
@yield('content')
    

    @include('layout.footer')
<script src="/js/app.js"></script>
<script src="/js/bootstrap.js"></script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

</body>
</html>