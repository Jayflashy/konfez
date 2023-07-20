@extends('back.layouts.master')
@section('title')@lang('All Staffs') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Staffs') </h5>
            <a class="btn btn-primary btn-sm" href="{{route('staffs.create')}}"><i class="fas fa-plus"></i> @lang('Add') </a>
        </div>
        @include('alerts.alerts')
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover " id="datatable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('Name')</th>
                        <th>@lang('Email Address')</th>
                        <th>@lang('Phone')</th>
                        <th>@lang('Role')</th>
                        <th>@lang('Options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $key => $staff)
                        @if($staff->user != null)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$staff->user->name}}</td>
                                <td>{{$staff->user->email}}</td>
                                <td>{{$staff->user->phone}}</td>
                                <td>
                                    @if ($staff->role != null)
                                        {{ $staff->role->name }}
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-primary btn-sm btn-circle" href="{{route('staffs.edit', $staff->id)}}" title="@lang('Edit') ">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-circle btn-sm" href="{{route('staffs.destroy', $staff->id)}}" title="@lang('Delete')">
                                        <i class="las la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
