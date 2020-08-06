
@extends('layout.layout')
@section('head')
     <link rel="stylesheet"  href="/css/signin.css" type="text/css">
@endsection
@section('content')
@if ($errors->any())
        <div class="alert alert-danger m-3 w-50">
            <strong >oops!</strong> thare is a problem in your inputs .<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li >{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show w-50 m-3" role="alert">
   
      <strong>oops!</strong> {{session('error')}}.
      
        <span aria-hidden="true">&times;</span>
     
    </div>
    @endif
    @if(session('status'))
    <div class="alert alert-dismissible alert-success w-25">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Well done!</strong>  {{{session('status')}}}.
    </div>
    @endif
<div class="text-center">

  <form class="form-signin bg-light" method="POST" action="{{route('login.admin')}}" >
    @csrf
      <img class="mb-4" src="/pics/siteLogo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">log in as admin</h1>
      <label for="inputEmail" class="sr-only" >Email address</label>
      <input type="email" id="inputEmail" class="form-control"  placeholder="email" name="email" value="{{old('email')}}" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" value="{{old('password')}}" placeholder="password" required>
      <div class="checkbox mb-3">
       
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">log in</button>
      <p>or <a href="{{route('signup')}}">sign up</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form> 

<form class="form-signin bg-light" method="POST" action="{{route('login.professors')}}" >
  @csrf
    <img class="mb-4" src="/pics/siteLogo.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">log in as professor</h1>
    <label for="inputEmail" class="sr-only" >Email address</label>
    <input type="email" id="inputEmail" class="form-control"  placeholder="email" name="email" value="{{old('email')}}" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" value="{{old('password')}}" placeholder="password" required>
    <div class="checkbox mb-3">
     
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">log in</button>
    <p>or <a href="{{route('signup')}}">sign up</a></p>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form> 


 


 
  
  
    <form class="form-signin bg-light"  method="POST" action="{{route('login.student')}}">
      @csrf
      <img class="mb-4" src="/pics/siteLogo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">log in as student</h1>
      <label for="inputEmail" class="sr-only" >Email address</label>
      <input type="email" id="inputEmail" class="form-control"  placeholder="email" required value="{{old('email')}}" name="email" autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" value="{{old('password')}}" name="password" placeholder="password" required>
      <div class="checkbox mb-3">
       
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">log in</button>
      <p>or<a href="{{route('signup')}}"> sign up</a></p>
    
    
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form> 
  









  </div>
@endsection