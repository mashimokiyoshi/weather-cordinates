@extends('adminlte::page')

@push('css')
{{-- CSS --}}
<link href="{{ asset('css/feed.css') }}" rel="stylesheet">
@endpush

@push('js')
{{-- JavaScript --}}
<script src="{{ asset('js/feed.js') }}"></script>
@endpush

@section('content_header')
    <h1>FEED</h1>
@stop

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<form method="POST" action="">
        {{ csrf_field() }}
<div class="row">
    @foreach ($posts as $post)
        <div class="col-lg-3 col-xs-6" style="padding: 0px 5px; border-radius:10px;">
        <!-- small box -->
            <div class="small-box bg-black">
                <div style="position: relative;">
                    <img style="max-width:100%;max-height:100%;width:auto;height:auto;" src="{{ $post->image_path }}">
                    <a class="favorite-icon" href="javascript:void(0);"><i class="fa fa-heart {{ $post->my_favorite }}" id="{{ $post->id }}"></i><span>{{ $post->favorite->count() }}</span></a>
                </div>
                <div class="small-box-footer" style="padding: 0px;">
                    {{ $post->user->name }}
                </div>
                <div class="small-box-footer" style="padding: 0px;">
                    <img src="http://openweathermap.org/img/w/{{ $post->weather_icon }}.png" width="15%" height="15%">
                    {{ $post->temperature ?? '--' }}℃
                    {{ !empty($post->location) ? config('pref')[$post->location] : '------' }}
                </div>
            </div>
        </div>
    @endforeach
</div>
</form>
@stop