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

    <!-- Styles -->
    <link href="{{ static_asset('css/vendors.css') }}" rel="stylesheet">
    @if (get_language()->rtl == 1)        
    <link href="{{ static_asset('css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ static_asset('css/style.rtl.css') }}" rel="stylesheet">
    @else
    <link href="{{ static_asset('css/style.css') }}" rel="stylesheet">
    @endif
    
    <!-- Favicon  -->
    <link rel="shortcut icon" href="{{ uploaded_asset(get_setting('favicon'))}}" />

    <script>
        var JDV = JDV || {};
    </script>

</head>
<body>
    <div class="wrapper">
        <div class="content-wraps">
            {{-- Start Topnav --}}
            <div class="nav-topbar">
                <div class="d-flex py-3">
                    <div class="topbar-item">
                        <div class="d-flex align-items-center">
                            <a href="{{route('index')}}" >
                                <img src="{{uploaded_asset(get_setting('logo'))}}" alt="" class="blank-logo">
                            </a>
                        </div>
                    </div>
                    <div class="topbar-item">
                        <div class="d-flex align-items-center">
                            <a class="nav-item" href="{{route('index')}}" >
                                {{get_setting('title')}}
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            {{-- Stop Topnav --}}
            <div class="main-container">
                <div class="container">
                    <div class="row justify-content-center">
                        @yield('content')
                    </div>
                </div>               
            </div>
            {{-- Footer --}}
            <footer class="footer">
                <p> &copy; {{get_setting('title')}}. <span class="float-end">V {{sys_setting('version')}}</span> </p>
             </footer>
        </div>        
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