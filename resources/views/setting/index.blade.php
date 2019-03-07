@extends('adminlte::page')

@push('css')
<link href="{{ asset('css/setting.css') }}" rel="stylesheet">
@endpush

@push('js')
{{-- JavaScript --}}
<script src="{{ asset('js/setting.js') }}"></script>
@endpush

@section('content_header')
    <h1>SETTING</h1>
@stop

@section('content')
<div class="register-box-body" style="border:1px solid #ccc">
    <form action="" method="post" autocomplete="off">
        {!! csrf_field() !!}

        <div class="form-group has-feedback">
            <img class="profile-user-img img-responsive img-circle" src="https://res.cloudinary.com/hcaude7xp/image/upload/v1550829152/no_image.png" alt="User profile picture">
            <input type="hidden" name="user_image_path" value="">
        </div>
        <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
            <input type="text" name="name" class="form-control" value="{{ old('name') ?? $user_data->name}}"
                   placeholder="{{ trans('adminlte::adminlte.full_name') }}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group has-feedback {{ $errors->has('nickname') ? 'has-error' : '' }}">
            <input type="text" name="nickname" class="form-control" value="{{ old('nickname') ?? $user_data->nickname }}"
                   placeholder="{{ trans('adminlte::adminlte.nick_name') }}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('nickname'))
                <span class="help-block">
                    <strong>{{ $errors->first('nickname') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" name="email" class="form-control" value="{{ old('email') ?? $user_data->email }}"
                   placeholder="{{ trans('adminlte::adminlte.email') }}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password" class="form-control"
                   placeholder="{{ trans('adminlte::adminlte.password') }}">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            <input type="password" name="password_confirmation" class="form-control"
                   placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit"
                class="btn btn-primary btn-block btn-flat"
        >更新</button>
    </form>
</div>
@stop