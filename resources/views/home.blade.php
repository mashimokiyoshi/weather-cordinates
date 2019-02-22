@extends('adminlte::page')

@push('css')
{{-- CSS --}}
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="row" style="margin-bottom:20px">
    <div class="box-default box-solid">
        <div class="box-header">
            <div><h3 class="box-title">日本　{{ config('pref')[$current_weather->city->id] }}</h3></div>
            <div><h3 class="box-title">{{ date('Y年 m月 d日') }}</h3></div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="box-tools pull-left">
                                <div><img src="http://openweathermap.org/img/w/{{ $current_weather->weather->icon }}.png" width="200%" height="auto"></div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="box-tools pull-left">
                                <div style="font-size:300%">{!! $current_weather->temperature->now !!}</div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="box-tools pull-left">
                                <div style="">{{ $current_weather->weather->description_jp }}</div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row" style="padding-top:10px">
                        <div class="col-md-3 col-sm-4">
                            <div class="box-tools pull-left">
                                <div style="">気圧： {!! $current_weather->pressure !!}</div>
                                <div style="">湿度： {!! $current_weather->humidity !!}</div>
                                <div style="">風速： {!! $current_weather->wind->speed !!}</div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col -->
                <div class="col-xs-6 no-padding">
                    <img class="image-round" src="{{ $post->image_path }}">
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="row">
    <!-- 今週の天気 -->
    <div class="box-default">
        <div class="box-header">
            <h3 class="box-title">今週の天気</h3>
            <div class="box-tools pull-right">
                {{-- <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button> --}}
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <?php
                        $week = array( "日", "月", "火", "水", "木", "金", "土" );
                        $time = date('m月d日');
                        foreach ($forecast as $key => $weather) {
                            $day = $weather->time->day->format('m月d日');
                            if($time === $day){
                                unset($key);
                                continue;
                            } else {
                                $time = $day;
                            }
                            $week_key = $weather->time->day->format('w');
                        ?>
                        <tr>
                            <td style="padding-top:23px;color:#636b6f;font-size:130%;">{{ $day }}({{$week[$week_key]}})</td>
                            <td><img src="http://openweathermap.org/img/w/{{ $weather->weather->icon }}.png" width="auto" height="auto"></td>
                            <td style="padding-top:23px;color:#636b6f;font-size:130%;">{!! $weather->temperature !!}</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop