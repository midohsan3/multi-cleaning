@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.Person') }}
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
        <h3 class="nk-block-title page-title">{{__('admin.Personal')}} /
          <strong class="text-primary small">
            {{ $person->user_person->name}}
          </strong>
        </h3>
        <div class="nk-block-des text-soft">
          <ul class="list-inline">
            <li>{{__('admin.Last Update')}}: <span class="text-base">{{date('d M, Y h:i A',
                strtotime($person->updated_at))}}</span></li>
          </ul>
        </div>
      </div>

      <div class="nk-block-head-content">
        <a href="{{route('admin.person.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
            class="icon ni ni-arrow-left"></em><span>Back</span></a>
        <a href="{{route('admin.person.index')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
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

              <form action="{{ route('admin.person.update') }}" method="POST">
                @csrf
                <input hidden name="person" value="{{ $person->id }}" />
                <input hidden name="oldCV" value="{{ $person->cv }}" />
                <div class="card-inner">
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="nameEn">{{ __('admin.Name')
                          }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="nameEn" name="nameEn" placeholder="{{ __('admin.Arabic Name Here') }}"
                            value="{{ old('nameAr',$person->user_person->name) }}" autocomplete="off" required autofocus />
                          @error('nameEn')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="nationality">{{ __('admin.Nationality')
                          }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control" id="nationality" name="nationality">
                            <option selected disabled>{{ __('admin.Choose...') }}</option>
                            @foreach ($nationalities as $nationality)
                            @if ($nationality->id == $person->nationality_id)
                            <option value="{{ $nationality->id }}" selected>
                              @if (App::getLocale()=='ar')
                              {{ $nationality->name_ar }}
                              @else
                              {{ $nationality->name_en }}
                              @endif
                            </option>
                            @else
                            <option value="{{ $nationality->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $nationality->name_ar }}
                              @else
                              {{ $nationality->name_en }}
                              @endif
                            </option>
                            @endif
                            @endforeach
                          </select>
                          @error('nationality')
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
                        <label class="form-label" for="gender">{{ __('admin.Gender')
                          }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control" id="gender" name="gender">
                            <option selected disabled>{{ __('admin.Choose...') }}</option>
                            @if ($person->gender==1)
                            <option value="1" selected>Male</option>
                            <option value="2">Female</option>
                            @elseif($person->gender==2)
                            <option value="1">Male</option>
                            <option value="2" selected>Female</option>
                            @endif
                          </select>
                          @error('gender')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="country">{{ __('admin.Country')
                          }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control" id="country" name="country">
                            <option selected disabled>{{ __('admin.Choose...') }}</option>
                            @foreach ($countries as $country)
                            @if ($country->id == $person->county_id)
                            <option value="{{ $country->id }}" selected>
                              @if (App::getLocale()=='ar')
                              {{ $country->name_ar }}
                              @else
                              {{ $country->name_en }}
                              @endif
                            </option>
                            @else
                            <option value="{{ $country->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $country->name_ar }}
                              @else
                              {{ $country->name_en }}
                              @endif
                            </option>
                            @endif
                            @endforeach
                          </select>
                          @error('country')
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
                        <label class="form-label" for="located">{{ __('admin.Current Location')
                          }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control " id="located" name="located" placeholder="{{ __('admin.Currency Here Like USD') }}"
                            value="{{ old('location',$person->located_at) }}" autocomplete="off" required />
                          @error('located')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="birth_date">{{ __('admin.Birth Date')
                          }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control date-picker" id="birth_date" name="birth_date" data-date-format="dd/mm/yyyy"
                            placeholder="dd/mmm/yyyy" value="{{ old('birth_date',date('d/m/Y',strtotime($person->birth_date))) }}" autocomplete="off"
                            required />
                          @error('birth_date')
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
                        <label class="form-label" for="specialist">{{ __('admin.Your Specialist')
                          }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="specialist" name="specialist" data-date-format="dd/mm/yyyy"
                            placeholder="{{ __('admin.Your Specialist') }}" value="{{ old('specialist',$person->specialist) }}" autocomplete="off"
                            required />
                          @error('specialist')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="cv">{{ __('admin.Your CV')}}
                          (pdf)</label>
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="cv" />
                            @error('cv')
                            <span class="bg-danger text-white" role="alert">{{ $message
                              }}</span>
                            @enderror
                            <label class="custom-file-label" for="customFile">Choose
                              file</label>
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
