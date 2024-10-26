<footer id="footer" class="border-0" style="padding: 30px 0; background-color: #FFF">
    <div class="container">
        <!-- Footer Widgets
				============================================= -->
        <div class="footer-widgets-wrap">

            <div class="row col-mb-50">
                <div class="col-md-3">
                    <img src="{{ url('imgs/logo.jpg') }}" alt="Smart-Cleaning" height="100" style="margin-top: -30px">
                </div>

                <div class="col-md-9">

                    <div class="row col-mb-30">
                        <div class="col-sm-6 col-lg-4">
                            <div class="widget widget_links widget-li-noicon">
                                <h4>{{ __('front.Countries') }}</h4>
                                <ul>
                                    @if (active_countries()->count()>0)
                                    @foreach (active_countries() as $active_country)
                                    <li><a href="{{ route('front.home',Str::lower($active_country->country_code)) }}">
                                            @if (App::getLocale()=='ar')
                                            {{ $active_country->name_ar }}
                                            @else
                                            {{ $active_country->name_en }}
                                            @endif
                                        </a></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        {{--
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget_links widget-li-noicon">
                                <h4>Activities</h4>
                                <ul>
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="#">Feedback</a></li>
                                    <li><a href="#">Plugins</a></li>
                                    <li><a href="#">Support Forums</a></li>
                                    <li><a href="#">Themes</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget_links widget-li-noicon">
                                <h4>Learn</h4>
                                <ul>
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="#">Feedback</a></li>
                                    <li><a href="#">Plugins</a></li>
                                    <li><a href="#">Support Forums</a></li>
                                    <li><a href="#">Themes</a></li>
                                </ul>
                            </div>
                        </div>
                        --}}
                        <div class="col-sm-6 col-lg-4">
                            <div class="widget widget_links widget-li-noicon">
                                <h4>{{ __('front.About') }}</h4>
                                <p>
                                    @if (App::getLocale()=='ar')
                                    اكبر تجمع لشركات النظافة و الخدمات لخدمة اصحاب الخدمات و من يبحث عن الخدمة.
                                    @else
                                    The largest gathering of cleaning and service companies to serve service providers and those looking for services.
                                    @endif
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="line line-sm"></div>

                    <div class="row justify-content-between col-mb-30">
                        <div class="col-12 col-md-auto text-center text-md-start">
                            <small class="fw-light" style="color: #AAA">Copyrights &copy; 2024 All Rights
                                Reserved by Smart-Solutions Systems</small>
                        </div>

                        <div class="col-12 col-md-auto text-center text-md-end">
                            <a href="#" class="social-icon si-mini rounded-circle border-0 text-light bg-facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>

                            <a href="#" class="social-icon si-mini rounded-circle border-0 text-light bg-twitter">
                                <i class="fa-brands fa-twitter"></i>
                                <i class="fa-brands fa-twitter"></i>
                            </a>

                            <a href="#" class="social-icon si-mini rounded-circle border-0 text-light bg-google">
                                <i class="fa-brands fa-google"></i>
                                <i class="fa-brands fa-google"></i>
                            </a>

                            <a href="#" class="social-icon si-mini rounded-circle border-0 text-light bg-pinterest">
                                <i class="fa-brands fa-pinterest-p"></i>
                                <i class="fa-brands fa-pinterest-p"></i>
                            </a>

                            <a href="#" class="social-icon si-mini rounded-circle border-0 text-light bg-vimeo">
                                <i class="fa-brands fa-vimeo-v"></i>
                                <i class="fa-brands fa-vimeo-v"></i>
                            </a>

                            <a href="#" class="social-icon si-mini rounded-circle border-0 text-light bg-instagram">
                                <i class="bi-instagram"></i>
                                <i class="bi-instagram"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</footer><!-- #footer end -->