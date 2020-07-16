
@extends('layout.layout')
@section('head')
@parent
<link rel="stylesheet" href="/css/tinker.css">
<title>إجراء محادثة</title>
@endsection




@section('content')

<div class="container">
    <div class="card text-center mg">
        <div class="card-header bg-info" dir="rtl" lang="ar">
          <h6>بوت</h6>
        </div>
        <div class="card-body">
            <div class="content  bg-secondary" id="app" >
                {{-- <botman-tinker api-endpoint="/botman"></botman-tinker>--}}
                <tinker></tinker>
             </div>
        </div>
        <div class="card-footer text-muted" dir="rtl" lang="ar">
          جامعة كفر الشيخ
        </div>
    </div>
  </div>
@endsection

   
    

   

