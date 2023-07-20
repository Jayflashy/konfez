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
    <style>
        :root{
            --primary: {{ get_setting('primary_color', '#25d06f') }};
        }
    </style>

@if (get_setting('is_analytics') == 1)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ get_setting('google_analytics_id') }}"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ get_setting('google_analytics_id') }}');
    </script>
@endif
@if (get_setting('is_adsense') == 1)
    <!-- Google Adsense -->
    {{get_setting('google_adsense')}}
@endif
@if (get_setting('is_facebook_pixel') == 1)
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ get_setting('facebook_pixel') }}');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ get_setting('facebook_pixel') }}&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
@endif

</head>
<body>
    <!-- Header Components -->
    @include('front.layouts.header')  
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