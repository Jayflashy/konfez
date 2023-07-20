@extends('back.layouts.master')
@section('title') @lang('Maintenance') @endsection
@section('content')
<div class="page-title">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0">@lang('Maintenance Mode')</h5>
    </div>
</div>

<div class="card"> 
    <div class="card-body">
       <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">
           @csrf
            <div class="form-group">
               <label for="" class="form-label">@lang('Maintenance Mode')</label>
                <label class="jdv-switch jdv-switch-info mb-0 form-switch">
                    <input type="checkbox" onchange="updateSettings(this, 'is_maintenance')" @if(get_setting('is_maintenance') == 1) checked @endif>
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="form-group">
                <label for="" class="form-label">@lang('Maintenance Text')</label>
                <textarea class="form-control" name="maintenance_text" rows="3">{{get_setting('maintenance_text')}}</textarea>
            </div>
            <div class="form-group mb-0 text-end">
                <button type="submit" class="btn btn-primary ">@lang('Save')</button>
            </div>
       </form>
    </div>
</div>
    
@endsection
@section('scripts') 
<script type="text/javascript">
    function updateSettings(el, name){
        if($(el).is(':checked')){
            var value = 1;
        }
        else{
            var value = 0;
        }
        $.post('{{ route('features.update') }}', {_token:'{{ csrf_token() }}', name:name, value:value}, function(data){
            if(data == '1'){
                Snackbar.show({
                    text: '@lang('Settings Updated Successfully')',
                    backgroundColor: '#38c172'
                });
            }
            else{
                Snackbar.show({
                    text: '@lang('Something went wrong')',
                    backgroundColor: '#e3342f'
                });
            }
        });
    }
</script>
@stop