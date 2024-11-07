@extends('layouts.front')
{{--
================================
= Page Title
================================
--}}
@section('page_title')
{{ __('front.CVs') }}
@endsection

{{--
================================
= Page Header
================================
--}}
@section('body_title')
<div class="page-title-content">
    <h1>{{ __('front.People Looking For Work') }}</h1>
    <span>
        {{ __('front.CVs') }}
    </span>
</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.home',Str::lower($country->country_code)) }}">{{ __('front.Home') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('front.CVs') }}
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


@if ($cvs->count()>0)
<div class="row col-mb-50">
    @foreach ($cvs as $cv)
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                @if ($cv->user_person->profile_pic)
                <img src="{{ url('storage/app/public/imgs/users/'.$cv->user_person->profile_pic) }}" alt="{{ $cv->user_person->profile_pic }}"
                    class="rounded-circle me-3" width="64" height="64" />
                @else
                <img src="{{ url('imgs/logo.jpg') }}" alt="{{ $cv->user_person->name }}" class="rounded-circle me-3" width="64" height="64" />
                @endif
                <div>
                    <h4 class="text-center text-primary mb-0 me-4">
                        {{Str::limit( $cv->user_person->name,50) }}
                    </h4>
                    <small class="text-muted mb-0 fw-normals">
                        <strong>{{ __('front.Age') }}:{{ Carbon\Carbon::parse($cv->birth_date)->age }}</strong>
                    </small>
                    <br />
                    <small class="text-muted mb-0 fw-normals">
                        {{ $cv->specialist }}
                    </small>
                </div>
                <div>
                    <small>
                        {{Carbon\Carbon::parse($cv->created_at)->diffForHumans()}}
                    </small>
                </div>
                <div>
                    @if ($cv->user_person->phone!==null)
                    <a href="tel:{{ $cv->user_person->phone }}" class="social-icon rounded-circle mb-0 border-transparent text-white bg-facebook">
                        <i class="fas fa-mobile-android-alt fa-2x "></i>
                        <i class="fas fa-mobile-android-alt fa-2x  "></i>
                    </a>
                    @endif

                    @if ($cv->user_person->email!==null)
                    <a href="mailto:{{ $cv->user_person->email }}" class="social-icon rounded-circle mb-0 border-transparent text-white bg-facebook">
                        <i class="far fa-envelope fa-2x "></i>
                        <i class="far fa-envelope fa-2x "></i>
                    </a>
                    @endif

                    <a href="{{ url('imgs/cvs/'.$cv->cv) }}" class="social-icon rounded-circle mb-0 border-transparent text-white bg-rss">
                        <i class="fal fa-file-download fa-2x"></i>
                        <i class="fal fa-file-download fa-2x"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{ $cvs->links('pagination::bootstrap-5') }}

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
