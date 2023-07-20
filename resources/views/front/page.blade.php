@extends('front.layouts.master')
@section('title') {{$page->title}} @endsection
@section('meta')
<!-- Open Graph / Facebook -->
    <meta property="og:type" content="Website" >
    <meta property="og:title" content="@yield('title') - {{get_setting('title')}}" >
    <meta property="og:image" content="{{uploaded_asset(get_setting('logo'))}}" >
    <meta property="og:description" content="{{$page->body}} " >
    <meta property="og:site_name" content="{{get_setting('title') }}" >

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title') - {{get_setting('title')}}">
    <meta name="twitter:description" content="{{$page->body}} ">
    <meta name="twitter:image" content="{{ uploaded_asset(get_setting('logo')) }}">   
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h4 class="page-title"> {{$page->title}}</h4>
        <div class="card">
            <div class="card-body"> 
                <p>{!!$page->body!!}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @include('front.side')            
    </div>
</div>
@endsection