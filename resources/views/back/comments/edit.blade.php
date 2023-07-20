@extends('back.layouts.master')
@section('title') @lang('Edit Comment')  @endsection
@section('content')

<div class="page-title">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0">@lang('Edit Comment')</h5>
    </div>
</div>
<div class="card">    
    <div class="card-body table-responsive">
        <table class="table table-bordered" id="datatablex">
            <thead>
                <tr>
                    <th>@lang('#') </th>
                    <th>@lang('User') </th>
                    <th>@lang('Post')</th>
                    <th>@lang('Comment') </th>
                    <th>@lang('Date')</th>
                    <th>@lang('Status')</th>
                    <th>@lang('Actions') </th>
                </tr>
            </thead>
            
        </table>
    </div>
</div>
@stop