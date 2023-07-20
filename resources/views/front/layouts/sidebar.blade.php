<div class="mobile-menu-content">
    <div class="side-menu-overlay opacity-0" onclick="sideMenuClose()"></div>
    <div class="side-menu-wrap opacity-0">
        <div class="side-menu sidebar">  
            <div class="side-menu-close" onclick="sideMenuClose()">
                <i class="fa fa-close"></i>
            </div>
            @auth
                @include("front.layouts.sidenav")
            @else
            <div class="sidebar-content">
                <div class="widget-title">
                    <span>@lang('Menu')</span>
                </div>
                <div class="sidebar-link">
                    <a href="{{route('index')}}" class="">
                        @lang('Home')
                    </a>
                    @if (sys_setting('publish_posts') == 1)
                    <a href="{{route('confess')}}" class="btn-outline-warning">
                        @lang('CONFESS')
                    </a>    
                    @endif                       
                    <a href="{{route('register')}}" class="">
                        @lang('Register')
                    </a> 
                    <a href="{{route('login')}}" class="">
                        @lang('Login')
                    </a>      
                </div>
                <div class="widget-title">
                    <span>@lang('Categories')</span>
                </div>
                <div class="sidebar-link">
                    @php $category = App\Models\Category::where('status',1)->limit(5)->get() @endphp
                    @foreach($category as $item)
                        <a class="" href="{{ url('page/'.$item->slug) }}">{{$item->name}}</a>                   
                    @endforeach                    
                </div>
                <div class="widget-title">
                    <span>@lang('Pages')</span>
                </div>
                <div class="sidebar-link">
                    @php $pages = App\Models\Page::limit(5)->get() @endphp
                    @foreach($pages as $item)
                        <a class="" href="{{ url('page/'.$item->slug) }}">{{$item->title}}</a>                   
                    @endforeach
                </div>
            </div>
            @endauth           
        </div>
    </div>
</div>