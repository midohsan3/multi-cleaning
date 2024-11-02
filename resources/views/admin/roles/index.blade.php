@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.Roles') }}
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
                <h3 class="nk-block-title page-title">{{ __('admin.Roles') }}</h3>
                <div class="nk-block-des text-soft">
                    <p></p>
                </div>
            </div>{{-- .nk-block-head-content --}}

            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
                            class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">

                            <li class="nk-block-tools-opt">
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em
                                            class="icon ni ni-plus"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="{{ route('admin.role.create') }}">
                                                    <span>{{ __('admin.Role') }}</span>
                                                </a></li>
                                            <li><a href="{{ route('admin.role.permission.index') }}">
                                                    <span>{{ __('admin.Permission') }}</span>
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

                    @if ($roles->count()>0)

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
                                    <th class="nk-tb-col nk-tb-col-tools text-right"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
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
                                                    {{ Str::substr($role->name,0,2) }}
                                                </span>
                                            </div>
                                            <div class="user-name">
                                                <span class="tb-lead">
                                                    {{ $role->name }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-2">

                                            <li class="nk-tb-action-hidden">
                                                <a href="{{ route('admin.role.edit',$role->id) }}"
                                                    class="btn btn-sm btn-icon btn-trigger text-success" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('admin.Edit') }}">
                                                    <i class="icon fal fa-edit"></i>
                                                </a>
                                            </li>

                                            <li class="nk-tb-action-hidden">
                                                <a href="#" class="btn btn-sm btn-icon btn-trigger" title="{{ __('admin.Delete') }}"
                                                    data-roleid="{{ $role->id }}" data-rolenameen="{{ $role->name }}" data-toggle="modal"
                                                    data-target="#deleteMdl">
                                                    <i class="icon fal fa-trash-alt"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown"><em
                                                            class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">

                                                            <li><a href="{{ route('admin.role.edit',$role->id) }}" class="text-success">
                                                                    <i class="icon fal fa-edit"></i>
                                                                    <span>{{ __('admin.Edit') }}</span>
                                                                </a></li>

                                                            <li class="divider"></li>

                                                            <li><a href="#" data-roleid="{{ $role->id }}" data-rolenameen="{{ $role->name }}"
                                                                    data-toggle="modal" data-target="#deleteMdl">
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
                            {{ $roles->links('pagination::bootstrap-5') }}
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
                <form action="{{ route('admin.role.destroy') }}" method="POST">
                    @csrf
                    <input hidden id="roleId" name="roleID" />
                    <div class="row gy-4 m-auto p-auto">
                        <p class="text-center">
                            Are You Sure You Want Delete
                            <strong>
                                {{ $role->name }}
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
              let id = button.data('roleid');
              let nameEn = button.data('rolenameen');
              var modal = $(this);
              modal.find('.modal-body #roleId').val(id);
              modal.find('.modal-body #roleNameen').html(nameEn);
          });

      });
</script>
@endsection