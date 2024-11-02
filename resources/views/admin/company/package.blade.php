@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.Company') }}
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
        <h3 class="nk-block-title page-title">{{__('admin.Company')}} /
          <strong class="text-primary small">
            @if(App::getLocale()=='ar')
            {{$company->name_ar}}
            @else
            {{$company->name_en}}
            @endif
          </strong>
        </h3>
        <div class="nk-block-des text-soft">
          <ul class="list-inline">
            <li>{{__('admin.Last Update')}}: <span class="text-base">{{date('d M, Y h:i A',
                strtotime($company->updated_at))}}</span></li>
          </ul>
        </div>
      </div>

      <div class="nk-block-head-content">
        <a href="{{route('admin.company.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
            class="icon ni ni-arrow-left"></em><span>Back</span></a>
        <a href="{{route('admin.company.index')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
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
                <h5 class="title">{{__('admin.Package')}}</h5>
                <p></p>
              </div>{{-- .nk-block-head --}}

              <form action="{{ route('admin.company.package.store') }}" method="POST">
                @csrf
                <input hidden name="company" value="{{ $company->id }}" />
                <div class="card-inner">
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="package">{{ __('admin.Package')}}</label>
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <select class="form-control" id="package" name="package" autofocus>
                              <option selected disabled>{{ __('admin.Choose...') }}</option>
                              @foreach ($packages as $package)
                              @if ($package->id == $company->package_id)
                              <option value="{{ $package->id }}" selected>
                                @if (App::getLocale()=='ar')
                                {{ $package->name_ar }}
                                @else
                                {{ $package->name_en }}
                                @endif
                              </option>
                              @else
                              <option value="{{ $package->id }}">
                                @if (App::getLocale()=='ar')
                                {{ $package->name_ar }}
                                @else
                                {{ $package->name_en }}
                                @endif
                              </option>
                              @endif
                              @endforeach
                            </select>
                            @error('package')
                            <span class="bg-danger text-white" role="alert">{{ $message
                              }}</span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="role">{{ __('admin.Role')}}</label>
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <select class="form-control" id="role" name="role" autofocus>
                              <option selected disabled>{{ __('admin.Choose...') }}</option>

                              @foreach ($roles as $role)
                              @if ($role->id==$companyRole->role_id)
                              <option value="{{ $role->id }}" selected>
                                {{ $role->name }}
                              </option>
                              @else
                              <option value="{{ $role->id }}">
                                {{ $role->name }}
                              </option>
                              @endif
                              @endforeach
                            </select>

                            @error('role')
                            <span class="bg-danger text-white" role="alert">{{ $message
                              }}</span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>


                  </div>
                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="{{ __('admin.Update') }}" />
                    </div>
                  </div>
              </form>
            </div>{{-- .nk-block --}}
          </div>{{-- .card-inner --}}
        </div>{{-- .card-content --}}
      </div>{{-- .card-aside-wrap --}}
    </div>{{-- .card --}}
  </div>{{-- .nk-block --}}
</div>

@endsection