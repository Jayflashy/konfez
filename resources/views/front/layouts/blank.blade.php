<!DOCTYPE html>
@if (get_language()->rtl == 1)
<html dir="rtl" lang="{{ get_language()->code }}">
@else
<html lang="{{ get_language()->code }}">
@endif
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ getBaseURL() }}">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{get_setting('title')}}</title>
    {{-- Meta --}}
    @yield('meta')
    <!-- Styles -->
    <link href="{{ static_asset('css/vendors.css') }}" rel="stylesheet">
    @if (get_language()->rtl == 1)        
    <link href="{{ static_asset('css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ static_asset('css/styles.rtl.css') }}" rel="stylesheet">
    @else
    <link href="{{ static_asset('css/styles.css') }}" rel="stylesheet">
    @endif
    
    <!-- Favicon  -->
    <link rel="shortcut icon" href="{{ uploaded_asset(get_setting('favicon'))}}" />

    <script>
        var JDV = JDV || {};
    </script>

</head>
<body>
    <!-- Header Components -->
    <header class="header">
        <nav class="navbar navbar-expand-lg fixed-top" aria-label="Navivation Bar">
            <!-- Sidepanel -->
            <!-- End Sidepanel -->
            <div class="container">
                <div class="logo">
                    <!-- Image Logo -->
                    <a href="{{route('index')}}" class="logo">
                        <img src="{{uploaded_asset(get_setting('logo') )}}" alt="" height="40" class="logo-small">
                        <img src="{{uploaded_asset(get_setting('logo') )}}" alt="" height="40" class="logo-large">
                    </a>                    
                </div>
                <!-- End Logo container-->                    
                <div class="nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <span class="btn btn-circle btn-light"> <i class="la la-user la-1x"></i></span>                 
                    </a>
                    <div class="dropdown-menu dropstart profile-dropdown" aria-labelledby="profileDropdown">
                        @guest
                            <a class="dropdown-item" href="{{route('register')}}"> @lang('Register')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('login')}}"> @lang('Login')</a>
                        @endguest
                        @auth
                            <span class="dropdown-item text-info">@lang('Welcome') {{Auth::user()->username}}</span>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('user.dashboard')}}"> @lang('Dashboard')</a>
                            <a class="dropdown-item" href="{{route('user.profile')}}"> @lang('Edit Profile')</a>
                            <a class="dropdown-item" href="{{route('user.messages')}}"> @lang('Messages')</a>
                            @if(Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'staff')
                            <a class="dropdown-item" href="{{route('admin.index')}}"> @lang('Admin Panel')</a>
                            @endif
                            <a class="dropdown-item" href="{{route('logout')}}"> @lang('Logout')</a>
                        @endauth
                    </div>                    
                </div> 
            </div>
        </nav>
    </header> 
    {{--End Header --}}
    <div class="page-wrap">       
        <div class="page-content container"> 
            <div class="justify-content-center">
                @yield('content')
            </div>            
        </div>
        {{-- footer --}}
        @include('front.layouts.footer')  
        {{-- footer --}}
    </div>

    <!-- SCRIPTS -->
    
    <script src="{{ static_asset('js/vendors.js') }}"></script>
    <script src="{{ static_asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ static_asset('js/core.js') }}"></script>
    
    @yield('scripts')
    <script type="text/javascript"> 
        
        @if(Session::get('success'))
        Snackbar.show({
            text: '{{Session::get('success')}}',
            backgroundColor: '#38c172'
        });
        @endif
        @if(Session::get('error'))
        Snackbar.show({
            text: '{{Session::get('error')}}',
            backgroundColor: '#e3342f'
        });
        @endif
    </script>
</body>
</html>