@extends('layout.layout')

@section('head')
    
@endsection

@section('content')
    
<div class="alert alert-dismissible alert-success w-50 m-3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>welcome {{Session::get('user')->fname}}</strong> 
    
  </div>
  
  <p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      show subject
    </a>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Button with data-target
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
     
    </div>
  </div>




@endsection