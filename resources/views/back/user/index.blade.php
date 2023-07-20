@extends('back.layouts.master')
@section('title') @lang('Users') @endsection
@section('content')
<div class="page-title">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0">@lang('Users') </h5>
        
    </div>
</div>

<div class="card"> 
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover" id="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('Name') </th>
                    <th>@lang('Email Address') </th>
                    <th>@lang('Username') </th>
                    <th>@lang('Role') </th>
                    <th>@lang('Actions') </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $item)
                <tr>
                    <td>{{ $key +1 }}</td>
                    <td>
                        {{ Str::limit($item->name, 25) }}
                    </td>                    
                    <td>{{$item->email }}</td>
                    <td>{{$item->username }}</td>
                    <td> <span class="btn badge bg-info"> {{ $item->user_role }} </span> </td>
                    
                    <td>
                        <div class="dropstart">
                            <button class="btn btn-light" type="button" id="" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('users.edit' ,$item->id )}}">@lang('Edit')</a>                               
                                <a class="dropdown-item" href="{{route('users.delete' ,$item->id )}}">@lang('Delete')</a>
                            </div>
                        </div>
                    </td>
                </tr>                    
                @endforeach
            </tbody>            
        </table>
        
    </div>
</div>
    
@endsection
@section('scripts') 

@stop