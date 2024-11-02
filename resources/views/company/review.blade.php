@extends('layouts.admin')
{{--
===========================
* PAGE TITLE
===========================
--}}
@section('page-title')
{{ __('admin.Nationalities') }}
@endsection
{{--
===========================
* PAGE BODY
===========================
--}}
@section('page-body')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="content-page wide-sm m-auto">

                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="align-center flex-wrap flex-md-nowrap g-4">

                                <div class="nk-block-content">
                                    <div class="nk-block-content-head px-lg-4">
                                        <h5>{{ __('admin.Your Account Under Review') }}</h5>
                                        <p class="text-soft">{{__('admin.We Reviewing Your Account, We will approve in Shortly.')}}</p>
                                    </div>
                                </div>
                                <div class="nk-block-content flex-shrink-0">
                                    <a href="https://wa.me/971502516985" class="btn btn-lg btn-outline-primary">{{ __('admin.Get Support') }}</a>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div><!-- .content-page -->
        </div>
    </div>
</div>

@endsection