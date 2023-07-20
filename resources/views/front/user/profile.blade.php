@extends('front.layouts.master')
@section('title') @lang('Edit Profile') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-3 d-none d-lg-block">
        <div class="sidebar stickyfill">
            @include('front.layouts.sidenav')
        </div>
    </div>
    <div class="col-lg-9">
        <h4 class="page-title">@lang('Edit Profile')</h4>
        <div class="card">
            <div class="card-body">
                @include('alerts.alerts')
                <form action="{{route('user.profile')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 form-label" for="name">@lang('Name')</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="@lang('Name')" id="name" name="name" class="form-control" value="{{Auth::user()->name}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-label" for="email">@lang('Email Address')</label>
                        <div class="col-sm-9">
                            <input type="email" placeholder="@lang('Email Address')" id="email" name="email" class="form-control" value="{{Auth::user()->email}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-label" for="email">@lang('Username')</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="@lang('Username')" name="username" class="form-control" value="{{Auth::user()->username}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-label" for="password">@lang('Password')</label>
                        <div class="col-sm-9">
                            <input type="password" placeholder="@lang('Password')" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-0 text-end">
                        <button type="submit" class="btn btn-primary">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection