@extends('front.layouts.master')
@section('title'){{ __('Reset Password') }} @endsection
@section('content')
<div class="row justify-content-sm-center">
    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
        <div class="card shadow-lg">
            <div class="card-header">
                <h3 class="fw-bold mb-0">@lang('Reset Password')</h3>
            </div>
            <div class="card-body p-4 pt-2">
                @include('alerts.alerts')
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate="" >
                    @csrf                    
                    <div class="form-group">
                        <label class="form-label" for="email">@lang('Email Address')</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="invalid-feedback">
                            @lang('Email is invalid')
                        </div>
                    </div>
                    
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary btn-block">
                            @lang('Send Link')	
                        </button>
                    </div>
                </form>
                <div class="py-3 text-center"> @lang('Already have an account?') <a href="{{ route('login') }}" class="fw-bold">@lang('Login')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection