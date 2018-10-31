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
<div>
    <div style="float:left;"><a href="{{ action('HomeController@index') }}">戻る</a></div>
    <div class="upload-result" style="float:right;color: #3897f0;">次へ</div>
    <h3 style="text-align:center;">新規投稿</h3>
    <hr>
</div>
@stop

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
    <div>
        <div id="upload-demo" style="display:none;"></div>
    </div>
    <div>
        <input type="file" id="upload">
    </div>
</div>
<form method="POST" action="detail" id="move_detail">
    {{ csrf_field() }}
    <input type="hidden" name="image_resp" id="image_resp" value="">
    <input type="submit" style="display:none">
</form>
@stop
