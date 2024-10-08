<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js" @if (App::getLocale()=='ar' ) dir="rtl" @else
  dir="ltr" @endif>

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

<body class="nk-body bg-white has-sidebar ">
  <div class="nk-app-root">
    {{-- main @s --}}
    <div class="nk-main ">
      {{-- sidebar @s --}}

      @include('incs.admin_side')

      {{-- sidebar @e --}}
      {{-- wrap @s --}}
      <div class="nk-wrap ">
        {{-- main header @s --}}

        @include('incs.dashboard_header')

        {{-- main header @e --}}
        {{-- content @s --}}
        <div class="nk-content nk-content-fluid">
          <div class="container-xl wide-lg">

            @yield('page-body')

          </div>
        </div>
        {{-- content @e --}}
        {{-- footer @s --}}
        <div class="nk-footer">
          <div class="container-fluid">
            <div class="nk-footer-wrap">
              <div class="nk-footer-copyright"> &copy; 2024 <a href="https://smart-solutions.live/"
                  target="_blank">Smart-Solutions Systems</a>
              </div>
              <div class="nk-footer-links">
                <ul class="nav nav-sm">
                  <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- footer @e -->
      </div>
      <!-- wrap @e -->
    </div>
    {{-- main @e --}}
  </div>
  <!-- app-root @e -->
  <!-- JavaScript -->
  <script src="{{ asset('admin/assets/js/bundle.js?ver=2.4.0') }}"></script>
  <script src="{{ asset('admin/assets/js/scripts.js?ver=2.4.0') }}"></script>
  <script src="{{ asset('admin/assets/js/charts/gd-default.js?ver=2.4.0') }}"></script>
</body>

</html>
