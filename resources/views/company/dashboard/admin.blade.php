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
          @if (App::getLocale()=='ar')
          {{ Auth::user()->company_user->name_ar }}
          @else
          {{ Auth::user()->company_user->name_en }}
          @endif
        </h3>
        <div class="nk-block-des text-soft">
          <p>Smart-Cleaning Systems</p>
        </div>
      </div><!-- .nk-block-head-content -->
      <div class="nk-block-head-content">
        <div class="toggle-wrap nk-block-tools-toggle">
          <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
          <div class="toggle-expand-content" data-content="pageMenu">
            <ul class="nk-block-tools g-3">

              <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-reports"></em><span>{{
                    __('admin.Reports') }}</span></a></li>
            </ul>
          </div><!-- .toggle-expand-content -->
        </div><!-- .toggle-wrap -->
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

      <div class="col-md-4">
        <div class="card card-bordered card-full">
          <div class="card-inner">
            <div class="card-title-group align-start mb-0">
              <div class="card-title">
                <h6 class="subtitle">Total Booking</h6>
              </div>

            </div>
            <div class="card-amount">
              <span class="amount"> 000
              </span>
            </div>
            <div class="invest-data">
              <div class="invest-data-amount g-2">
                <div class="invest-data-history">
                  <div class="title">This Month</div>
                  <div class="amount">00</div>
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
      <div class="col-md-4">
        <div class="card card-bordered  card-full">
          <div class="card-inner">
            <div class="card-title-group align-start mb-0">
              <div class="card-title">
                <h6 class="subtitle">Booking Amount</h6>
              </div>

            </div>
            <div class="card-amount">
              <span class="amount"> 0,00 <span class="currency currency-usd">{{ $company->country_company->currency_code }}</span>
              </span>
            </div>
            <div class="invest-data">
              <div class="invest-data-amount g-2">
                <div class="invest-data-history">
                  <div class="title">This Month</div>
                  <div class="amount">0,00 <span class="currency currency-usd"> {{ $company->country_company->currency_code }} </span></div>
                </div>
                <div class="invest-data-history">
                  <div class="title">This Week</div>
                  <div class="amount">0,00 <span class="currency currency-usd"> {{ $company->country_company->currency_code }} </span></div>
                </div>
              </div>
              <div class="invest-data-ck">
                <canvas class="iv-data-chart" id="totalBalance"></canvas>
              </div>
            </div>
          </div>
        </div><!-- .card -->
      </div><!-- .col -->
      <div class="col-md-6 col-xxl-4">
        <div class="card card-bordered card-full">
          <div class="card-inner">
            <div class="card-title-group mb-1">
              <div class="card-title">
                <h6 class="title">{{ __('admin.Earnings Summary') }}</h6>
                <p>{{ __('admin.Current Month Earning') }}</p>
              </div>
            </div>
            <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">

              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
              </li>
              {{--
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#thisyear">This Year</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#alltime">All Time</a>
              </li>
              --}}
            </ul>
            <div class="tab-content mt-0">
              <div class="tab-pane active" id="overview">
                <div class="invest-ov gy-2">
                  <div class="subtitle">{{ __('admin.Current Month') }}</div>
                  <div class="invest-ov-details">
                    <div class="invest-ov-info">
                      <div class="amount">00,00 <span class="currency currency-usd">{{ $company->country_company->currency_code
                          }}</span></div>
                      <div class="title">{{ __('admin.Cash') }}</div>
                    </div>
                    <div class="invest-ov-stats">
                      <div><span class="amount">00</span>
                      </div>
                      <div class="title">{{ __('admin.Bills') }}</div>
                    </div>
                  </div>
                  <div class="invest-ov-details">
                    <div class="invest-ov-info">
                      <div class="amount">00,00 <span class="currency currency-usd">{{ $company->country_company->currency_code}}
                        </span></div>
                      <div class="title">{{ __('admin.Online') }}</div>
                    </div>
                  </div>
                </div>
                <div class="invest-ov gy-2">
                  <div class="subtitle">{{ __('admin.Last Month') }}</div>
                  <div class="invest-ov-details">
                    <div class="invest-ov-info">
                      <div class="amount">00,00 <span class="currency currency-usd"> {{ $company->country_company->currency_code}}
                        </span></div>
                      <div class="title">{{ __('admin.Total') }}</div>
                    </div>
                    <div class="invest-ov-stats">
                      <div><span class="amount">00</span></div>
                      <div class="title">{{ __('admin.Bills') }}</div>
                    </div>
                  </div>
                </div>
              </div>
              {{--
              <div class="tab-pane" id="thisyear">
                <div class="invest-ov gy-2">
                  <div class="subtitle">{{ __('admin.Current Month Booking') }}</div>
                  <div class="invest-ov-details">
                    <div class="invest-ov-info">
                      <div class="amount">89,395.395 <span class="currency currency-usd">USD</span></div>
                      <div class="title">Amount</div>
                    </div>
                    <div class="invest-ov-stats">
                      <div><span class="amount">96</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span>
                      </div>
                      <div class="title">Plans</div>
                    </div>
                  </div>
                  <div class="invest-ov-details">
                    <div class="invest-ov-info">
                      <div class="amount">99,395.395 <span class="currency currency-usd">USD</span></div>
                      <div class="title">Paid Profit</div>
                    </div>
                  </div>
                </div>
                <div class="invest-ov gy-2">
                  <div class="subtitle">Investment in this Month</div>
                  <div class="invest-ov-details">
                    <div class="invest-ov-info">
                      <div class="amount">149,395.395 <span class="currency currency-usd">USD</span></div>
                      <div class="title">Amount</div>
                    </div>
                    <div class="invest-ov-stats">
                      <div><span class="amount">83</span><span class="change down text-danger"><em
                            class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                      <div class="title">Plans</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="alltime">
                <div class="invest-ov gy-2">
                  <div class="subtitle">Currently Actived Investment</div>
                  <div class="invest-ov-details">
                    <div class="invest-ov-info">
                      <div class="amount">249,395.395 <span class="currency currency-usd">USD</span></div>
                      <div class="title">Amount</div>
                    </div>
                    <div class="invest-ov-stats">
                      <div><span class="amount">556</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span>
                      </div>
                      <div class="title">Plans</div>
                    </div>
                  </div>
                  <div class="invest-ov-details">
                    <div class="invest-ov-info">
                      <div class="amount">149,395.395 <span class="currency currency-usd">USD</span></div>
                      <div class="title">Paid Profit</div>
                    </div>
                  </div>
                </div>
                <div class="invest-ov gy-2">
                  <div class="subtitle">Investment in this Month</div>
                  <div class="invest-ov-details">
                    <div class="invest-ov-info">
                      <div class="amount">249,395.395 <span class="currency currency-usd">USD</span></div>
                      <div class="title">Amount</div>
                    </div>
                    <div class="invest-ov-stats">
                      <div><span class="amount">223</span><span class="change down text-danger"><em
                            class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                      <div class="title">Plans</div>
                    </div>
                  </div>
                </div>
              </div>
              --}}
            </div>
          </div>
        </div>
      </div><!-- .col -->

      <div class="col-md-6 col-xxl-4">
        <div class="card card-bordered card-full">
          <div class="card-inner d-flex flex-column h-100">
            <div class="card-title-group mb-3">
              <div class="card-title">
                <h6 class="title">{{ __('admin.Current Month Booking') }}</h6>
                <p></p>
              </div>

            </div>
            <div class="progress-list gy-3">
              <div class="progress-wrap">
                <div class="progress-text">
                  <div class="progress-label">{{ __('admin.Total') }}</div>
                  <div class="progress-amount">00</div>
                </div>
                <div class="progress progress-md">
                  <div class="progress-bar" data-progress="00"></div>
                </div>
              </div>
              <div class="progress-wrap">
                <div class="progress-text">
                  <div class="progress-label">{{ __('admin.Complete') }}</div>
                  <div class="progress-amount">00</div>
                </div>
                <div class="progress progress-md">
                  <div class="progress-bar bg-orange" data-progress="00"></div>
                </div>
              </div>
              <div class="progress-wrap">
                <div class="progress-text">
                  <div class="progress-label">{{ __('admin.In Schedule') }}</div>
                  <div class="progress-amount">00</div>
                </div>
                <div class="progress progress-md">
                  <div class="progress-bar bg-teal" data-progress="00"></div>
                </div>
              </div>
              <div class="progress-wrap">
                <div class="progress-text">
                  <div class="progress-label">{{ __('admin.Canceled') }}</div>
                  <div class="progress-amount">00</div>
                </div>
                <div class="progress progress-md">
                  <div class="progress-bar bg-pink" data-progress="00"></div>
                </div>
              </div>
              <div class="progress-wrap">
                <div class="progress-text">
                  <div class="progress-label">{{ __('admin.Pending Bills') }}</div>
                  <div class="progress-amount">00</div>
                </div>
                <div class="progress progress-md">
                  <div class="progress-bar bg-azure" data-progress="00"></div>
                </div>
              </div>
            </div>
            <div class="invest-top-ck mt-auto">
              <canvas class="iv-plan-purchase" id="planPurchase"></canvas>
            </div>
          </div>
        </div>
      </div><!-- .col -->

      <div class="col-md-6 col-xxl-4">
        <div class="card card-bordered card-full">
          <div class="card-inner border-bottom">
            <div class="card-title-group">
              <div class="card-title">
                <h6 class="title">{{ __('admin.My Services') }}</h6>
              </div>
            </div>
          </div>
          <ul class="nk-activity">
            @if ($services->count()>0)
            @foreach ($services as $service)
            <li class="nk-activity-item">
              <div class="nk-activity-media user-avatar bg-warning">SR</div>
              <div class="nk-activity-data">
                <div class="label">
                  @if (App::getLocale()=='ar')
                  {{ $service->name_ar }}
                  @else
                  {{ $service->name_en}}
                  @endif
                </div>
                <span class="time">2 hours ago</span>
              </div>
            </li>
            @endforeach
            @endif
          </ul>
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
                    <h6 class="timeline-title"><a href="{{ route('company.logo.create') }}">{{ __('admin.Company Logo') }}</a></h6>
                    <div class="timeline-des">
                      <p>{{ __('admin.Upload Logo') }}</p>
                    </div>
                  </div>
                </li>
                @else
                <li class="timeline-item">
                  <div class="timeline-date text-success">{{ __('admin.Complete') }} <i class="icon fas fa-check"></i></div>
                  <div class="timeline-data">
                    <h6 class="timeline-title">{{ __('admin.Company Logo') }}</h6>
                    <div class="timeline-des">
                      <p>{{ __('admin.Company Logo') }}</p>
                    </div>
                  </div>
                </li>
                @endif

                @if (empty($company->license))
                <li class="timeline-item">
                  <div class="timeline-date">{{ __('admin.Pending') }} <em class="icon ni ni-alarm-alt"></em></div>
                  <div class="timeline-data">
                    <h6 class="timeline-title"><a href="{{ route('company.license.create') }}">{{ __('admin.Company License') }}</a></h6>
                    <div class="timeline-des">
                      <p>{{ __('admin.Upload License') }}</p>
                    </div>
                  </div>
                </li>
                @else
                <li class="timeline-item">
                  <div class="timeline-date text-success">{{ __('admin.Complete') }} <i class="icon fas fa-check"></i></div>
                  <div class="timeline-data">
                    <h6 class="timeline-title">{{ __('admin.Company License') }}</h6>
                    <div class="timeline-des">
                      <p>{{ __('admin.Company License') }}</p>
                    </div>
                  </div>
                </li>
                @endif


              </ul>
            </div>
          </div>
        </div><!-- .card -->
      </div><!-- .col -->
      <div class="col-xl-12 col-xxl-8">
        <div class="card card-bordered card-full">
          <div class="card-inner border-bottom">
            <div class="card-title-group">
              <div class="card-title">
                <h6 class="title">{{ __('admin.Current Booking') }}</h6>
              </div>
              <div class="card-tools">
                <a href="{{ route('company.booking.index') }}" class="link">{{ __('admin.View All') }}</a>
              </div>
            </div>
          </div>
          <div class="nk-tb-list">
            <div class="nk-tb-item nk-tb-head">
              <div class="nk-tb-col"><span>{{ __('admin.Booking No.') }}</span></div>
              <div class="nk-tb-col tb-col-sm"><span>{{ __('admin.Client') }}</span></div>
              <div class="nk-tb-col tb-col-lg"><span>{{ __('admin.Date') }}</span></div>
              <div class="nk-tb-col"><span>{{ __('admin.Amount') }}</span></div>
              <div class="nk-tb-col tb-col-sm"><span>&nbsp;</span></div>
              <div class="nk-tb-col"><span>&nbsp;</span></div>
            </div>
            {{--
            <div class="nk-tb-item">
              <div class="nk-tb-col">
                <div class="align-center">
                  <div class="user-avatar user-avatar-sm bg-light">
                    <span>P1</span>
                  </div>
                  <span class="tb-sub ml-2">Silver <span class="d-none d-md-inline">- Daily 4.76% for 21 Days</span></span>
                </div>
              </div>
              <div class="nk-tb-col tb-col-sm">
                <div class="user-card">
                  <div class="user-avatar user-avatar-xs bg-pink-dim">
                    <span>JC</span>
                  </div>
                  <div class="user-name">
                    <span class="tb-lead">Janice Carroll</span>
                  </div>
                </div>
              </div>
              <div class="nk-tb-col tb-col-lg">
                <span class="tb-sub">18/10/2019</span>
              </div>
              <div class="nk-tb-col">
                <span class="tb-sub tb-amount">1.094780 <span>BTC</span></span>
              </div>
              <div class="nk-tb-col tb-col-sm">
                <div class="progress progress-sm w-80px">
                  <div class="progress-bar" data-progress="75"></div>
                </div>
              </div>
              <div class="nk-tb-col nk-tb-col-action">
                <div class="dropdown">
                  <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em
                      class="icon ni ni-chevron-right"></em></a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                    <ul class="link-list-plain">
                      <li><a href="#">View</a></li>
                      <li><a href="#">Invoice</a></li>
                      <li><a href="#">Print</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="nk-tb-item">
              <div class="nk-tb-col">
                <div class="align-center">
                  <div class="user-avatar user-avatar-sm bg-light">
                    <span>P2</span>
                  </div>
                  <span class="tb-sub ml-2">Dimond <span class="d-none d-md-inline">- Daily 8.52% for 14 Days</span></span>
                </div>
              </div>
              <div class="nk-tb-col tb-col-sm">
                <div class="user-card">
                  <div class="user-avatar user-avatar-xs bg-azure-dim">
                    <span>VA</span>
                  </div>
                  <div class="user-name">
                    <span class="tb-lead">Victoria Aguilar</span>
                  </div>
                </div>
              </div>
              <div class="nk-tb-col tb-col-lg">
                <span class="tb-sub">18/10/2019</span>
              </div>
              <div class="nk-tb-col">
                <span class="tb-sub tb-amount">1.094780 <span>BTC</span></span>
              </div>
              <div class="nk-tb-col tb-col-sm">
                <span class="tb-sub text-success">Completed</span>
              </div>
              <div class="nk-tb-col nk-tb-col-action">
                <div class="dropdown">
                  <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em
                      class="icon ni ni-chevron-right"></em></a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                    <ul class="link-list-plain">
                      <li><a href="#">View</a></li>
                      <li><a href="#">Invoice</a></li>
                      <li><a href="#">Print</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="nk-tb-item">
              <div class="nk-tb-col">
                <div class="align-center">
                  <div class="user-avatar user-avatar-sm bg-light">
                    <span>P3</span>
                  </div>
                  <span class="tb-sub ml-2">Platinam <span class="d-none d-md-inline">- Daily 14.82% for 7 Days</span></span>
                </div>
              </div>
              <div class="nk-tb-col tb-col-sm">
                <div class="user-card">
                  <div class="user-avatar user-avatar-xs bg-purple-dim">
                    <span>EH</span>
                  </div>
                  <div class="user-name">
                    <span class="tb-lead">Emma Henry</span>
                  </div>
                </div>
              </div>
              <div class="nk-tb-col tb-col-lg">
                <span class="tb-sub">18/10/2019</span>
              </div>
              <div class="nk-tb-col">
                <span class="tb-sub tb-amount">1.094780 <span>BTC</span></span>
              </div>
              <div class="nk-tb-col tb-col-sm">
                <span class="tb-sub text-success">Completed</span>
              </div>
              <div class="nk-tb-col nk-tb-col-action">
                <div class="dropdown">
                  <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em
                      class="icon ni ni-chevron-right"></em></a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                    <ul class="link-list-plain">
                      <li><a href="#">View</a></li>
                      <li><a href="#">Invoice</a></li>
                      <li><a href="#">Print</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="nk-tb-item">
              <div class="nk-tb-col">
                <div class="align-center">
                  <div class="user-avatar user-avatar-sm bg-light">
                    <span>P1</span>
                  </div>
                  <span class="tb-sub ml-2">Silver <span class="d-none d-md-inline">- Daily 4.76% for 21 Days</span></span>
                </div>
              </div>
              <div class="nk-tb-col tb-col-sm">
                <div class="user-card">
                  <div class="user-avatar user-avatar-xs bg-teal-dim">
                    <span>AF</span>
                  </div>
                  <div class="user-name">
                    <span class="tb-lead">Alice Ford</span>
                  </div>
                </div>
              </div>
              <div class="nk-tb-col tb-col-lg">
                <span class="tb-sub">18/10/2019</span>
              </div>
              <div class="nk-tb-col">
                <span class="tb-sub tb-amount">1.094780 <span>BTC</span></span>
              </div>
              <div class="nk-tb-col tb-col-sm">
                <span class="tb-sub text-success">Completed</span>
              </div>
              <div class="nk-tb-col nk-tb-col-action">
                <div class="dropdown">
                  <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em
                      class="icon ni ni-chevron-right"></em></a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                    <ul class="link-list-plain">
                      <li><a href="#">View</a></li>
                      <li><a href="#">Invoice</a></li>
                      <li><a href="#">Print</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="nk-tb-item">
              <div class="nk-tb-col">
                <div class="align-center">
                  <div class="user-avatar user-avatar-sm bg-light">
                    <span>P3</span>
                  </div>
                  <span class="tb-sub ml-2">Platinam <span class="d-none d-md-inline">- Daily 14.82% for 7 Days</span></span></span>
                </div>
              </div>
              <div class="nk-tb-col tb-col-sm">
                <div class="user-card">
                  <div class="user-avatar user-avatar-xs bg-orange-dim">
                    <span>HW</span>
                  </div>
                  <div class="user-name">
                    <span class="tb-lead">Harold Walker</span>
                  </div>
                </div>
              </div>
              <div class="nk-tb-col tb-col-lg">
                <span class="tb-sub">18/10/2019</span>
              </div>
              <div class="nk-tb-col">
                <span class="tb-sub tb-amount">1.094780 <span>BTC</span></span>
              </div>
              <div class="nk-tb-col tb-col-sm">
                <span class="tb-sub text-success">Completed</span>
              </div>
              <div class="nk-tb-col nk-tb-col-action">
                <div class="dropdown">
                  <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em
                      class="icon ni ni-chevron-right"></em></a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                    <ul class="link-list-plain">
                      <li><a href="#">View</a></li>
                      <li><a href="#">Invoice</a></li>
                      <li><a href="#">Print</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            --}}
          </div>
        </div><!-- .card -->
      </div><!-- .col -->
    </div>
  </div>
</div>
@endsection