









@extends('layout.layout')

@section('head')
<link rel="stylesheet" href="/css/signin.css">
@endsection

@section('content')
  
<div class="alert alert-dismissible alert-success w-50 m-3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>welcome {{Session::get('user')->fName}}</strong> 
    
  </div>
  @if(Session::has('status'))
 <div class="text-center">
  <button type="button" class="btn btn-primary  inline " data-toggle="modal" data-target="#exampleModal">
    get your result
  </button>
  
</div>
@endif
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @if(stristr(Session::get('status'),'congr'))
            <div class="alert alert-success" role="alert">
             {{Session::get('status')}}<br>
             your degree is {{Session::get('degree')}}
            </div>
            @else
            <div class="alert alert-danger" role="alert">
              {{Session::get('status')}}
              <br>
             your degree is {{Session::get('degree')}}
            </div>
            @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>




<h1 class="text-center m-3 bg-light p-3"> exams results </h1>
  
  <div class="accordion m-3" id="accordionExample" >
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
                <th scope="col">degree</th>
                
              </tr>
            </thead>
            <tbody>
          @foreach ($exams as $exam)
              @if($subject->id == $exam->subj_id)
                  <tr>
                    <th scope="row">{{$exam->id}}</th>
                    <td>{{$exam->name}}</td>
                    <td>
                      @php
                          $id=$exam->id
                      @endphp
                      {{$exam->degree}}
                       
                     
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