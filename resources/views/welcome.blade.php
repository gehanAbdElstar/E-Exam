
  
    @extends('layout.layout')
    @section('head')
       <link rel="stylesheet" href="/css/welcome.css">
    @endsection  
    
    
   @section('content')
        
<div class="container">
   <div class="title m-b-md">
    @if (session('status'))
    <p>{{session('status')}}</p>
@endif
   </div>
   
    <div class="jumbotron m-3">
        <h1 class="display-4">Hello, to E-exam website!</h1>
        <p class="lead">this site provide a way for teachers to exam students and 
            for them also to manage their exams .</p>
        <hr class="my-4">
        <p>.</p>
        <a class="btn btn-primary btn-lg w-25 bg-warning" href="{{route('login')}}" role="button">Log in</a>
      </div>
    
</div> 
   @endsection

