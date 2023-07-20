@extends('back.layouts.master')
@section('title') @lang('Translate Language')  @endsection
@section('content')

<div class="page-title">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0">{{ $language->name}} @lang('Translation keys')</h5>
        <a class="btn btn-primary btn-sm" href="{{route('language.index')}}"> @lang('Back') </a>
    </div>
</div>
<div class="card">    
    <div class="card-header">
        <div class="search-d">
            <input type="text" id="searchKeys" class="form-search w-sm-85" placeholder="@lang('Search')...">
        </div>
        <a class="btn btn-primary btn-sm"type="button" data-bs-toggle="modal" data-bs-target="#addModal" href="#"><i class="fas fa-plus"></i> @lang('Add Key') </a>
    </div>
    <div class="card-body table-responsive">
        @include('alerts.alerts')
        <table class="table table-bordered" id="">
            <thead>
                <tr>
                    <th>@lang('Key') </th>
                    <th>{{$language->name }}</th>
                    <th width="5%">@lang('Actions') </th>
                </tr>
            </thead>
            <tbody id="searchTables">
                @foreach ($json as $key => $item)
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{$item}}</td>
                        <td class="actions">
                            <a data-bs-target="#editModal" data-bs-toggle="modal" data-title="{{$key}}" data-key="{{$key}}" data-value="{{$item}}" class="btn btn-primary btn-circle btn-sm editModal" href="#" title="@lang('Edit') "><i class="las la-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- Add Modal --}}
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addlabel"> @lang('Add New Key')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('language.save_key', $language->id)}}" method="post">
            <div class="modal-body">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-2">
                        <label for="key" class="form-label">@lang('Key')</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" class="form-control " id="key" name="key" value="{{old('key')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-2">
                        <label for="key" class="form-label">@lang('Value')</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" class="form-control " id="value" name="value" value="{{old('value')}}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm"> @lang('Save')</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
            </div>
        </form>
      </div>
    </div>
</div>
{{-- Edit Modal --}}
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addlabel"> @lang('Edit Key')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('language.edit_key', $language->id)}}" method="post">
            <div class="modal-body">
                @csrf
                <div class="form-group ">
                    <label for="inputName" class="form-label form-title"></label>

                    <input type="text" class="form-control" name="value" placeholder="@lang('Value')" value="">

                </div>
                <input type="hidden" name="key">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm"> @lang('Update')</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
            </div>
        </form>
      </div>
    </div>
</div>
@stop
@section('scripts')
<script>
    // translate key search
    $('#searchKeys').on('keyup', function(e) {
        if ('' != this.value) {
            var reg = new RegExp(this.value, 'i'); // case-insesitive

            $('#searchTables').find('tr').each(function() {
                var $me = $(this);
                if (!$me.children('td').text().match(reg)) {
                    $me.hide();
                } else {
                    $me.show();
                }
            });
        } else {
            $('#searchTables').find('tr').show();
        }
    });

    // Edit modal
    $('.editModal').on('click', function () {
        var modal = $('#editModal');
        modal.find('.form-title').text($(this).data('title'));
        modal.find('input[name=key]').val($(this).data('key'));
        modal.find('input[name=value]').val($(this).data('value'));
    });
</script> 
@endsection