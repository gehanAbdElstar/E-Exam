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
                <h2  class="p-3" >تعديل المعلومات</h2>
            </div>
            <div class="text-center">
                <a class=" w-25 bg-dark p-2 bordered rounded"  href="{{ route('info.index') }}"> التراجع</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong >للأسف!</strong> يوجد مشكلة ما في مُدخلاتك.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('info.update',$info->id) }}"  class="w-50 m-5 edit-form bg-light bordered rounded p-5" enctype="multipart/form-data"  method="POST"  >
        @csrf
       
@method('PUT')
         <div class="row no-gutters " >
            <div class="col-xs-12 col-sm-12 col-md-12 text-right" >
                <div class="form-group text-right" >
                    <strong >العنوان:</strong><br>
                    <label   class="form-control" >{{$info->mainTopic->name}}</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group text-right">
                    <strong >العنوان الفرعى:</strong>
                    <label   class="form-control" >{{$info->topic}}</label>
                   
                </div>
            </div>
              <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group text-right">
                    <strong >المحتوى:</strong>
                    <input type="hidden" name="">
                    <textarea class="form-control" style="height:150px" name="contents" placeholder="المحتوى">{{$info->contents}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-right">
                    <strong >مُرفق 1:</strong>
                    @php
                        $url=$info->media1_path;
                    @endphp
                    @include('infoCRUD.media')
                    <input type="file" name="media1_path" id="" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-right">
                    <strong >مُرفق 2:</strong>
                    @php
                    $url=$info->media2_path;
                @endphp
                    @include('infoCRUD.media')
                 <input type="file" name="media2_path" id="" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary bg-primary">تحديث</button>
            </div>
        </div>

    </form>
</div>
</div>
@endsection