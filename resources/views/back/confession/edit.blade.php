@extends('back.layouts.master')
@section('title') @lang('Edit Post')  @endsection
@section('content')
<div class="col-lg-8">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Edit Post')</h5>
        </div>
    </div>
    <div class="card">    
        <div class="card-body">
            @include('alerts.alerts')
            <form class="" action="{{route('confessions.update', $confession->id)}}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="" class="form-label">@lang('Title')</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="title" value="{{$confession->title}}" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="" class="form-label">@lang('Content')</label>
                    </div>
                    <div class="col-md-9">
                        <textarea name="content" class="form-control" rows="4">{{$confession->content}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="" class="form-label">@lang('Status')</label>
                    </div>
                    <div class="col-md-9">
                        <div class="col-sm-9 span-group" data-toggle="buttons">
                            <label class="btn btn-outline-primary @if($confession->status == 1) active @endif">
                                <input type="radio" name="status" value="1" class="form-selectgroup-input" @if($confession->status == 1) checked @endif>
                                @lang('active')
                            </label>
                            <label class="btn btn-outline-warning  @if($confession->status  != 1) active @endif">
                                <input type="radio" name="status" value="2" class="form-selectgroup-input" @if($confession->status  != 1) checked @endif>
                                @lang('pending')
                            </label>
                        </div> 
                    </div>
                </div>                
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="" class="form-label">@lang('Category')</label>
                    </div>
                    <div class="col-md-9">
                        <div class="col-sm-9 span-group" data-toggle="buttons">
                            @foreach ($categories as $category)
                            <label class="btn btn-outline-info {{ $confession->category()->first()->id == $category->id ? 'active' : '' }}">
                                <input type="radio" name="category_id" value="{{ $category->id }}" class="form-selectgroup-input" {{ $confession->category()->first()->id == $category->id ? 'checked' : '' }}>
                               {{ $category->name }}
                            </label>
                            @endforeach
                        </div> 
                    </div>
                </div>

                <div class="form-group mb-0 text-end">
                    <button class="btn btn-primary" type="submit">@lang('Update')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop