@extends('front.layouts.master')
@section('title') @lang('Receive anonymous message') @endsection
@section('meta')
<!-- Open Graph / Facebook -->
    <meta property="og:type" content="Website" >
    <meta property="og:title" content="@yield('title') - {{get_setting('title')}}" >
    <meta property="og:image" content="{{uploaded_asset(get_setting('logo'))}}" >
    <meta property="og:description" content="{{get_setting('meta_description')}} " >
    <meta property="og:site_name" content="{{get_setting('title') }}" >

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title') - {{get_setting('title')}}">
    <meta name="twitter:description" content="{{get_setting('meta_description')}}  ">
    <meta name="twitter:image" content="{{ uploaded_asset(get_setting('logo')) }}">   
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h4 class="page-title"> @lang("Receive anonymous message")</h4>        
        <div class="panel">
            <div class="panel-body">
                @include('alerts.alerts')
                <p class="alert alert-success show mb-0">@lang('Message sent successfully'). @lang('Now its your turn to receive messages')</p>                
                <p></p>
                @auth
                <div class="py-2 fw-bold">
                    <p class="text-success">@lang('Login to your account to receive messages from your friends')!</p>
                </div>
                <div class="text-center">
                    <a href="{{route('user.messages')}}" class="btn btn-primary">@lang('My Messages')</a>
                </div>
                @else
                <div class="py-2 fw-bold">
                    <p class="text-success">@lang('Create an account and dare your friends to tell you what they think about you')!</p>
                    <p>@lang('Register your account below to get started')</p>
                </div>
                <div class="text-center">
                    <a href="{{route('register')}}" class="btn btn-primary">@lang('Register')</a>
                    <a href="{{route('login')}}" class="btn btn-success">@lang('Login')</a>
                </div>
                @endauth
                <p></p> <br>
                <p>{!! (sys_setting('message_footer')) !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection