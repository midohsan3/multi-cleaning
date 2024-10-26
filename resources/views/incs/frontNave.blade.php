{{-- Login Modal --}}
<div class="modal1 mfp-hide" id="modal-login">
    <div class="card mx-auto" style="max-width: 540px;">
        <div class="card-header py-3 bg-transparent text-center">
            <h3 class="mb-0 fw-normal">Hello, Welcome Back</h3>
        </div>
        <div class="card-body mx-auto py-5" style="max-width: 70%;">

            <form id="login-form" name="login-form" class="mb-0 row" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="col-12">
                    <input type="email" id="login-form-username" name="email" value="{{ old('email') }}" class="form-control not-dark"
                        placeholder="Your E-mail Here" />
                </div>

                <div class="col-12 mt-4">
                    <input type="password" id="login-form-password" name="password" class="form-control not-dark" placeholder="Password" />
                </div>

                <div class="col-12 text-end">
                    <a href="{{ route('password.request') }}" class="text-dark fw-light mt-2">Forgot Password?</a>
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="button w-100 m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                </div>
            </form>
        </div>
        <div class="card-footer py-4 text-center">
            <p class="mb-0">Dont have an account? <a href="#modal-register" data-lightbox="inline"><u>Sign up</u></a>
            </p>
        </div>
    </div>
</div>

{{-- Register Modal --}}
<div class="modal1 mfp-hide" id="modal-register">
    <div class="card mx-auto" style="max-width: 540px;">
        <div class="card-header py-3 bg-transparent text-center">
            <h3 class="mb-0 fw-normal">{{ __('front.Choose Account Type') }}</h3>
        </div>

        <div class="card-body mx-auto py-3" style="max-width: 70%;">
            <div class="row">
                <div class="col">
                    <a href="{{ route('front.company.register') }}" class=" btn btn-lg btn-danger w-100">{{
                        __('front.Company') }}
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('front.person.register') }}" class="col-lg btn btn-lg btn-primary w-100">{{
                        __('front.Personal') }}
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>

{{-- Top Bar--}}


<div id="top-bar" class="dark" style="background-color: #1280c7;">
    <div class="container">

        <div class="row justify-content-between align-items-center" dir="ltr">
            <div class="d-flex col d-lg-none">
                @if (App::getLocale()=='ar')
                <a class="text-white" rel="alternate" hreflang="English" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                    English
                </a>
                @else
                <a class="text-white" rel="alternate" hreflang="العربية" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                    العربية
                </a>
                @endif
            </div>

            <div class="col-9 col-lg-auto col-sm-6">
                <p class="mb-0 d-flex justify-content-center justify-content-lg-start py-3 py-lg-0">
                    <strong>{{ __('front.Free Registration') }}</strong>
                </p>
            </div>


            <div class="d-none col-12 col-lg-auto  d-lg-flex">

                {{-- Top Links--}}
                <div class="top-links">
                    <ul class="top-links-container">
                        <li class="top-links-item"><a href="#">{{ __('front.About') }}</a></li>
                        <li class="top-links-item"><a href="#">{{ __('front.Contact Us') }}</a></li>
                        <li class="top-links-item">

                            <a href="#">
                                @if (App::getLocale()=='ar')
                                العربية
                                @else
                                English
                                @endif
                            </a>
                            <ul class="top-links-sub-menu">
                                @if (App::getLocale()=='ar')
                                <li class="top-links-item">
                                    <a rel="alternate" hreflang="English" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                        En
                                    </a>
                                </li>
                                @else
                                <li class="top-links-item">
                                    <a rel="alternate" hreflang="العربية" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">

                                        عربي

                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>{{-- .top-links end --}}

                {{-- Top Social --}}
                <ul id="top-social">
                    <li><a href="========" class="h-bg-facebook"><span class="ts-icon"><i class="fa-brands fa-facebook-f"></i></span><span
                                class="ts-text">Facebook</span></a>
                    </li>
                    <li><a href="===========" class="h-bg-instagram"><span class="ts-icon"><i class="fa-brands fa-instagram"></i></span><span
                                class="ts-text">Instagram</span></a>
                    </li>
                    <li><a href="tel:+971502516985" class="h-bg-call">
                            <span class="ts-icon"><i class="fa-solid fa-phone"></i></span>
                            <span class="ts-text">+97150 251 6985</span>
                        </a></li>
                    <li><a href="mailto:info@smart-solutions.live" class="h-bg-email3"><span class="ts-icon"><i
                                    class="bi-envelope-fill"></i></span><span class="ts-text">info@smart-solutions.live</span></a></li>
                </ul><!-- #top-social end -->

            </div>
        </div>

    </div>
</div>

<header id="header" class="full-header header-size-sm">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row justify-content-lg-between">

                {{-- Logo--}}
                <div id="logo" class="me-lg-4 me-sm-2">
                    <a href="{{ route('front.main') }}">
                        <img class="logo-default" srcset="{{ url('imgs/logo.jpg') }}" src="{{ url('imgs/logo.jpg') }}" alt="Smart-Cleaning" />
                    </a>
                </div><!-- #logo end -->

                <div class="header-misc">

                    {{-- Top Search--}}

                    <div id="top-account">
                        @guest()
                        <a href="#modal-register" data-lightbox="inline">
                            <i class="bi-person me-1 position-relative" style="top: 1px;"></i>
                            <span class=" d-sm-inline-block d-lg-inline-block font-primary fw-medium">{{
                                __('front.Register') }}</span>
                        </a>

                        <a href="#modal-login" data-lightbox="inline">
                            <i class="fal fa-sign-in me-1 position-relative" style="top: 1px;""></i>
                          <span class=" d-sm-inline-block font-primary fw-medium">{{ __('front.Login') }}</span>
                        </a>
                        @endguest

                        @auth()
                        <a href="{{ route('dashboard') }}">
                            <i class="bi-person me-1 position-relative" style="top: 1px;"></i>
                            <span class="d-none d-sm-inline-block d-lg-inline-block font-primary fw-medium">{{
                                __('front.Dashboard') }}</span>
                        </a>
                        @endauth
                    </div><!-- #top-search end -->


                    {{-- Top Search--}}
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i class="bi-x-lg"></i></a>
                    </div><!-- #top-search end -->

                </div>

                <div class="primary-menu-trigger">
                    <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                        <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                    </button>
                </div>

                {{-- Primary Navigation--}}
                <nav class="primary-menu style-3 menu-spacing-margin">
                    {{--
                    <ul class="menu-container">
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('front.main') }}">
                                <div>{{ __('front.Home') }}</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="menu-link" href="=======">
                                <div>{{ __('front.Cleaning') }}</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="menu-link" href="=======">
                                <div>{{ __('front.Maintenance') }}</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="menu-link" href="========">
                                <div>{{ __('front.Jobs') }}</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="menu-link" href="========">
                                <div>{{ __('front.CVs') }}</div>
                            </a>
                        </li>

                    </ul>
                    --}}
                </nav>

                {{-- #primary-menu end --}}

                <form class="top-search-form" action="========" method="POST">
                    @csrf
                    <input type="text" name="search_obj" class="form-control" placeholder="Type &amp; Hit Enter.." autocomplete="off" />
                </form>



            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>
