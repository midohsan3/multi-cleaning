@extends('layouts.front')
{{--
================================
= Page Title
================================
--}}
@section('page_title')
@if (App::getLocale()=='ar')
{{ $activity->name_ar }}
@else
{{ $activity->name_en }}
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
    <h1>{{ $activity->name_ar }}</h1>
    <span>
        {{ $activity->description_ar }}
    </span>
    @else
    <h1>{{ $activity->name_en }}</h1>
    <span>
        {{ $activity->description_en }}
    </span>
    @endif

</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.home',Str::lower($country->country_code)) }}">{{ __('front.Home') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            @if (App::getLocale()=='ar')
            {{ $activity->name_ar }}
            @else
            {{ $activity->name_en }}
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


@if ($services->count()>0)
<div class="row col-mb-50">
    @foreach ($services as $service)
    @if (array_key_exists($service->id,$companiesServices))
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
                        <span class="subtitle">
                            @if (array_key_exists($service->id,$companiesServices))
                            {{ $companiesServices[$service->id] }} <span>{{ __('front.Company') }}</span>
                            @endif
                        </span>
                    </a></h3>
            </div>
        </div>
    </div>
    @endif
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

@endsection
{{--
================================
=
================================
--}}