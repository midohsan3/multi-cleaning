@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.Activities') }}
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
                <h5 class="title">{{__('admin.Activities')}}</h5>
                <p></p>
              </div>{{-- .nk-block-head --}}

              <form action="{{ route('admin.country.activities.update') }}" method="POST">
                @csrf
                <input hidden name="country" value="{{ $country->id }}" />
                <div class="card-inner">
                  <div class="row gy-4 ml-1">
                    @if ($activities->count()>0)
                    @foreach ($activities as $activity)
                    <div class="col-sm-4 custom-control custom-checkbox mb-1">
                      @if (array_key_exists($activity->id,$countryActivities))
                      <input type="checkbox" class="custom-control-input" id="activity{{ $activity->id }}"
                        name="activity[]" value="{{ $activity->id }}" checked />
                      @else
                      <input type="checkbox" class="custom-control-input" id="activity{{ $activity->id }}"
                        name="activity[]" value="{{ $activity->id }}" />
                      @endif

                      <label class="custom-control-label text-capitalize" for="activity{{ $activity->id }}">
                        @if (App::getLocale()=='ar')
                        {{ $activity->name_ar }}
                        @else
                        {{ $activity->name_en }}
                        @endif
                      </label>
                    </div>
                    @endforeach
                    @error('activity')
                    <span class="bg-danger text-white" role="alert">{{ $message
                      }}</span>
                    @enderror
                  </div>
                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="{{ __('admin.Update') }}" />
                    </div>
                  </div>
                  @else
                  <div class="card-inner  p-0">
                    <div class="alert alert-pro alert-warning">
                      <div class="alert-text">
                        <h6>{{__('admin.Warning')}}</h6>
                        <p>{{ __('admin.Please Add Active Features First!') }}</p>
                      </div>
                    </div>
                  </div>
                  @endif
              </form>
            </div>{{-- .nk-block --}}
          </div>{{-- .card-inner --}}
        </div>{{-- .card-content --}}
      </div>{{-- .card-aside-wrap --}}
    </div>{{-- .card --}}
  </div>{{-- .nk-block --}}
</div>

@endsection
