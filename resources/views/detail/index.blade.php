@extends('adminlte::page')

@push('css')
{{-- CSS --}}
<link href="{{ asset('css/detail.css') }}" rel="stylesheet">
@endpush

@section('content_header')
    <div>
        <img class="profile-user-img img-circle" src="<?php echo $image_data->user->user_image_path ?? 'https://res.cloudinary.com/hcaude7xp/image/upload/v1550829152/no_image.png' ;?>">
        {{$image_data->user->nickname}}
    </div>
@stop

@section('full-content')
<div style="text-align:center;">
    <img src='{{$image_data->image_path}}' width="100%">
</div>
@stop

@section('content')
<div class="row" style="text-align:center;">
    <?php $week = array( "日", "月", "火", "水", "木", "金", "土" ); ?>
    {{date('Y年m月d日', strtotime($image_data->created_at))}} ({{ $week[date('w', strtotime($image_data->created_at))] }})
    <img src="http://openweathermap.org/img/w/{{ $image_data->weather_icon }}.png" width="10%" height="10%">
    {{ $image_data->temperature ?? '--' }}℃
    {{ !empty($image_data->location) ? config('pref')[$image_data->location] : '------' }}
</div>
<hr>
<div class="row">
    {{ $image_data->comment }}
</div>
@stop