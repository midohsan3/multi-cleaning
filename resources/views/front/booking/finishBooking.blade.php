@extends('layouts.front')
{{--
================================
= Page Title
================================
--}}
@section('page_title')
{{__('front.Finish Booking')}}
@endsection

{{--
================================
= Page Header
================================
--}}
@section('body_title')
<div class="page-title-content">
    <h1>{{ __('front.Finish Booking') }}</h1>

</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.home',Str::lower($country->country_code)) }}">{{ __('front.Home') }}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('front.Finish Booking') }}
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
<div class="row">
    <div class="alert alert-success" role="alert">
        <h3 class="alert-heading mb-3">{{ __('front.We Received Your Booking Successfully') }}</h3>
        <p class="mb-0">
            @if (App::getLocale()=='ar')
            تم استقبال حجز رقم <strong>{{ Str::padLeft($booking->ref,9,0) }}</strong>، لخدمة <strong>{{ $booking->service_order->name_ar}}</strong> ،
            في <strong>{{ date('d M Y',strtotime($booking->started_at)) }}</strong>, باجمالي مبلغ <strong>{{
                number_format($booking->total,2).' '.$country->currency_code }}</strong>.
            @else
            Your Booking No. Is <strong>{{ Str::padLeft($booking->ref,9,0) }}</strong> , For service <strong>{{ $booking->service_order->name_en
                }}</strong> , At <strong>{{ date('d M Y',strtotime($booking->started_at)) }}</strong>, with Total <strong>{{
                number_format($booking->total,2).' '.$country->currency_code }}</strong>.
            @endif
        </p>
        <hr>
        <p class="mb-0">{{ __('front.Thank You.') }}</p>
        <a href="{{ route('front.home',Str::lower($country->country_code)) }}" class="btn btn-primary">{{ __('front.Home') }}</a>
    </div>
</div>
@endsection
{{--
================================
=
================================
--}}
