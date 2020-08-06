@extends('layout.layout')
@section('head')
<link rel="stylesheet" href="/css/infoCRUD/index.css">
@endsection
@section('content')
<div class="text-center">
<table class=" table-bordered table-striped table-light table-hover table-responsive w-75 table-sm table-fixed" dir="rtl" lang="ar">
 <thead dir="rtl" lang="ar" class="text-center">
    <tr dir="rtl" lang="ar" class="text-center ">
      <th dir="rtl" lang="ar"  class="text-center" >العنوان</th>
      <th  dir="rtl" lang="ar"  class="text-center">العنوان الفرعي</th>
      <th  dir="rtl" lang="ar"  class="text-center">المحتوى</th>
      <th dir="rtl" lang="ar"  class="text-center">مرفق 1</th>
      <th dir="rtl" lang="ar"  class="text-center">مرفق 2</th>
      <th dir="rtl" lang="ar"></th>
      <th dir="rtl" lang="ar"></th>
    </tr>
  </thead>

   <tbody dir="rtl" lang="ar">
   @foreach ($mainTopics as $mainTopic)
   @php
   $collegeInfo=$mainTopic->collegeInformation;
   @endphp
    
   
       
  
   @foreach ($collegeInfo as $info)
   <tr dir="rtl" lang="ar">
    <td dir="rtl" lang="ar" class="text-center">{{ $mainTopic->name }}</td>
    <td dir="rtl" lang="ar" class="text-center">{{ $info->topic }}</td>
   <td dir="rtl" lang="ar" class="text-right p-2 ">
   <div class="contents">
   {{ $info->contents }}
   </div>
   </td>
   <td dir="rtl" lang="ar" >
     @php
     $url=$info->media1_path; 
     @endphp
     @include('infoCRUD.media')
  
     
      

   </td>
   <td dir="rtl" lang="ar" >
       @php
       $url=$info->media2_path; 
       @endphp
    
     @include('infoCRUD.media')
    
   </td>
<td>
  <a class="btn btn-primary" href="{{ route('info.edit',$info->id) }}">تعديل</a>
  {{--
<form action="{{ route('info.edit',$info->id)}}" method="GET">
    <input type="" value="تعديل">
</form>
--}}
</td>
<td><a class="btn btn-primary" href="{{ route('info.show',$info->id) }}">عرض</a></td>

    </tr>
   @endforeach
   
   @endforeach
    
    
    </tbody>
</table>
</div>

@endsection