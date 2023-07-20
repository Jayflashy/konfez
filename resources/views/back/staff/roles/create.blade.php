@extends('back.layouts.master')
@section('title')@lang('Add Role') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Add Role') </h5>
            <a class="btn btn-primary btn-sm" href="{{route('roles.index')}}"><i class="fas fa-arrow-left"></i> @lang('Back')</a>
        </div>
    </div>

    <div class="card">
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="card-body row justify-content-center">
                <div class="col-lg-9">
                    <div class="form-group">
                        <label class="form-label" for="name">@lang('Name') *</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="@lang('Name')" value="{{ old('name') }}" >
                    </div>

                    <label class="form-label">@lang('Permissions')  </label>
                    <div class="row">
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="1" id=""> @lang('Posts') 
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="2" id=""> @lang('Categories')
                        </div>

                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="3" id=""> @lang('Comments')
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="4" id=""> @lang('Messages')
                        </div>

                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="5" id=""> @lang('Users')
                        </div>

                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="6" id=""> @lang('Promotion')
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="7" id=""> @lang('Pages')
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="8" id=""> @lang('Settings')
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="9" id=""> @lang('Staffs') 
                        </div>
                        <div class="col-md-4 my-3">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="10" id=""> @lang('System') 
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
