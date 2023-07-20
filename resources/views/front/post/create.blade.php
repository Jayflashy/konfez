@extends('front.layouts.master')
@section('title') @lang('Make Confession') @endsection
@section('meta')
<!-- Open Graph / Facebook -->
    <meta property="og:type" content="Website" >
    <meta property="og:title" content="@yield('title') | {{get_setting('title')}}" >
    <meta property="og:image" content="{{uploaded_asset(get_setting('logo'))}}" >
    <meta property="og:description" content="{{get_setting('description')}} " >
    <meta property="og:site_name" content="{{get_setting('title') }}" >

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title') | {{get_setting('title')}}">
    <meta name="twitter:description" content="{{get_setting('description')}}  ">
    <meta name="twitter:image" content="{{ uploaded_asset(get_setting('logo')) }}">   
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <h4 class="page-title"> @lang('Make Confession')</h4>
        <div class="card">
            <div class="card-body">
                @include('alerts.alerts')
                <form action="{{route('confess.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="form-label">@lang('Title')</label>
                        <input type="text" name="title" class="form-control bml" required maxlength="{{sys_setting('max_post_title')}}" placeholder="@lang('Title')" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-label"> @lang('Confession') </label>
                        <textarea name="content" rows="5" class="form-control bml" required minlength="{{sys_setting('minimum_post')}}" maxlength="{{sys_setting('max_post')}}" placeholder="@lang('Write your confession')">{{old('content')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label"> @lang('Category') </label>
                        <div class="span-group" data-toggle="buttons">
                            @foreach ($categories as $category)
                            <label class="btn btn-outline-info">
                                <input type="radio" name="category_id" value="{{ $category->id }}" class="form-selectgroup-input" >
                                {{ $category->name }}
                            </label>
                            @endforeach
                        </div> 
                    </div>
                    <input type="hidden" name="user_id" value=" @auth{{Auth::user()->id}} @endauth">
                    <div class="form-group mb-0 text-end">
                        <button class="btn btn-primary" type="submit">@lang('Confess')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection