<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ route('front.main') }}" class="logo-link nk-sidebar-logo">
                @if (@empty(Auth::user()->profile_pic))
                <img class="logo-light logo-img" src="{{ url('imgs/logo.jpg') }}" srcset="{{ url('imgs/logo.jpg') }} 2x" alt="Smart-Solutions">
                <img class="logo-dark logo-img" src="{{ url('imgs/logo.jpg') }}" srcset="{{ url('imgs/logo.jpg') }} 2x" alt="Smart-Solutions">
                @else
                <img class="logo-light logo-img" src="{{ url('storage/app/public/imgs/users').'/'.Auth::user()->profile_pic }}"
                    srcset="{{ url('storage/app/public/imgs/users').'/'.Auth::user()->profile_pic }} 2x" alt="Smart-Solutions">
                <img class="logo-dark logo-img" src="{{ url('storage/app/public/imgs/users').'/'.Auth::user()->profile_pic }}"
                    srcset="{{ url('storage/app/public/imgs/users').'/'.Auth::user()->profile_pic }} 2x" alt="Smart-Solutions">
                @endif

            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div>{{-- .nk-sidebar-element --}}

    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu">
                    <ul class="nk-menu">

                        <h6 class="overline-title text-primary-alt">Smart-Solutions Systems</h6>
                        </li>{{-- .nk-menu-item --}}

                        <li class="nk-menu-item">
                            <a href="{{ route('front.main') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-sign-btc-alt"></em></span>
                                <span class="nk-menu-text">{{ __('admin.Dashboard') }}</span>
                            </a>
                        </li>{{-- .nk-menu-item --}}

                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">{{ __('admin.System Features') }}</h6>
                        </li>{{-- .nk-menu-heading --}}

                        <li class="nk-menu-item">
                            <a href="{{ route('person.profile.edit') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><i class="icon far fa-user"></i></span>
                                <span class="nk-menu-text">{{ __('admin.My Profile') }}</span>
                            </a>
                        </li>{{-- .nk-menu-item --}}

                        <li class="nk-menu-item">
                            <a href="=====" class="nk-menu-link">
                                <span class="nk-menu-icon"><i class="icon far fa-hand-holding-heart"></i></span>
                                <span class="nk-menu-text">{{ __('admin.Recommended Jobs') }}</span>
                            </a>
                        </li>{{-- .nk-menu-item --}}

                    </ul>{{-- .nk-menu --}}

                </div>{{-- .nk-sidebar-menu --}}

                <div class="nk-sidebar-footer">
                    <ul class="nk-menu nk-menu-footer">
                        <li class="nk-menu-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-frm').submit();" class="nk-menu-link">
                                <span class="nk-menu-icon"><i class="icon fal fa-sign-out-alt"></i></span>
                                <span class="nk-menu-text">{{ __('admin.Logout') }}</span>
                            </a>
                        </li>
                        <form id="logout-frm" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <li class="nk-menu-item ml-auto">
                            @if (App::getLocale()=='ar')
                            <a rel="alternate" hreflang="English" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
                                class="nk-menu-link">
                                <span class="nk-menu-text">English</span>
                            </a>
                            @else
                            <a rel="alternate" hreflang="العربية" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
                                class="nk-menu-link">
                                <span class="nk-menu-text">العربية</span>
                            </a>
                            @endif

                        </li>
                    </ul>{{-- .nk-footer-menu --}}
                </div>{{-- .nk-sidebar-footer --}}
            </div>{{-- .nk-sidebar-content --}}
        </div>{{-- .nk-sidebar-body --}}
    </div>{{-- .nk-sidebar-element --}}
</div>
