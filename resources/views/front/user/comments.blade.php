@extends('front.layouts.master')
@section('title') @lang('My Comments') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-3 d-none d-lg-block">
        <div class="sidebar stickyfill">
            @include('front.layouts.sidenav')
        </div>
    </div>
    <div class="ow col-lg-9">
        <h4 class="page-title">@lang('My Comments')</h4>
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="datatablex">
                    <thead>
                        <tr>
                            <th>@lang('#') </th>
                            <th>@lang('Post')</th>
                            <th>@lang('Comment') </th>
                            <th>@lang('Status')</th>
                            <th>@lang('Actions') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $key=> $item)
                        <tr>
                            <td>{{$key +1}}</td>
                            <td class="fw-bold">
                                 <a href="{{route('view.post',$item->post->slug)}}">{{$item->post->title}}</a>
                            </td>
                            <td>{{Str::limit($item->comment, 100)}}</td>
                            <td>
                                @if ( $item->status == 1)
                                    <span class="badge bg-success badge-pill">@lang('approved')</span>
                                @else
                                    <span class="badge bg-warning badge-pill" >@lang('pending')</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary btn-circle btn-sm" href="{{route('view.post',$item->post->slug)}}" title="@lang('Delete')">
                                    <i class="las la-eye"></i>
                                </a>
                                <a class="btn btn-danger btn-circle btn-sm" href="{{route('user.delete_comment', $item->id)}}" title="@lang('Delete')">
                                    <i class="las la-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection