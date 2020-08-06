
@extends('layout.layout')
@section('head')
   <link rel="stylesheet" href="/css/privacy.css">
@endsection
@section('content')

<div class="text-center">
  <div class="card bg-light pagination-centered" style="width: 18rem;" dir="rtl" lang="ar">
  <div class="card-body">
    <h5 class="card-title text-right" dir="rtl" lang="ar" >وثيقة الخصوصية</h5>
    <h6 class="card-subtitle mb-2 text-muted text-right">KFCIbot</h6>
    <p class="card-text text-right"  dir="rtl" lang="ar" >
      
      الموقع لا يحفظ أي معلومات خاصة بالمستخدم إلا التي يقدمها المستخدم بنفسه مثل الإميل والإسم
     قد يستخدم الإميل للتواصل مع المستخدم فى الحالات التي تستدعي ذلك
       باقي نوافذ الموقع من خلال تليغرام أو ماسينجر خاضعة لسياسة تلك المنصات.
      
      
      
      
      </p>
    <a href="{{route('landpage')}}" class="card-link">KFCIbot</a>
    
  </div>
</div>
</div>
@endsection