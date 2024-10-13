<!DOCTYPE html>
<html @if (App::getLocale()=='ar' ) dir="rtl" @else dir="ltr" @endif
  lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge">
  <meta name="author" content="SemiColonWeb">
  <meta name="description"
    content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today.">

  <!-- Font Imports -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800;900&family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap"
    rel="stylesheet">

  <!-- Core Style -->
  @if (App::getLocale()=='ar')
  <link rel="stylesheet" href="{{ asset('front/css/style-rtl.css') }}">
  @else
  <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
  @endif


  <!-- Font Icons -->
  <link rel="stylesheet" href="{{asset('front/css/font-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('front/one-page/css/et-line.css') }}">

  <!-- Plugins/Components CSS -->
  <link rel="stylesheet" href="{{ asset('front/css/swiper.css') }}">

  <!-- Niche Demos -->
  <link rel="stylesheet" href="{{ asset('front/demos/business/business.css') }}">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


  <title>Smart-Cleaing</title>

</head>

<body class="stretched">

  {{-- Document Wrapper--}}
  <div id="wrapper">

    {{-- Header--}}
    <header id="header" class="full-header transparent-header dark header-size-md" data-sticky-class="not-dark"
      data-responsive-class="not-dark" data-sticky-offset="full" data-sticky-offset-negative="auto">
      <div id="header-wrap">
        <div class="container">
          <div class="header-row">

            {{-- Logo--}}
            <div id="logo">
              <a href="index.html">
                <img class="logo-default" srcset="{{ url('imgs/logo.jpg') }}, {{ url('imgs/logo.jpg') }} 2x"
                  src="{{ url('imgs/logo.jpg') }}@2x.png" alt="Smart-Cleaning">
                <img class="logo-dark" srcset="{{ url('imgs/logo.jpg') }}, {{ url('imgs/logo.jpg') }} 2x"
                  src="{{ url('imgs/logo.jpg') }}" alt="Smart-Cleaning">
              </a>
            </div>{{-- #logo end --}}

            <div class="header-misc">

              {{-- Top Search--}}
              <div id="top-search" class="header-misc-icon">
                <a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i class="bi-x-lg"></i></a>
              </div>{{-- #top-search end --}}

            </div>

            <div class="primary-menu-trigger">
              <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
              </button>
            </div>

            {{-- Primary Navigation--}}
            <nav class="primary-menu">

              <ul class="menu-container">
                <li class="menu-item active"><a class="menu-link" href="#">
                    <div>Home</div>
                  </a></li>
                <li class="menu-item"><a class="menu-link" href="#">
                    <div>Explore</div>
                  </a>
                  <ul class="sub-menu-container" data-class="up-lg:not-dark">
                    <li class="menu-item"><a class="menu-link" href="#">
                        <div>NextGen Framework</div>
                      </a></li>
                    <li class="menu-item"><a class="menu-link" href="#">
                        <div>Stunning Graphics</div>
                      </a></li>
                    <li class="menu-item"><a class="menu-link" href="#">
                        <div>Secured Solutions</div>
                      </a></li>
                  </ul>
                </li>
                <li class="menu-item"><a class="menu-link" href="#">
                    <div>Pricing</div>
                  </a></li>
                <li class="menu-item"><a class="menu-link" href="#">
                    <div>FAQs</div>
                  </a></li>
                <li class="menu-item"><a class="menu-link" href="#">
                    <div>Gallery</div>
                  </a></li>
              </ul>

            </nav>{{-- #primary-menu end --}}

            <form class="top-search-form" action="search.html" method="get">
              <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.."
                autocomplete="off">
            </form>

          </div>
        </div>
      </div>
      <div class="header-wrap-clone"></div>
    </header>{{-- #header end --}}

    {{-- Slider--}}
    <section id="slider" class="slider-element swiper_wrapper min-vh-60 min-vh-md-100 include-header" data-loop="true">

      <div class="slider-inner">
        <div class="swiper-container swiper-parent">
          <div class="swiper-wrapper">
            <div class="swiper-slide dark">
              <div class="container">
                <div class="slider-caption slider-caption-center">
                  <div>
                    <h2 class="font-primary text-transform-none">Creative Work.</h2>
                    <p class="fw-light font-primary d-none d-sm-block">Quickly communicate
                      bleeding-edge best practices.</p>
                    <a href="#" class="button button-rounded button-large text-transform-none ls-0 font-primary">Get
                      Started</a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide-bg" style="background-image: url('{{ asset('imgs/slider-1.jpg') }}');"></div>
            </div>
            <div class="swiper-slide dark">
              <div class="container">
                <div class="slider-caption slider-caption-center">
                  <div>
                    <h2 class="font-primary">Amazing Prospects.</h2>
                    <p class="fw-light font-primary d-none d-sm-block">Seamlessly engineer effective
                      synergy after e-business experiences.</p>
                    <a href="#" class="button button-rounded button-large text-transform-none ls-0 font-primary">Get
                      Started</a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide-bg" style="background-image: url('{{ asset('imgs/slider-2.jpg') }}');"></div>
            </div>
            <div class="swiper-slide dark">
              <div class="container">
                <div class="slider-caption slider-caption-center">
                  <div>
                    <h2 class="font-primary">Flexible Works.</h2>
                    <p class="fw-light font-primary d-none d-sm-block">Completely incubate worldwide
                      users before imperatives.</p>
                    <a href="#" class="button button-rounded button-large text-transform-none ls-0 font-primary">Get
                      Started</a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide-bg" style="background-image: url('{{ asset('imgs/slider-3.jpg') }}');"></div>
            </div>
          </div>
          {{-- Slider Arrows--}}
          <div class="slider-arrow-left" class="bg-transparent"><i class="bi-arrow-left"></i></div>
          <div class="slider-arrow-right" class="bg-transparent"><i class="bi-arrow-right"></i></div>
        </div>

        {{-- Slider Mouse Icon--}}
        <a href="#" data-scrollto="#content" data-offset="0" class="dark one-page-arrow"><img
            class="infinite animated fadeInDown" src="{{ url('imgs/mouse.svg') }}" alt="Image"></a>
      </div>

    </section>

    {{-- Content--}}
    <section id="content">

      <div class="content-wrap pb-0" style="z-index: 1;">

        <div class="container mt-5">

          {{-- What We Do--}}
          <div class="heading-block text-center border-0" data-heading="S">
            <h3>Select Country</h3>
          </div>
          <div class="row">
            <div class="text-center col-lg-8 offset-lg-2 mb-5">
              <h3 class="text-rotater font-secondary" data-separator="," data-rotate="fadeInRight" data-speed="3500">
              </h3>
            </div>

            <div class="clear"></div>

            {{-- Countries colomns--}}
            @if ($countries->count()>0)
            <div class="row g-4">
              @foreach ($countries as $country)
              <div class="col-lg-3">
                <div class="feature-box media-box fbox-bg">
                  <div class="fbox-media">
                    <a href="#"><img src="{{ url('imgs').'/'.$country->flag }}" class="h-100"
                        alt="{{ $country->name_en }}"></a>
                  </div>
                  <div class="fbox-content fbox-content-lg">
                    <h3 class="text-transform-none ls-0 fw-semibold">
                      @if (App::getLocale()=='ar')
                      {{ $country->name_ar }}
                      @else
                      {{ $country->name_en }}
                      @endif
                      <span class="subtitle font-secondary fw-light ls-0"></span>
                    </h3>

                  </div>
                </div>
              </div>
              @endforeach
              <div class="col-lg-3">
                <div class="feature-box media-box fbox-bg">
                  <div class="fbox-media">
                    <a href="#"><img src="{{ url('imgs/jobs.jpg')}}" height="250" alt="Jobs"></a>
                  </div>
                  <div class="fbox-content fbox-content-lg">
                    <h3 class="text-transform-none ls-0 fw-semibold"><a href="#">{{ __('front.Jobs') }}</a><span
                        class="subtitle font-secondary fw-light ls-0"></span></h3>
                  </div>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>

        {{-- About Us--}}
        <div class="section p-0 mt-5 bg-transparent "
          style="border-top: 1px solid #EEE; border-bottom: 1px solid #EEE;">
          <div class="row align-items-stretch">
            <div class="col-lg-6 text-center col-padding"
              style="background: url('{{ url('imgs/about.jpg') }}') center center no-repeat; background-size: cover;">
              <div>&nbsp;</div>
            </div>

            <div class="col-lg-6 col-padding">
              <div>
                <div style="position: relative;">
                  <div class="heading-block border-0" data-heading="A">
                    <h3 class="text-transform-none ls-0">{{ __('front.About Us') }}</h3>
                  </div>
                </div>

                {{-- About Us Featured Boxes--}}
                <div class="row g-5">
                  <div class="col-lg-10 col-md-8">
                    <div class="feature-box fbox-plain">
                      @if (App::getLocale()=='ar')
                      <p>لا غنى عن خدمات النظافة واعمال الصيانة.</p>
                      <p>قمنا ببناء منصه تضم اكبر تجمع لشركات النظافة و أعمال الصيانة في مكان واحد</p>
                      @else
                      <p>Cleaning and maintenance services are indispensable.</p>
                      <p>We have built a platform that includes the largest gathering of cleaning and maintenance
                        companies in one place</p>
                      @endif

                      <div class="fbox-icon">
                        <a href="#"><i class="fal fa-building"></i></a>
                      </div>
                      <div class="fbox-content">
                        @if (App::getLocale()=='ar')
                        <h3>شركات النظافة و الصيانة</h3>
                        <p>يمكن للشركة التسجيل ويكون لها صفحه تمثل موقع موقع الكتروني مصغر لعرض خدماتها واسعار الخدمات و
                          معرض يضم سابقة أعمالها و
                          خبراتها.<strong>التسجيل مجاني</strong>
                        </p>
                        @else
                        <h3>Cleaning & Maintenance Companies</h3>
                        <p>The company can register and have a page that represents a mini-website to display its
                          services and service prices and
                          an exhibition that includes its previous work and experiences.<strong>Free
                            Registration</strong>
                        </p>
                        @endif

                      </div>
                    </div>
                  </div>
                  <div class="col-lg-10 col-md-8">
                    <div class="feature-box fbox-plain">
                      <div class="fbox-icon">
                        <a href="#"><i class="fal fa-coffee"></i></a>
                      </div>
                      <div class="fbox-content">
                        @if (App::getLocale()=='ar')
                        <h3>الباحثين عن الخدمة</h3>
                        <p>يمكنك بسهوله ان تجد الخدمة التي تبحث عنها سواء في اعمال الصيانة او خدمات التنظيف المنزل او
                          الشركات و المفاضلة بين
                          البدائل المتاحة.<strong>سواء تريد التسجيل بالموقع او لا</strong></p>
                        @else
                        <h3>Service Seekers</h3>
                        <p>You can easily find the service you are looking for, whether in maintenance work or home or
                          company cleaning services
                          and compare the available alternatives.<strong>Its Ok if you want to register on the site or
                            not</strong>
                        </p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-10 col-md-8">
                    <div class="feature-box fbox-plain">
                      <div class="fbox-icon">
                        <a href="#"><i class="icon-et-document"></i></a>
                      </div>
                      <div class="fbox-content">
                        @if (App::getLocale()=='ar')
                        <h3>الباحثنين عن عمل</h3>
                        <p>مساهمة منا في رحلتك للبحث عن عمل يمكنك تسجيل حسابك ورفع سيرتك الذاتية لتكون متاحة امام
                          الشركات المسجلة</p>
                        @else
                        <h3>Job seekers</h3>
                        <p>As a contribution from us to your job search journey, you can register your account and
                          upload your CV to be available
                          to registered companies</p>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        {{-- How We Work--}}
        {{--
        <div class="section bg-transparent">
          <div class="container">
            <div class="heading-block mb-6 text-center border-0" data-heading="W">
              <h3 class="text-transform-none ls-0">How We Work</h3>
            </div>
          </div>

          <!-- How We Work - Carousel
					============================================= -->
          <div id="oc-features" class="owl-carousel owl-carousel-full image-carousel carousel-widget customjs">
            <div class="oc-item">
              <div class="row cleafix">
                <div class="col-xl-8">
                  <img src="demos/business/images/carousel/1.jpg" alt="Image">
                </div>
                <div class="col-xl-4" style="padding: 20px 0 0 20px;">
                  <h3>Great Team Work.</h3>
                  <p>Uniquely plagiarize dynamic convergence after equity invested experiences.
                    Holisticly repurpose installed base infomediaries before web-enabled methods of
                    empowerment.</p>
                  <a href="#" class="button-link">Read More</a>
                </div>
              </div>
            </div>
            <div class="oc-item">
              <div class="row cleafix">
                <div class="col-xl-8">
                  <img src="demos/business/images/carousel/2.jpg" alt="Image">
                </div>
                <div class="col-xl-4" style="padding: 20px 0 0 20px;">
                  <h3>Amazing Career Prospects.</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor mollitia
                    dignissimos, assumenda consequuntur consectetur! Laborum reiciendis, accusamus
                    possimus et similique nisi obcaecati ex doloremque ea odio.</p>
                  <a href="#" class="button-link">Read More</a>
                </div>
              </div>
            </div>
            <div class="oc-item">
              <div class="row cleafix">
                <div class="col-xl-8">
                  <img src="demos/business/images/carousel/3.jpg" alt="Image">
                </div>
                <div class="col-xl-4" style="padding: 20px 0 0 20px;">
                  <h3>Beautiful Workspace.</h3>
                  <p>Dolor mollitia dignissimos, assumenda consequuntur consectetur! Laborum
                    reiciendis, error explicabo consectetur adipisci, accusamus possimus et
                    similique nisi obcaecati ex doloremque ea odio.</p>
                  <a href="#" class="button-link">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        --}}
      </div>


    </section><!-- #content end -->

    <!-- Footer
		============================================= -->
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
                <div class="col-sm-6 col-lg-3">
                  <div class="widget widget_links widget-li-noicon">
                    <h4>{{ __('front.Countries') }}</h4>
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
                    <h4>Community</h4>
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
                <div class="col-sm-6 col-lg-3">
                  <div class="widget widget_links widget-li-noicon">
                    <h4>About</h4>
                    <ul>
                      <li><a href="#">Documentation</a></li>
                      <li><a href="#">Feedback</a></li>
                      <li><a href="#">Plugins</a></li>
                      <li><a href="#">Support Forums</a></li>
                      <li><a href="#">Themes</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="line line-sm"></div>

              <div class="row justify-content-between col-mb-30">
                <div class="col-12 col-md-auto text-center text-md-start">
                  <small class="fw-light" style="color: #AAA">Copyrights &copy; 2023 All Rights
                    Reserved by Canvas Inc.</small>
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

  </div><!-- #wrapper end -->

  <!-- Go To Top
	============================================= -->
  <div id="gotoTop" class="uil uil-angle-up"></div>

  <!-- JavaScripts
	============================================= -->
  <script src="{{ asset('front/js/jquery.js') }}"></script>
  <script src="{{ asset('front/js/functions.js') }}"></script>

  <script>
    jQuery(window).on( 'pluginCarouselReady', function(){
			jQuery('#oc-features').owlCarousel({
				items: 1,
				margin: 60,
			    nav: true,
			    navText: ['<i class="bi-arrow-left"></i>','<i class="bi-arrow-right"></i>'],
			    dots: false,
			    stagePadding: 30,
			    responsive:{
					768: { items: 2 },
					1200: { stagePadding: 200 }
				},
			});
		});
  </script>

</body>

</html>