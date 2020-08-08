@extends('layout.layout')

@section('head')
<link rel="stylesheet" href="/css/infoCRUD/edit.css">
@endsection

@section('content')
  
<div class="alert alert-dismissible alert-success w-50 m-3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>welcome {{Session::get('user')->fName}}</strong> 
    
  </div>

@php
  $id=$exam->id;  
@endphp

  <form action="{{route('students.exam',$id)}}"  class="m-5 edit-form  bg-light bordered rounded p-3 "   method="POST"  >
    @csrf
   

<div class="col text-left">
<h1 class="text-center"> 
    {{$exam->name}}
</h1>
@foreach ($questions as $quest)

<fieldset class="form-group">
    <legend>{{$quest->question}}</legend>
    @php
       $i=0; 
    @endphp
    @foreach ($choices as $choice)
    @if($quest->id == $choice->que_id)

    <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="choice{{$quest->id}}" id="{{$choice->id}}" value="{{$choice->choice}}" >
         {{$choice->choice}}
        </label>
      </div>
      
      @endif
      @endforeach

     
    </fieldset>








    @endforeach
    

<div class="form-group ">
<button type="submit" class="btn btn-primary bg-primary">submit</button>
</div>



</div>{{-- 1 col div--}}
</form><br>















  
  
   
    

            
           

           
               




            
        
        

    
  

    


@endsection