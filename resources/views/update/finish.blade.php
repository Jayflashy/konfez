@extends('back.layouts.master')
@section('title')Update  @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h3">{{ __('Congratulations') }}</h1>
                    <p>
                        {{ __('You have successfully completed the updating process. Please disable maintainance mode') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
