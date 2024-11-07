@extends('layouts.front')
{{--
================================
= Page Title
================================
--}}
@section('page_title')
@if (App::getLocale()=='ar')
{{ $company->name_ar }}
@else
{{ $company->name_en }}
@endif
@endsection

{{--
================================
= Page Header
================================
--}}
@section('body_title')
<div class="page-title-content">
  <h1>
    <img src="{{ url('storage/app/public/imgs/users/'.$company->user_company->profile_pic) }}" width="150" class="rounded-circle" />
    @if (App::getLocale()=='ar')
    {{$company->name_ar }}
    @else
    {{$company->name_en }}
    @endif
  </h1>
</div>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('front.home',Str::lower($country->country_code)) }}">{{ __('front.Home') }}</a></li>
    <li class="breadcrumb-item"><a
        href="{{ route('front.home.activities',['country_code'=>Str::lower($country->country_code),'activity'=>$company->activity_id]) }}">
        @if (App::getLocale()=='ar')
        {{ $company->activity_company->name_ar }}
        @else
        {{ $company->activity_company->name_en }}
        @endif
      </a></li>
    <li class="breadcrumb-item active" aria-current="page">
      @if (App::getLocale()=='ar')
      {{ $company->name_ar }}
      @else
      {{ $company->name_en }}
      @endif
    </li>
  </ol>
</nav>
@endsection
{{--
================================
= Page Body
================================
--}}
@section('content')
<div class="row col-mb-80">

  <div class=" col-4 text-center" data-animate="bounceIn">
    <i class="fal fa-eye i-plain i-xlarge mx-auto mb-0 text-primary"></i>
    {{--
    <i class="i-plain i-xlarge mx-auto mb-0 bi-person"></i>
    --}}
    <div class="counter counter-large" style="color: #3498db;"><span data-from="0" data-to="10" data-refresh-interval="50" data-speed="2000"></span>
    </div>
    <h5>{{ __('front.View') }}</h5>
  </div>

  @if (empty($company->license))
  <div class="col-4 text-center" data-animate="bounceIn" data-delay="200">
    <i class="fas fa-file i-plain i-xlarge mx-auto mb-0 text-danger"></i>
    <div class="counter counter-large" style="color: #e74c3c;"><span data-from="0" data-to="0" data-refresh-interval="0" data-speed="2500"></span>
    </div>
    <h5>{{ __('front.Dont Have License') }}</h5>
  </div>
  @else
  <div class="col-4 text-center" data-animate="bounceIn" data-delay="200">
    <i class="fas fa-file i-plain i-xlarge mx-auto mb-0 text-danger"></i>
    <div class="counter counter-large" style="color: #e74c3c;"><span data-from="0" data-to="1" data-refresh-interval="0" data-speed="2500"></span>
    </div>
    <h5>{{ __('front.Have License') }}</h5>
  </div>
  @endif


  <div class=" col-4 text-center" data-animate="bounceIn" data-delay="400">
    <i class="fas fa-signal i-plain i-xlarge mx-auto mb-0 text-info"></i>
    <div class="counter counter-large" style="color: #16a085;"><span data-from="0" data-to="{{ $servicesCount }}" data-refresh-interval="50"
        data-speed="3500"></span></div>
    <h5>{{ __('front.Services') }}</h5>
  </div>
</div>
<div class="row">
  <p>
    @if (App::getLocale()=='ar')
    {{ $company->about_ar }}
    @else
    {{ $company->about_en }}
    @endif
  </p>
</div>
@if ($services->count()>0)
<section id="content">
  <div class="negetive-margin">
    <div class="container pt-5">
      <div class="fancy-title title-border title-center mb-5">
        <h1 class="text-center">
          {{__('front.Our Best Services')}}
        </h1>
      </div>
    </div>
  </div>
</section>{{-- #content end --}}

<div class="negetive-margin">
  <div class="container">
    <div id="cleaner-carousel" class="owl-carousel carousel-widget" data-margin="30" data-nav="true" data-pagi="true" data-items-xs="1"
      data-items-sm="2" data-items-md="3" data-items-lg="3" data-items-xl="4">
      @foreach ($services as $service)
      <div class="card border-0 shadow-sm">
        <a href="">
          @if (array_key_exists($service->id,$servicesPhotos) && $servicesPhotos[$service->id]!==null)
          <img src="{{ url('storage/app/public/imgs/services').'/'.$servicesPhotos[$service->id] }}" class="card-img-top"
            alt="{{ $service->name_en }}">
          @else
          <img src="{{ url('storage/app/public/imgs/users'.'/'.$company->user_company->profile_pic) }}" class="card-img-top"
            alt="{{ $service->name_en }}">
          @endif

          <div class="card-body second-bg-color rounded-bottom p-4">
            <h4 class="card-title">
              @if (App::getLocale()=='ar')
              {{ $service->name_ar }}
              @else
              {{ $service->name_en }}
              @endif
            </h4>
            <p class="card-text">
              <strong>{{ __('front.Price') }}: </strong><span>
                @if(array_key_exists($service->id,$servicesPrice) && $servicesPrice[$service->id]>0)
                {{ $servicesPrice[$service->id] }}<span>{{ $company->country_company->currency_code }}</span>
                <a href="" class="btn btn-primary">{{ __('front.Book Now') }}</a>
                @else
                {{ __('front.Indeterminate') }}
                <a href="{{ route('front.home.company.single',['country_code'=>Str::lower($country->country_code),'company_url'=>$company->url]) }}"
                  class="btn btn-primary">{{ __('front.View') }}</a>
                @endif
              </span>
            </p>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endif

@if ($communications->count()>0)
<div class="section">
  <div id="top-bar" class="dark bg-facebook">
    <div class="row ">

      <div class="col-12 justify-content-center align-items-center d-flex">
        {{-- Top Social --}}
        <ul id="top-social">


          @foreach ($communications as $con)
          @if ($con->channel==1)
          <li><a href="tel:{{ $con->info }}" class="h-bg-call">
              <span class="ts-icon"><i class="fa-solid fa-phone"></i></span>
              <span class="ts-text">{{ $con->info }}</span>
            </a></li>

          @elseif ($con->channel==2)
          <li><a href="tel:{{ $con->info }}" class="h-bg-call">
              <span class="ts-icon"><i class="fas fa-fax"></i></span>
              <span class="ts-text">{{ $con->info }}</span>
            </a></li>

          @elseif ($con->channel==4)
          <li><a href="https://wa.me/{{ $con->info }}" class="h-bg-call">
              <span class="ts-icon"><i class="fab fa-whatsapp-square"></i></span>
              <span class="ts-text">{{ $con->info }}</span>
            </a></li>

          @elseif ($con->channel==5)
          <li><a href="{{ $con->info }}" class="h-bg-facebook">
              <span class="ts-icon">
                <i class="fa-brands fa-facebook-f"></i></span>
              <span class="ts-text">Facebook</span>
            </a></li>

          @elseif ($con->channel==11)
          <li><a href="{{ $con->info }}" class="h-bg-facebook">
              <span class="ts-icon">
                <i class="fab fa-twitter"></i>
              </span>
              <span class="ts-text">Twitter</span>
            </a></li>

          @elseif ($con->channel==6)
          <li><a href="{{ $con->info }}" class="h-bg-instagram">
              <span class="ts-icon">
                <i class="fa-brands fa-instagram"></i>
              </span>
              <span class="ts-text">Instagram</span>
            </a></li>

          @elseif ($con->channel==10)
          <li><a href="{{ $con->info }}" class="h-bg-instagram">
              <span class="ts-icon">
                <i class="fab fa-tiktok"></i>
              </span>
              <span class="ts-text">TikTok</span>
            </a></li>

          @elseif ($con->channel==9)
          <li><a href="{{ $con->info }}" class="h-bg-instagram">
              <span class="ts-icon">
                <i class="fab fa-snapchat-square"></i>
              </span>
              <span class="ts-text">SnapChat</span>
            </a></li>

          @elseif ($con->channel==7)
          <li><a href="{{ $con->info }}" class="h-bg-instagram">
              <span class="ts-icon">
                <i class="fab fa-linkedin"></i>
              </span>
              <span class="ts-text">LinkedIn</span>
            </a></li>

          @elseif ($con->channel==3)
          <li><a href="mailto:{{ $con->info }}" class="h-bg-instagram">
              <span class="ts-icon">
                <i class="bi-envelope-fill"></i>
              </span>
              <span class="ts-text">{{ $con->ifo }}</span>
            </a></li>
          @endif
          @endforeach
        </ul><!-- #top-social end -->

      </div>
    </div>
  </div>
</div>
@endif

@if ($companyPhotos->count()>0)
<div class="section my-0 pb-0 border-0">
  <div class="container">
    <h4 class="fs-4 fw-medium text-center">{{ __('front.Our Gallery') }}</h4>
  </div>
</div>

<div id="related-portfolio" class="owl-carousel owl-carousel-full portfolio-carousel footer-stick carousel-widget" data-margin="1" data-pagi="false"
  data-autoplay="5000" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-xl="4">
  @foreach ($companyPhotos as $photo)
  <div class="oc-item">
    <div class="portfolio-item">
      <div class="portfolio-image">
        <a href="portfolio-single.html">
          <img src="{{ url('storage/app/public/imgs/companies').'/'.$photo->photo }}" alt="{{ $photo->photo }}">
        </a>
      </div>
      <div class="portfolio-desc">
        <h3>{{ $photo->service_gallery->name_en }}</h3>
        @if (array_key_exists($photo->service_id,$servicesPrice)&&$servicesPrice[$photo->service_id]>0)
        <span class="d-flex justify-content-start"><strong>{{ __('front.Price') }}:</strong><span>{{ $servicesPrice[$photo->service_id] }}</span>
          <span>{{
            $company->country_company->currency_code }}</span></span>
        @else
        <span><strong>{{ __('font.Price') }}:</strong>{{ __('front.Indeterminate') }}</span>
        @endif

      </div>
    </div>
  </div>
  @endforeach
</div>
@endif

@endsection
{{--
================================
=
================================
--}}