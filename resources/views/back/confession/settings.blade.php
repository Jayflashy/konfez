@extends('back.layouts.master')
@section('title') @lang('Post Settings')  @endsection
@section('content')
<div class="mx-auto">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Post Settings') </h5>
        </div>
    </div>
    <div class="row">        
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6 text-center">@lang('Admin Approve Posts')</h3>
                </div>
                <div class="card-body text-center">
                    <label class="jdv-switch jdv-switch-success mb-0">
                        <input type="checkbox" onchange="updateSystem(this, 'approve_posts')" @if(sys_setting('approve_posts') == 1) checked @endif >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6 text-center">@lang('Admin Approve Comments')</h3>
                </div>
                <div class="card-body text-center">
                    <label class="jdv-switch jdv-switch-success mb-0">
                        <input type="checkbox" onchange="updateSystem(this, 'approve_comments')" @if(sys_setting('approve_comments') == 1) checked @endif >
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
                    <h3 class="mb-0 h6 text-center">@lang('Accept Comments')</h3>
                </div>
                <div class="card-body text-center">
                    <label class="jdv-switch jdv-switch-success mb-0">
                        <input type="checkbox" onchange="updateSystem(this, 'publish_comments')" @if(sys_setting('publish_comments') == 1) checked @endif >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
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
        </div>
    </div>
    <div class="card">
        @include('alerts.alerts')
        <div class="card-body">
            <form class="row" action="{{route('store_settings.update')}}" method="post" enctype="multipart/form-data">
                @csrf      
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="max_post_title">
                    <label class="form-label col-sm-3">@lang('Maximum Post Title')</label>
                    <div class="col-sm-6">
                        <input type="number"class="form-control" name="max_post_title" placeholder="@lang('Maximum Post Title')" value="{{sys_setting('max_post_title')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="minimum_post">
                    <label class="form-label col-sm-3">@lang('Minimum Post Text')</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="minimum_post" placeholder="@lang('Minimum Post Text')" value="{{sys_setting('minimum_post')}}" required>
                    </div>
                </div>      
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="max_post">
                    <label class="form-label col-sm-3">@lang('Maximum Post Text')</label>
                    <div class="col-sm-6">
                        <input type="number"class="form-control" name="max_post" placeholder="@lang('Maximum Post Text')" value="{{sys_setting('max_post')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="minimum_comment">
                    <label class="form-label col-sm-3">@lang('Minimum Comment Text')</label>
                    <div class="col-sm-6">
                        <input type="number"class="form-control" name="minimum_comment" placeholder="@lang('Minimum Comment Text')" value="{{sys_setting('minimum_comment')}}" required>
                    </div>
                </div>      
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="max_comment">
                    <label class="form-label col-sm-3">@lang('Maximum Comment Text')</label>
                    <div class="col-sm-6">
                        <input type="number"class="form-control" name="max_comment" placeholder="@lang('Maximum Comment Text')" value="{{sys_setting('max_comment')}}" required>
                    </div>
                </div>    
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="max_message">
                    <label class="form-label col-sm-3">@lang('Maximum Message Text')</label>
                    <div class="col-sm-6">
                        <input type="number"class="form-control" name="max_message" placeholder="@lang('Maximum Message Text')" value="{{sys_setting('max_message')}}" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="message_footer">
                    <label class="form-label col-sm-3">@lang('Message Footer')</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="tiny2" name="message_footer" placeholder="@lang('Message Footer')"> {{sys_setting('message_footer')}}</textarea>
                    </div>
                </div>

                <div class="text-end">                    
                    <button class="btn btn-primary" type="submit">@lang('Update')</button>                            
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>        
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

<!--Wysiwig js-->
<script src="{{ static_asset('tinymce/tinymce.min.js') }}"></script>
<script src="{{static_asset('tinymce/tiny-init.js') }}"></script>
@endsection