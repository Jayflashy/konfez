@extends('back.layouts.master')
@section('title') @lang('Messages')  @endsection
@section('content')

<div class="page-title">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0">@lang('Messages')</h5>
    </div>
</div>
<div class="card">    
    <div class="card-body table-responsive">
        <table class="table table-bordered" id="datatablex">
            <thead>
                <tr>
                    <th>@lang('Date') </th>
                    <th>@lang('Username') </th>
                    <th>@lang('Messages') </th>
                    <th>@lang('Actions') </th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $item)
                <tr>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->user->username}}</td>
                    <td>{{$item->message}}</td>
                    <td >
                        <a class="btn btn-danger btn-circle btn-sm" href="{{route('messages.delete', $item->id)}}" title="@lang('Delete')">
                            <i class="las la-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop