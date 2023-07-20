@extends('front.layouts.blank')

@section('title') @lang('Site Under Maintainance')  @endsection

@section('content')
<div class="card">
    <div class="card-body text-center">
        <div class="display-1 text-muted mb-5"><i class="fa fa-exclamation"></i> 503</div>
        <h1 class="h3 mb-3">@lang('Oops.. Maintanance Mode.')...</h1>
        <p class="h6 text-muted fw-normal mb-3">@lang('This site is under developement/Maintenance. We will be back soon')...</p>
        <a class="btn btn-primary" href="javascript:history.back()"><i class="fa fa-arrow-left me-2"></i>@lang('Go back')</a>
    </div>
</div>        
@endsection
