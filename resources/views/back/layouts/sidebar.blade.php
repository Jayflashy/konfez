<div class="sidebar-wrap">
    <div class="sidebar-nav c-scrollbar">
        <div class="side-nav-logo">
            <a href="">
                <img src="{{uploaded_asset(get_setting('logo') )}}" alt="" class="nav-logo"> 
            </a>
        </div>
        <div class="side-nav-wrap">
            <div class="side-nav-content sidelinks">
                <a class="side-nav-link" href="{{route('admin.index')}}">
                    <i class="las la-home"></i> @lang('Dashboard')
                </a>
                {{-- Confessions --}}
                    @if(Auth::user()->user_role == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                        <a class="side-nav-link" href="{{route('confessions.index')}}">
                            <i class="las la-file-alt"></i> @lang('Posts')
                        </a>
                    @endif                    
                {{-- Categories --}}
                    @if(Auth::user()->user_role == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                    <a class="side-nav-link" href="{{route('category.index')}}">
                        <i class="fa fa-folder"></i> @lang('Categories')
                    </a>
                    @endif
                {{-- Comments --}}
                    @if(Auth::user()->user_role == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
                        <a class="side-nav-link" href="{{route('comments.index')}}">
                            <i class="las la-comment"></i> @lang('Comments')
                        </a>
                    @endif
                {{-- Messages --}}
                    @if(Auth::user()->user_role == 'admin' || in_array('4', json_decode(Auth::user()->staff->role->permissions)))
                        @if(sys_setting('is_message') == 1)    
                            <a class="side-nav-link" href="{{route('messages.index')}}">
                                <i class="fa fa-message"></i> @lang('Messages')
                            </a>
                        @endif
                    @endif
                {{-- Post Settings --}}
                    @if(Auth::user()->user_role == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                        <a class="side-nav-link" href="{{route('confessions.settings')}}">
                            <i class="fas fa-cog"></i> @lang('Post Settings')
                        </a>
                    @endif
                {{-- Users --}}
                    @if(Auth::user()->user_role == 'admin' || in_array('5', json_decode(Auth::user()->staff->role->permissions)))
                        <a class="side-nav-link" href="{{route('users.index')}}">
                            <i class="las la-user-friends"></i> @lang('Users')
                        </a>
                    @endif
                {{-- Promotion --}}
                    @if(Auth::user()->user_role == 'admin' || in_array('6', json_decode(Auth::user()->staff->role->permissions)))
                        <a class="side-nav-link has-sub" href="#"> 
                            <i class="fa fa-bullhorn"></i> @lang('Promotion')
                            <span class="side-nav-arrow"></span>
                        </a>
                        <div class="collapse submenu">
                            {{-- <a class="sublink" href="{{route('advertising.index')}}">@lang('Advertisment')</a> --}}
                            <a class="sublink" href="{{route('newsletter.index')}}">@lang('Newsletter')</a>
                        </div>
                    @endif
                {{-- Pages --}}
                    @if(Auth::user()->user_role == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                        <a class="side-nav-link" href="{{route('pages.index')}}">
                            <i class="las la-file"></i> @lang('Pages')
                        </a>
                    @endif
                {{-- Settings --}}
                    @if(Auth::user()->user_role == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions)))
                        <a class="side-nav-link has-sub" href="#"> 
                            <i class="las la-cog"></i> @lang('Settings') 
                            <span class="side-nav-arrow"></span>
                        </a>
                        <div class="collapse submenu">
                            <a class="sublink" href="{{route('settings.index')}}"> @lang('General Settings') </a>
                            <a class="sublink" href="{{route('features.index')}}"> @lang('Features Activation')</a>
                            <a class="sublink" href="{{route('language.index')}}"> @lang('Languages') </a>
                            <a class="sublink" href="{{route('smtp.index')}}"> @lang('Smtp Settings') </a>
                            <a class="sublink" href="{{route('google_settings.index')}}"> @lang('Google') </a>
                            <a class="sublink" href="{{route('facebook.index')}}"> @lang('Facebook') </a>
                        </div>
                    @endif
                {{-- Staffs --}}
                    @if(Auth::user()->user_role == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions)))
                        <a class="side-nav-link has-sub" href="#">
                            <i class="las la-user-alt"></i>@lang('Staffs')                 
                            <span class="side-nav-arrow"></span>
                        </a>
                        <div class="collapse submenu">
                            <a class="sublink" href="{{route('staffs.index')}}">@lang('Staffs')</a>
                            <a class="sublink" href="{{route('roles.index')}}">@lang('Staff Roles')</a>
                        </div>
                    @endif
                {{-- System --}}
                    @if(Auth::user()->user_role == 'admin' || in_array('10', json_decode(Auth::user()->staff->role->permissions)))
                        <a class="side-nav-link has-sub" href="javascript:void(0);"> 
                            <i class="las la-server"></i> @lang('System')
                            <span class="side-nav-arrow"></span>
                        </a>
                        <div class="collapse submenu">
                            <a class="sublink" href="{{route('maintenance')}}">@lang('Maintenance Mode')</a>
                            <a class="sublink" href="{{route('system.update')}}">@lang('Update')</a>
                            <a class="sublink" href="{{route('clear.cache')}}">@lang('Clear Cache') </a>
                        </div>
                    @endif
            </div>
        </div>
        
    </div>
    <div class="sidebar-overlay"></div>
</div>  