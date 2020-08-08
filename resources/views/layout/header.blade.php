

  <nav class="navbar navbar-light bg-dark" >
   
   
     
      <a class="navbar-brand" >
        <img src="/pics/exam.png" width="100" height="100" class="d-inline-block align-top logo"  >
     <h3 class="logo-text text-light">  
   
          E-Exam
     </h3>
      </a>
   @if(Session::has('user'))
   @if(Session::get('type')=='student')
   <nav class="nav nav-tabs nav-stacked align-bottom">
   <a class="nav-link" href="{{route('student.home')}}">home</a>
   <a class="nav-link" href="{{route('students.results')}}">results</a>
 </nav>

   @endif
   @endif
{{--<nav class="nav nav-tabs nav-stacked align-bottom">
        <a class="nav-link active" href="#">Active link</a>
        <a class="nav-link" href="#">Link</a>
        <a class="nav-link disabled" href="#">Disabled link</a>
      </nav>--}}
     
     {{-- <ul class="nav nav-bills nav-stacked " >
        <li class="nav-item active"  >
          <a class="nav-link" href="{{route('home')}}"><h5>الرئيسية</h5> <span class="sr-only">(current)</span></a>
        </li>
         <li class="nav-item"  >
          <a class="nav-link" href="{{route('chat')}}" ><h5> إجراء محادثة</h5></a>
        </li>
        <li class="nav-item"  >
          <a class="nav-link" href="{{route('about')}}" ><h5>عن الموقع</h5></a>
        </li>
        <li class="nav-item"  >
          <a class="nav-link" href="{{route('privacy')}}" ><h5>وثيقة الخصوصية</h5></a>
        </li>
      </ul>--}}

    <ul class="navbar navbar-expand-lg">
     
     @if(Session::has('user'))

     <li class="nav-item">
        
      {{--<a href="{{route('logout')}}" class="btn btn-primary bg-dark" 
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();" >

        logout
       
        </a>--}}
        <form action="{{route('logout')}}" method="get">
          <input type="submit" value=" logout" class="btn btn-primary bg-dark" >
        </form>
      
      
    </li>
  
    
     
    @else
    <li class="nav-item">
      <a href="{{route('signup')}}"
     class="btn btn-primary bg-dark"  >
        sign up
        </a>
    </li>
    <li class="nav-item">
      <a href="{{route('login')}}" class="btn btn-primary bg-dark"  >
       log in
         </a>
    </li>
    @endif
    
       
       
    </ul>
  
   
  </nav>
