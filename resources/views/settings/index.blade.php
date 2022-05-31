@extends('layouts.app')

@php

$logo = asset(Storage::url('logo'));
$color = 'theme-3';
if (!empty($settings['color'])) {
    $color = $settings['color'];
}
@endphp




@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{ __('Settings') }}</h5>
    </div>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Setting') }}</li>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#gdpr_cookie').trigger('change');
        });
        $(document).on('change', '#gdpr_cookie', function(e) {
            $('.gdpr_cookie_text').hide();
            if ($("#gdpr_cookie").prop('checked') == true) {
                $('.gdpr_cookie_text').show();
            }
        });
    </script>
@endpush

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top " style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">

                            <a href="#site-setting"
                                class="list-group-item list-group-item-action border-0">{{ __('Brand / Logo') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>

                            @can('Email Settings')
                                <a href="#email-setting"
                                    class="list-group-item list-group-item-action border-0">{{ __('Application / Mail') }}<div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            @endcan

                            @if (Auth::user()->isSuperAdmin())
                                <a href="#payment-setting"
                                    class="list-group-item list-group-item-action border-0">{{ __('Payment') }}
                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            @endif

                            @if (Auth::user()->isSuperAdmin())
                                <a href="#recaptcha-setting"
                                    class="list-group-item list-group-item-action border-0">{{ __('ReCaptcha Setting') }}
                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            @endif

                            @can('System Settings')
                                <a href="#system-setting"
                                    class="list-group-item list-group-item-action border-0">{{ __('System') }}
                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            @endcan

                            @can('Billing Settings')
                                <a href="#owner-setting"
                                    class="list-group-item list-group-item-action border-0">{{ __('Billing') }}
                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            @endcan


                            @can('Billing Settings')
                                <a href="#invoice-footer-setting"
                                    class="list-group-item list-group-item-action border-0">{{ __('Invoice Footer details') }}
                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            @endcan

                            @can('Manage Purchases')
                                <a href="#purchase-invoice-setting"
                                    class="list-group-item list-group-item-action border-0">{{ __('Purchase Invoice') }} <div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            @endcan

                            @can('Manage Sales')
                                <a href="#sale-invoice-setting"
                                    class="list-group-item list-group-item-action border-0">{{ __('Sale Invoice') }}
                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            @endcan

                            @can('Manage Quotations')
                                <a href="#quotation-invoice-setting"
                                    class="list-group-item list-group-item-action border-0">{{ __('Quotation Invoice') }}
                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>



                <div class="col-xl-9">
                    <div id="site-setting" class="active">
                        {{ Form::open(['url' => 'systems', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        <div class="card ">
                            <div class="card-header">
                                <h5>{{ __('Brands/logo') }}</h5>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">

                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="row mt-2">
                                                    @if (Auth::user()->isSuperAdmin())
                                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>{{ __('Favicon') }}</h5>
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <div class=" setting-card">
                                                                        <div class="logo-content mt-4">
                                                                            <img src="{{ asset(Storage::url('logo/favicon.png')) }}"
                                                                                class="small-logo img_setting" alt="" />
                                                                        </div>
                                                                        <div class="choose-file  mt-5">
                                                                            <label for="favicon">
                                                                                {{ Form::file('favicon', ['class' => 'd-none', 'accept' => 'image/png', 'id' => 'small-favicon', 'data-filename' => 'edit-favicon']) }}
                                                                                {{ Form::label('small-favicon', __('Choose file'), ['class' => 'btn btn-primary']) }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>{{ __('Logo dark') }}</h5>
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <div class=" setting-card">
                                                                        <div class="logo-content mt-4">


                                                                            <img src="{{ asset(Storage::url('logo/logo-dark.png')) }}"
                                                                                width="170px" class="big-logo">

                                                                        </div>
                                                                        <div class="choose-file mt-5">
                                                                            <label for="logo_dark">
                                                                                {{ Form::file('logo_dark', ['class' => 'd-none', 'accept' => 'image/png', 'id' => 'logo-dark', 'data-filename' => 'edit-logo_dark']) }}
                                                                                {{ Form::label('logo-dark', __('Choose file'), ['class' => 'btn btn-primary']) }}
                                                                            </label>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>{{ __('Logo Light') }}</h5>
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <div class=" setting-card">
                                                                        <div class="logo-content mt-4">

                                                                            <img src="{{ asset(Storage::url('logo/logo-light.png')) }}"
                                                                                width="170px" class="big-logo img_setting">

                                                                        </div>
                                                                        <div class="choose-file mt-5">
                                                                            <label for="logo_light">
                                                                                {{ Form::file('logo_light', ['class' => 'd-none', 'accept' => 'image/png', 'id' => 'logo-light', 'data-filename' => 'edit-logo_light']) }}
                                                                                {{ Form::label('logo-light', __('Choose file'), ['class' => 'btn btn-primary']) }}
                                                                            </label>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @php
                                                            $logo = asset(Storage::url('logo'));
                                                            $company_logo_dark = App\Models\Utility::getValByName('company_logo_dark');
                                                            $company_logo_light = App\Models\Utility::getValByName('company_logo_light');
                                                            $company_favicon = App\Models\Utility::getValByName('company_favicon');
                                                        @endphp

                                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>{{ __('Favicon') }}</h5>
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <div class=" setting-card">
                                                                        <div class="logo-content mt-4">
                                                                            <img src="{{ $logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') }}"
                                                                                class="small-logo img_setting" alt="" />
                                                                        </div>
                                                                        <div class="choose-file  mt-5">
                                                                            <label for="favicon">
                                                                                {{ Form::file('favicon', ['class' => 'd-none', 'accept' => 'image/png', 'id' => 'small-favicon', 'data-filename' => 'edit-favicon']) }}
                                                                                {{ Form::label('small-favicon', __('Choose file'), ['class' => 'btn btn-primary']) }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>{{ __('Logo dark') }}</h5>
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <div class=" setting-card">
                                                                        <div class="logo-content mt-4">


                                                                            <img src="{{ $logo . '/' . (isset($company_logo_dark) && !empty($company_logo_dark) ? $company_logo_dark : 'logo-dark.png') }}"
                                                                                width="170px" class="big-logo">

                                                                        </div>
                                                                        <div class="choose-file mt-5">
                                                                            <label for="logo_dark">
                                                                                {{ Form::file('logo_dark', ['class' => 'd-none', 'accept' => 'image/png', 'id' => 'logo-dark', 'data-filename' => 'edit-logo_dark']) }}
                                                                                {{ Form::label('logo-dark', __('Choose file'), ['class' => 'btn btn-primary']) }}
                                                                            </label>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>{{ __('Logo Light') }}</h5>
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <div class=" setting-card">
                                                                        <div class="logo-content mt-4">


                                                                            <img src="{{ $logo . '/' . (isset($company_logo_light) && !empty($company_logo_light) ? $company_logo_light : 'logo-light.png') }}"
                                                                                width="170px" class="big-logo img_setting">

                                                                        </div>
                                                                        <div class="choose-file mt-5">
                                                                            <label for="logo_light">
                                                                                {{ Form::file('logo_light', ['class' => 'd-none', 'accept' => 'image/png', 'id' => 'logo-light', 'data-filename' => 'edit-logo_light']) }}
                                                                                {{ Form::label('logo-light', __('Choose file'), ['class' => 'btn btn-primary']) }}
                                                                            </label>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                {{ Form::label('footer_text', __('Footer Text'), ['class' => 'form-control-label']) }}
                                                                {{ Form::text('footer_text', isset($settings['footer_text']) && !empty($settings['footer_text']) ? $settings['footer_text'] : env('FOOTER_TEXT'), ['class' => 'form-control', 'placeholder' => __('Footer Text')]) }}
                                                                @error('footer_text')
                                                                    <span class="invalid-footer_text" role="alert">
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                @if (Auth::user()->isSuperAdmin())
                                    <div class="row ">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {{ Form::label('app_name', __('App Name'), ['class' => 'col-form-label text-dark']) }}
                                                {{ Form::text('app_name', env('APP_NAME'), ['class' => 'form-control', 'placeholder' => __('App Name')]) }}
                                                @error('app_name')
                                                    <span class="invalid-app_name" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                {{ Form::label('footer_text', __('Footer Text'), ['class' => 'col-form-label text-dark']) }}
                                                {{ Form::text('footer_text', env('FOOTER_TEXT'), ['class' => 'form-control', 'placeholder' => __('Footer Text')]) }}
                                                @error('footer_text')
                                                    <span class="invalid-footer_text" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {{ Form::label('default_language', __('Default Language'), ['class' => 'col-form-label text-dark']) }}
                                                <div class="changeLanguage">
                                                    <select name="default_language" id="default_language"
                                                        data-toggle="select" class="form-control">
                                                        @php
                                                            $default_lan = !empty(env('DEFAULT_LANG')) ? env('DEFAULT_LANG') : 'en';
                                                        @endphp
                                                        @foreach ($languages as $language)
                                                            <option value="{{ $language }}"
                                                                @if ($default_lan == $language) selected @endif>
                                                                {{ Str::upper($language) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-between">
                                        <div class="form-group col-md-3">
                                            <div class="border-0 py-2 borderleft">
                                                <label class="form-check-label col-form-label text-dark"
                                                    for="SITE_RTL">{{ __('RTL') }}</label> <br>
                                                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary"
                                                    name="SITE_RTL" id="SITE_RTL"
                                                    {{ env('SITE_RTL') == 'on' ? 'checked="checked"' : '' }}>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <div class="custom-control form-switch align-items-center gap-2 mt-2 p-0">
                                                <label class="form-check-label col-form-label text-dark"
                                                    for="disable_signup_button">{{ __('Sign Up') }}</label><br>
                                                <input type="checkbox" name="disable_signup_button"
                                                    class="form-check-input ms-0" id="disable_signup_button"
                                                    data-toggle="switchbutton"
                                                    {{ Utility::getValByName('disable_signup_button') == 'on' ? 'checked="checked"' : '' }}
                                                    data-onstyle="primary">

                                            </div>
                                        </div>

                                        <div class="custom-control form-switch col-md-3 ">
                                            <label class="form-check-label col-form-label text-dark"
                                                for="display_landing">{{ __('Landing Page Display') }}</label> <br>
                                            <input type="checkbox" class="custom-control-input" data-toggle="switchbutton"
                                                data-onstyle="primary" name="display_landing" id="display_landing"
                                                @if (env('DISPLAY_LANDING') == 'on') checked @endif>

                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="form-group d-block align-items-center mt-2">
                                                {{ Form::label('gdpr_cookie', __('GDPR Cookie'), ['class' => 'col-form-label text-dark']) }}

                                                <div
                                                    class="custom-control form-switch  d-block align-items-center gap-2 p-0">
                                                    <label class="" for="gdpr_cookie"></label>
                                                    <input type="checkbox" class="form-check-input me-0"
                                                        data-toggle="switchbutton" name="gdpr_cookie" id="gdpr_cookie"
                                                        {{ isset($settings['gdpr_cookie']) && $settings['gdpr_cookie'] == 'on' ? 'checked="checked"' : '' }}>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group gdpr_cookie_text mb-0">

                                                <textarea id="btn" type="text" name="cookie_text" class="form-control" rows="4" style="height: auto"
                                                    value="{{ isset($settings['cookie_text']) && $settings['cookie_text'] ? $settings['cookie_text'] : '' }}"
                                                    placeholder="{{ __('Enter Gdpr Cookie Text ') }} {{ isset($settings['cookie_text']) && $settings['cookie_text'] ? $settings['cookie_text'] : '' }}">{{ isset($settings['cookie_text']) && $settings['cookie_text'] ? $settings['cookie_text'] : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="small-title">{{ __('Theme Customizer') }}</h4>
                                    <div class="setting-card setting-logo-box p-3">
                                        <div class="row">
                                            <div class="col-4 my-auto">
                                                <h6 class="mt-3">
                                                    <i data-feather="credit-card"
                                                        class="me-2"></i>{{ __('Primary color settings') }}
                                                </h6>
                                                <hr class="my-2" />
                                                <div class="theme-color themes-color">
                                                    <a href="#!"
                                                        class="theme-color-change {{ $color == 'theme-1' ? 'active_color' : '' }}"
                                                        data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                    <input type="radio" class="theme_color" name="color" value="theme-1"
                                                        style="display: none;">
                                                    <a href="#!"
                                                        class="theme-color-change {{ $color == 'theme-2' ? 'active_color' : '' }}"
                                                        data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                    <input type="radio" class="theme_color" name="color" value="theme-2"
                                                        style="display: none;">
                                                    <a href="#!"
                                                        class="theme-color-change {{ $color == 'theme-3' ? 'active_color' : '' }}"
                                                        data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                    <input type="radio" class="theme_color" name="color" value="theme-3"
                                                        style="display: none;">
                                                    <a href="#!"
                                                        class="theme-color-change {{ $color == 'theme-4' ? 'active_color' : '' }}"
                                                        data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                    <input type="radio" class="theme_color" name="color" value="theme-4"
                                                        style="display: none;">
                                                </div>
                                            </div>
                                            <div class="col-4 my-auto">
                                                <h6 class="rtl-hide">
                                                    <i data-feather="layout"
                                                        class="me-2"></i>{{ __('Sidebar settings') }}
                                                </h6>
                                                <hr class="my-2 rtl-hide" />
                                                <div class="form-check form-switch rtl-hide">
                                                    <input type="checkbox" class="form-check-input" id="cust-theme-bg"
                                                        name="cust_theme_bg"
                                                        {{ Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : '' }} />
                                                    <label class="form-check-label f-w-600 pl-1 ms-2"
                                                        for="cust-theme-bg">{{ __('Transparent layout') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-4 my-auto">
                                                <h6 class="rtl-hide">
                                                    <i data-feather="sun"
                                                        class="me-2"></i>{{ __('Layout settings') }}
                                                </h6>
                                                <hr class="my-2 rtl-hide" />
                                                <div class="form-check form-switch mt-2 rtl-hide">
                                                    <input type="checkbox" class="form-check-input" id="cust-darklayout"
                                                        name="cust_darklayout"
                                                        {{ Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : '' }} />
                                                    <label class="form-check-label f-w-600 pl-1 ms-2"
                                                        for="cust-darklayout">{{ __('Dark Layout') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 text-right">
                                            {{ Form::submit(__('Save Change'), ['class' => 'btn btn-primary float-end']) }}
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-lg-12 text-right">
                                            {{ Form::submit(__('Save Change'), ['class' => 'btn btn-primary float-end']) }}
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>





                        {{ Form::close() }}


                        @can('Email Settings')
                            <div id="email-setting" class="card">
                                <div class="email-setting-wrap ">
                                    {{ Form::open(['route' => 'general.settings', 'method' => 'POST']) }}

                                    <div class="card-header">
                                        <h3 class="h5">{{ __('Email Settings') }}</h3>
                                    </div>

                                    <div class="row card-body pb-0">
                                        <div class="form-group col-md-4">
                                            {{ Form::label('mail_driver', __('Mail Driver'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('mail_driver', env('MAIL_DRIVER'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')]) }}
                                            @error('mail_driver')
                                                <span class="invalid-mail_driver" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('mail_host', __('Mail Host'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('mail_host', env('MAIL_HOST'), ['class' => 'form-control ', 'placeholder' => __('Enter Mail Driver')]) }}
                                            @error('mail_host')
                                                <span class="invalid-mail_driver" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('mail_port', __('Mail Port'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('mail_port', env('MAIL_PORT'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')]) }}
                                            @error('mail_port')
                                                <span class="invalid-mail_port" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('mail_username', __('Mail Username'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('mail_username', env('MAIL_USERNAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')]) }}
                                            @error('mail_username')
                                                <span class="invalid-mail_username" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('mail_password', __('Mail Password'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('mail_password', env('MAIL_PASSWORD'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')]) }}
                                            @error('mail_password')
                                                <span class="invalid-mail_password" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('mail_encryption', env('MAIL_ENCRYPTION'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')]) }}
                                            @error('mail_encryption')
                                                <span class="invalid-mail_encryption" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('mail_from_address', __('Mail From Address'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('mail_from_address', env('MAIL_FROM_ADDRESS'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')]) }}
                                            @error('mail_from_address')
                                                <span class="invalid-mail_from_address" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('mail_from_name', __('Mail From Name'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('mail_from_name', env('MAIL_FROM_NAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')]) }}
                                            @error('mail_from_name')
                                                <span class="invalid-mail_from_name" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row card-body py-0 ">
                                        <div class="form-group col-md-12 ">
                                            <a href="#" class="btn btn-sm btn-primary float-end  send_email"
                                                data-title="{{ __('Send Test Mail') }}"
                                                data-url="{{ route('test.email') }}">
                                                {{ __('Send Test Mail') }}
                                            </a>
                                        </div>
                                    </div>





                                    <div class="card-header">
                                        <h3 class="h5">{{ __('Application Settings') }}</h3>
                                    </div>
                                    <div class="row card-body">
                                        <div class="form-group col-md-6">
                                            {{ Form::label('footer_link_1', __('Footer Link Title 1'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('footer_link_1', env('FOOTER_LINK_1'), ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 1')]) }}
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{ Form::label('footer_value_1', __('Footer Link href 1'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('footer_value_1', env('FOOTER_VALUE_1'), ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 1')]) }}
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{ Form::label('footer_link_2', __('Footer Link Title 2'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('footer_link_2', env('FOOTER_LINK_2'), ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 2')]) }}
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{ Form::label('footer_value_2', __('Footer Link href 2'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('footer_value_2', env('FOOTER_VALUE_2'), ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 2')]) }}
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{ Form::label('footer_link_3', __('Footer Link Title 3'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('footer_link_3', env('FOOTER_LINK_3'), ['class' => 'form-control', 'placeholder' => __('Enter Footer Link Title 3')]) }}
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{ Form::label('footer_value_3', __('Footer Link href 3'), ['class' => 'col-form-label text-dark']) }}
                                            {{ Form::text('footer_value_3', env('FOOTER_VALUE_3'), ['class' => 'form-control', 'placeholder' => __('Enter Footer Link 3')]) }}
                                        </div>

                                        <div class="    text-right mt-2">
                                            {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary float-end']) }}
                                        </div>
                                    </div>


                                    {{ Form::close() }}
                                </div>
                            @endcan
                        </div>



                        @if (Auth::user()->isSuperAdmin())
                            <div id="payment-setting" class="card faq">
                                {{ Form::model($settings, ['route' => 'payment.settings', 'method' => 'POST']) }}
                                <div class="row justify-content-center">
                                    <div class="card-header">
                                        <small
                                            class="col-form-label text-dark ">{{ __('This detail will use for make purchase of plan.') }}</small>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="form-group col-lg-6">
                                            <label for="currency_symbol"
                                                class="col-form-label text-dark">{{ __('Currency') }}</label>
                                            <input type="text" name="currency_symbol" id="currency_symbol"
                                                class="form-control" placeholder="{{ __('Enter Currency Symbol') }}"
                                                value="{{ env('CURRENCY_SYMBOL') }}" required />
                                            @if ($errors->has('currency_symbol'))
                                                <span class="invalid-currency_symbol">
                                                    {{ $errors->first('currency_symbol') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class=" col-lg-6">
                                            <label for="currency"
                                                class="col-form-label text-dark">{{ __('Currency Code') }}</label>
                                            <input type="text" name="currency" id="currency" class="form-control"
                                                value="{{ env('CURRENCY') }}"
                                                placeholder="{{ __('Enter Currency Code') }}" required />
                                            @if ($errors->has('currency'))
                                                <span class="invalid-currency">
                                                    {{ $errors->first('currency') }}
                                                </span>
                                            @endif

                                            <small class="text-dark">
                                                {{ __('Note: Add currency code as per three-letter ISO code.') }} <a
                                                    href="https://stripe.com/docs/currencies"
                                                    target="_new">{{ __('you can find out here.') }}</a>.</small>
                                        </div>


                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-12 col-md-10 col-xxl-12">
                                            <div class="accordion accordion-flush" id="accordionExample">

                                                {{-- Stripe --}}
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                            aria-expanded="false" aria-controls="collapseOne">
                                                            <span
                                                                class="d-flex align-items-center col-form-label text-dark">
                                                                <i class="ti ti-credit-card"></i> {{ __('Stripe') }}
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse"
                                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="col-12 d-flex justify-content-between">

                                                                <small class=" col-form-label text-dark">
                                                                    {{ __('Note: This detail will use for make checkout of plan.') }}</small>

                                                                <div
                                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                                    <input type="hidden" name="is_stripe_enabled"
                                                                        value="off">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" name="is_stripe_enabled"
                                                                        id="is_stripe_enabled"
                                                                        {{ isset($admin_payment_setting['is_stripe_enabled']) && $admin_payment_setting['is_stripe_enabled'] == 'on' ? 'checked="checked"' : '' }}>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        {{ Form::label('stripe_key', __('Stripe Key'), ['class' => 'col-form-label text-dark']) }}
                                                                        {{ Form::text('stripe_key', isset($admin_payment_setting['stripe_key']) ? $admin_payment_setting['stripe_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Stripe Key')]) }}
                                                                        @if ($errors->has('stripe_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('stripe_key') }}
                                                                            </span>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        {{ Form::label('stripe_secret', __('Stripe Secret'), ['class' => 'col-form-label text-dark']) }}
                                                                        {{ Form::text('stripe_secret', isset($admin_payment_setting['stripe_secret']) ? $admin_payment_setting['stripe_secret'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Stripe Secret')]) }}
                                                                        @if ($errors->has('stripe_secret'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('stripe_secret') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Paypal --}}
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="headingtwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapsetwo"
                                                            aria-expanded="false" aria-controls="collapsetwo">
                                                            <span
                                                                class="d-flex align-items-center col-form-label text-dark">
                                                                <i class="ti ti-credit-card"></i> {{ __('PayPal') }}
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapsetwo" class="accordion-collapse collapse"
                                                        aria-labelledby="headingtwo" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="col-12 d-flex justify-content-between">

                                                                <small class="col-form-label text-dark">
                                                                    {{ __('Note: This detail will use for make checkout of plan.') }}</small>

                                                                <div
                                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                                    <input type="hidden" name="is_paypal_enabled"
                                                                        value="off">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" name="is_paypal_enabled"
                                                                        id="is_paypal_enabled"
                                                                        {{ isset($admin_payment_setting['is_paypal_enabled']) && $admin_payment_setting['is_paypal_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                    {{-- <label
                                                                        class="custom-control-label form-control-label form-label text-dark"
                                                                        for="is_paypal_enabled">{{ __('Enable Paypal') }}</label> --}}
                                                                </div>

                                                            </div>

                                                            <div class="col-md-12 pb-4">
                                                                <label class="paypal-label form-label text-dark"
                                                                    for="paypal_mode">{{ __('Paypal Mode') }}</label>
                                                                <br>
                                                                <div class="d-flex">
                                                                    <div class="mr-2"
                                                                        style="margin-right: 15px;">
                                                                        <div class="border card p-3">
                                                                            <div class="form-check">
                                                                                <label class="form-check-labe text-dark">
                                                                                    <input type="radio" name="paypal_mode"
                                                                                        value="sandbox"
                                                                                        class="form-check-input"
                                                                                        {{ !isset($payment['paypal_mode']) || $payment['paypal_mode'] == '' || $payment['paypal_mode'] == 'sandbox' ? 'checked="checked"' : '' }}>

                                                                                    {{ __('Sandbox') }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mr-2">
                                                                        <div class="border card p-3">
                                                                            <div class="form-check">
                                                                                <label class="form-check-labe text-dark">
                                                                                    <input type="radio" name="paypal_mode"
                                                                                        value="live"
                                                                                        class="form-check-input"
                                                                                        {{ isset($payment['paypal_mode']) && $payment['paypal_mode'] == 'live' ? 'checked="checked"' : '' }}>

                                                                                    {{ __('Live') }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paypal_client_id"
                                                                            class="form-label text-dark">{{ __('Client ID') }}</label>
                                                                        <input type="text" name="paypal_client_id"
                                                                            id="paypal_client_id" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['paypal_client_id']) ? $admin_payment_setting['paypal_client_id'] : '' }}"
                                                                            placeholder="{{ __('Client ID') }}" />
                                                                        @if ($errors->has('paypal_client_id'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('paypal_client_id') }}
                                                                            </span>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paypal_secret_key"
                                                                            class="form-label text-dark">{{ __('Secret Key') }}</label>
                                                                        <input type="text" name="paypal_secret_key"
                                                                            id="paypal_secret_key" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['paypal_secret_key']) ? $admin_payment_setting['paypal_secret_key'] : '' }}"
                                                                            placeholder="{{ __('Secret Key') }}" />
                                                                        @if ($errors->has('paypal_secret_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('paypal_secret_key') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Paystack --}}
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="headingthree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapsethree"
                                                            aria-expanded="false" aria-controls="collapsethree">
                                                            <span
                                                                class="d-flex align-items-center col-form-label text-dark">
                                                                <i class="ti ti-credit-card"></i> {{ __('Paystack') }}
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapsethree" class="accordion-collapse collapse"
                                                        aria-labelledby="headingthree" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="col-12 d-flex justify-content-between">

                                                                <small class="form-label text-dark">
                                                                    {{ __('Note: This detail will use for make checkout of plan.') }}</small>

                                                                <div
                                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                                    <input type="hidden" name="is_paystack_enabled"
                                                                        value="off">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" name="is_paystack_enabled"
                                                                        id="is_paystack_enabled"
                                                                        {{ isset($admin_payment_setting['is_paystack_enabled']) && $admin_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                    {{-- <label
                                                                        class="custom-control-label form-control-label form-label text-dark"
                                                                        for="is_paystack_enabled">{{ __('Enable Paystack') }}</label> --}}
                                                                </div>



                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paypal_client_id"
                                                                            class="col-form-label text-dark">{{ __('Public Key') }}</label>
                                                                        <input type="text" name="paystack_public_key"
                                                                            id="paystack_public_key"
                                                                            class="form-control form-control-label"
                                                                            value="{{ isset($admin_payment_setting['paystack_public_key']) ? $admin_payment_setting['paystack_public_key'] : '' }}"
                                                                            placeholder="{{ __('Public Key') }}" />
                                                                        @if ($errors->has('paystack_public_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('paystack_public_key') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paystack_secret_key"
                                                                            class="col-form-label text-dark">{{ __('Secret Key') }}</label>
                                                                        <input type="text" name="paystack_secret_key"
                                                                            id="paystack_secret_key"
                                                                            class="form-control form-control-label"
                                                                            value="{{ isset($admin_payment_setting['paystack_secret_key']) ? $admin_payment_setting['paystack_secret_key'] : '' }}"
                                                                            placeholder="{{ __('Secret Key') }}" />
                                                                        @if ($errors->has('paystack_secret_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('paystack_secret_key') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- FLUTTERWAVE --}}
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="headingfour">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapsefour"
                                                            aria-expanded="false" aria-controls="collapsefour">
                                                            <span
                                                                class="d-flex align-items-center col-form-label text-dark">
                                                                <i class="ti ti-credit-card"></i>
                                                                {{ __('Flutterwave') }}
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapsefour" class="accordion-collapse collapse"
                                                        aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="col-12 d-flex justify-content-between">

                                                                <small class="form-label text-dark">
                                                                    {{ __('Note: This detail will use for make checkout of plan.') }}</small>

                                                                <div
                                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                                    <input type="hidden" name="is_flutterwave_enabled"
                                                                        value="off">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" name="is_flutterwave_enabled"
                                                                        id="is_flutterwave_enabled"
                                                                        {{ isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                    {{-- <label
                                                                        class="custom-control-label form-control-label form-label text-dark"
                                                                        for="is_flutterwave_enabled">{{ __('Enable Flutterwave') }}</label> --}}
                                                                </div>




                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paypal_client_id"
                                                                            class="col-form-label text-dark">{{ __('Public Key') }}</label>
                                                                        <input type="text" name="flutterwave_public_key"
                                                                            id="flutterwave_public_key"
                                                                            class="form-control"
                                                                            value="{{ isset($admin_payment_setting['flutterwave_public_key']) ? $admin_payment_setting['flutterwave_public_key'] : '' }}"
                                                                            placeholder="{{ __('Public Key') }}" />
                                                                        @if ($errors->has('flutterwave_public_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('flutterwave_public_key') }}
                                                                            </span>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paystack_secret_key"
                                                                            class="col-form-label text-dark">{{ __('Secret Key') }}</label>
                                                                        <input type="text" name="flutterwave_secret_key"
                                                                            id="flutterwave_secret_key"
                                                                            class="form-control form-control-label"
                                                                            value="{{ isset($admin_payment_setting['flutterwave_secret_key']) ? $admin_payment_setting['flutterwave_secret_key'] : '' }}"
                                                                            placeholder="{{ __('Secret Key') }}" />
                                                                        @if ($errors->has('flutterwave_secret_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('flutterwave_secret_key') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Razorpay --}}
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="headingfive">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                                            aria-expanded="false" aria-controls="collapsefive">
                                                            <span
                                                                class="d-flex align-items-center col-form-label text-dark">
                                                                <i class="ti ti-credit-card"></i> {{ __('Razorpay') }}
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapsefive" class="accordion-collapse collapse"
                                                        aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="col-12 d-flex justify-content-between">

                                                                <small class="form-label text-dark">
                                                                    {{ __('Note: This detail will use for make checkout of plan.') }}</small>

                                                                <div
                                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                                    <input type="hidden" name="is_razorpay_enabled"
                                                                        value="off">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" name="is_razorpay_enabled"
                                                                        id="is_razorpay_enabled"
                                                                        {{ isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                    {{-- <label
                                                                        class="custom-control-label form-control-label form-label text-dark"
                                                                        for="is_razorpay_enabled">{{ __('Enable Razorpay') }}</label> --}}
                                                                </div>


                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paypal_client_id"
                                                                            class="col-form-label text-dark">{{ __('Public Key') }}</label>

                                                                        <input type="text" name="razorpay_public_key"
                                                                            id="razorpay_public_key" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['razorpay_public_key']) ? $admin_payment_setting['razorpay_public_key'] : '' }}"
                                                                            placeholder="{{ __('Public Key') }}" />
                                                                        @if ($errors->has('razorpay_public_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('razorpay_public_key') }}
                                                                            </span>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paystack_secret_key"
                                                                            class="col-form-label text-dark">{{ __('Secret Key') }}</label>
                                                                        <input type="text" name="razorpay_secret_key"
                                                                            id="razorpay_secret_key" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['razorpay_secret_key']) ? $admin_payment_setting['razorpay_secret_key'] : '' }}"
                                                                            placeholder="{{ __('Secret Key') }}" />
                                                                        @if ($errors->has('razorpay_secret_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('razorpay_secret_key') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Mercado Pago --}}

                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="headingsix">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapsesix"
                                                            aria-expanded="false" aria-controls="collapsesix">
                                                            <span class="d-flex align-items-center form-label text-dark">
                                                                <i class="ti ti-credit-card"></i>
                                                                {{ __('Mercado Pago') }}
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapsesix" class="accordion-collapse collapse"
                                                        aria-labelledby="headingsix" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="col-12 d-flex justify-content-between">

                                                                <small class="form-label text-dark">
                                                                    {{ __('Note: This detail will use for make checkout of plan.') }}</small>

                                                                <div
                                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                                    <input type="hidden" name="is_mercado_enabled"
                                                                        value="off">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" name="is_mercado_enabled"
                                                                        id="is_mercado_enabled"
                                                                        {{ isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                    {{-- <label
                                                                        class="custom-control-label form-control-label form-label text-dark"
                                                                        for="is_mercado_enabled">{{ __('Enable Mercado Pago') }}</label> --}}
                                                                </div>
                                                            </div>



                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="mercado_app_id"
                                                                            class="form-label text-dark">{{ __('App ID') }}</label>
                                                                        <input type="text" name="mercado_app_id"
                                                                            id="mercado_app_id" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['mercado_app_id']) ? $admin_payment_setting['mercado_app_id'] : '' }}"
                                                                            placeholder="{{ __('App ID') }}" />
                                                                        @if ($errors->has('mercado_app_id'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('mercado_app_id') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="mercado_secret_key"
                                                                            class="form-label text-dark">{{ __('App Secret KEY') }}</label>
                                                                        <input type="text" name="mercado_secret_key"
                                                                            id="mercado_secret_key" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['mercado_secret_key']) ? $admin_payment_setting['mercado_secret_key'] : '' }}"
                                                                            placeholder="{{ __('App Secret Key') }}" />
                                                                        @if ($errors->has('mercado_secret_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('mercado_secret_key') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Paytm --}}

                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="headingsevan">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapsesevan"
                                                            aria-expanded="false" aria-controls="collapsesevan">
                                                            <span class="d-flex align-items-center form-label text-dark">
                                                                <i class="ti ti-credit-card"></i> {{ __('Paytm') }}
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapsesevan" class="accordion-collapse collapse"
                                                        aria-labelledby="headingsevan" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="col-12 d-flex justify-content-between">

                                                                <small class="form-label text-dark">
                                                                    {{ __('Note: This detail will use for make checkout of plan.') }}</small>

                                                                <div
                                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                                    <input type="hidden" name="is_paytm_enabled"
                                                                        value="off">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" name="is_paytm_enabled"
                                                                        id="is_paytm_enabled"
                                                                        {{ isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                    {{-- <label
                                                                        class="custom-control-label form-control-label form-label text-dark"
                                                                        for="is_paytm_enabled">{{ __('Enable Paytm') }}</label> --}}
                                                                </div>
                                                            </div>


                                                            <div class="col-md-12 pb-4">
                                                                <label class="paypal-label form-label text-dark"
                                                                    for="paypal_mode">Paytm Environment</label> <br>
                                                                <div class="d-flex">
                                                                    <div class="mr-2"
                                                                        style="margin-right: 15px;">
                                                                        <div class="border card p-3">
                                                                            <div class="form-check">
                                                                                <label
                                                                                    class="form-check-labe text-dark {{ isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'local' ? 'active' : '' }}">

                                                                                    <input type="radio" name="paytm_mode"
                                                                                        value="local"
                                                                                        {{ (isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == '') || (isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'local') ? 'checked="checked"' : '' }}>{{ __('Local') }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mr-2">
                                                                        <div class="border card p-3">
                                                                            <div class="form-check">
                                                                                <label
                                                                                    class="form-check-labe text-dark {{ isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'live' ? 'active' : '' }}">
                                                                                    <input type="radio" name="paytm_mode"
                                                                                        value="production"
                                                                                        {{ isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'production' ? 'checked="checked"' : '' }}>{{ __('Production') }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paytm_public_key"
                                                                            class="form-label text-dark">{{ __('Merchant ID') }}</label>
                                                                        <input type="text" name="paytm_merchant_id"
                                                                            id="paytm_merchant_id" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['paytm_merchant_id']) ? $admin_payment_setting['paytm_merchant_id'] : '' }}"
                                                                            placeholder="{{ __('Merchant ID') }}" />
                                                                        @if ($errors->has('paytm_merchant_id'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('paytm_merchant_id') }}
                                                                            </span>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paytm_secret_key"
                                                                            class="form-label text-dark">{{ __('Merchant Key') }}</label>
                                                                        <input type="text" name="paytm_merchant_key"
                                                                            id="paytm_merchant_key" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['paytm_merchant_key']) ? $admin_payment_setting['paytm_merchant_key'] : '' }}"
                                                                            placeholder="{{ __('Merchant Key') }}" />
                                                                        @if ($errors->has('paytm_merchant_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('paytm_merchant_key') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paytm_industry_type"
                                                                            class="form-label text-dark">
                                                                            {{ __('Industry Type') }}</label>
                                                                        <input type="text" name="paytm_industry_type"
                                                                            id="paytm_industry_type" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['paytm_industry_type']) ? $admin_payment_setting['paytm_industry_type'] : '' }}"
                                                                            placeholder="{{ __('Industry Type') }}" />
                                                                        @if ($errors->has('paytm_industry_type'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('paytm_industry_type') }}
                                                                            </span>
                                                                        @endif

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Mollie --}}
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="heading8">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse8"
                                                            aria-expanded="false" aria-controls="collapse8">
                                                            <span class="d-flex align-items-center form-label text-dark">
                                                                <i class="ti ti-credit-card"></i> {{ __('Mollie') }}
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse8" class="accordion-collapse collapse"
                                                        aria-labelledby="heading8" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="col-12 d-flex justify-content-between">

                                                                <small class="form-label text-dark">
                                                                    {{ __('Note: This detail will use for make checkout of plan.') }}</small>

                                                                <div
                                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                                    <input type="hidden" name="is_mollie_enabled"
                                                                        value="off">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" name="is_mollie_enabled"
                                                                        id="is_mollie_enabled"
                                                                        {{ isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                    {{-- <label
                                                                        class="custom-control-label form-control-label form-label text-dark"
                                                                        for="is_mollie_enabled">{{ __('Enable Mollie') }}</label> --}}
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="mollie_api_key"
                                                                            class="form-label text-dark">{{ __('Mollie Api Key') }}</label>
                                                                        <input type="text" name="mollie_api_key"
                                                                            id="mollie_api_key" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['mollie_api_key']) ? $admin_payment_setting['mollie_api_key'] : '' }}"
                                                                            placeholder="{{ __('Mollie Api Key') }}" />
                                                                        @if ($errors->has('mollie_api_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('mollie_api_key') }}
                                                                            </span>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="mollie_profile_id"
                                                                            class="form-label text-dark">{{ __('Mollie Profile Id') }}</label>
                                                                        <input type="text" name="mollie_profile_id"
                                                                            id="mollie_profile_id" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['mollie_profile_id']) ? $admin_payment_setting['mollie_profile_id'] : '' }}"
                                                                            placeholder="{{ __('Mollie Profile Id') }}" />
                                                                        @if ($errors->has('mollie_profile_id'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('mollie_profile_id') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="mollie_partner_id"
                                                                            class="form-label text-dark">{{ __('Mollie Partner Id') }}</label>
                                                                        <input type="text" name="mollie_partner_id"
                                                                            id="mollie_partner_id" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['mollie_partner_id']) ? $admin_payment_setting['mollie_partner_id'] : '' }}"
                                                                            placeholder="{{ __('Mollie Partner Id') }}" />
                                                                        @if ($errors->has('mollie_partner_id'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('mollie_partner_id') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Skrill --}}
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="heading9">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse9"
                                                            aria-expanded="false" aria-controls="collapse9">
                                                            <span class="d-flex align-items-center form-label text-dark">
                                                                <i class="ti ti-credit-card"></i> {{ __('Skrill') }}
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse9" class="accordion-collapse collapse"
                                                        aria-labelledby="heading9" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="col-12 d-flex justify-content-between">

                                                                <small class="form-label text-dark">
                                                                    {{ __('Note: This detail will use for make checkout of plan.') }}</small>

                                                                <div
                                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" name="is_skrill_enabled"
                                                                        id="is_skrill_enabled"
                                                                        {{ isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                    {{-- <label
                                                                        class="custom-control-label form-control-label form-label text-dark"
                                                                        for="is_skrill_enabled">{{ __('Enable Skrill') }}</label> --}}
                                                                </div>




                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="mollie_api_key"
                                                                            class="form-label text-dark">{{ __('Skrill Email') }}</label>
                                                                        <input type="email" name="skrill_email"
                                                                            id="skrill_email" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['skrill_email']) ? $admin_payment_setting['skrill_email'] : '' }}"
                                                                            placeholder="{{ __('Mollie Api Key') }}" />
                                                                        @if ($errors->has('skrill_email'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('skrill_email') }}
                                                                            </span>
                                                                        @endif

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- CoinGate --}}
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="heading10">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse10"
                                                            aria-expanded="false" aria-controls="collapse10">
                                                            <span class="d-flex align-items-center form-label text-dark">
                                                                <i class="ti ti-credit-card"></i> {{ __('CoinGate') }}
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse10" class="accordion-collapse collapse"
                                                        aria-labelledby="heading10" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="col-12 d-flex justify-content-between">

                                                                <small class="form-label text-dark">
                                                                    {{ __('Note: This detail will use for make checkout of plan.') }}</small>

                                                                <div
                                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" name="is_coingate_enabled"
                                                                        id="is_coingate_enabled"
                                                                        {{ isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                    {{-- <label
                                                                        class="custom-control-label form-control-label form-label text-dark"
                                                                        for="is_coingate_enabled">{{ __('Enable CoinGate') }}</label> --}}
                                                                </div>



                                                            </div>



                                                            <div class="row">
                                                                <div class="col-md-12 pb-4">
                                                                    <label class="col-form-label"
                                                                        for="coingate_mode">CoinGate
                                                                        Mode</label> <br>
                                                                    <div class="d-flex">
                                                                        <div class="mr-2"
                                                                            style="margin-right: 15px;">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark {{ isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'sandbox' ? 'active' : '' }}">

                                                                                        <input type="radio"
                                                                                            name="coingate_mode"
                                                                                            value="sandbox"
                                                                                            {{ (isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == '') || (isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'sandbox') ? 'checked="checked"' : '' }}>{{ __('Sandbox') }}
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark {{ isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'active' : '' }}">
                                                                                        <input type="radio"
                                                                                            name="coingate_mode"
                                                                                            value="live"
                                                                                            {{ isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : '' }}>{{ __('Live') }}
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="coingate_auth_token"
                                                                            class="form-label text-dark">{{ __('CoinGate Auth Token') }}</label>
                                                                        <input type="text" name="coingate_auth_token"
                                                                            id="coingate_auth_token" class="form-control"
                                                                            value="{{ isset($admin_payment_setting['coingate_auth_token']) ? $admin_payment_setting['coingate_auth_token'] : '' }}"
                                                                            placeholder="{{ __('CoinGate Auth Token') }}" />
                                                                        @if ($errors->has('coingate_auth_token'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('coingate_auth_token') }}
                                                                            </span>
                                                                        @endif

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Paymentwall --}}
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="heading11">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse11"
                                                            aria-expanded="false" aria-controls="collapse11">
                                                            <span class="d-flex align-items-center form-label text-dark">
                                                                <i class="ti ti-credit-card"></i>
                                                                {{ __('Paymentwall') }}
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse11" class="accordion-collapse collapse"
                                                        aria-labelledby="heading11" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="col-12 d-flex justify-content-between">

                                                                <small class="form-label text-dark">
                                                                    {{ __('Note: This detail will use for make checkout of plan.') }}</small>

                                                                <div
                                                                    class="d-flex align-items-center  justify-content-between border-0  py-2 borderleft">
                                                                    <input type="hidden" name="is_paymentwall_enabled"
                                                                        value="off">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" name="is_paymentwall_enabled"
                                                                        id="is_paymentwall_enabled"
                                                                        {{ isset($admin_payment_setting['is_paymentwall_enabled']) && $admin_payment_setting['is_paymentwall_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                    {{-- <label
                                                                        class="custom-control-label form-control-label form-label text-dark"
                                                                        for="is_paymentwall_enabled">{{ __('Enable paymentwall') }}</label> --}}
                                                                </div>


                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paypal_client_id"
                                                                            class="form-label text-dark">{{ __('Public Key') }}</label>
                                                                        <input type="text" name="paymentwall_public_key"
                                                                            id="paymentwall_public_key"
                                                                            class="form-control"
                                                                            value="{{ isset($admin_payment_setting['paymentwall_public_key']) ? $admin_payment_setting['paymentwall_public_key'] : '' }}"
                                                                            placeholder="{{ __('Public Key') }}" />
                                                                        @if ($errors->has('paymentwall_public_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('paymentwall_public_key') }}
                                                                            </span>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paystack_secret_key"
                                                                            class="form-label text-dark">{{ __('Secret Key') }}</label>
                                                                        <input type="text" name="paymentwall_secret_key"
                                                                            id="paymentwall_secret_key"
                                                                            class="form-control form-control-label"
                                                                            value="{{ isset($admin_payment_setting['paymentwall_secret_key']) ? $admin_payment_setting['paymentwall_secret_key'] : '' }}"
                                                                            placeholder="{{ __('Secret Key') }}" />
                                                                        @if ($errors->has('paymentwall_secret_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('paymentwall_secret_key') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="card-footer text-right">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary  float-end']) }}
                                                </div>

                                                {{ Form::close() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        @can('System Settings')
                            <div id="system-setting" class="card">

                                <div class="email-setting-wrap">
                                    {{ Form::model($settings, ['route' => 'system.settings', 'method' => 'POST']) }}

                                    {{ Form::hidden('system_settings', '1') }}

                                    <div class="card-header">
                                        <h3 class="h5">{{ __('System Settings') }}</h3>
                                    </div>
                                    <div class="row card-body">
                                        <div class="form-group col-md-4">
                                            {{ Form::label('low_product_stock_threshold', __('Low Product Stock Threshold'), ['class' => 'form-label text-dark', 'id' => 'number']) }}
                                            {{ Form::number('low_product_stock_threshold', null, ['class' => 'form-control font-style']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('barcode_type', __('Barcode Type'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::select('barcode_type', ['code128' => 'code 128', 'code39' => 'Code 39', 'code93' => 'code 93', 'code93' => 'code 93', 'datamatrix' => 'Data Matrix'], null, ['class' => 'form-control', 'data-toggle' => 'select']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('barcode_format', __('Barcode Format'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::select('barcode_format', ['css' => 'CSS', 'bmp' => 'BMP'], null, ['class' => 'form-control', 'data-toggle' => 'select']) }}
                                        </div>
                                    </div>

                                    <div class="row card-body">
                                        <div class="form-group col-md-4">
                                            {{ Form::label('site_currency', __('Currency *'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('site_currency', null, ['class' => 'form-control font-style', 'required' => 'required']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('site_currency_symbol', __('Currency Symbol *'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('site_currency_symbol', null, ['class' => 'form-control', 'required' => 'required']) }}
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {{ Form::label('currencysymbolposition', __('Currency Symbol Position'), ['class' => 'form-label text-dark']) }}
                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            {{ Form::radio('site_currency_symbol_position', 'pre', null, ['class' => 'form-check-input', 'id' => 'presymbol']) }}
                                                            {{ Form::label('presymbol', __('Pre'), ['class' => 'form-check-label']) }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            {{ Form::radio('site_currency_symbol_position', 'post', null, ['class' => 'form-check-input', 'id' => 'postsymbol']) }}
                                                            {{ Form::label('postsymbol', __('Post'), ['class' => 'form-check-label']) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('site_date_format', __('Date Format'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::select('site_date_format', ['M j, Y' => date('M j, Y'), 'd-m-Y' => date('d-m-Y'), 'm-d-Y' => date('m-d-Y'), 'Y-m-d' => date('Y-m-d')], null, ['class' => 'form-control', 'data-toggle' => 'select']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('site_time_format', __('Time Format'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::select('site_time_format', ['g:i A' => date('g:i A'), 'g:i a' => date('g:i a'), 'H:i' => date('H:i')], null, ['class' => 'form-control', 'data-toggle' => 'select']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('purchase_invoice_prefix', __('Purchase Invoice Prefix'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('purchase_invoice_prefix', null, ['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('sale_invoice_prefix', __('Sale Invoice Prefix'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('sale_invoice_prefix', null, ['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('quotation_invoice_prefix', __('Quotation Invoice Prefix'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('quotation_invoice_prefix', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="card-footer text-right text-end">
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        @endcan



                        @if (Auth::user()->isSuperAdmin())
                            <div class="card" id="recaptcha-setting">

                                <div class="card-header">
                                    <h5>{{ 'ReCaptcha Setting' }}</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('recaptcha.settings.store') }}"
                                        accept-charset="UTF-8">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                                <div class="">

                                                    <input type="checkbox" name="recaptcha_module" id="recaptcha_module"
                                                        data-toggle="switchbutton"
                                                        {{ env('RECAPTCHA_MODULE') == 'yes' ? 'checked="checked"' : '' }}
                                                        value="yes" data-onstyle="primary">
                                                    <label class="form-check-labe" for="recaptcha_module"></label>
                                                    <label class="text-dark mb-1 mt-3"
                                                        for="recaptcha_module">{{ __('Google Recaptcha') }}<a
                                                            href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                                            target="_blank" class="text-blue">
                                                            <small>({{ __('How to Get Google reCaptcha Site and Secret key') }})</small>
                                                        </a></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="google_recaptcha_key"
                                                    class="col-form-label col-form-label text-dark">{{ __('Google Recaptcha Key') }}</label>
                                                <input class="form-control"
                                                    placeholder="{{ __('Enter Google Recaptcha Key') }}"
                                                    name="google_recaptcha_key" type="text"
                                                    value="{{ env('NOCAPTCHA_SITEKEY') }}" id="google_recaptcha_key">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="google_recaptcha_secret"
                                                    class="col-form-label col-form-label text-dark">{{ __('Google Recaptcha Secret') }}</label>
                                                <input class="form-control "
                                                    placeholder="{{ __('Enter Google Recaptcha Secret') }}"
                                                    name="google_recaptcha_secret" type="text"
                                                    value="{{ env('NOCAPTCHA_SECRET') }}" id="google_recaptcha_secret">
                                            </div>
                                        </div>
                                        <div class="col-lg-12  text-end">
                                            <input type="submit" value="{{ __('Save Changes') }}"
                                                class="btn btn-print-invoice  btn-primary m-r-10">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif




                        @can('Billing Settings')
                            <div id="owner-setting" class="card">

                                <div class="email-setting-wrap">
                                    {{ Form::model($settings, ['route' => 'system.settings', 'method' => 'POST']) }}

                                    <div class="card-header">
                                        <h3 class="h5">{{ __('Billing Settings') }}</h3>
                                    </div>

                                    <div class="row card-body">
                                        <div class="form-group col-md-4">
                                            {{ Form::label('company_name', __('Company Name *'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('company_name', null, ['class' => 'form-control font-style', 'required' => 'required']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('company_address', __('Address'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('company_address', null, ['class' => 'form-control font-style']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('company_city', __('City'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('company_city', null, ['class' => 'form-control font-style']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('company_state', __('State'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('company_state', null, ['class' => 'form-control font-style']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('company_zipcode', __('Zip/Post Code'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('company_zipcode', null, ['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group  col-md-4">
                                            {{ Form::label('company_country', __('Country'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('company_country', null, ['class' => 'form-control font-style']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('company_telephone', __('Telephone'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('company_telephone', null, ['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('company_email', __('System Email *'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('company_email', null, ['class' => 'form-control', 'required' => 'required']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('company_email_from_name', __('Email (From Name) *'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('company_email_from_name', null, ['class' => 'form-control font-style', 'required' => 'required']) }}
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="customRadio8" name="tax_type" value="VAT"
                                                                class="form-check-input"
                                                                {{ $settings['tax_type'] == 'VAT' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="customRadio8">{{ __('VAT Number') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="customRadio7" name="tax_type" value="GST"
                                                                class="form-check-input"
                                                                {{ $settings['tax_type'] == 'GST' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="customRadio7">{{ __('GST Number') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{ Form::text('vat_number', null, ['class' => 'form-control', 'placeholder' => __('Enter VAT / GST Number')]) }}

                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-right text-end">
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                    </div>
                                    {{ Form::close() }}

                                </div>
                            </div>
                        @endcan


                        @can('Billing Settings')
                            <div id="invoice-footer-setting" class="card">

                                <div class="email-setting-wrap">
                                    {{ Form::model($settings, ['route' => 'invoice.footer.settings', 'method' => 'POST']) }}

                                    <div class="card-header">
                                        <h3 class="h5">{{ __('Invoice Footer Details') }}</h3>
                                    </div>

                                    <div class="row card-body">
                                        <div class="form-group col-md-12">
                                            {{ Form::label('invoice_footer_title', __('Invoice Footer Title'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::text('invoice_footer_title', null, ['class' => 'form-control', 'placeholder' => __('Enter Invoice Footer Title'), 'required' => 'required']) }}
                                        </div>
                                        <div class="form-group col-md-12">
                                            {{ Form::label('invoice_footer_notes', __('Invoice Footer Notes'), ['class' => 'form-label text-dark']) }}
                                            {{ Form::textarea('invoice_footer_notes', null, ['class' => 'form-control', 'placeholder' => __('Enter Invoice Footer Notes'), 'required' => 'required', 'rows' => 3, 'style' => 'resize: none']) }}
                                        </div>
                                        <div class="col-md-12">
                                            <small>{{ __('This detail will be displayed into invoice footer') }}</small>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right text-end">
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        @endcan



                        @can('Manage Purchases')
                            <div id="purchase-invoice-setting" class="card">
                                <div class="card-header">
                                    <h3 class="h5">{{ __('Purchase invoice') }}</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="invoice_color_pallate">
                                        {{ Form::model($settings, ['route' => 'template.settings', 'method' => 'POST']) }}

                                        <div class="form-group">
                                            <label for="address"
                                                class="form-label text-dark">{{ __('Invoice Template') }}</label>
                                            <select class="form-control" data-toggle="select"
                                                name="purchase_invoice_template">
                                                @foreach (\App\Models\Utility::templateData()['templates'] as $key => $template)
                                                    <option value="{{ $key }}"
                                                        {{ isset($settings['purchase_invoice_template']) && $settings['purchase_invoice_template'] == $key ? 'selected' : '' }}>
                                                        {{ $template }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">{{ __('Color Input') }}</label>
                                            <div class="row gutters-xs">
                                                @foreach (\App\Models\Utility::templateData()['colors'] as $key => $color)
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="purchase_invoice_color" type="radio"
                                                                value="{{ $color }}" class="colorinput-input"
                                                                {{ isset($settings['purchase_invoice_color']) && $settings['purchase_invoice_color'] == $color ? 'checked' : '' }}>
                                                            <span class="colorinput-color"
                                                                style="background: #{{ $color }}"></span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary float-end']) }}

                                        {{ Form::close() }}

                                    </div>
                                    <div class="main_invoice">
                                        <iframe id="purchase_invoice_frame" class="w-100 h-1050" frameborder="0"
                                            src="{{ route('purchased.invoice.preview', [$settings['purchase_invoice_template'], $settings['purchase_invoice_color']]) }}"></iframe>
                                    </div>
                                </div>
                            </div>
                        @endcan

                        @can('Manage Sales')
                            <div id="sale-invoice-setting" class="card">
                                <div class="card-header">
                                    <h3 class="h5">{{ __('Sale invoice') }}</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="invoice_color_pallate">

                                        {{ Form::model($settings, ['route' => 'template.settings', 'method' => 'POST']) }}

                                        <div class="form-group">
                                            <label for="address"
                                                class='form-label text-dark'>{{ __('Invoice Template') }}</label>
                                            <select class="form-control" data-toggle="select" name="sale_invoice_template">
                                                @foreach (\App\Models\Utility::templateData()['templates'] as $key => $template)
                                                    <option value="{{ $key }}"
                                                        {{ isset($settings['sale_invoice_template']) && $settings['sale_invoice_template'] == $key ? 'selected' : '' }}>
                                                        {{ $template }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label form-label text-dark">{{ __('Color Input') }}</label>
                                            <div class="row gutters-xs">
                                                @foreach (\App\Models\Utility::templateData()['colors'] as $key => $color)
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="sale_invoice_color" type="radio"
                                                                value="{{ $color }}" class="colorinput-input"
                                                                {{ isset($settings['sale_invoice_color']) && $settings['sale_invoice_color'] == $color ? 'checked' : '' }}>
                                                            <span class="colorinput-color"
                                                                style="background: #{{ $color }}"></span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}

                                        {{ Form::close() }}

                                    </div>
                                    <div class="main_invoice">
                                        <iframe id="sale_invoice_frame" class="w-100 h-1050" frameborder="0"
                                            src="{{ route('selled.invoice.preview', [$settings['sale_invoice_template'], $settings['sale_invoice_color']]) }}"></iframe>
                                    </div>
                                </div>
                            </div>
                        @endcan


                        @can('Manage Quotations')
                            <div id="quotation-invoice-setting" class="card">
                                <div class="card-header">
                                    <h3 class="h5">{{ __('Quotation invoice') }}</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="invoice_color_pallate">
                                        {{ Form::model($settings, ['route' => 'template.settings', 'method' => 'POST']) }}

                                        <div class="form-group">
                                            <label for="address"
                                                class='form-label text-dark'>{{ __('Invoice Template') }}</label>
                                            <select class="form-control" data-toggle="select"
                                                name="quotation_invoice_template">
                                                @foreach (\App\Models\Utility::templateData()['templates'] as $key => $template)
                                                    <option value="{{ $key }}"
                                                        {{ isset($settings['quotation_invoice_template']) && $settings['quotation_invoice_template'] == $key ? 'selected' : '' }}>
                                                        {{ $template }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label form-label text-dark">{{ __('Color Input') }}</label>
                                            <div class="row gutters-xs">
                                                @foreach (\App\Models\Utility::templateData()['colors'] as $key => $color)
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="quotation_invoice_color" type="radio"
                                                                value="{{ $color }}" class="colorinput-input"
                                                                {{ isset($settings['quotation_invoice_color']) && $settings['quotation_invoice_color'] == $color ? 'checked' : '' }}>
                                                            <span class="colorinput-color"
                                                                style="background: #{{ $color }}"></span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}

                                        {{ Form::close() }}

                                    </div>
                                    <div class="main_invoice">
                                        <iframe id="quotation_invoice_frame" class="w-100 h-1050" frameborder="0"
                                            src="{{ route('quotation.invoice.preview', [$settings['quotation_invoice_template'], $settings['quotation_invoice_color']]) }}"></iframe>
                                    </div>

                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>



        </div>
    </div>






@endsection

@push('scripts')
    <script>
        $(document).on('keypress keydown keyup', '#low_product_stock_threshold', function() {
            if ($(this).val() == '' || $(this).val() < 0) {
                $(this).val('0');
            }
        });
        $(document).on("change", "select[name='purchase_invoice_template'], input[name='purchase_invoice_color']",
            function() {
                var template = $("select[name='purchase_invoice_template']").val();
                var color = $("input[name='purchase_invoice_color']:checked").val();
                $('#purchase_invoice_frame').attr('src', '{{ url('purchased-invoices/preview') }}/' + template +
                    '/' +
                    color);
            });
        $(document).on("change", "select[name='sale_invoice_template'], input[name='sale_invoice_color']", function() {
            var template = $("select[name='sale_invoice_template']").val();
            var color = $("input[name='sale_invoice_color']:checked").val();
            $('#sale_invoice_frame').attr('src', '{{ url('selled-invoices/preview') }}/' + template + '/' +
                color);
        });
        $(document).on("change", "select[name='quotation_invoice_template'], input[name='quotation_invoice_color']",
            function() {
                var template = $("select[name='quotation_invoice_template']").val();
                var color = $("input[name='quotation_invoice_color']:checked").val();
                $('#quotation_invoice_frame').attr('src', '{{ url('quotation-invoices/preview') }}/' + template +
                    '/' + color);
            });

        $(document).on("click", '.send_email', function(e) {
            e.preventDefault();
            var title = $(this).attr('data-title');
            var size = 'md';
            var url = $(this).attr('data-url');
            if (typeof url != 'undefined') {
                $("#commonModal .modal-title").html(title);
                $("#commonModal .modal-dialog").addClass('modal-' + size);

                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        mail_driver: $("#mail_driver").val(),
                        mail_host: $("#mail_host").val(),
                        mail_port: $("#mail_port").val(),
                        mail_username: $("#mail_username").val(),
                        mail_password: $("#mail_password").val(),
                        mail_encryption: $("#mail_encryption").val(),
                        mail_from_address: $("#mail_from_address").val(),
                        mail_from_name: $("#mail_from_name").val(),
                    },
                    cache: false,
                    success: function(data) {
                        ipe
                        $('#commonModal .modal-body').html(data);
                        $('#commonModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    },
                    error: function(data) {
                        data = data.responseJSON;
                        show_toastr('{{ __('Error') }}', data.error, 'error');
                    }
                });
            }
        });
        $(document).on('submit', '#test_email', function(e) {
            e.preventDefault();
            $("#email_sending").show();
            var post = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                type: "post",
                url: url,
                data: post,
                cache: false,
                success: function(data) {
                    if (data.is_success) {
                        show_toastr('Success', data.message, 'success');
                    } else {
                        show_toastr('{{ __('Error') }}', data.error, 'error');
                    }
                    $("#email_sending").hide();
                }
            });
        });

        $(document).on('change', 'input[name="enable_stripe"]', function(e) {
            e.preventDefault();

            if ($(this).prop('checked')) {
                $('#stripe_key, #stripe_secret').attr('required', 'required');
            } else {
                $('#stripe_key, #stripe_secret').removeAttr('required');
            }
        });

        $(document).on('change', 'input[name="enable_paypal"]', function(e) {
            e.preventDefault();

            if ($(this).prop('checked')) {
                $('#paypal_client_id, #paypal_secret_key').attr('required', 'required');
            } else {
                $('#paypal_client_id, #paypal_secret_key').removeAttr('required');
            }
        });

        $('input[name="enable_stripe"], input[name="enable_paypal"]').trigger('change');


        var type = window.location.hash.substr(1);
        $('.list-group-item').removeClass('active');
        $('.list-group-item').removeClass('text-primary');
        if (type != '') {
            $('a[href="#' + type + '"]').addClass('active').removeClass('text-primary');
        } else {
            $('.list-group-item:eq(0)').addClass('active').removeClass('text-primary');
        }

        $(document).on('click', '.list-group-item', function() {
            $('.list-group-item').removeClass('active');
            $('.list-group-item').removeClass('text-primary');
            setTimeout(() => {
                $(this).addClass('active').removeClass('text-primary');
            }, 10);
        });

        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })



        // Start [ Menu hide/show on scroll ]
        let ost = 0;
        document.addEventListener("scroll", function() {
            let cOst = document.documentElement.scrollTop;
            if (cOst == 0) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
            } else if (cOst > ost) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
                document.querySelector(".navbar").classList.remove("default");
            } else {
                document.querySelector(".navbar").classList.add("default");
                document
                    .querySelector(".navbar")
                    .classList.remove("top-nav-collapse");
            }
            ost = cOst;
        });
        // End [ Menu hide/show on scroll ]
        var wow = new WOW({
            animateClass: "animate__animated", // animation css class (default is animated)
        });
        wow.init();
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: "#navbar-example",
        });

        $('.themes-color-change').on('click', function() {
            var color_val = $(this).data('value');
            $('.theme-color').prop('checked', false);
            $('.themes-color-change').removeClass('active_color');
            $(this).addClass('active_color');
            $(`input[value=${color_val}]`).prop('checked', true);
        });

        function check_theme(color_val) {
            $('#theme_color').prop('checked', false);
            $('input[value="' + color_val + '"]').prop('checked', true);
        }
    </script>
@endpush
