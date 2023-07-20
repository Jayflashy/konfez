@extends('back.layouts.master')
@section('title')@lang('Categories') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Categories')</h5>
            <a class="btn btn-primary btn-sm" href="" data-bs-toggle="modal" data-bs-target="#create_modal"><i class="fas fa-plus"></i> @lang('Add') </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered " id="datatable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('Name')</th>
                        <th>@lang('About')</th>
                        <th>@lang('Slug')</th>
                        <th>@lang('Posts')</th>
                        <th>@lang('Actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key=> $item)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td class="fw-bold"> {{ Str::limit($item->name, 40) }} </td>
                        <td>{{ $item->about }} </td>
                        <td>{{$item->slug }} </td>
                        <td>{{$item->post->count() }} </td>
                        <td class="actions">                          
                            <a class="btn btn-primary btn-sm btn-circle" href="{{route('category.edit', $item->id)}}" title="@lang('Edit')">
                                <i class="las la-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-circle btn-sm" href="{{route('category.delete', $item->id)}}" title="@lang('Delete')">
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
<div class="modal fade" id="create_modal" tabindex="0" role="dialog">
    <div class="modal-dialog modal-dialog-centered" id="modal-size" role="document">
        <div class="modal-content position-relative">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Create Category')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>            
            <form class="" action="{{ route('category.create') }}" method="post">
                @csrf                                 
                <div class="modal-body px-3 pt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>@lang('Name') </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control mb-3" name="name" placeholder="@lang('name')" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>@lang('Description') </label>
                        </div>
                        <div class="col-md-9">
                            <textarea name="about" rows="5" class="form-control mb-3" required></textarea>
                          
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">@lang("Create")</button>
                </div>
            </form>           
        </div>
    </div>
</div> 

@endsection
