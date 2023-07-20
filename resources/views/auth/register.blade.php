@extends('front.layouts.master')
@section('title')@lang('Register') @endsection
@section('content')
<div class="row justify-content-sm-center h-100">
    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
        <div class="card shadow-lg">
            <div class="card-header">
                <h3 class="fw-bold mb-0">@lang('Register')</h3>
            </div>
            <div class="card-body p-4 pt-2">
                @include('alerts.alerts')
                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="" >
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">@lang('Name')</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <div class="invalid-feedback">
                            @lang('Name is required')	
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">@lang('Email Address')</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="invalid-feedback">
                            @lang('Email is invalid')
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="name">@lang('Username')</label>
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        <div class="invalid-feedback">
                            @lang('Username is required')	
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">@lang('Password')</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        <div class="invalid-feedback">
                            @lang('Password is required')
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-check-input me-2" type="checkbox" required />
                        <label class="custom-control-label smalls text-muted" for="checkbox">@lang('You agree with our terms and condition').</label>
                        <div class="invalid-feedback">
                            @lang('This is required')
                        </div>
                    </div>
                    
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary btn-block">
                            @lang('Register')	
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