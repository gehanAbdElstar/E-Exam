@extends('layout.layout')
@section('head')
    <link rel="stylesheet" href="/css/infoCRUD/edit.css">
@endsection
@section('content')
<div class="text-center">
    <div class="content">
    <div class="row no-gutters ">
        <div class="col-lg-12 margin-tb">
            <div class=" text-center m-2">
                <h2  class="p-3" dir="rtl" lang="ar">عرض المعلومات</h2>
            </div>
            <div class="text-center">
                <a class=" w-25 bg-dark p-2 bordered rounded" dir="rtl" lang="ar" href="{{ route('info.index') }}"> التراجع</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong dir="rtl" lang="ar">للأسف!</strong> يوجد مشكلة ما في مُدخلاتك.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-50 m-5 edit-form bg-light bordered rounded p-5"  dir="rtl" lang="ar"  >
       
       

         <div class="row no-gutters " dir="rtl" lang="ar">
            <div class="col-xs-12 col-sm-12 col-md-12 text-right" dir="rtl" lang="ar">
                <div class="form-group text-right" dir="rtl" lang="ar">
                    <strong dir="rtl" lang="ar">العنوان:</strong>
                    <label>{{$info->mainTopic->name}}</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" dir="rtl" lang="ar">
                <div class="form-group text-right">
                    <strong dir="rtl" lang="ar">العنوان الفرعى:</strong>
                    <label>{{$info->topic}}</label>
                   
                </div>
            </div>
              <div class="col-xs-12 col-sm-12 col-md-12" dir="rtl" lang="ar">
                <div class="form-group text-right">
                    <strong dir="rtl" lang="ar">المحتوى:</strong>
                    <div class="card" class="overflow-auto text-right h-25">
                        <div class="card-body">
    
                          <p class="card-text">{{$info->contents}}</p>
                          
                        </div>
                      </div>
                   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-right">
                    <strong dir="rtl" lang="ar">مُرفق 1:</strong>
                    @php
                        $url=$info->media1_path;
                    @endphp
                    @include('infoCRUD.media')
                   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-right">
                    <strong dir="rtl" lang="ar">مُرفق 2:</strong>
                    @php
                    $url=$info->media2_path;
                @endphp
                    @include('infoCRUD.media')
                 
                </div>
            </div>
           
        </div>

    </div>
</div>
</div>
@endsection