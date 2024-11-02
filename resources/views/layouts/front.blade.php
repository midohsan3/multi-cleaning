<!DOCTYPE html>
<html @if (App::getLocale()=='ar' ) dir="rtl" @else dir="ltr" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="author" content="Smart-Solutions Cleaning System">
    @if (App::getLocale()=='ar')
    <meta name="description"
        content="اكبر تجمع لشركات النظافة و الخدمات لخدمة اصحاب الخدمات و من يبحث عن الخدمة., بالاضافة للباحثين عن عمل فن عن عمل">
    @else
    <meta name="description"
        content="The largest gathering of cleaning and service companies to serve service providers and those looking for services, and pepole Looking for work.">
    @endif
    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=PT+Serif:ital@0;1&display=swap" rel="stylesheet">

    <!-- Core Style -->
    @if (App::getLocale()=='ar')
    <link rel="stylesheet" href="{{ asset('front/css/style-rtl.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    @endif

    <!-- Font Icons -->
    <link rel="stylesheet" href="{{ asset('front.css/font-icons.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title','Smart-Cleaning')</title>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FNRSK3J03W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-FNRSK3J03W');
    </script>

</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper">

        <!-- Header
		============================================= -->
        @include('incs.frontNave')

        {{-- Page Title--}}
        <section class="page-title bg-transparent">
            <div class="container">
                <div class="page-title-row">
                    @yield('body_title')
                </div>
            </div>
        </section>{{-- .page-title end --}}

        <!-- Content
		============================================= -->
        <section id="content">
            <div class="content-wrap">
                <div class="container">
                    @yield('content')
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
    <script src="{{ asset('front/js/functions.js') }}"></script>

</body>

</html>