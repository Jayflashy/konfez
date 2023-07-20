@extends('back.layouts.master')
@section('title') @lang('Edit User') @stop
@section('content')
<div class="row justify-content-center">
<div class="col-lg-8">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Edit User') </h5>
        </div>
    </div>
    <div class="card"> 
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 form-label" for="name">@lang('Name')</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="@lang('Name')" id="name" name="name" class="form-control" value="{{$user->name}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-label" for="email">@lang('Email Address')</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="@lang('Email Address')" id="email" name="email" class="form-control" value="{{$user->email}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-label" for="phone">@lang('Username')</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="@lang('Username')" id="phone" name="username" class="form-control" value="{{$user->username}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-label" for="password">@lang('Password')</label>
                    <div class="col-sm-9">
                        <input type="password" placeholder="@lang('Password')" id="password" name="password" class="form-control">
                    </div>
                </div>
                @if ($user->user_role == "user")
                <div class="form-group row">
                    <label class="col-sm-3 form-label">@lang('Role')</label>
                    <div class="col-sm-9 span-group" data-toggle="buttons">
                        <label class="btn btn-outline-info @if($user->user_role == "admin") active @endif">
                            <input type="radio" name="role" value="admin" class="form-selectgroup-input" @if($user->user_role == "admin") checked="checked" @endif>
                            @lang('Admin')
                        </label>
                        <label class="btn btn-outline-warning  @if($user->user_role == "user") active @endif">
                            <input type="radio" name="role" value="user" class="form-selectgroup-input" @if($user->user_role == "user") checked="checked" @endif>
                            @lang('User')
                        </label>
                    </div>                    
                </div>
                @endif
                
                <div class="form-group mb-0 text-end">
                    <button type="submit" class="btn btn-primary">@lang('Save')</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@stop