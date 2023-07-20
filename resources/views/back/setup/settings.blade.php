@extends('back.layouts.master')
@section('title') @lang('General Settings')  @endsection
@section('content')
<div class="mx-auto">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('General Settings') </h5>
        </div>
    </div>
    <div class="card">
        @include('alerts.alerts')
        <div class="card-body">
            <form class="row" action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-6">                    
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">@lang('Website Name')</label>
                        <div class="col-sm-9">                            
                            <input type="text" name="title" class="form-control" value="{{ get_setting('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">@lang('Website Email')</label>
                        <div class="col-sm-9">                            
                            <input type="text" name="email" class="form-control" value="{{ get_setting('email') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">@lang('Website About')</label>
                        <div class="col-sm-9">                            
                            <textarea name="description" rows="3" class="form-control">{{ get_setting('description') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">@lang('Meta Keywords')</label>
                        <div class="col-sm-9">                            
                            <textarea name="meta_keywords" rows="2" class="form-control">{{ get_setting('meta_keywords') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">@lang('Meta Descriptions')</label>
                        <div class="col-sm-9">                            
                            <textarea name="meta_description" rows="3" class="form-control">{{ get_setting('meta_description') }}</textarea>
                        </div>
                    </div>
                </div>            
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">@lang('Facebook Link')</label>
                        <div class="col-sm-9">                            
                            <input name="facebook" type="text" class="form-control" value="{{get_setting('facebook') }}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">@lang('Twitter Link')</label>
                        <div class="col-sm-9">                            
                            <input name="twitter" type="text" class="form-control" value="{{get_setting('twitter') }}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">@lang('Whatsapp Link')</label>
                        <div class="col-sm-9">                            
                            <input name="whatsapp" type="text" class="form-control" value="{{get_setting('whatsapp') }}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">@lang('Instagram Link')</label>
                        <div class="col-sm-9">                            
                            <input name="instagram" type="text" class="form-control" value="{{get_setting('instagram') }}" >
                        </div>
                    </div>
                </div>    
                <div class="col-lg-6">    
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">@lang('Primary Color')</label>
                        <div class="col-sm-9">                            
                            <input name="primary_color" type="text" class="form-control" value="{{get_setting('primary_color') }}" >
                        </div>
                    </div>                              
                    <div class="form-group row">                        
                        <label class="col-sm-3 form-label">@lang('Site Logo')</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="logo" accept="image/*"/>
                        </div>
                        <div class="col-md-3">
                            <img class="primage" src="{{ uploaded_asset(get_setting('logo'))}}" alt="Site Logo" >
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label class="col-sm-3 form-label">@lang('Favicon')</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="favicon" accept="image/*"/>
                        </div>
                        <div class="col-md-3">
                            <img class="primage" src="{{ uploaded_asset(get_setting('favicon'))}}" alt="Favicon" >
                        </div>
                    </div>
                </div>
                <div class="text-end">                    
                    <button class="btn btn-primary btn-block" type="submit">@lang('Update')</button>                            
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
