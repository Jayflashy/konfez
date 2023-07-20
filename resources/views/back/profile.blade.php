@extends('back.layouts.master')
@section('title') Edit Profile  @endsection
@section('content')
<div class="row justify-content-center">
<div class="col-lg-8">
    <div class="page-title">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h5 class="mb-0">{{ __('Edit Profile') }}</h5>
        </div>
    </div>
    <div class="card"> 
        <div class="card-body">
            <form action="{{ route('admin.profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 form-label" for="name">{{__('Name')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{__('Name')}}" id="name" name="name" class="form-control" value="{{Auth::user()->name}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-label" for="email">{{__('Email Address')}}</label>
                    <div class="col-sm-9">
                        <input type="email" placeholder="{{__('Email Address')}}" id="email" name="email" class="form-control" value="{{Auth::user()->email}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-label">{{__('Username')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{__('Username')}}" name="username" class="form-control" value="{{Auth::user()->username}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-label" for="password">{{__('Password')}}</label>
                    <div class="col-sm-9">
                        <input type="password" placeholder="{{__('Password')}}" id="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="form-group mb-0 text-end">
                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@stop