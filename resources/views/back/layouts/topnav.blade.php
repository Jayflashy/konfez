<div class="nav-topbar">
    <div class="d-flex">
        <div class="nav-topbar-toggler" >
            <button class="mobile-toggler" data-toggle="side-nav" id="side-nav">
                <span></span>
            </button>
            <button class="mobile-toggler " data-toggle="mobile-nav" id="mobile-nav">
                <span></span>
            </button>
        </div>
    </div>
    <div class="d-flex py-3">
        <div class="mobile-logo" >
            <a href="{{url('/')}}">  
                <img src="{{uploaded_asset(get_setting('logo'))}}" alt="" class="nav-logo">
            </a>
        </div>
    </div>
    
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
        <div class="topbar-item">
            <div class="d-flex align-items-center">
                <a class="btn btn-icon btn-circle btn-light" href="{{route('index')}}" target="_blank" title="Browse Website">
                    <i class="las la-globe"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex nav-toolbar">
        {{-- Set language --}}
        @php
            if(Session::has('locale')){ $locale = Session::get('locale', Config::get('app.locale')); } else{ $locale = env('DEFAULT_LANGUAGE'); }
            $deflang = App\Models\Language::where('code', $locale)->first()->name;
        @endphp
        <div class="topbar-item">
            <div class="d-flex align-items-center">
                <a class="btn btn-lang" href="javascript:void(0);" data-bs-toggle="dropdown" id="langDropdown">
                    <img src="{{ static_asset('img/flags/'.$locale.'.png') }}" height="11"> <span> {{$deflang}}</span> 
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="langDropdown">
                    @foreach (\App\Models\Language::all() as $key => $language)
                        <a class="dropdown-item" href="{{route('language.change',$language->code)}}">
                            <img src="{{ static_asset('img/flags/'.$language->code.'.png') }}" height="11"> <span> {{$language->name}}</span> 
                        </a>
                    @endforeach
                    
                </div> 
            </div>
        </div>
        {{-- ADMIN NAV --}}
        <div class="topbar-item">
            <div class="d-flex align-items-center">
                <a class="btn btn-nav btn-circle btn-light" href="javascript:void(0);" data-bs-toggle="dropdown" id="profileDropdown">
                    <i class="la la-user la-1x"></i>
                </a>
                <div class="dropdown-menu profile-dropdown " aria-labelledby="profileDropdown">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('admin.profile')}}"><i class="fa fa-account-circle"></i>@lang('Edit Profile')</a>
                    <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-logout"></i> @lang('Logout')</a>
                </div>   
            </div>
        </div>
    </div>
</div>