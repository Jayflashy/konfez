@extends('back.layouts.master')
@section('title') @lang('Google Settings') @endsection
@section('content')
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Google Settings') </h5>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card"> 
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="form-label">@lang('Google Analytics')</label>
                        </div>
                        <div class="col-md-8">
                            <label class="jdv-switch jdv-switch-success mb-0">
                                <input type="checkbox" onchange="updateSettings(this, 'is_analytics')" @if(get_setting('is_analytics') == 1) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="form-label">@lang('Tracking ID')</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="google_analytics_id" required value="{{  get_setting('google_analytics_id') }}">
                        </div>
                    </div>
                    <div class="form-group mb-0 text-end">
                        <button type="submit" class="btn btn-sm btn-primary">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card"> 
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="form-label">@lang('Google Adsense')</label>
                        </div>
                        <div class="col-md-8">
                            <label class="jdv-switch jdv-switch-success mb-0">
                                <input type="checkbox" onchange="updateSettings(this, 'is_adsense')" @if(get_setting('is_adsense') == 1) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="form-label">@lang('Adsense Code')</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="google_adsense" required rows="3"> {{  get_setting('google_adsense') }} </textarea>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-end">
                        <button type="submit" class="btn btn-sm btn-primary">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
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
                    text: '@lang('Settings updated successfully')',
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