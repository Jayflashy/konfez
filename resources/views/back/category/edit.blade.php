@extends('back.layouts.master')
@section('title') @lang('Edit Category') @endsection
@section('content')
<div class="page-title mb-2">    
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0">@lang('Edit Category') </h5>
        <a class="btn btn-primary btn-sm" href="{{route('category.index')}}">@lang('Back')</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="card col-lg-10">
        <form action="{{ route('category.update', $category->id) }}" method="POST">  
            @csrf                      
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-label">@lang('Name') </label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" placeholder="@lang('name')" required value="{{ old('name', $category->name) }}">
                    </div>                        
                </div>                            
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-label">@lang('Description') </label>
                    </div>
                    <div class="col-md-9">
                        <textarea name="about" rows="4" class="form-control">{{ old('about', $category->about) }}</textarea>
                    </div>
                </div>     
                <div class="form-group mb-0 text-end">
                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
                </div>              
            </div>            
        </form>                      
    </div>
</div>
@endsection
