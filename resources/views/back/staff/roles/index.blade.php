@extends('back.layouts.master')
@section('title')@lang('Roles') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('All Roles') </h5>
            <a class="btn btn-primary btn-sm" href="{{route('roles.create')}}"><i class="fas fa-plus"></i> @lang('Create Role') </a>
        </div>
        @include('alerts.alerts')
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th>@lang('Name')</th>
                        <th width="15%">@lang('Actions')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($roles as $key => $role)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{$role->name}}</td>
                            <td class="text-right">
                                <a class="btn btn-primary btn-sm btn-circle" href="{{route('roles.edit', $role->id)}}" title="@lang('Edit')">
                                    <i class="las la-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-circle btn-sm" href="{{route('roles.destroy', $role->id)}}" title="@lang('Delete')">
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
