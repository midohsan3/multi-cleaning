@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.Upload CV') }}
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
                <h3 class="nk-block-title page-title">{{__('admin.Company License')}}
                </h3>
                <div class="nk-block-des text-soft">
                    <ul class="list-inline">
                        <li>{{__('admin.Upload Your Company License To Be Trusted Company & Eligible To Receive New Booing.')}}</li>
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


                            <form action="{{ route('company.license.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-inner">
                                    <div class="row gy-4">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="license">{{ __('admin.Company License')}}
                                                    (pdf)</label>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="license" />
                                                        @error('license')
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
                    </div>{{-- .card-inner --}}
                </div>{{-- .card-content --}}
            </div>{{-- .card-aside-wrap --}}
        </div>{{-- .card --}}
    </div>{{-- .nk-block --}}
</div>
</div>

@endsection