@extends('back.layouts.master')
@section('title') @lang('Admin Dashboard') @endsection
@section('content')

<div class="row">
    <div class="col-6 col-lg-3 my-2">
        <div class="dw">
            <div class="dw-body d-flex">
                <span class="bg-info text-white stamp me-1">
                    <i class="las la-file-alt icon-md"></i>
                </span>
                <div class="lh-sm">
                    <div class="dw-text text-sm-start">
                        @lang('Posts')
                    </div>
                    <div class="text-muted">
                        {{ App\Models\Post::count() }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 my-2">
        <div class="dw">
            <div class="dw-body d-flex">
                <span class="bg-success text-white stamp me-1">
                    <i class="las la-eye icon-md"></i>
                </span>
                <div class="lh-sm">
                    <div class="dw-text text-sm-start">
                        @lang('Views')
                    </div>
                    <div class="text-muted">
                        {{ App\Models\View::count() }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 my-2">
        <div class="dw">
            <div class="dw-body d-flex">
                <span class="bg-danger text-white stamp me-1">
                    <i class="las la-comment icon-md"></i>
                </span>
                <div class="lh-sm">
                    <div class="dw-text text-sm-start">
                        @lang('Comments')
                    </div>
                    <div class="text-muted">
                        {{ App\Models\Comment::count() }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 my-2">
        <div class="dw">
            <div class="dw-body d-flex">
                <span class="bg-warning text-white stamp me-1">
                    <i class="las la-user-friends icon-md"></i>
                </span>
                <div class="lh-sm">
                    <div class="dw-text text-sm-start">
                        @lang('Users')
                    </div>
                    <div class="text-muted">
                        {{ App\Models\User::count() }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class=" mb-0">@lang('Recent Confessions')</h5>
                <a class="btn btn-primary float-end" href="{{route('confessions.index')}}"> {{__('View All')}}</a> 
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered " id="datatablex" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('User')</th>
                            <th>@lang('Title')</th>
                            <th>@lang('Category')</th>
                            <th>@lang('Views')</th>
                            <th>@lang('Comments')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $key=> $item)
                        <tr>
                            <td>{{$key +1}}</td>
                            <td>@if ($item->user_id == null) @lang('guest') @else {{ $item->user->username }} @endif
                            </td>
                            <td class="fw-bold">
                                <a href="{{route('view.post' ,$item->slug)}}">{{ Str::limit($item->title, 40) }} </a>  
                            </td>
                            <td>{{ $item->category->name }} </td>
                            <td>{{$item->postview()}} </td>
                            <td>{{$item->comment()->count()}} </td>
                            <td>
                                @if ( $item->status == 1)
                                <a href="{{ route('confessions.status',[$item->id,2]) }}" class="btn btn-success btn-sm">@lang('active')</a>
                                @else
                                    <a class="btn btn-warning btn-sm" href="{{ route('confessions.status',[$item->id,1]) }}">@lang('pending')</a>
                                @endif
                            </td>
                            <td class="actions">                          
                                <a class="btn btn-primary btn-sm btn-circle" href="{{route('confessions.edit', $item->id)}}" title="@lang('Edit')">
                                    <i class="las la-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-circle btn-sm" href="{{route('confessions.delete', $item->id)}}" title="@lang('Delete')">
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class=" mb-0">@lang('Recent Comments')</h5>
                <a class="btn btn-primary float-end" href="{{route('comments.index')}}"> {{__('View All')}}</a> 
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="datatablex1">
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
                                 <a href="#"> {{$item->post->title}}</a>
                            </td>
                            <td>{{ Str::limit($item->comment, 50) }}</td>
                            <td>{{ date('Y-m-d H:m' , strtotime($item->created_at))}}</td>
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
    </div>
</div>
@endsection
