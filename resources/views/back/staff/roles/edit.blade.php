@extends('back.layouts.master')
@section('title')@lang('Edit Role') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Edit Role')</h5>
            <a class="btn btn-primary btn-sm" href="{{route('roles.index')}}"><i class="fas fa-arrow-left"></i> @lang('Back') </a>
        </div>
    </div>

    <div class="card">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            <div class="card-body row justify-content-center">
                <div class="col-lg-9">
                    <div class="form-group">
                        <label class="form-label" for="name">@lang('Name') *</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="@lang('Name') " value="{{ $role->name }}" >
                    </div>
                    @php
                        $permissions = json_decode($role->permissions);
                    @endphp
                    <label class="form-label">@lang('Permissions') </label>
                    <div class="row">
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="1"  @if(in_array(1, $permissions)) checked @endif > @lang('Confessions')
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="2"  @if(in_array(2, $permissions)) checked @endif id=""> @lang('Categories')
                        </div>

                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="3"  @if(in_array(3, $permissions)) checked @endif id=""> @lang('Comments')
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="4"  @if(in_array(4, $permissions)) checked @endif id=""> @lang('Messages')
                        </div>

                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="5"  @if(in_array(5, $permissions)) checked @endif id=""> @lang('Users')
                        </div>

                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="6" @if(in_array(6, $permissions)) checked @endif id=""> @lang('Promotion')
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="7" @if(in_array(7, $permissions)) checked @endif id=""> @lang('Pages')
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="8" @if(in_array(8, $permissions)) checked @endif id=""> @lang('Settings')
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="9" @if(in_array(9, $permissions)) checked @endif id=""> @lang('Staffs') 
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="10" @if(in_array(10, $permissions)) checked @endif id=""> @lang('System') 
                        </div>
                        
                    </div>

                    <div class="form-group text-end ">
                        <button type="submit" class="btn btn-primary ">@lang('Save')</button>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
@endsection
