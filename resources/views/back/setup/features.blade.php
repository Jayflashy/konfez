@extends('back.layouts.master')
@section('title') @lang('Features Activation')  @endsection
@section('content')

<div class="page-title">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0">@lang('Features Activation')</h5>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6 text-center">@lang('HTTPS Activation')</h5>
            </div>
            <div class="card-body text-center">
                <label class="jdv-switch jdv-switch-primary mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'is_https')" @if(get_setting('is_https') == 1) checked @endif>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">@lang('Maintenance Mode')</h3>
            </div>
            <div class="card-body text-center">
                <label class="jdv-switch jdv-switch-info mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'is_maintenance')" @if(get_setting('is_maintenance') == 1) checked @endif>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">@lang('Accept New Posts')</h3>
            </div>
            <div class="card-body text-center">
                <label class="jdv-switch jdv-switch-success mb-0">
                    <input type="checkbox" onchange="updateSystem(this, 'publish_posts')" @if(sys_setting('publish_posts') == 1) checked @endif >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">@lang('Guest Post')</h3>
            </div>
            <div class="card-body text-center">
                <label class="jdv-switch jdv-switch-success mb-0">
                    <input type="checkbox" onchange="updateSystem(this, 'guest_post')" @if(sys_setting('guest_post') == 1) checked @endif >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">@lang('Guest Like')</h3>
            </div>
            <div class="card-body text-center">
                <label class="jdv-switch jdv-switch-success mb-0">
                    <input type="checkbox" onchange="updateSystem(this, 'guest_like')" @if(sys_setting('guest_like') == 1) checked @endif >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div> --}}
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">@lang('Guest Comment')</h3>
            </div>
            <div class="card-body text-center">
                <label class="jdv-switch jdv-switch-success mb-0">
                    <input type="checkbox" onchange="updateSystem(this, 'guest_comment')" @if(sys_setting('guest_comment') == 1) checked @endif >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">@lang('Anonymous Messages')</h3>
            </div>
            <div class="card-body text-center">
                <label class="jdv-switch jdv-switch-success mb-0">
                    <input type="checkbox" onchange="updateSystem(this, 'is_message')" @if(sys_setting('is_message') == 1) checked @endif >
                    <span class="slider round"></span>
                </label>
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
    function updateSystem(el, name){
        if($(el).is(':checked')){
            var value = 1;
        }
        else{
            var value = 0;
        }
        $.post('{{ route('sys_settings.update') }}', {_token:'{{ csrf_token() }}', name:name, value:value}, function(data){
            if(data == '1'){
                Snackbar.show({
                    text: '{{__('Settings Updated Successfully')}}',
                    backgroundColor: '#38c172'
                });
            }
            else{
                Snackbar.show({
                    text: '{{__('Something went wrong')}}',
                    backgroundColor: '#e3342f'
                });
            }
        });
    }
</script>

@stop