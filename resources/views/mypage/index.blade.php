@extends('adminlte::page')

@section('content_header')
    <h1>MYPAGE</h1>
@stop

@section('content')
<body class="skin-blue sidebar-mini" style="height: auto; min-height: 100%;">
    <div class="wrapper" style="height: auto; min-height: 100%;">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{$user->user_image_path == null ? 'https://res.cloudinary.com/hcaude7xp/image/upload/v1550829152/no_image.png' : $user->user_image_path}}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{$user->nickname}}</h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
            <!-- /.box -->
            </div>
        </div>
        @foreach($user->post as $post)
            <div class="row">
                <div class="col-xs-4">
                    <div style="">
                        <img style="max-width:75%;max-height:100%;" src="{{ $post->image_path }}">
                    </div>
                </div>

                <div class="col-xs-8">
                    <div>
                        <img src="http://openweathermap.org/img/w/{{ $post->weather_icon }}.png" width="15%" height="15%">
                        {{ $post->temperature ?? '--' }}℃
                        /
                        {{date('Y年n月j日', strtotime($post->created_at))}}
                    </div>
                    <div>
                        {{$post->comment}}
                    </div>
                </div>
            </div>
            <hr style="margin: 15px 0px">
        @endforeach
    </div>
</body>
@stop