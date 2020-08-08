@extends('layout.layout')
@section('head')
    <link rel="stylesheet" href="/css/infoCRUD/edit.css">
@endsection
@section('content')
<div class="text-center">
    <div class="content">
  
         
       

    @if ($errors->any())
        <div class="alert alert-danger m-3">
            <strong >oops!</strong> thare is a problem in your inputs .<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row no-gutters  align-items-center">
        <form action="{{route('signup.professors')}}"  class="m-5 edit-form equal-height bg-light bordered rounded p-3 "   method="POST"  >
            @csrf
           
   
        <div class="col text-left">
 <h1> sign up as professor</h1>
 <div class="form-group " >
               
    <label for="fname"> <strong>first name</strong></label>
    <input type="text" class="form-control" id="fname" name="fname" placeholder="" required value="{{old('fname')}}">
   
</div>

<div class="form-group" >
  
       
    <label for="lname"><strong>last name</strong></label>
    <input type="text" class="form-control" id="lname" name="lname" value="{{old('lname')}}" placeholder="" required>
       
    
</div>

  <div class="form-group" >
   
    <label for="dep_id"><strong>select your departement</strong></label>
    <select class="form-control" id="dep_id" name="dep_id" required>
        <option value="" >select your departement</option>
                        @foreach ($depts as $dep)
                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                    @endforeach
       
     
    
    </select>
   
</div>

   
<div class="form-group">
   
    <label for="email"><strong>email</strong></label>
        <input type="email" class="form-control" id="email" name="email" placeholder="" required>
       
     
    </div>
    <div class="form-group">
   
        <label for="password"><strong>password:</strong></label>
            <input type="password" class="form-control" id="password" name="password" placeholder="" required>
           
         
        </div>
        <div class="form-group">
               
            <label for="password"><strong>password confirm:</strong></label>
                <input type="password" class="form-control" id="password" placeholder="" name="password_confirmation" required value="{{old('password_confirmation')}}">
               
             
            </div>

<div class="form-group ">
  <button type="submit" class="btn btn-primary bg-primary">submit</button>
</div>


    
</div> {{--  1 col div--}}
</form><br>
  
   <form action="{{route('signup.students')}}"  class="m-5 edit-form equal-height bg-light bordered rounded p-3 " enctype="multipart/form-data"  method="POST"  >
    @csrf
   

    <div class="col text-left">
    
        <h1>sign up as student</h1>
            <div class="form-group " >
               
                <label for="fname"> <strong>first name</strong></label>
                <input type="text" class="form-control" id="fname" placeholder="" required name="fname" value="{{old('fname')}}">
               
            </div>

            <div class="form-group" >
              
                   
                <label for="lname"><strong>last name</strong></label>
                <input type="text" class="form-control" id="lname" placeholder="" name="lname"  value="{{old('lname')}}" required>
                   
                
            </div>
            <div class="form-group ">
                <label for="level_id"><strong>select your level</strong></label>
                    <select class="form-control dynamic" name="level" id="level" required  value="{{old('level')}}" >
                      <option value="">select level</option>
                        @foreach ($levels as $level)
                    <option value="{{$level->id}}">{{$level->name}}</option>
                    @endforeach
                
                  
                     
                    
                    </select>
             
            </div>
              <div class="form-group" >
               
                <label for="dep_id"><strong>select your departement</strong></label>
                <select class="form-control dynamic" name="dep" id="dep" required >
                    <option value="">== select dept ==</option>
                </select>
               
            </div>
           
              
           
            <div class="form-group">
               
                <label for="email"><strong>email</strong></label>
                    <input type="email" class="form-control" id="email:" placeholder="" name="email" required  value="{{old('email')}}">
                   
                 
                </div>
                <div class="form-group">
               
                    <label for="password"><strong>password:</strong></label>
                        <input type="password" class="form-control" id="password" placeholder="" name="password" required  value="{{old('password')}}">
                       
                     
                    </div>
                     <div class="form-group">
               
                    <label for="password"><strong>password confirm:</strong></label>
                        <input type="password" class="form-control" id="password" placeholder="" name="password_confirmation" required value="{{old('password_confirmation')}}">
                       
                     
                    </div>
            <div class="form-group ">
              <button type="submit" class="btn btn-primary bg-primary">submit</button>
            </div>
      

   
     </div>{{-- 2 col div--}}
    </form>




   </div>{{-- raw div--}}
   </div>
   </div>
@endsection