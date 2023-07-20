@extends('back.layouts.blank')
@section('title') @lang('Admin Login') @endsection
@section('content')
<div class="col-lg-7 col-xl-6 mx-auto">
    <div class="card shadow-lg">
        <div class="card-header">
            <h5 class="text-muted fw-bold mb-0">Welcome back! Log in to your account</h5>
        </div>
        <div class="card-body p-4 pt-2">
            @include('alerts.alerts')
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="" >
                @csrf
                
                <div class="form-group">
                    <label class="form-label" for="email">@lang('Email Address')</label>
                    <input id="email" type="email" placeholder="{{__('Email Address')}}" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="invalid-feedback">
                        @lang('Email is invalid')
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">@lang('Password')</label>
                    <input id="password" type="password" placeholder="{{__('Password')}}" class="form-control" name="password" required>
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
                    <button type="submit" class="btn btn-primary w-100">
                        @lang('Login')	
                    </button>
                </div>
            </form>
            <div class="py-3 text-center"> @lang('Dont have an account?') <a href="{{ route('register') }}" class="fw-bold">@lang('Register')</a>
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
