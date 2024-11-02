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
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title" {{__('admin.New')}} / <strong class="text-primary small">
                    {{__('admin.Role')}}
                    </strong>
                </h3>
                <div class="nk-block-des text-soft">
                    <ul class="list-inline">
                        <li>{{__('admin.Last Update')}}: <span class="text-base">{{date('d M, Y h:i A',
                                strtotime(now()))}}</span></li>
                    </ul>
                </div>
            </div>

            <div class="nk-block-head-content">
                <a href="{{route('admin.role.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                        class="icon ni ni-arrow-left"></em><span>Back</span></a>
                <a href="{{route('admin.role.index')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                        class="icon ni ni-arrow-left"></em></a>
            </div>

        </div>
    </div>{{-- .nk-block-head --}}

    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-aside-wrap">
                <div class="card-content">
                    <div class="card-inner">
                        <div class="nk-block">
                            <div class="nk-block-head">
                                <h5 class="title">{{__('admin.Main Information')}}</h5>
                                <p></p>
                            </div>{{-- .nk-block-head --}}

                            <form action="{{ route('admin.role.store') }}" method="POST">
                                @csrf
                                <div class="card-inner">
                                    <div class="row gy-4">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="nameEn">{{ __('admin.English Name')
                                                    }}</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="nameEn" name="name"
                                                        placeholder="{{ __('admin.English Name Here') }}" value="{{ old('nameEn') }}"
                                                        autocomplete="off" required autofocus />
                                                    @error('nameEn')
                                                    <span class="bg-danger text-white" role="alert">{{ $message
                                                        }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="nk-divider divider md"></div>

                                    <div class="row gy-4 ml-1">
                                        @if ($permissions->count()>0)
                                        @foreach ($permissions as $permission)
                                        <div class="col-sm-4 custom-control custom-checkbox mb-1">
                                            <input type="checkbox" class="custom-control-input" id="permission{{ $permission->id }}"
                                                name="permission[]" value="{{ $permission->id }}" />

                                            <label class="custom-control-label text-capitalize" for="permission{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                        @error('permission')
                                        <span class="bg-danger text-white" role="alert">{{ $message}}</span>
                                        @enderror
                                        @endif
                                    </div>

                                    <div class="form-group mt-2">
                                        <div class="form-control-wrap">
                                            <input type="submit" class="btn btn-primary" value="{{ __('admin.Submit') }}" />
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div><!-- .nk-block -->
                    </div>{{-- .card-inner --}}
                </div>{{-- .card-content --}}
            </div>{{-- .card-aside-wrap --}}
        </div>{{-- .card --}}
    </div>{{-- .nk-block --}}
</div>

@endsection