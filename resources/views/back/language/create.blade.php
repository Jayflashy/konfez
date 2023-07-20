@extends('back.layouts.master')
@section('title') @lang('Add Language')  @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 mx-auto">
        <div class="page-title">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0">@lang('Create Language') </h5>
            </div>
        </div>
        
        <div class="card">    
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('language.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('alerts.alerts')
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="form-label">@lang('Name') </label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" placeholder="@lang('Name') " required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="form-label">@lang('Code') </label>
                            </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="code" placeholder="eg en,es,fr " required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="form-label">@lang('RTL') </label>
                            </div>
                        <div class="col-lg-9">
                            <label class="jdv-switch jdv-switch-success mb-0">
                                <input type="checkbox" value="1" name="rtl">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>

                
                    <div class="form-group text-end mb-0">
                        <button type="submit" class="btn btn-sm btn-primary">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop