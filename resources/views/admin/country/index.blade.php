@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.Countries') }}
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
        <h3 class="nk-block-title page-title">{{ __('admin.Countries') }}</h3>
        <div class="nk-block-des text-soft">
          <p>{{ __('admin.You have total').' '.number_format($countriesCount,0).' '. __('admin.Contry')}}.</p>
        </div>
      </div>{{-- .nk-block-head-content --}}

      <div class="nk-block-head-content">
        <div class="toggle-wrap nk-block-tools-toggle">
          <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
              class="icon ni ni-menu-alt-r"></em></a>
          <div class="toggle-expand-content" data-content="pageMenu">
            <ul class="nk-block-tools g-3">

              <li><a href="#" class="btn btn-white btn-outline-light"><em
                    class="icon ni ni-download-cloud"></em><span>{{ __('admin.Export') }}</span></a></li>

              <li class="nk-block-tools-opt">
                <div class="drodown">
                  <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em
                      class="icon ni ni-plus"></em></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <ul class="link-list-opt no-bdr">
                      <li><a href="#" data-toggle="modal" data-target="#modalForm"><span>{{ __('admin.Add Country')
                            }}</span></a></li>
                      <li><a href="#"><span>{{ __('admin.Add City') }}</span></a></li>
                    </ul>
                  </div>
                </div>
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

        @if ($countries->count()>0)
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
                    <button class="btn btn-dim btn-outline-light btn-icon disabled"><em
                        class="icon ni ni-arrow-right"></em></button>
                  </span>
                </div>
              </div>{{-- .form-inline --}}
            </div>{{-- .card-tools --}}


            <div class="card-tools mr-n1">
              <ul class="btn-toolbar gx-1">
                <li>
                  <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em
                      class="icon ni ni-search"></em></a>
                </li>{{-- li --}}
              </ul>{{-- .btn-toolbar --}}

            </div>{{-- .card-tools --}}
          </div>{{-- .card-title-group --}}

          <div class="card-search search-wrap" data-search="search">
            <div class="card-body">
              <div class="search-content">
                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em
                    class="icon ni ni-arrow-left"></em></a>
                <input type="text" class="form-control border-transparent form-focus-none"
                  placeholder="Search by user or email">
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

                <th class="nk-tb-col"><span class="sub-text">User</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Role</span></th>
                <th class="nk-tb-col tb-col-sm"><span class="sub-text">Email</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></th>
                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Company</span></th>
                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Verified</span></th>
                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Last Login</span></th>
                <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                <th class="nk-tb-col nk-tb-col-tools text-right"> </th>
              </tr>
            </thead>
            <tbody>
              <tr class="nk-tb-item">
                <td class="nk-tb-col nk-tb-col-check">
                  <div class="custom-control custom-control-sm custom-checkbox notext">
                    <input type="checkbox" class="custom-control-input" id="uid1">
                    <label class="custom-control-label" for="uid1"></label>
                  </div>
                </td>
                <td class="nk-tb-col">
                  <div class="user-card">
                    <div class="user-avatar xs bg-primary">
                      <span>AB</span>
                    </div>
                    <div class="user-name">
                      <span class="tb-lead">Abu Bin Ishtiyak</span>
                    </div>
                  </div>
                </td>
                <td class="nk-tb-col tb-col-md">
                  <span>Customer</span>
                </td>
                <td class="nk-tb-col tb-col-sm">
                  <span>info@softnio.com</span>
                </td>
                <td class="nk-tb-col tb-col-md">
                  <span>+811 847-4958</span>
                </td>
                <td class="nk-tb-col tb-col-lg">
                  <span>Bangladesh</span>
                </td>
                <td class="nk-tb-col tb-col-lg">
                  <ul class="list-status">
                    <li><em class="icon text-success ni ni-check-circle"></em> <span>Email</span></li>
                  </ul>
                </td>
                <td class="nk-tb-col tb-col-lg">
                  <span>10 Feb 2020</span>
                </td>
                <td class="nk-tb-col">
                  <span class="tb-status text-success">Active</span>
                </td>
                <td class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-2">
                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top"
                        title="Wallet">
                        <em class="icon ni ni-wallet-fill"></em>
                      </a>
                    </li>
                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top"
                        title="Send Email">
                        <em class="icon ni ni-mail-fill"></em>
                      </a>
                    </li>
                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top"
                        title="Suspend">
                        <em class="icon ni ni-user-cross-fill"></em>
                      </a>
                    </li>
                    <li>
                      <div class="drodown">
                        <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <ul class="link-list-opt no-bdr">
                            <li><a href="#"><em class="icon ni ni-eye"></em><span>View
                                  Details</span></a></li>
                            <li><a href="#"><em class="icon ni ni-repeat"></em><span>Orders</span></a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset
                                  Pass</span></a></li>
                            <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset
                                  2FA</span></a></li>
                            <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend
                                  User</span></a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>

        </div>{{-- .card-inner --}}
        <div class="card-inner">
          <dv class="pagination justify-content-center justify-content-md-start">
            {{ $posts->links('pagination::bootstrap-5') }}
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

{{--
===============================
= MODALS
===============================
===============================
= ADD COUNTRY MODAL
===============================
--}}
<div class="modal fade" tabindex="-1" id="modalForm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('admin.Country Information')}}</h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
          <em class="icon ni ni-cross"></em>
        </a>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.country.store')}}" class="form-validate is-alter" method="POST">
          <div class="form-group">
            <label class="form-label" for="name_ar">{{__('admin.Arabic Name')}}</label>
            <div class="form-control-wrap">
              <input type="text" class="form-control" id="name_ar" name="name_ar" required>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="name_en">{{__('admin.English Name')}}</label>
            <div class="form-control-wrap">
              <input type="text" class="form-control" id="name_en" name="name_en" required>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="email-address">Email address</label>
            <div class="form-control-wrap">
              <input type="text" class="form-control" id="email-address" required>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="phone-no">Phone No</label>
            <div class="form-control-wrap">
              <input type="text" class="form-control" id="phone-no">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Communication</label>
            <ul class="custom-control-group g-3 align-center">
              <li>
                <div class="custom-control custom-control-sm custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="com-email">
                  <label class="custom-control-label" for="com-email">Email</label>
                </div>
              </li>
              <li>
                <div class="custom-control custom-control-sm custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="com-sms">
                  <label class="custom-control-label" for="com-sms">SMS</label>
                </div>
              </li>
              <li>
                <div class="custom-control custom-control-sm custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="com-phone">
                  <label class="custom-control-label" for="com-phone">Phone</label>
                </div>
              </li>
            </ul>
          </div>
          <div class="form-group">
            <label class="form-label" for="pay-amount">Amount</label>
            <div class="form-control-wrap">
              <input type="text" class="form-control" id="pay-amount">
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-light">
        <span class="sub-text">Modal Footer Text</span>
      </div>
    </div>
  </div>
</div>
@endsection