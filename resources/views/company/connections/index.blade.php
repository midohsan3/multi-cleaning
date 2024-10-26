@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.Social Media') }}
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
                <h3 class="nk-block-title page-title">{{ __('admin.Social Media') }}</h3>
                <div class="nk-block-des text-soft">
                    <p>{{ __('admin.You have total').' '.number_format($connectionsCount,0).' '.
                        __('admin.Connection')}}.</p>
                </div>
            </div>{{-- .nk-block-head-content --}}

            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addMdl"><i class="icon fal fa-plus"></i></a>

                </div>{{-- .toggle-wrap --}}
            </div>{{-- .nk-block-head-content --}}
        </div>{{-- .nk-block-between --}}
    </div>{{-- .nk-block-head --}}


    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">

                <div class="nk-fmg-quick-list nk-block">

                    @if ($connections->count()>0)


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
                                        <span class="sub-text">{{ __('admin.Channel') }}</span>
                                    </th>
                                    <th class="nk-tb-col">
                                        <span class="sub-text">{{ __('admin.Data') }}</span>
                                    </th>
                                    <th class="nk-tb-col nk-tb-col-tools text-right"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($connections as $conn)
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
                                                    @if ($conn->channel == 1)
                                                    {{ __('admin.Phone') }}
                                                    @elseif($conn->channel == 2)
                                                    {{ __('admin.Fax') }}
                                                    @elseif($conn->channel == 3)
                                                    {{ __('admin.E-mail') }}
                                                    @elseif($conn->channel == 4)
                                                    {{ __('admin.WhatsApp') }}
                                                    @elseif($conn->channel == 5)
                                                    {{ __('admin.FaceBook') }}
                                                    @elseif($conn->channel == 6)
                                                    {{ __('admin.Instagram') }}
                                                    @elseif($conn->channel == 7)
                                                    {{ __('admin.LinkedIn') }}
                                                    @elseif($conn->channel == 8)
                                                    {{ __('admin.Website') }}
                                                    @elseif($conn->channel == 9)
                                                    {{ __('admin.Snapchat') }}
                                                    @elseif($conn->channel == 10)
                                                    {{ __('admin.TikTok') }}
                                                    @elseif($conn->channel == 11)
                                                    {{ __('admin.Twitter') }}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="nk-tb-col">
                                        <span>{{ $conn->info }}</span>
                                    </td>

                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-2">

                                            <li class="nk-tb-action-hidden">
                                                <a href="#" class="btn btn-sm btn-icon btn-trigger" title="{{ __('admin.Delete') }}"
                                                    data-connid="{{ $conn->id }}" data-toggle="modal" data-target="#deleteMdl">
                                                    <i class="icon fal fa-trash-alt"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown"><em
                                                            class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">

                                                            <li><a href="#" data-connid="{{ $conn->id }}" data-toggle="modal"
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
= ADD MODAL
==========================
--}}
<div class="modal fade zoon" tabindex="-1" id="addMdl">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="{{ __('admin.Close') }}">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">{{ __('admin.Add') }}</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('company.social.store') }}" method="POST">
                    @csrf
                    <input hidden name="company" value="{{ $company->id }}" />

                    <p class="text-center">
                    <div class="row gy-4">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="con_type">{{ __('admin.Channel') }}</label>
                                <div class="form-control-wrap">
                                    <select class="form-control" name="con_type" autofocus>
                                        <option disabled selected>{{ __('admin.Choose...') }}</option>
                                        <option value="1">{{ __('admin.Phone') }}</option>
                                        <option value="2">{{ __('admin.Fax') }}</option>
                                        <option value="3">{{ __('admin.E-mail') }}</option>
                                        <option value="4">{{ __('admin.WhatsApp') }}</option>
                                        <option value="5">{{ __('admin.FaceBook') }}</option>
                                        <option value="6">{{ __('admin.Instagram') }}</option>
                                        <option value="7">{{ __('admin.LinkedIn') }}</option>
                                        <option value="8">{{ __('admin.Website') }}</option>
                                        <option value="9">{{ __('admin.Snapchat') }}</option>
                                        <option value="10">{{ __('admin.TikTok') }}</option>
                                        <option value="11">{{ __('admin.Twitter') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="chanel">{{ __('admin.Data') }}</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="chanel" name="chanel" placeholder="{{ __('admin.URL OR Data') }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    </p>
                    <hr />
                    <div class="row gy-4">
                        <div class="col">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin.Close') }}</button>

                                    <button type="submit" class="btn btn-primary">{{ __('admin.Submit') }}</button>
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
                <form action="{{ route('company.social.destroy') }}" method="POST">
                    @csrf
                    <input hidden id="connId" name="connID" />
                    <div class="row gy-4 m-auto p-auto">
                        <p class="text-center">
                            Are You Sure You Want Delete
                            <strong>
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
              let id = button.data('connid');

              var modal = $(this);
              modal.find('.modal-body #connId').val(id);
          });

      });
</script>
@endsection
