@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.My Services') }}
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
        <h3 class="nk-block-title page-title">{{__('admin.Service')}} /
          <strong class="text-primary small">
            @if(App::getLocale()=='ar')
            {{$service->name_ar}}
            @else
            {{$service->name_en}}
            @endif
          </strong>
        </h3>
        <div class="nk-block-des text-soft">
          <ul class="list-inline">
            <li>{{__('admin.Last Update')}}: <span class="text-base">{{date('d M, Y h:i A',
                strtotime($servicePrice->updated_at))}}</span></li>
          </ul>
        </div>
      </div>

      <div class="nk-block-head-content">
        <a href="{{route('company.service.prices')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
            class="icon ni ni-arrow-left"></em><span>{{ __('admin.Back') }}</span></a>
        <a href="{{route('company.service.prices')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
            class="icon ni ni-arrow-left"></em></a>
      </div>

    </div>
  </div>{{-- .nk-block-head --}}




  <div class="nk-block">
    <div class="card card-bordered">
      <div class="card-aside-wrap">
        <div class="card-content">

          <div class="card-inner d-flex flex-row-reverse">
            @if (empty($servicePrice->photo))
            <img src="{{ url('imgs/logo.jpg') }}" width="150" class="rounded" />
            @else
            <img src="{{ url('storage/app/public/imgs/services'.'/'.$servicePrice->photo) }}" width="150" />
            @endif
          </div>

          <div class="card-inner">
            <div class="nk-block">
              <form action="{{ route('company.service.prices.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input hidden name="service" value="{{ $servicePrice->id }}" />
                <div class="card-inner">
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="price">{{ __('admin.Price')
                          }}</label>
                        <div class="form-control-wrap">
                          <div class="form-text-hint">
                            <span class="overline-title">{{ $company->country_company->currency_code }}</span>
                          </div>
                          <input type="text" class="form-control" id="price" name="price" placeholder="{{ __('admin.Arabic Name Here') }}"
                            value="{{ number_format(old('price',$servicePrice->price),2) }}" autocomplete="off" required autofocus />
                          @error('price')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="logo">{{ __('admin.Photo')}}
                          (jpg,png,jpeg)</label>
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="logo" />
                            @error('logo')
                            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                            @enderror
                            <label class="custom-file-label" for="customFile">Choose file</label>
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
</div>

@endsection
