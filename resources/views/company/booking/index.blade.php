@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.Booking') }}
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
        <h3 class="nk-block-title page-title">{{ __('admin.Booking') }}</h3>
        <div class="nk-block-des text-soft">
          <p>{{ __('admin.You have total').' '.number_format($ordersCount,0).' '.
            __('admin.Booking')}}.</p>
        </div>
      </div>{{-- .nk-block-head-content --}}

      <div class="nk-block-head-content">
        <div class="toggle-wrap nk-block-tools-toggle">
          <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
          <div class="toggle-expand-content" data-content="pageMenu">
            <ul class="nk-block-tools g-3">

              <li><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>{{
                    __('admin.Export') }}</span></a>
              </li>
            </ul>
          </div>
        </div>{{-- .toggle-wrap --}}
      </div>{{-- .nk-block-head-content --}}
    </div>{{-- .nk-block-between --}}
  </div>{{-- .nk-block-head --}}


  <div class="nk-block">
    <div class="card card-bordered card-stretch">
      <div class="card-inner-group">

        <div class="nk-fmg-quick-list nk-block">


          @if ($orders->count()>0)
          <div class="card-inner position-relative card-tools-toggle">
            <div class="card-title-group">
              <div class="card-tools">
                <div class="form-inline flex-nowrap gx-3">
                  <div class="form-wrap w-150px">
                    <select class="form-select form-select-sm" data-search="off" data-placeholder="Bulk Action">
                      <option value="">Bulk Action</option>
                      <option value="email">{{ __('admin.Send Email') }}</option>
                      <option value="suspend">{{ __('admin.Suspend') }}</option>
                      <option value="delete">{{ __('admin.Delete') }}</option>
                    </select>
                  </div>
                  <div class="btn-wrap">
                    <span class="d-none d-md-block">
                      <button class="btn btn-dim btn-outline-light disabled">{{
                        __('admin.Apply') }}</button>
                    </span>
                    <span class="d-md-none">
                      <button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button>
                    </span>
                  </div>
                </div>{{-- .form-inline --}}
              </div>{{-- .card-tools --}}


              <div class="card-tools mr-n1">
                <ul class="btn-toolbar gx-1">
                  <li>
                    <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                  </li>{{-- li --}}
                </ul>{{-- .btn-toolbar --}}

              </div>{{-- .card-tools --}}
            </div>{{-- .card-title-group --}}

            <div class="card-search search-wrap" data-search="search">
              <div class="card-body">
                <div class="search-content">
                  <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                  <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or email">
                  <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                </div>
              </div>
            </div>{{-- .card-search --}}

          </div>{{-- .card-inner --}}

          <div class="card-inner p-0">
            <table class="nk-tb-list nk-tb-ulist is-compact">
              <thead>
                <tr class="nk-tb-item nk-tb-head">
                  <th class="nk-tb-col nk-tb-col-check">
                    <div class="custom-control custom-control-sm custom-checkbox notext">
                      <input type="checkbox" class="custom-control-input" id="uid">
                      <label class="custom-control-label" for="uid"></label>
                    </div>
                  </th>

                  <th class="nk-tb-col">
                    <span class="sub-text">{{ __('admin.No') }}</span>
                  </th>
                  <th class="nk-tb-col tb-col-lg">
                    <span class="sub-text">{{ __('admin.Customer') }}</span>
                  </th>
                  <th class="nk-tb-col tb-col-lg">
                    <span class="sub-text">{{ __('admin.Address') }}</span>
                  </th>
                  <th class="nk-tb-col tb-col-lg">
                    <span class="sub-text">{{ __('admin.Duration') }}</span>
                  </th>
                  <th class="nk-tb-col tb-col-lg">
                    <span class="sub-text">{{ __('admin.Service') }}</span>
                  </th>
                  <th class="nk-tb-col">
                    <span class="sub-text">{{ __('admin.Status') }}</span>
                  </th>
                  <th class="nk-tb-col tb-col-lg">
                    <span class="sub-text">{{ __('admin.Total') }}</span>
                  </th>
                  <th class="nk-tb-col nk-tb-col-tools text-right"> </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $booking)
                <tr class="nk-tb-item">
                  <td class="nk-tb-col nk-tb-col-check">
                    <div class="custom-control custom-control-sm custom-checkbox notext">
                      <input type="checkbox" class="custom-control-input" id="uid1">
                      <label class="custom-control-label" for="uid1"></label>
                    </div>
                  </td>
                  <td class="nk-tb-col">
                    <div class="user-card">
                      <div class="user-name">
                        <span class="tb-lead">
                          {{ Str::padLeft($booking->ref,9,0) }}
                        </span>
                      </div>
                    </div>
                  </td>

                  <td class="nk-tb-col tb-col-lg">
                    <span class="tb-lead">{{ $booking->customer_order->user_customer->name }}</span>
                    <span>
                      {{ $booking->customer_order->user_customer->phone }}

                    </span>
                  </td>

                  <td class="nk-tb-col tb-col-lg">
                    <span class="tb-lead">
                      {{ Str::limit($booking->customer_order->address) }}
                    </span>
                  </td>

                  <td class="nk-tb-col tb-col-lg">
                    <span>{{ $booking->duration }}</span>
                    <span>
                      @if ($booking->duration_by==1)
                      {{ __('admin.Hour') }}
                      @elseif($booking->duration_by==2)
                      {{ __('admin.Day') }}
                      @elseif($booking->duration_by==3)
                      {{ __('admin.Month') }}
                      @endif
                    </span>
                  </td>

                  <td class="nk-tb-col tb-col-lg">
                    <span class="tb-lead">
                      @if (isset($booking->service_id))
                      @if (App::getLocale()=='ar')
                      {{ $booking->service_order->name_ar }}
                      @else
                      {{ $booking->service_order->name_en }}
                      @endif
                      @endif
                    </span>
                    <span><strong>{{ __('admin.Price') }}:</strong><span class="amount">{{ number_format($booking->cost,2) }}<span class="currency">{{
                          $booking->country_order->currency_code }}</span></span></span>
                  </td>

                  <td class="nk-tb-col">
                    @if ($booking->status == 0)
                    <span class="tb-status text-warning">{{ __('admin.New') }}</span>
                    @elseif($booking->status == 1)
                    <span class="tb-status text-primary">{{ __('admin.Approved') }}</span>
                    @elseif($booking->status == 3)
                    <span class="tb-status text-info">{{ __('admin.In Schedule') }}</span>
                    @elseif($booking->status == 4)
                    <span class="tb-status text-success">{{ __('admin.Completed') }}</span>
                    @elseif($booking->status == 5)
                    <span class="tb-status text-danger">{{ __('admin.Canceled') }}</span>
                    @endif
                  </td>

                  <td class="nk-tb-col tb-col-lg">
                    <span class="amount">{{ number_format($booking->total,2) }}<span class="currency">{{
                        $booking->country_order->currency_code }}</span></span>
                  </td>

                  <td class="nk-tb-col nk-tb-col-tools">
                    <ul class="nk-tb-actions gx-2">

                      <li class="nk-tb-action-hidden">
                        <a href="==" class="btn btn-sm btn-icon btn-trigger text-success" data-toggle="tooltip" data-placement="top"
                          title="{{ __('admin.Edit') }}">
                          <i class="icon fal fa-edit"></i>
                        </a>
                      </li>

                      <li class="nk-tb-action-hidden">
                        @if ($booking->status==0)
                        <a href="{{ route('admin.booking.approve',$booking->id) }}" class="btn btn-sm btn-icon btn-trigger text-warning"
                          data-toggle="tooltip" data-placement="top" title="{{ __('admin.Approve') }}">
                          <i class="icon fal fa-vote-yea"></i>
                        </a>
                        @elseif($booking->status==1)
                        <a href="======" class="btn btn-sm btn-icon btn-trigger text-primary" data-toggle="tooltip" data-placement="top"
                          title="{{__('admin.Recive')}}">
                          <i class="icon fal fa-calendar-alt"></i>
                        </a>
                        @elseif($booking->status==3)
                        <a href="======" class="btn btn-sm btn-icon btn-trigger text-success" data-toggle="tooltip" data-placement="top"
                          title="{{__('admin.Complete')}}">
                          <i class="icon fal fa-warehouse"></i>
                        </a>
                        @endif
                      </li>

                      <li class="nk-tb-action-hidden">
                        <a href="#" class="btn btn-sm btn-icon btn-trigger" title="{{ __('admin.Reject') }}" data-bookingid="{{ $booking->id }}"
                          data-bookingnameen="{{ $booking->ref }}" data-toggle="modal" data-target="#deleteMdl">
                          <i class="icon fal fa-trash-alt"></i>
                        </a>
                      </li>

                      <li>
                        <div class="drodown">
                          <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown"><em
                              class="icon ni ni-more-h"></em></a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">

                              <li><a href="==" class="text-success">
                                  <i class="icon fal fa-edit"></i>
                                  <span>{{ __('admin.Edit') }}</span>
                                </a></li>

                              <li class="divider"></li>

                              @if ($booking->status==0)
                              <li>
                                <a href="====" class="text-warning">
                                  <i class="icon fal fa-vote-yea"></i>
                                  <span>{{__('admin.Approve')}}</span></a>
                              </li>
                              @elseif($booking->status==1)
                              <li>
                                <a href="=======" class="text-primary">
                                  <i class="icon fal fa-calendar-alt"></i>
                                  <span>{{ __('admin.Recive') }}</span></a>
                              </li>
                              @elseif($booking->status==3)
                              <li>
                                <a href="=======" class="text-primary">
                                  <i class="icon fal fa-warehouse"></i>
                                  <span>{{ __('admin.Complete') }}</span></a>
                              </li>
                              @endif

                              <li class="divider"></li>

                              <li><a href="#" data-bookingid="{{ $booking->id }}" data-bookingnameen="{{ $booking->ref }}" data-toggle="modal"
                                  data-target="#deleteMdl">
                                  <i class="icon fal fa-trash-alt text-danger"></i>
                                  <span>{{__('admin.Reject')}}</span>
                                </a></li>
                            </ul>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>{{-- .card-inner --}}

          <div class="card-inner">
            <dv class="pagination justify-content-center justify-content-md-start">
              {{ $orders->links('pagination::bootstrap-5') }}
            </dv>
          </div><!-- .card-inner -->
          @else
          <div class="card-inner  p-0">
            <div class="alert alert-pro alert-danger">
              <div class="alert-text">
                <h6>{{__('admin.Add New Record')}}</h6>
                <p>{{ __('admin.No Data Available To Show.') }}</p>
              </div>
            </div>
          </div>{{-- .card-inner --}}
          @endif
        </div>{{-- .card-inner-group --}}
      </div>{{-- .card --}}
    </div>{{-- .nk-block --}}
  </div>
</div>

{{--
==========================
=DELETE MODAL
==========================
--}}

<div class="modal fade zoon" tabindex="-1" id="deleteMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="{{ __('admin.Close') }}">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">{{ __('admin.Delete') }}</h5>
      </div>
      <div class="modal-body">
        <form action="=====" method="POST">
          @csrf
          <input hidden id="bookingId" name="bookingID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              Are You Sure You Want Delete
              <strong>
                <span id="bookingNameen"></span>
                <span>?</span>
              </strong>
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin.Close') }}</button>

                  <button type="submit" class="btn btn-danger">{{ __('admin.Delete') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-primary sm">
        <span class="sub-text"></span>
      </div>
    </div>
  </div>
</div>

@endsection

@section('page-scripts')
<script>
  'use strict';
      $(function() {
          /*
          ====================
          DELETE MODAL
          ====================
          */
          $('#deleteMdl').on('show.bs.modal', function(e) {
              let button = $(e.relatedTarget);
              let id = button.data('bookingid');
              let nameEn = button.data('bookingnameen');

              var modal = $(this);
              modal.find('.modal-body #bookingId').val(id);
              modal.find('.modal-body #bookingNameen').html(nameEn);
          });

      });
</script>
@endsection