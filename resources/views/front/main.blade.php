<!DOCTYPE html>
<html @if (App::getLocale()=='ar' ) dir="rtl" @else dir="ltr" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

        @include('incs.frontNave')

        {{-- Slider--}}
        <section id="slider" class="slider-element swiper_wrapper min-vh-60 min-vh-md-100 include-header" data-loop="true">

            <div class="slider-inner">
                <div class="swiper-container swiper-parent">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide dark">
                            <div class="container">
                                <div class="slider-caption slider-caption-center">
                                    <div>
                                        <h2 class="font-primary text-transform-none text-dark">
                                            @if (App::getLocale()=='ar')
                                            خدمات نظافة المنازل
                                            @else
                                            Home Cleaning Services
                                            @endif
                                        </h2>
                                        <p class="fw-light font-primary d-none d-sm-block">
                                            @if (App::getLocale()=='ar')
                                            اذا كنت شركة او كنت تبحث عن ما يخص شركات النظافة فانت في المكان المناسب
                                            @else
                                            If you are a company or you are looking for any related to cleaning costs and use in the right place
                                            @endif
                                        </p>
                                        <a href="#chooseCountry" class="button button-rounded button-large text-transform-none ls-0 font-primary">
                                            @if (App::getLocale()=='ar')
                                            ابدا الان
                                            @else
                                            Start Now
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide-bg" style="background-image: url('{{ asset('imgs/slider-1.jpg') }}');"></div>
                        </div>

                        <div class="swiper-slide dark">
                            <div class="container">
                                <div class="slider-caption slider-caption-center">
                                    <div>
                                        <h2 class="font-primary ">
                                            @if (App::getLocale()=='ar')
                                            خدمات الصيانة
                                            @else
                                            Maintenance Services
                                            @endif
                                        </h2>
                                        <p class="fw-light font-primary d-none d-sm-block">Seamlessly engineer effective
                                            synergy after e-business experiences.</p>
                                        <a href="#chooseCountry" class="button button-rounded button-large text-transform-none ls-0 font-primary">
                                            @if (App::getLocale()=='ar')
                                            ابدا لان
                                            @else
                                            Get Started
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide-bg" style="background-image: url('{{ asset('imgs/slider-2.jpg') }}');"></div>
                        </div>

                        <div class="swiper-slide dark">
                            <div class="container">
                                <div class="slider-caption slider-caption-center">
                                    <div>
                                        <h2 class="font-primary">
                                            @if (App::getLocale()=='ar')
                                            تنظيف مباني
                                            @else
                                            Building Cleaning
                                            @endif
                                        </h2>
                                        <p class="fw-light font-primary d-none d-sm-block">Completely incubate worldwide
                                            users before imperatives.</p>
                                        <a href="#chooseCountry" class="button button-rounded button-large text-transform-none ls-0 font-primary">
                                            @if (App::getLocale()=='ar')
                                            ابدا لان
                                            @else
                                            Get Started
                                            @endif
                                        </a>
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
                <a href="#" data-scrollto="#content" data-offset="0" class="dark one-page-arrow"><img class="infinite animated fadeInDown"
                        src="{{ url('imgs/mouse.svg') }}" alt="Image"></a>
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
                    <div class="row" id="chooseCountry">
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
                                        <a href="{{ route('front.home',Str::lower($country->country_code)) }}">
                                            <img src="{{ url('imgs').'/'.$country->flag }}" class="h-100" alt="{{ $country->name_en }}"></a>
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
                                        <h3 class="text-transform-none ls-0 fw-semibold"><a href="#">{{ __('front.Jobs')
                                                }}</a><span class="subtitle font-secondary fw-light ls-0"></span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- About Us--}}
                <div class="section p-0 mt-5 bg-transparent " style="border-top: 1px solid #EEE; border-bottom: 1px solid #EEE;">
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
                                            <p>قمنا ببناء منصه تضم اكبر تجمع لشركات النظافة و أعمال الصيانة في مكان واحد
                                            </p>
                                            @else
                                            <p>Cleaning and maintenance services are indispensable.</p>
                                            <p>We have built a platform that includes the largest gathering of cleaning
                                                and maintenance
                                                companies in one place</p>
                                            @endif

                                            <div class="fbox-icon">
                                                <a href="#"><i class="fal fa-building"></i></a>
                                            </div>
                                            <div class="fbox-content">
                                                @if (App::getLocale()=='ar')
                                                <h3>شركات النظافة و الصيانة</h3>
                                                <p>يمكن للشركة التسجيل ويكون لها صفحه تمثل موقع موقع الكتروني مصغر لعرض
                                                    خدماتها واسعار الخدمات و
                                                    معرض يضم سابقة أعمالها و
                                                    خبراتها.<strong>التسجيل مجاني</strong>
                                                </p>
                                                @else
                                                <h3>Cleaning & Maintenance Companies</h3>
                                                <p>The company can register and have a page that represents a
                                                    mini-website to display its
                                                    services and service prices and
                                                    an exhibition that includes its previous work and
                                                    experiences.<strong>Free
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
                                                <p>يمكنك بسهوله ان تجد الخدمة التي تبحث عنها سواء في اعمال الصيانة او
                                                    خدمات التنظيف المنزل او
                                                    الشركات و المفاضلة بين
                                                    البدائل المتاحة.<strong>سواء تريد التسجيل بالموقع او لا</strong></p>
                                                @else
                                                <h3>Service Seekers</h3>
                                                <p>You can easily find the service you are looking for, whether in
                                                    maintenance work or home or
                                                    company cleaning services
                                                    and compare the available alternatives.<strong>Its Ok if you want to
                                                        register on the site or
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
                                                <p>مساهمة منا في رحلتك للبحث عن عمل يمكنك تسجيل حسابك ورفع سيرتك الذاتية
                                                    لتكون متاحة امام
                                                    الشركات المسجلة</p>
                                                @else
                                                <h3>Job seekers</h3>
                                                <p>As a contribution from us to your job search journey, you can
                                                    register your account and
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
                <div class="section bg-transparent">
                    <div class="container">
                        <div class="heading-block mb-6 text-center border-0" data-heading="W">
                            <h3 class="text-transform-none ls-0">How We Work</h3>
                        </div>
                    </div>

                    {{-- How We Work - Carousel--}}
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
            </div>


        </section><!-- #content end -->

        {{-- Footer--}}
        @include('incs.frontFooter')

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
