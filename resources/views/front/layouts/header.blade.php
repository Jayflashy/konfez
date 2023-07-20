<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top" aria-label="Navivation Bar">
        <!-- Sidepanel -->
        @include('front.layouts.sidebar')
        <!-- End Sidepanel -->
        <div class="container-xxl">
            <div class="logo">
                <!-- Image Logo -->
                <a href="{{route('index')}}" class="logo">
                    <img src="{{uploaded_asset(get_setting('logo') )}}" alt="" height="40" class="logo-small">
                    <img src="{{uploaded_asset(get_setting('logo') )}}" alt="" height="40" class="logo-large">
                </a>                    
            </div>
            <!-- End Logo container--> 
            {{-- Search Icon --}}
            <div class="search-icon dropdown">
                <span class=""  data-bs-toggle="dropdown" id="searchDropdown" type="button">
                    <i class="fas fa-search"></i>
                </span>
                <div class="dropdown-menu search-dropdown" id="searchDropdown">
                    <form action="{{route('search')}}" method="get">
                        <input class="form-control" placeholder="@lang('Search...')" type="search" name="search" id="">
                        <div class="text-end">
                            <button class="btn btn-primary" type="submit">@lang('Search')</button>
                        </div>                        
                    </form>
                </div>  
            </div>
            <div class="search-box">
                <form action="{{route('search')}}" method="get">
                    <input class="search-form" type="search" name="search" id="" placeholder="@lang('Search...')">
                </form>
            </div>
            {{-- End Search Icon --}}
            <div class="collapse navbar-collapse" id="siteNav">
                <ul class="navbar-nav ms-auto main-menu">
                    <li class="nav-item">
                        <a href="{{route('index')}}">@lang('Home')</a>
                    </li>                      
                    <li class="nav-item">
                        <a class="hl" href="{{route('trending')}}">@lang('Trending')</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="hl" href="javascript:void(0);" data-bs-toggle="dropdown" >@lang('Categories')<i class="la la-plus"></i></a>
                        <ul class="dropdown-menu h-dp">
                        @php $category = App\Models\Category::where('status',1)->limit(10)->get() @endphp
                        @forelse($category as $item)
                            <a class="hl" href="{{ url('category/'.$item->slug) }}">{{$item->name}}</a>
                        @empty
                            {{__('No Category')}}
                        @endforelse
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="hl" href="javascript:void(0);" data-bs-toggle="dropdown" >@lang('Pages')<i class="la la-plus"></i></a>
                        <ul class="dropdown-menu h-dp">
                        @php $pages = App\Models\Page::limit(5)->get() @endphp
                        @forelse($pages as $item)
                            <a class="hl" href="{{ url('page/'.$item->slug) }}">{{$item->title}}</a>
                        @empty
                            {{__('No Page')}}
                        @endforelse
                        </ul>
                    </li>
                    @if (sys_setting('publish_posts') == 1)
                    <li class="nav-item">
                        <a class="hl btn-outline-warning btn" href="{{route('confess')}}" >@lang('CONFESS')</a>
                    </li>
                    @endif
                    @auth
                    <li class="nav-item">
                        <a class="hl" href="{{route('user.dashboard')}}" >@lang('Dashboard')</a>
                    </li>
                    @endauth        
                </ul>
                <div class="dropdown-divider"> </div>
            </div>
            {{-- Nav Profile --}}
            <div class="nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#"  type="button" id="dropdownRightMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="btn btn-circle btn-light"> <i class="la la-user la-1x"></i></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownRightMenuButton">
                    @guest
                    <a class="dropdown-item" href="{{route('register')}}"> @lang('Register')</a>
                        <hr class="dropdown-divider">
                    <a class="dropdown-item" href="{{route('login')}}"> @lang('Login')</a>
                    @else
                    <span class="dropdown-item text-info">@lang('Welcome') {{Auth::user()->username}}</span>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('user.dashboard')}}"> @lang('Dashboard')</a>
                    <a class="dropdown-item" href="{{route('user.profile')}}"> @lang('Edit Profile')</a>
                    <a class="dropdown-item" href="{{route('user.messages')}}"> @lang('Messages')</a>
                    @if(Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'staff')
                    <a class="dropdown-item" href="{{route('admin.index')}}"> @lang('Admin Panel')</a>
                    @endif
                    <a class="dropdown-item" href="{{route('logout')}}"> @lang('Logout')</a>
                    @endguest                  
                </ul>
              </div>
            <div class="d-lg-none mb-2">
                <button class="mobile-toggler" onclick="sideMenuOpen(this)">
                    <span></span>
                </button>
            </div>
        </div>
    </nav>
</header> 