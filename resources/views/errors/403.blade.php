{{--
@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
--}}

@extends('layouts.error')
@section('error-msg')
<h1 class="nk-error-head">403</h1>
@if (App::getLocale()=='ar')
<h3 class="nk-error-title">باقتك لا تدعم هذه الميزه</h3>
<p class="nk-error-text">من فضلك قم بترقية الباقة الخاصة بك لتتمكن من استخدام الميزه </p>
<p class="nk-error-text">تواصل معنا على </p>
<p class="nk-error-text">info@smart-clening.live</p>
<p class="nk-error-text">واتس: 971502516985</p>
@else
<h3 class="nk-error-title">Your Package Not Support This Feautre</h3>
<p class="nk-error-text">Please Upgread Your Package To Can Use This Feautre.</p>
<p class="nk-error-text">Contact Us For Upgrade At</p>
<p class="nk-error-text">info@smart-clening.live</p>
<p class="nk-error-text">WhatsApp: +971502516985</p>
@endif

@endsection