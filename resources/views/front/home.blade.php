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
    {{--
    @if (App::getLocale()=='ar')
    <link rel="stylesheet" href="{{ asset('front/css/style-rtl.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    @endif
    --}}
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">

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
        <section id="slider" class="slider-element h-auto" style="background-color: #222;">
            <div class="slider-inner">

                <div class="owl-carousel carousel-widget" data-margin="0" data-items="1" data-pagi="false" data-loop="true" data-animate-in="rollIn"
                    data-speed="450" data-animate-out="rollOut" data-autoplay="5000" dir="ltr">
                    <a href="#"><img src="{{ url('imgs/slider-1.jpg') }}" alt="Home Cleaning"></a>
                    <a href="#"><img src="{{ url('imgs/slider-2.jpg') }}" alt="Maintainace"></a>
                    <a href="#"><img src="{{ url('imgs/slider-3.jpg') }}" alt="Building Cleaning"></a>
                </div>
            </div>
        </section>

        @if ($activities->count()>0)
        {{-- Content--}}
        <section id="content">
            <div class="negetive-margin">
                <div class="container pt-5">
                    <div class="fancy-title title-border title-center mb-5">
                        <h1 class="text-center">
                            {{__('front.Best Activities')}}
                        </h1>
                    </div>
                </div>
            </div>
        </section>{{-- #content end --}}

        <div class="negetive-margin">
            <div class="container">
                <div id="cleaner-carousel" class="owl-carousel carousel-widget" data-margin="30" data-nav="true" data-pagi="true" data-items-xs="1"
                    data-items-sm="2" data-items-md="3" data-items-lg="3" data-items-xl="4">
                    @foreach ($activities as $activity)
                    <div class="card border-0 shadow-sm">
                        <a href="">
                            @if (empty($activity->og_image))
                            <img src="{{ url('imgs/logo.jpg') }}" class="card-img-top" alt="{{ $activity->name_en }}">
                            @else
                            <img src="{{ url('storage/app/public/imgs/activities'.'/'.$activity->og_image) }}" class="card-img-top"
                                alt="{{ $activity->name_en }}">
                            @endif

                            <div class="card-body second-bg-color rounded-bottom p-4">
                                <h4 class="card-title">
                                    @if (App::getLocale()=='ar')
                                    {{ $activity->name_ar }}
                                    @else
                                    {{ $activity->name_en }}
                                    @endif
                                </h4>
                                <p class="card-text">
                                    @if (App::getLocale()=='ar')
                                    {{ Str::limit($activity->description_ar,50) }}
                                    @else
                                    {{ Str::limit($activity->description_en,50) }}
                                    @endif
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        @if ($companies->count()>0)
        {{-- Content--}}
        <section id="content">
            <div class="negetive-margin">
                <div class="container pt-5">
                    <div class="fancy-title title-border title-center mb-5">
                        <h1 class="text-center">
                            {{__('front.Most Popular Companies')}}
                        </h1>
                    </div>
                </div>
            </div>
        </section>{{-- #content end --}}

        <div class="container">
            @foreach ($companies as $company)

            @endforeach
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
                    <div class="fbox-icon">
                        <i><img src="{{ url('storage/app/public/imgs/users/'.$company->user_company->profile_pic) }}"
                                class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="{{ $company->name_en }}"></i>
                    </div>
                    <div class="fbox-content">
                        <h3 class="mb-4 text-transform-none ls-0"><a href="#" style="color:blue!important; font-size: large;">
                                @if (App::getLocale()=='ar')
                                {{ Str::limit($company->name_ar,15) }}
                                @else
                                {{ Str::limit($company->name_en,15) }}
                                @endif
                            </a>
                            <br />
                            <small class="subtitle text-transform-none text-danger">
                                @if (!empty($company->activity_id))
                                @if (App::getLocale()=='ar')
                                {{ $company->activity_company->name_ar }}
                                @else
                                {{ $company->activity_company->name_en }}
                                @endif
                                @endif
                            </small>
                        </h3>
                        <div class="col-12 justify-content-between">
                            @foreach ($connections as $con)
                            @if ($con->company_id == $company->id)
                            @if ($con->channel == 1)
                            <span><a href=" tel:{{ $con->chanel }}" class="text-primary"><i class=" fas fa-mobile-android-alt fa-2x"></i></a></span>
                            @elseif($con->channel == 4)
                            <span><a href="https://wa.me/{{ $con->chanel }}" class="text-success"><i class="fab fa-whatsapp fa-2x"></i></a></span>
                            @elseif($con->channel == 6)
                            <span class="text-danger"><a href="{{ $con->chanel }}"><i class="fab fa-instagram fa-2x"></i></a></span>
                            @elseif($con->channel == 3)
                            <span><a href="mailto:{{ $con->chanel }}" class="text-primary">
                                    <i class="fal fa-envelope fa-2x"></i></a></span>
                            @endif
                            @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif

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


</body>

</html>
