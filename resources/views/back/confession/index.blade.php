@extends('back.layouts.master')
@section('title')@lang('Confessions') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Confessions')</h5>
            {{-- <a class="btn btn-primary btn-sm" href="" data-bs-toggle="modal" data-bs-target="#create_modal"><i class="fas fa-plus"></i> @lang('Add') </a> --}}
        </div>
    </div>
    <div class="card">
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
                    @foreach($confessions as $key=> $item)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td> @if ($item->user_id == null) @lang('guest') @else{{ $item->user->username }} @endif 
                        </td>
                        <td class="fw-bold">
                            <a href="{{route('view.post' , $item->slug)}}">{{ Str::limit($item->title, 40) }} </a>  
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

@endsection
