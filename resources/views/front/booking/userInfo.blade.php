@extends('layouts.front')
{{--
================================
= Page Title
================================
--}}
@section('page_title')
{{__('front.Customer Information')}}
@endsection

{{--
================================
= Page Header
================================
--}}
@section('body_title')
<div class="page-title-content">
    <h1>{{ __('front.New Booking') }}</h1>
    <span>
        @if (App::getLocale()=='ar')
        <span>{{ __('front.Service').' '. $service->name_ar }}</span>
        @else
        <span>{{ __('front.Service').' '. $service->name_en }}</span>
        @endif
        <span><strong>{{ __('front.Price')}}:</strong>{{number_format($price->price,2) .' '.$country->currency_code}}/{{ __('front.Hour') }}</span>
    </span>
</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.home',Str::lower($country->country_code)) }}">{{ __('front.Home') }}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('front.New Booking') }}
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
    <form action="{{ route('front.booking.store',Str::lower($country->country_code)) }}" method="POST" style="max-width: 35rem;">
        @csrf
        <input hidden name="company" value="{{ $company->id }}" />
        <input hidden name="service" value="{{ $service->id }}" />
        <input hidden name="price" value="{{ $price->price }}" />
        <div class="col">
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('front.Your Name') }} *" required autofocus />
                @error('name')
                <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col">
            <div class="form-group inline">
                <div class="input-group">
                    <div class="col-2">
                        <input type="text" class="form-control" id="phonecode" name="phoneCode" value="{{ $country->phone_code }}" readonly />
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('front.Your Phone') }} *"
                            value="{{ old('phone') }}" required />
                        @error('phone')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
        <div class="col">
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email"
                    placeholder="{{ __('front.Email Address') }} {{ __('front.Optional') }}" />
                @error('email')
                <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="col">
            <div class="form-group inline">
                <div class="input-group">
                    <div class="col-3">
                        <select class="form-control" id="per" name="pare" required>
                            <option value="1" selected>{{ __('front.Hour') }}</option>
                            <option value="2">{{ __('front.Day') }}</option>
                            <option value="3">{{ __('front.Month') }}</option>
                        </select>
                    </div>
                    <div class="col-9">
                        <input type="number" class="form-control" id="duration" name="duration" min="1"
                            placeholder="{{ __('front.Booking Duration') }} *" value="{{ old('duration',1) }}" required />
                        @error('duration')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-group inline">
                <div class="input-group">
                    <div class="col-6">
                        <input type="date" class="form-control" id="startDate" name="startDate" value="{{ old('startDate') }}" required />
                    </div>
                    <div class="col-6">
                        <input type="time" class="form-control" id="startTime" name="startTime" value="{{ old('startTime') }}" />
                    </div>
                    @error('startTime')
                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <input type="text" class="form-control" id="address" name="address" placeholder="{{ __('front.Your Address') }}" />
                @error('address')
                <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="{{ __('front.Submit') }}" />
        </div>

    </form>
</div>
@endsection
{{--
================================
=
================================
--}}
