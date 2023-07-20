@extends('back.layouts.master')
@section('title'){{__('Add Staff')}} @endsection
@section('content')
<div class="row justify-content-center">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">{{ __('Add Staff') }}</h5>
            <a class="btn btn-primary btn-sm" href="{{route('staffs.index')}}"><i class="la la-arrow-left"></i> {{ __('Back') }}</a>
        </div>
    </div>
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h5">{{__('Staff Information')}}</h5>
            </div>
            <form action="{{ route('staffs.store') }}" method="POST" enctype="multipart/form-data">
            	@csrf
                <div class="card-body row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">{{__('Name')}}</label>
                            <input type="text" placeholder="{{__('Name')}}" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">{{__('Email Address')}}</label>
                            <input type="text" placeholder="{{__('Email Address')}}" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="mobile">{{__('Phone')}}</label>
                            <input type="text" placeholder="{{__('Phone')}}" id="mobile" name="mobile" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">{{__('Username')}}</label>
                            <input type="text" placeholder="{{__('Userame')}}" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">{{__('Password')}}</label>
                            <input type="password" placeholder="{{__('Password')}}" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="name">{{__('Role')}}</label>
                            <select name="role_id" required class="form-control aiz-selectpicker">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-end mx-3">
                        <button type="submit" class="btn btn-sm btn-primary">{{__('Save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
