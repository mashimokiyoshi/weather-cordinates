@extends('adminlte::page')

@push('css')
{{-- CSS --}}
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
@endpush

@push('js')
{{-- JavaScript --}}
<script src="{{ asset('js/post.js') }}"></script>
@endpush

@section('title', 'SHARE&HARE')
    
@section('content_header')
    <div style="float:left;"><a href="{{ action('PostController@new') }}">戻る</a></div>
    <div class="upload-result" style="float:right;"><a href="#">投稿</a></div>
    <h3 style="text-align:center;">新規投稿</h3>
    <hr>
@stop

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
    <div style="text-align: center">
        <img src="{{$image_data}}">
    </div>
</div>
@stop
