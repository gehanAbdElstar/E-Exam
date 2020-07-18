@extends('layout.layout')
@section('head')
<link rel="stylesheet" href="/css/infoCRUD/index.css">
@endsection
@section('content')
<div class="text-right">
<table class="table-bordered table-striped table-dark table-hover" dir="rtl" lang="ar">
 {{-- <thead dir="rtl" lang="ar">--}}
    <tr dir="rtl" lang="ar" class="text-center">
      <th dir="rtl" lang="ar">العنوان</th>
      <th  dir="rtl" lang="ar">العنوان الفرعي</th>
      <th  dir="rtl" lang="ar">المحتوى</th>
      <th></th>
    </tr>
  </thead>

   {{--<tbody dir="rtl" lang="ar">--}}
   @foreach ($mainTopics as $mainTopic)
    @php
    $collegeInfo=$mainTopic->collegeInformation;
    @endphp
 
   
   @foreach ($collegeInfo as $info)
   <tr dir="rtl" lang="ar">
    <td dir="rtl" lang="ar" class="text-center">{{ $mainTopic->name }}</td>
    <td dir="rtl" lang="ar" class="text-center">{{ $info->topic }}</td>
   <td dir="rtl" lang="ar">{{ $info->contents }}</td>
   <td dir="rtl" lang="ar">
   <img src="message.attachment.url" />
                    <video controls  height="160"  autoplay="">
                        <source :src="message.attachment.url" type="video/mp4">
                    </video>
                    <audio controls autoplay="">
                        <source :src="message.attachment.url" type="audio/mp3">
                    </audio>
                <iframe  src="message.attachment.url" style="overflow:hidden; padding:0px;"
                width="550" height="900" frameborder="0" >
                        <source :src="message.attachment.url" type="application/pdf">
                    </iframe>
   </td>
    </tr>
   @endforeach
   
   @endforeach
    
    
    </tbody>
</table>
</div>

@endsection