<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js" @if (App::getLocale()=='ar' ) dir="rtl" @else dir="ltr" @endif>

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Smart-Solutions Cleaning System">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Cleaning system for cleaning companies">

    {{-- Fav Icon --}}
    <link rel="shortcut icon" href="{{ url('imgs/logo.jpg') }}">

    {{-- Page Title --}}
    <title>@yield('page-title','Smart-Soltutions-Cleaning System')</title>
    {{-- StyleSheets --}}

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    @if (App::getLocale()=='ar')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.rtl.css?ver=2.4.0') }}">
    @else
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css?ver=2.4.0') }}">
    @endif

    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/theme.css?ver=2.4.0') }}">
</head>

<body class="nk-body bg-white npc-general pg-error">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle wide-xs mx-auto">
                        <div class="nk-block-content nk-error-ld text-center">
                            @yield('error-msg')

                            <a href="{{ route('home') }}" class="btn btn-lg btn-primary mt-2">{{ __('admin.Back To Home') }}</a>
                        </div>
                    </div><!-- .nk-block -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('admin/assets/js/bundle.js?ver=2.4.0') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.js?ver=2.4.0') }}"></script>

</html>