@extends('front.layouts.master')
@section('title')@lang('Login') @endsection
@section('content')
<div class="row justify-content-sm-center">
    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
        <div class="card shadow-lg">
            <div class="card-header">
                <h3 class="fw-bold mb-0">@lang('Login')</h3>
            </div>
            <div class="card-body p-4 pt-2">
                @include('alerts.alerts')
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="" >
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label" for="email">@lang('Email Address')</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="invalid-feedback">
                            @lang('Email is invalid')
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">@lang('Password')</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        <div class="invalid-feedback">
                            @lang('Password is required')
                        </div>
                    </div>
                    
                    <div class="my-3 d-flex justify-content-between">
                        <div class="form-check">
                            <label class="form-check-label ">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                @lang('Remember me')
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="">@lang('Forgot your password?')</a>
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary btn-block">
                            @lang('Login')	
                        </button>
                    </div>
                </form>
                <div class="py-3 text-center"> @lang('Dont have an account?') <a href="{{ route('register') }}" class="fw-bold">@lang('Register')</a>
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