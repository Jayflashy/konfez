@extends('front.layouts.blank')

@section('title') @lang('Page Not Found')  @endsection

@section('content')
<div class="card">
    <div class="card-body text-center">
        <div class="display-1 text-muted mb-5"><i class="fa fa-exclamation"></i> 404</div>
        <h1 class="h3 mb-3">@lang('Oops.. You just found an error page')...</h1>
        <p class="h6 text-muted fw-normal mb-3">@lang('We are sorry but our service is currently not available')...</p>
        <a class="btn btn-primary" href="javascript:history.back()"><i class="fa fa-arrow-left me-2"></i>@lang('Go back')</a>
    </div>
</div>        
@endsection
