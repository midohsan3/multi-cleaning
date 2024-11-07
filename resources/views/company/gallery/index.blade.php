@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.My-Gallery') }}
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
        <h3 class="nk-block-title page-title">{{__('admin.Company Gallery')}}
        </h3>
        <div class="nk-block-des text-soft">
          <ul class="list-inline">
            <li></li>
          </ul>
        </div>
      </div>
    </div>
  </div>{{-- .nk-block-head --}}

  <div class="nk-block">
    <div class="card card-bordered">
      <div class="card-aside-wrap">
        <div class="card-content">
          <div class="card-inner">
            <div class="nk-block">


              <form action="{{ route('company.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input hidden name="company" value="{{ $company->id }}" />
                <div class="card-inner">
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="service">{{ __('admin.Service')
                          }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control" id="service" name="service">
                            <option selected disabled>{{ __('admin.Choose...') }}</option>
                            @if ($services->count()>0)
                            @foreach ($services as $service)
                            <option value="{{ $service->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $service->name_ar }}
                              @else
                              {{ $service->name_en }}
                              @endif
                            </option>
                            @endforeach
                            @endif
                          </select>
                          @error('service')
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
                            <input type="file" class="custom-file-input" id="customFile" name="photo" />
                            @error('photo')
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
                      <input type="submit" class="btn btn-primary" value="{{ __('admin.Submit') }}" />
                    </div>
                  </div>
              </form>
            </div><!-- .nk-block -->
            <div class="nk-divider divider md"></div>
            <div class="card card-preview">

              @if ($gallery->count()>0)
              <div class="card-inner">
                <div class="row">
                  @foreach ($gallery as $photo)
                  <div class="col-lg-4">
                    <div class="card card-bordered">
                      <img src="{{ url('storage/app/public/imgs/companies').'/'.$photo->photo }}" class="card-img-top" alt="{{ $photo->photo }}">
                      <div class="card-inner">
                        <h5 class="card-title">
                          @if (App::getLocale()=='ar')
                          {{ $photo->service_gallery->name_ar }}
                          @else
                          {{ $photo->service_gallery->name_en }}
                          @endif
                        </h5>
                        <a href="{{ route('company.gallery.destroy',$photo->id) }}" class="btn btn-danger">{{ __('admin.Delete') }}</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              @else
              <div class="card-inner  p-0">
                <div class="alert alert-pro alert-danger">
                  <div class="alert-text">
                    <h6>{{__('admin.Add New Record')}}</h6>
                    <p>{{ __('admin.No Data Available To Show.') }}</p>
                  </div>
                </div>
              </div>
              @endif



            </div>
          </div>{{-- .card-inner --}}
        </div>{{-- .card-content --}}
      </div>{{-- .card-aside-wrap --}}
    </div>{{-- .card --}}
  </div>{{-- .nk-block --}}
</div>
</div>

@endsection
