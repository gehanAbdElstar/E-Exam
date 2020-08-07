@extends('layout.layout')

@section('head')
<link rel="stylesheet" href="/css/signin.css">
@endsection

@section('content')
  
<div class="alert alert-dismissible alert-success w-50 m-3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>welcome {{Session::get('user')->fName}}</strong> 
    
  </div>

  
  <div class="accordion" id="accordionExample">
    @foreach ($subjects as $subject)
     
    <div class="card">
      <div class="card-header" id="head{{$subject->id}}">
        <h2 class="mb-0">

          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$subject->id}}" aria-expanded="true" aria-controls="collapse{{$subject->id}}">
          {{$subject->name}}
          </button>
        </h2>
      </div>
  
      <div id="collapse{{$subject->id}}" class="collapse" aria-labelledby="head{{$subject->id}}" data-parent="#accordionExample">
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">event</th>
                
              </tr>
            </thead>
            <tbody>
          @foreach ($exams as $exam)
              @if($subject->id = $exam->subj_id)
                  <tr>
                    <th scope="row">{{$exam->id}}</th>
                    <td>{{$exam->name}}</td>
                    <td>
                      @php
                          $id=$exam->id
                      @endphp
                      <a href="{{route('students.exam',$id)}}" class="btn bg-primary btn-primary w-25" >
                       
                     start exam
                      </a>
                    </td>
                   
                  </tr>
            
              @endif
          @endforeach
        </tbody>
      </table>


        </div>
      </div>
    </div>{{--card--}}

    @endforeach
    
  </div> {{--accord--}}

    


@endsection