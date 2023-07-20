@extends('back.layouts.master')
@section('title') @lang('Pages') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="page-title">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Pages')</h5>
            <a class="btn btn-primary btn-sm" href="{{route('pages.create')}}"><i class="fas fa-plus"></i> @lang('Add') </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover" id="datatable">
                <thead>
                    <tr>                       
                        <th>@lang('Name')</th>
                        <th>@lang('Slug')</th>
                        <th>@lang('Actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $item)
                    <tr>                       
                        <td>{{$item->title}}</td>
                        <td><a href="{{ route('index') }}/page/{{ $item->slug }}">{{ route('index') }}/page/{{ $item->slug }}</a></td>
                        <td>
                            <a class="btn btn-primary btn-sm btn-circle" href="{{route('pages.edit', $item->id)}}" title="@lang('Edit')">
                                <i class="las la-edit"></i>
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
