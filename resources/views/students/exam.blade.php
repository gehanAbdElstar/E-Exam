@extends('layout.layout')

@section('head')
<link rel="stylesheet" href="/css/infoCRUD/edit.css">
@endsection

@section('content')
  
<div class="alert alert-dismissible alert-success w-50 m-3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>welcome {{Session::get('user')->fName}}</strong> 
    
  </div>



  <form action="{{route('signup.professors')}}"  class="m-5 edit-form  bg-light bordered rounded p-3 "   method="POST"  >
    @csrf
   

<div class="col text-left">
<h1> sign up as professor</h1>
@foreach ($questions as $quest)

<fieldset class="form-group">
    <legend>{{$quest->question}}</legend>
    @foreach ($choices as $choice)
    @if($quest->id == $choice->que_id)

    <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="{{$quest->id}}" id="{{$choice->id}}" value="option1" >
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