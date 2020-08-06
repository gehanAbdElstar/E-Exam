@extends('layout.layout')
@section('head')
   <link rel="stylesheet" href="/css/about.css">
@endsection
@section('content')

<div class="text-center">
<hr class="featurette-divider">
 <div class="row no-gutters  color p-3 m-4 border border-dark rounded" dir="rtl">
      <div class="col-md-6 order-md-2 text-right  p-3 ml-2  ">
        <h2 class=" text-right">عن الموقع <span class="text-muted"></span></h2>
        <p class="lead text-right  ">
         
          بوت كلية الحاسبات هو موقع يقدم خدمة الإجابة عن بعض أسئلة الطلاب عن الكلية جامعة كفر الشيخ 
          يقدمها بطريقة أكثر سهولة عن طريق الحوار مع بوت والإختيار من خيارات عديدة يقدمها لك البوت
            الموقع في حالة إبتدائية يحتاج لمعلومات أكثر من الطلاب ليتطور
     لبدأ إستخدام الموقع 
          
          <a href="{{route('chat')}}" class="btn btn-primary bg-dark w-25">من هنا</a>
          
          
          
          
          
          
          
          </p>
      </div>

      <div class="col-md-5 order-md-1">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto border border-dark rounded m-3" width="500" height="500" src="/pics/about.png" />
      </div>
    </div>
    <hr class="featurette-divider">
</div>


@endsection