<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ getBaseURL() }}">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Konfez </title>
    
    <!-- Styles -->
    <link href="{{ static_asset('css/vendors.css') }}" rel="stylesheet">
    <link href="{{ static_asset('css/styles.css') }}" rel="stylesheet">
    <style>
        .logo-img{
            height: 50px;
        }
    </style>
    <script>
        var JDV = JDV || {};
    </script>

</head>
<body class="pt-4 bg-secondary">    
    <div class="page-wrap">       
        <div class="page-content container-xxl"> 
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-7 col-md-9 col-sm-10">
                    <div class="pb-4 text-center">
                        <a href="{{url('/')}}">
                            <img class="logo-img" src="{{ url('public/uploads/logo.png') }}" alt="logo">
                        </a>  
                    </div>
                    @yield('content')
                </div>
            </div>            
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