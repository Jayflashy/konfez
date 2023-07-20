@extends('back.layouts.master')
@section('title')@lang('Update') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-8 mx-auto">
        <div class="card">
            <div class="card-header d-sm-flex justify-content-between">
                <h1 class="h5 mb-0">@lang('Update Process')</h1>
            </div>
            @error('update_file')
                <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                    Please upload a zip file.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
            @enderror
            @if(Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                {{Session::get('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card-body">
                <div class="text-center mb-2">
                    <b>Take note of the following details before proceeding.</b>
                </div>
                <ol class="list-group">
                    <li class="list-group-item text-semibold"><i class="fa fa-check me-2"></i>{{__('Make a backup of your database.')}}</li>
                    <li class="list-group-item text-semibold"><i class="fa fa-check me-2"></i>{{__('Download latest version.')}}</li>
                    <li class="list-group-item text-semibold"><i class="fa fa-check me-2"></i>{{__('Extract the downloaded zip file . You will find an update.zip file in the extrated files.')}}</li>
                    <li class="list-group-item text-semibold"><i class="fa fa-check me-2"></i>{{__("To update only database, name the file as 'database.sql' and compress to a zip file.")}}</li>
                    <li class="list-group-item text-semibold"><i class="fa fa-check me-2"></i>{{__('Upload that zip file here and click update now.')}}</li>
                    <li class="list-group-item text-semibold"><i class="fa fa-check me-2"></i>{{__('Please turn on maintainance mode before updating')}}</li>
                </ol>
                <br>               
                <form action="{{ route('update.postfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label fw-bold ">{{__('Upload File zip')}}</label>
                        <input type="file" required class="form-control" name="update_file" placeholder="Upload file here">
                    </div>
                    <br>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">{{__('Update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div> 
@endsection
