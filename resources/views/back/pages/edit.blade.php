@extends('back.layouts.master')
@section('title') @lang('Edit Page') @stop
@section('content')
<div class="row justify-content-center">
    <div class="page-title">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Edit Page')</h5>
            {{-- <a class="btn btn-primary btn-sm" href="{{route('contestants.create')}}><i class="fas fa-plus"></i> @lang(' Add')</a> --}}
        </div>
    </div>
    <div class="card">
        <form action="{{ route('pages.update' , $page->id) }}" method="POST" enctype="multipart/form-data">                        
            <div class="card-body">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 form-label" for="name">@lang('Title') <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="@lang('Title')" name="title" value="{{ $page->title }}" required>
                    </div>
                </div>
    
                <div class="form-group row">
                    <label class="col-sm-2 form-label" for="name">@lang('Link') <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <div class="input-group d-md-flex d-sm-block">
                            <span class="input-group-text">{{ route('index') }}/page/</span>
                            <input type="text" class="form-control w-sm-100" placeholder="@lang('Slug')" name="slug" value="{{ $page->slug }}">
                        </div>
                        
                        <small class="form-text text-danger">@lang('Only a-z, numbers, hypen allowed')</small>
                    </div>
                </div>
    
                <div class="form-group row">
                    <label class="col-sm-2 form-label" for="name">@lang('Content') <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="tiny1" placeholder="@lang('Content')" name="body" required rows="4">{{$page->body}} </textarea>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
                </div>
            </div>               
        </form> 
    </div>
</div>
@endsection
@section('scripts')
<!--Wysiwig js-->
<script src="{{ static_asset('tinymce/tinymce.min.js') }}"></script>
<script src="{{static_asset('tinymce/tiny-init.js') }}"></script>
@endsection