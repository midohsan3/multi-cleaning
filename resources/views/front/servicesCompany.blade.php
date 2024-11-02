@extends('layouts.front')
{{--
================================
= Page Title
================================
--}}
@section('page_title')
@if (App::getLocale()=='ar')
{{ $service->name_ar }}
@else
{{ $service->name_en }}
@endif
@endsection

{{--
================================
= Page Header
================================
--}}
@section('body_title')
<div class="page-title-content">
    @if (App::getLocale()=='ar')
    <h1>{{ $service->name_ar }}</h1>
    <span>
        {{ $activity->name_ar }}
    </span>
    @else
    <h1>{{ $service->name_en }}</h1>
    <span>
        {{ $activity->name_en }}
    </span>
    @endif

</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.home',Str::lower($country->country_code)) }}">{{ __('front.Home') }}</a></li>
        <li class="breadcrumb-item"><a
                href="{{ route('front.home.activities',['country_code'=>Str::lower($country->country_code),'activity'=>$activity->id]) }}">
                @if (App::getLocale()=='ar')
                {{ $activity->name_ar }}
                @else
                {{ $activity->name_en }}
                @endif
            </a></li>
        <li class="breadcrumb-item active" aria-current="page">
            @if (App::getLocale()=='ar')
            {{ $service->name_ar }}
            @else
            {{ $service->name_en }}
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


@if ($companies->count()>0)
<div class="row col-mb-50">
    @foreach ($companies as $company)
    <div class="col-lg-3 col-sm-6 mb-4">
        <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
            <div class="fbox-icon">
                <i>
                    @if (array_key_exists($company->id,$servicesPhoto)&& $servicesPhoto[$company->id]!==null)
                    <img src="{{ url('storage/app/public/imgs/services/'.$servicesPhoto[$company->id]) }}" class="border-0 bg-transparent shadow-sm"
                        style="z-index: 2;" alt="{{ $company->name_en }}">
                    @else
                    <img src="{{ url('storage/app/public/imgs/users/'.$company->user_company->profile_pic) }}"
                        class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="{{ $company->name_en }}">
                    @endif
                </i>
            </div>
            <div class="fbox-content">
                <h3 class="mb-4 text-transform-none ls-0"><a
                        href="{{ route('front.home.company.single',['country_code'=>$country->country_code,'company_url'=>$company->url]) }}"
                        style="color:blue!important; font-size: large;">
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
                <div>
                    @if (array_key_exists($company->id,$servicesPrice)&& $servicesPrice[$company->id]>0)
                    <strong>{{ __('front.Price') }}:</strong><span>{{ number_format($servicesPrice[$company->id],2) }}</span><span>{{
                        $company->country_company->currency_code }}</span>
                    <span><a class="btn btn-primary">{{ __('front.Book Now') }}</a></span>
                    @else
                    <strong>{{ __('front.Price') }}:</strong><span>{{ __('front.Indeterminate') }}</span>
                    <span><a href="{{ route('front.home.company.single',['country_code'=>$country->country_code,'company_url'=>$company->url]) }}"
                            class="btn btn-info">{{ __('front.View') }}</a></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-success" role="alert">
    <h3 class="alert-heading mb-3">{{ __('front.Service Will Be Available Soon') }}</h3>
    <p class="mb-0">
        @if (App::getLocale()=='ar')
        لدينا بعض المراجعات الخاصة بالخدمة ، لضمان جوده خدماتنا دائما ،سوف يتم الانتهاء منها قريبا.
        @else
        We have some service reviews, to ensure our service quality always, We will be completed soon.
        @endif
    </p>
    <hr>
    <p class="mb-0">{{ __('front.Thank You For Understanding.') }}</p>
</div>
@endif

@if ($relatedServices->count()>0)
<section id="content">
    <div class="negetive-margin">
        <div class="container pt-5">
            <div class="fancy-title title-border title-center mb-5">
                <h1 class="text-center">
                    {{__('front.Related Services')}}
                </h1>
            </div>
        </div>
    </div>
</section>
<div class="row col-mb-50">
    @foreach ($relatedServices as $service)
    <div class="col-sm-6 col-lg-4">
        <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
            <div class="fbox-icon">
                <a
                    href="{{ route('front.home.services',['country_code'=>Str::lower($country->country_code),'activity'=>$activity->id,'service'=>$service->id]) }}">
                    @if (empty($service->og_image))
                    <img src="{{ url('imgs/logo.jpg') }}" class="card-img-top" alt="{{ $service->name_en }}">
                    @else
                    <img src="{{ url('storage/app/public/imgs/services'.'/'.$service->og_image) }}" class="card-img-top"
                        alt="{{ $service->name_en }}">
                    @endif
                </a>
            </div>
            <div class="fbox-content">
                <h3><a
                        href="{{ route('front.home.services',['country_code'=>Str::lower($country->country_code),'activity'=>$activity->id,'service'=>$service->id]) }}">
                        @if (App::getLocale()=='ar')
                        {{ $service->name_ar }}
                        @else
                        {{ $service->name_en }}
                        @endif
                    </a></h3>
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