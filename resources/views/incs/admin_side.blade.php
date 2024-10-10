<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
  <div class="nk-sidebar-element nk-sidebar-head">
    <div class="nk-sidebar-brand">
      <a href="html/index.html" class="logo-link nk-sidebar-logo">
        <img class="logo-light logo-img" src="{{ url('imgs/logo.jpg') }}" srcset="{{ url('imgs/logo.jpg') }} 2x"
          alt="Smart-Solutions">
        <img class="logo-dark logo-img" src="{{ url('imgs/logo.jpg') }}" srcset="{{ url('imgs/logo.jpg') }} 2x"
          alt="Smart-Solutions">
      </a>
    </div>
    <div class="nk-menu-trigger mr-n2">
      <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
          class="icon ni ni-arrow-left"></em></a>
    </div>
  </div>{{-- .nk-sidebar-element --}}

  <div class="nk-sidebar-element">
    <div class="nk-sidebar-body" data-simplebar>
      <div class="nk-sidebar-content">
        <div class="nk-sidebar-menu">
          <ul class="nk-menu">
            <li class="nk-menu-heading">
              <h6 class="overline-title text-primary-alt">Smart-Solutions Systems</h6>
            </li>{{-- .nk-menu-item --}}

            <li class="nk-menu-item">
              <a href="html/crypto/index.html" class="nk-menu-link" target="_blank">
                <span class="nk-menu-icon"><em class="icon ni ni-sign-btc-alt"></em></span>
                <span class="nk-menu-text">{{ __('admin.Full Dashboard') }}</span>
              </a>
            </li>{{-- .nk-menu-item --}}

            <li class="nk-menu-heading">
              <h6 class="overline-title text-primary-alt">{{ __('admin.Dashboards') }}</h6>
            </li>{{-- .nk-menu-item --}}

            <li class="nk-menu-item">
              <a href="html/index.html" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                <span class="nk-menu-text">Default Dashboard</span>
              </a>
            </li>{{-- .nk-menu-item --}}

            <li class="nk-menu-heading">
              <h6 class="overline-title text-primary-alt">{{ __('admin.System Features') }}</h6>
            </li>{{-- .nk-menu-heading --}}

            <li class="nk-menu-item has-sub">
              <a href="#" class="nk-menu-link nk-menu-toggle">
                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                <span class="nk-menu-text">{{ __('admin.User Manage') }}</span>
              </a>
              <ul class="nk-menu-sub">
                <li class="nk-menu-item">
                  <a href="html/user-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">User List
                      - Regular</span></a>
                </li>
                <li class="nk-menu-item">
                  <a href="html/user-list-compact.html" class="nk-menu-link"><span class="nk-menu-text">User List
                      - Compact</span></a>
                </li>
                <li class="nk-menu-item">
                  <a href="html/user-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">User
                      Details - Regular</span></a>
                </li>
                <li class="nk-menu-item">
                  <a href="html/user-profile-regular.html" class="nk-menu-link"><span class="nk-menu-text">User
                      Profile - Regular</span></a>
                </li>
                <li class="nk-menu-item">
                  <a href="html/user-card.html" class="nk-menu-link"><span class="nk-menu-text">User
                      Contact -
                      Card</span> <span class="nk-menu-badge badge-warning">New</span></a>
                </li>
              </ul><!-- .nk-menu-sub -->
            </li>{{-- .nk-menu-item --}}

            <li class="nk-menu-item has-sub">
              <a href="#" class="nk-menu-link nk-menu-toggle">
                <span class="nk-menu-icon"><i class="icon fal fa-dice-d6"></i></span>
                <span class="nk-menu-text">{{ __('admin.Packages-Manage') }}</span>
              </a>
              <ul class="nk-menu-sub">
                <li class="nk-menu-item">
                  <a href="{{ route('admin.package.index') }}" class="nk-menu-link">
                    <span class="nk-menu-text">{{__('admin.Packages')}}</span>
                  </a>
                </li>
                <li class="nk-menu-item">
                  <a href="{{ route('admin.feature.index') }}" class="nk-menu-link">
                    <span class="nk-menu-text">{{__('admin.Features')}}</span>
                  </a>
                </li>
              </ul><!-- .nk-menu-sub -->
            </li>{{-- .nk-menu-item --}}

            <li class="nk-menu-heading">
              <h6 class="overline-title text-primary-alt">{{ __('admin.System Helpers') }}</h6>
            </li>{{-- .nk-menu-heading --}}

            <li class="nk-menu-item">
              <a href="{{ route('admin.activity.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><i class="icon fal fa-sleigh"></i></span>
                <span class="nk-menu-text">{{ __('admin.Activities') }}</span>
              </a>
            </li>{{-- .nk-menu-item --}}

            <li class="nk-menu-item">
              <a href="{{ route('admin.country.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><i class="icon fal fa-globe"></i></span>
                <span class="nk-menu-text">{{ __('admin.Countries') }}</span>
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

            <li class="nk-menu-item ml-auto">
              @if (App::getLocale()=='ar')
              <a rel="alternate" hreflang="English"
                href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="nk-menu-link">
                <span class="nk-menu-text">English</span>
              </a>
              @else
              <a rel="alternate" hreflang="العربية"
                href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="nk-menu-link">
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