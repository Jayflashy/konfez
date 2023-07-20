@extends('back.layouts.master')
@section('title') @lang('Languages')  @endsection
@section('content')

<div class="page-title">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0">@lang('Languages')</h5>
        <a class="btn btn-primary btn-sm" href="{{route('language.create')}}"><i class="las la-plus"></i> @lang('Add') </a>
    </div>
</div>
<div class="card">    
    <div class="card-body table-responsive">
        <table class="table table-bordered" id="datatable">
            <thead>
                <tr>
                    <th>@lang('Name') </th>
                    <th>@lang('Code') </th>
                    <th>@lang('Direction') </th>
                    <th>@lang('Default') </th>
                    <th>@lang('Actions') </th>
                </tr>
            </thead>
            <tbody>
                @foreach($languages as $item)
                <tr>
                    <td> {{ $item->name }} </td>
                    <td> {{ $item->code }} </td>
                    <td> @if ($item->rtl == 0) @lang('LTR') @else @lang('RTL') @endif </td>
                    <td>
                        @if ( $item->is_default == 1)
                        <span class="btn btn-success btn-sm">@lang('Default') </span>
                        @else
                            <a class="btn btn-primary btn-sm" href="{{ route('language.status',[$item->id,1]) }}">@lang('Set default')</a>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-primary btn-circle btn-sm" href="{{ route('language.edit', $item->id) }}" title="@lang('Edit')"><i class="las la-edit"></i></a>
                            <a class="btn btn-success btn-circle btn-sm" href="{{ route('language.translate', $item->id) }}" title="@lang('Translate') "><i class="las la-code"></i></a>
                            @if ( $item->is_default != 1)
                                <a class="btn btn-danger btn-circle btn-sm" href="{{ route('language.destroy', $item->id) }}" title="@lang('Delete') "><i class="las la-trash"></i></a>
                            @endif

                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@stop