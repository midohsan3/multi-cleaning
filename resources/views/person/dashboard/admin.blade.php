@extends('layouts.admin')

{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.Dashboard') }}
@endsection
{{--
===========================
* PAGE BODY
===========================
--}}
@section('page-body')
<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">
                    {{ Auth::user()->name }}
                </h3>
                <div class="nk-block-des text-soft">
                    <p>Smart-Cleaning Systems</p>
                </div>
            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-md-4">
                <div class="card card-bordered card-full">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                            <div class="card-title">
                                <h6 class="subtitle">Total Views</h6>
                            </div>
                        </div>
                        <div class="card-amount">
                            <span class="amount"> 00 </span>
                        </div>
                        <div class="invest-data">
                            <div class="invest-data-amount g-2">
                                <div class="invest-data-history">
                                    <div class="title">This Month</div>
                                    <div class="amount">00 </div>
                                </div>
                                <div class="invest-data-history">
                                    <div class="title">This Week</div>
                                    <div class="amount">00 </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->


            <div class="col-md-6 col-xxl-4">
                <div class="card card-bordered h-100">
                    <div class="card-inner border-bottom">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">{{ __('admin.Profile Complete') }}</h6>
                            </div>

                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="timeline">

                            <ul class="timeline-list">

                                <div class="timeline-status bg-primary"></div>
                                @if (empty(Auth::user()->profile_pic))
                                <li class="timeline-item">
                                    <div class="timeline-date">{{ __('admin.Pending') }} <em class="icon ni ni-alarm-alt"></em></div>
                                    <div class="timeline-data">
                                        <h6 class="timeline-title"><a href="{{ route('person.profile.photo.create') }}">{{ __('admin.Profile Photo')
                                                }}</a>
                                        </h6>
                                        <div class="timeline-des">
                                            <p>{{ __('admin.Profile Photo') }}</p>
                                        </div>
                                    </div>
                                </li>
                                @else
                                <li class="timeline-item">
                                    <div class="timeline-date text-success">{{ __('admin.Complete') }} <i class="icon fas fa-check"></i></div>
                                    <div class="timeline-data">
                                        <h6 class="timeline-title">{{ __('admin.Profile Photo') }}</h6>
                                        <div class="timeline-des">
                                            <p>{{ __('admin.Profile Photo') }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endif

                                @if (empty($company->license))
                                <li class="timeline-item">
                                    <div class="timeline-date">{{ __('admin.Pending') }} <em class="icon ni ni-alarm-alt"></em></div>
                                    <div class="timeline-data">
                                        <h6 class="timeline-title"><a href="{{ route('person.profile.edit') }}">{{ __('admin.CV')
                                                }}</a></h6>
                                        <div class="timeline-des">
                                            <p>{{ __('admin.Upload Your CV') }}</p>
                                        </div>
                                    </div>
                                </li>
                                @else
                                <li class="timeline-item">
                                    <div class="timeline-date text-success">{{ __('admin.Complete') }} <i class="icon fas fa-check"></i></div>
                                    <div class="timeline-data">
                                        <h6 class="timeline-title">{{ __('admin.CV') }}</h6>
                                        <div class="timeline-des">
                                            <p>{{ __('admin.Upload Your CV') }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->

        </div>
    </div>
</div>
@endsection