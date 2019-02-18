@extends('adminlte::page')

@push('css')
{{-- CSS --}}
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
@endpush

@push('js')
{{-- JavaScript --}}
<script src="{{ asset('js/post.js') }}"></script>
@endpush

@section('content_header')
    <div style="float:left;"><a href="{{ action('PostController@new') }}">戻る</a></div>
    <div class="image-post" style="float:right; color: #3897f0;">投稿</div>
    <h3 style="text-align:center;">新規投稿</h3>
    <hr>
@stop

@section('full-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
    <div style="text-align: center">
        <img src="{{ asset($image_data)}}" width="50%">
    </div>
</div>
<form method="POST" action="image_upload" id="image_upload">
    {{ csrf_field() }}

    <div style="margin-top:10%;">
        <select class="form-control" style="width:40%;" id='pref' name='pref'>
            @foreach(config('pref') as $index => $name)
                <option value="{{ $index }}"
                    <?php if ($name === '東京都') echo 'selected' ?>
                >{{ $name }}</option>
            @endforeach
        </select>
    </div>
    <div class='weather-icon'>
        <img src="">
        <p class="description"></p>
        <p class="temperature"></p>
    </div>
    <input type="text" class="form-control" name="comment" placeholder="Comment ...">
    
    <input type="hidden" name="image_path" value="{{$image_data}}">
    <input type="submit" style="display:none">

</form>
@stop
