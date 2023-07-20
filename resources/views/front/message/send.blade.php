@extends('front.layouts.master')
@section('title') @lang('Send anonymous message to ') {{$user->username}} @endsection
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
        <h4 class="page-title"> @lang("Send Anonymous Message")</h4>        
        <div class="panel">
            <div class="panel-body">
                @include('alerts.alerts')
                <p>@lang('Message your friend Secretly, they will never know who messaged them.')</p>                
                <p></p>
                <form class="my-2" action="{{route('send.message' , $user->username)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">@lang('Send your message secretly to') {{$user->username}}.</label>
                        <textarea name="message" id="" rows="5" class="form-control bml" maxlength="{{sys_setting('max_message')}}"></textarea>
                    </div>
                    <input type="hidden" name="sender_id" value=" @auth{{Auth::user()->id}} @endauth">
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">@lang('Send')</button>
                    </div>
                </form>
                <p>{!! (sys_setting('message_footer')) !!}</p>
                <p></p>
            </div>
        </div>
    </div>
</div>
@endsection