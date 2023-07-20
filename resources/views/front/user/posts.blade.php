@extends('front.layouts.master')
@section('title') @lang('My Posts') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-3 d-none d-lg-block">
        <div class="sidebar stickyfill">
            @include('front.layouts.sidenav')
        </div>
    </div>
    <div class="col-lg-9">
        <h4 class="page-title">@lang('My Posts')</h4>
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered " id="datatablex" >
                    <thead>
                        <tr>
                            <th>#</th>
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
                            <td class="fw-bold">
                                <a href="{{route('view.post' , $item->slug)}}">{{ Str::limit($item->title, 40) }} </a>  
                            </td>
                            <td>{{ $item->category->name }} </td>
                            <td>{{$item->postview()}} </td>
                            <td>{{$item->comment()->count()}} </td>
                            <td>
                                @if ( $item->status == 1)
                                    <span class="badge badge-pill bg-success">@lang('approved')</span>
                                @else
                                    <span class="badge badge-pill bg-warning" >@lang('pending')</span>
                                @endif
                            </td>
                            <td class="actions">                          
                                <a class="btn btn-primary btn-sm btn-circle" href="{{route('edit.post', $item->id)}}" title="@lang('Edit')">
                                    <i class="las la-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-circle btn-sm" href="{{route('delete.post', $item->id)}}" title="@lang('Delete')">
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