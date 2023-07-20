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
            @lang('Make Confession')
        </a>
        @endif   
        <a href="{{route('user.dashboard')}}" class="">
            @lang('Dashboard')
        </a>    
    </div>
    <div class="widget-title">
        <span>@lang('Posts')</span>
    </div>
    <div class="sidebar-link">
        <a class="" href="{{ route('user.messages') }}">@lang('Messages')</a> 
        <a class="" href="{{ route('user.posts') }}">@lang('Confessions')</a> 
        <a class="" href="{{ route('user.comments') }}">@lang('Comments')</a> 
    </div>
    <div class="widget-title">
        <span>@lang('Profile')</span>
    </div>
    <div class="sidebar-link">
        <a class="" href="{{ route('user.profile') }}">@lang('Edit Profile')</a> 
        <a class="" href="{{ route('logout') }}">@lang('Logout')</a> 
    </div>
</div>  