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
    <div class="nk-block-between g-3">
      <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">{{__('admin.Country')}} /
          <strong class="text-primary small">
            @if(App::getLocale()=='ar')
            {{$country->name_ar}}
            @else
            {{$country->name_ar}}
            @endif
          </strong>
        </h3>
        <div class="nk-block-des text-soft">
          <ul class="list-inline">
            <li>{{__('admin.Last Update')}}: <span class="text-base">{{date('d M, Y h:i A',
                strtotime($country->updated_at))}}</span></li>
          </ul>
        </div>
      </div>

      <div class="nk-block-head-content">
        <a href="{{route('admin.country.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
            class="icon ni ni-arrow-left"></em><span>Back</span></a>
        <a href="{{route('admin.country.index')}}"
          class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
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

              <form action="{{ route('admin.country.update') }}" method="POST">
                @csrf
                <input hidden name="country" value="{{ $country->id }}"/>
                <div class="card-inner">
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="nameAr">{{ __('admin.Arabic Name')
                          }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="nameAr" name="nameAr"
                            placeholder="{{ __('admin.Arabic Name Here') }}"
                            value="{{ old('nameAr',$country->name_ar) }}" autocomplete="off" required autofocus />
                          @error('nameAr')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="nameEn">{{ __('admin.English Name')
                          }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="nameEn" name="nameEn"
                            placeholder="{{ __('admin.English Name Here') }}"
                            value="{{ old('nameEn',$country->name_en) }}" autocomplete="off" required />
                          @error('nameEn')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="ariaCode">{{ __('admin.Aria Code')
                          }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="ariaCode" name="ariaCode"
                            placeholder="{{ __('admin.Aria Code Like US') }}"
                            value="{{ old('ariaCode',$country->country_code) }}" autocomplete="off" required />
                          @error('ariaCode')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="phoneCode">{{ __('admin.Phone Code')
                          }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="naphoneCodemeEn" name="phoneCode"
                            placeholder="{{ __('admin.Phone Code Here Like +1') }}"
                            value="{{ old('phoneCode',$country->phone_code) }}" autocomplete="off" required />
                          @error('phoneCode')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="currency">{{ __('admin.Currency')
                          }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="currency" name="currency"
                            placeholder="{{ __('admin.Currency Here Like USD') }}"
                            value="{{ old('currency',$country->currency_code) }}" autocomplete="off" required />
                          @error('currency')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="{{ __('admin.Update') }}" />
                    </div>
                  </div>
                </div>
              </form>

            </div><!-- .nk-block -->
            <div class="nk-divider divider md"></div>
          </div>{{-- .card-inner --}}
        </div>{{-- .card-content --}}
      </div>{{-- .card-aside-wrap --}}
    </div>{{-- .card --}}
  </div>{{-- .nk-block --}}
</div>

@endsection