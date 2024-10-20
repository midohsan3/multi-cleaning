<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js" @if (App::getLocale()=='ar' ) dir="rtl" @else dir="ltr" @endif>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cleaning Booking System </title>
    <meta name="description" content="Smart-Cleaning Booking System">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('imgs/logo.jpg') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('log/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('log/css/fontawesome-all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('log/font/flaticon.css') }}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('log/css/style.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>

    <section class="fxt-template-animation fxt-template-layout1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-12 fxt-bg-color">
                    <div class="fxt-content">

                        <div class="fxt-form">
                            <h2>{{ __('front.Company Register') }}</h2>
                            <p>{{ __('front.Register Your Company For Free') }}</p>
                            <form method="POST" action="{{ route('front.company.store') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="text" class="form-control" name="companyName" placeholder="{{ __('front.Company Name') }}"
                                            value="{{ old('companyName') }}" required="required" autofocus />
                                        <i class="fal fa-building"></i>
                                    </div>
                                    @error('companyName')
                                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="text" class="form-control" name="ownerName" placeholder="{{ __('front.Owner Name') }}"
                                            value="{{ old('ownerName') }}" required="required" />
                                        <i class="fas fa-user"></i>
                                    </div>
                                    @error('ownerName')
                                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1 form-inline">
                                        <select class="form-control w-25" name="country" required="required">
                                            <option value="{{ old('country') }}" selected disabled>{{ __('front.Country') }}</option>
                                            @if ($countries->count()>0)
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" dir="ltr">
                                                +{{ $country->phone_code }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('country')
                                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control w-75" name="phone" placeholder="{{ __('front.Your Phone') }} "
                                            value="{{ old('phone') }}" required="required" />
                                        <i class="far fa-mobile-alt"></i>
                                    </div>
                                    @error('phone')
                                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="email" class="form-control" name="email" placeholder="{{ __('front.Email Address') }}"
                                            value="{{ old('email') }}" required="required">
                                        <i class="flaticon-envelope"></i>
                                    </div>
                                    @error('email')
                                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                                        <input type="password" class="form-control" name="password" placeholder="{{ __('front.Password') }}"
                                            required="required">
                                        <i class="flaticon-padlock"></i>
                                    </div>
                                    @error('password')
                                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            placeholder="{{ __('front.Confirm Password') }}" required="required">
                                        <i class="flaticon-padlock"></i>
                                    </div>
                                    @error('password')
                                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <select class="form-select form-control" name="activity" required="required">
                                            <option value="{{ old('activity') }}" selected disabled>{{ __('front.Choose Activity...') }}</option>
                                            @if ($activities->count()>0)

                                            @foreach ($activities as $activity)
                                            <option value="{{ $activity->id }}">
                                                @if (App::getLocale()=='ar')
                                                {{ $activity->name_ar }}
                                                @else
                                                {{ $activity->name_en }}
                                                @endif
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    @error('activity')
                                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-3">
                                        <div class="fxt-content-between">
                                            <button type="submit" class="fxt-btn-fill">{{ __('front.Register')
                                                }}</button>
                                            <a href="{{ route('login') }}" class="switcher-text2">
                                                {{__('front.Already Have account')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="fxt-footer">
                            <ul class="fxt-socials">
                                <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-4">
                                    <a href="https://www.facebook.com/smartssolutionsystems" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-5">
                                    <a href="https://x.com/En_Mohameed" title="twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-7">
                                    <a href="https://www.linkedin.com/company/88389984" title="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li class="fxt-pinterest fxt-transformY-50 fxt-transition-delay-8">
                                    <a href="https://www.instagram.com/midohsan3/" title="instagram"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 fxt-none-767 fxt-bg-img" data-bg-image="{{ url('imgs/logo.jpg') }}"></div>
            </div>
        </div>
    </section>
    <!-- jquery-->
    <script src="{{ asset('log/js/jquery-3.5.0.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('log/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('log/js/bootstrap.min.js') }}"></script>
    <!-- Imagesloaded js -->
    <script src="{{ asset('log/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Validator js -->
    <script src="{{ asset('log/js/validator.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('log/js/main.js') }}"></script>

</body>

</html>