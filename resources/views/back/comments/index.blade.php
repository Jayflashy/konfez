@extends('back.layouts.master')
@section('title') @lang('Comments')  @endsection
@section('content')

<div class="page-title">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0">@lang('Comments')</h5>
    </div>
</div>
<div class="card">    
    <div class="card-body table-responsive">
        <table class="table table-bordered" id="datatablex">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('User')</th>
                    <th>@lang('Post')</th>
                    <th>@lang('Comment')</th>
                    <th>@lang('Date')</th>
                    <th>@lang('Status')</th>
                    <th>@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $key=> $item)
                <tr>
                    <td>{{$key +1}}</td>
                    <td>@if ($item->user_id == null) @lang('guest') @else {{ $item->user->username }} @endif</td>
                    <td class="fw-bold">
                         <a href="{{route('view.post',$item->post->slug)}}"> {{$item->post->title}}</a>
                    </td>
                    <td>{{$item->comment}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        @if ( $item->status == 1)
                        <a href="{{ route('comments.status',[$item->id,2]) }}" class="btn btn-success btn-sm">@lang('active')</a>
                        @else
                            <a class="btn btn-warning btn-sm" href="{{ route('comments.status',[$item->id,1]) }}">@lang('pending')</a>
                        @endif
                    </td>
                    <td >
                        {{-- <a class="btn btn-primary btn-circle btn-sm" href="{{route('comments.edit', $item->id)}}" title="@lang('Edit')">
                            <i class="las la-edit"></i>
                        </a> --}}
                        <a class="btn btn-danger btn-circle btn-sm" href="{{route('comments.delete', $item->id)}}" title="@lang('Delete')">
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