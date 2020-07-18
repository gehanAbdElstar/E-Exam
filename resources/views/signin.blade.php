
@extends('layout.layout')
@section('head')
     <link rel="stylesheet"  href="/css/signin.css" type="text/css">
@endsection
@section('content')
<div class="text-center">
<form class="form-signin bg-light" >
    <img class="mb-4" src="/pics/siteLogo.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal"></h1>
    <label for="inputEmail" class="sr-only" dir="rtl" lang="ar">Email address</label>
    <input type="email" id="inputEmail" class="form-control" dir="rtl" lang="ar" placeholder="عنوان البريد الإلكتروني" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" dir="rtl" lang="ar" placeholder="كلمة السر" required>
    <div class="checkbox mb-3">
     
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">سجل الدخول</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form> 
  </div>
@endsection