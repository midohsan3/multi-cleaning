@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.Packages') }}
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
        <h3 class="nk-block-title page-title">{{ __('admin.Packages') }}</h3>
        <div class="nk-block-des text-soft">
          <p>{{ __('admin.You have total').' '.number_format($packagesCount,0).' '. __('admin.Package')}}.
          </p>
        </div>
      </div>{{-- .nk-block-head-content --}}

      <div class="nk-block-head-content">
        <div class="toggle-wrap nk-block-tools-toggle">
          <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
              class="icon ni ni-menu-alt-r"></em></a>
          <div class="toggle-expand-content" data-content="pageMenu">
            <ul class="nk-block-tools g-3">

              <li>
                <a href="#" class="btn btn-white btn-outline-light">
                  <em class="icon ni ni-download-cloud"></em><span>{{ __('admin.Export') }}</span>
                </a>
              </li>

              <li class="nk-block-tools-opt">
                <div class="drodown">
                  <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em
                      class="icon ni ni-plus"></em></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <ul class="link-list-opt no-bdr">
                      <li><a href="{{ route('admin.package.create') }}">
                          <span>{{ __('admin.New') }}</span>
                        </a></li>
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

        <div class="nk-fmg-quick-list nk-block">

          @if ($packages->count()>0)
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

                  <th class="nk-tb-col">
                    <span class="sub-text">{{ __('admin.Name') }}</span>
                  </th>

                  <th class="nk-tb-col tb-col-lg">
                    <span class="sub-text">{{ __('admin.Price') }}</span>
                  </th>

                  <th class="nk-tb-col tb-col-lg">
                    <span class="sub-text">{{ __('admin.Features') }}</span>
                  </th>

                  <th class="nk-tb-col tb-col-lg">
                    <span class="sub-text">{{ __('admin.Subscribers') }}</span>
                  </th>

                  <th class="nk-tb-col">
                    <span class="sub-text">{{ __('admin.Status') }}</span>
                  </th>
                  <th class="nk-tb-col nk-tb-col-tools text-right"> </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($packages as $package)
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
                        <span>
                          {{ Str::substr($package->name_en,0,2) }}
                        </span>
                      </div>
                      <div class="user-name">
                        <span class="tb-lead">
                          @if (App::getLocale()=='ar')
                          {{ $package->name_ar }}
                          @else
                          {{ $package->name_en }}
                          @endif
                        </span>
                      </div>
                    </div>
                  </td>

                  <td class="nk-tb-col tb-col-lg">
                    <span class="tb-amount">{{ number_format($package->price,2) }}
                      <span>{{ __('admin.AED') }}</span>
                    </span>
                  </td>

                  <td class="nk-tb-col tb-col-lg">
                    <span>============</span>
                  </td>

                  <td class="nk-tb-col tb-col-lg">
                    <span>============</span>
                  </td>

                  <td class="nk-tb-col">
                    @if ($package->status == 1)
                    <span class="tb-status text-success">{{ __('admin.Active') }}</span>
                    @else
                    <span class="tb-status text-danger">{{ __('admin.Inactive') }}</span>
                    @endif
                  </td>

                  <td class="nk-tb-col nk-tb-col-tools">
                    <ul class="nk-tb-actions gx-2">

                      <li class="nk-tb-action-hidden">
                        <a href="{{ route('admin.package.edit',$package->id) }}"
                          class="btn btn-sm btn-icon btn-trigger text-success" data-toggle="tooltip"
                          data-placement="top" title="{{ __('admin.Edit') }}">
                          <i class="icon fal fa-edit"></i>
                        </a>
                      </li>

                      <li class="nk-tb-action-hidden">
                        @if ($package->status==1)
                        <a href="{{ route('admin.package.deactivate',$package->id) }}"
                          class="btn btn-sm btn-icon btn-trigger text-danger" data-toggle="tooltip" data-placement="top"
                          title="{{ __('admin.Deactivate') }}">
                          <i class="icon fal fa-toggle-off"></i>
                        </a>
                        @else
                        <a href="{{ route('admin.package.activate',$package->id) }}"
                          class="btn btn-sm btn-icon btn-trigger text-success" data-toggle="tooltip"
                          data-placement="top" title="{{__('admin.Activate')}}">
                          <i class="icon fal fa-toggle-on"></i>
                        </a>
                        @endif
                      </li>

                      <li class="nk-tb-action-hidden">
                        <a href="#" class="btn btn-sm btn-icon btn-trigger" title="{{ __('admin.Delete') }}"
                          data-packageid="{{ $package->id }}" data-packagenameen="{{ $package->name_en }}"
                          data-packagenamear="{{ $package->name_ar }}" data-toggle="modal" data-target="#deleteMdl">
                          <i class="icon fal fa-trash-alt"></i>
                        </a>
                      </li>

                      <li>
                        <div class="drodown">
                          <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown"><em
                              class="icon ni ni-more-h"></em></a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">

                              <li><a href="{{ route('admin.package.edit',$package->id) }}" class="text-success">
                                  <i class="icon fal fa-edit"></i>
                                  <span>{{ __('admin.Edit') }}</span>
                                </a></li>

                              <li class="divider"></li>

                              @if ($package->status==1)
                              <li>
                                <a href="{{ route('admin.package.deactivate',$package->id) }}" class="text-danger">
                                  <i class="icon fal fa-power-off"></i>
                                  <span>{{__('admin.Deactivate')}}</span></a>
                              </li>
                              @else
                              <li>
                                <a href="{{ route('admin.package.activate',$package->id) }}" class="text-success">
                                  <i class="icon fal fa-power-off"></i>
                                  <span>{{ __('admin.Activate') }}</span></a>
                              </li>
                              @endif

                              <li class="divider"></li>

                              <li><a href="#" data-packageid="{{ $package->id }}"
                                  data-packagenameen="{{ $package->name_en }}"
                                  data-packagenamear="{{ $package->name_ar }}" data-toggle="modal"
                                  data-target="#deleteMdl">
                                  <i class="icon fal fa-trash-alt text-danger"></i>
                                  <span>{{__('admin.Delete')}}</span>
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
              {{ $packages->links('pagination::bootstrap-5') }}
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
      <a href="#" class="close" data-dismiss="modal" aria-label="Close">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Delete</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.package.destroy') }}" method="POST">
          @csrf
          <input hidden id="packageId" name="packageID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              Are You Sure You Want Delete
              <strong>
                @if (App::getLocale()=='ar')
                <span id="packageNamear"></span>
                @else
                <span id="packageNameen"></span>
                @endif
                <span>?</span>
              </strong>
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                  <button type="submit" class="btn btn-danger">Delete</button>
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
              let id = button.data('packageid');
              let nameEn = button.data('packagenameen');
              let nameAr = button.data('packagenamear');

              var modal = $(this);
              modal.find('.modal-body #packageId').val(id);
              modal.find('.modal-body #packageNameen').html(nameEn);
              modal.find('.modal-body #packageNamear').html(nameAr);
          });

      });
</script>
@endsection