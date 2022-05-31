@extends('layouts.app')

@section('page-title', __('User Profile'))

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{ __('User Profile') }}</h5>
    </div>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Profile') }}</li>
@endsection


@push('scripts')
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300,

        })
        $(".list-group-item").click(function() {
            $('.list-group-item').filter(function() {
                return this.href == id;
            }).parent().removeClass('text-primary');
        });
    </script>
@endpush

@section('content')

    <div class="row">
        <div class="col-xl-3">
            <div class="card sticky-top" style="top:30px">
                <div class="list-group list-group-flush" id="useradd-sidenav">
                    <a href="#v-pills-home" class="list-group-item list-group-item-action">{{ __('Account') }} <div
                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                    <a href="#v-pills-profile" class="list-group-item list-group-item-action">{{ __('Change Password') }}
                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                    </a>

                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div id="v-pills-home" class="card ">
                <div class="card-header">
                    <h5>{{ __('Avatar') }}</h5>
                </div>
                <div class="card-body">

                    {{ Form::model($user, ['route' => ['profile.upload'], 'enctype' => 'multipart/form-data']) }}

                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">

                                @php
                                    $image_url = !empty(Auth::user()->avatar) && asset(Storage::exists($user->avatar)) ? $user->avatar : 'logo/avatar.png';
                                @endphp
                                <img src="{{ asset(Storage::url($image_url)) }}" class="profile-image img-responsive"
                                    onerror="this.onerror=null;this.src='{{ asset('public/img/theme/avatar.png') }}';"
                                    style="width: 60px">
                                <button type="button" class="btn btn-xs btn-danger mt-2 px-2"
                                    onclick="document.getElementById('delete_avatar').submit();">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <div class="choose-file ">
                                    <label for="avatar">
                                        <div class=" bg-primary"> <i
                                                class="ti ti-upload px-1"></i>{{ __('Choose file here') }}</div>
                                        <input type="file" class="form-control" name="avatar" id="avatar"
                                            data-filename="avatar-logo">
                                    </label>
                                    <p class="avatar-logo"></p>
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <small
                                class="">{{ __('Please upload a valid image file. Size of image should not be more than 2MB.') }}</small>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="form-label">{{ __('Full Name') }}</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                                    id="fullname" placeholder="{{ __('Enter Your Name') }}" value="{{ $user->name }}"
                                    required autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email" type="text"
                                    id="email" placeholder="{{ __('Enter Your Email Address') }}"
                                    value="{{ $user->email }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class=" row">
                            <div class="text-end">
                                <button type="submit" class="btn-submit btn btn-primary">
                                    {{ __('Save Changes') }}
                                </button>

                            </div>

                        </div>
                    </div> <!-- end col -->
                    {{ Form::close() }}
                </div> <!-- end row -->
                </form>
                {!! Form::open(['method' => 'DELETE', 'id' => 'delete_avatar', 'route' => ['profile.delete']]) !!}
                {!! Form::close() !!}

            </div>


            <div class="card" id="v-pills-profile">
                <div class="card-header">
                    <h5>{{ __('Password') }}</h5>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'update.password', 'method' => 'POST']) }}
                    @csrf

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">

                                    <label for="current_password"
                                        class="form-label">{{ __('Current Password') }}</label>
                                    <input class="form-control" name="current_password" type="password"
                                        id="current_password" required autocomplete="current_password"
                                        placeholder="{{ __('Enter Current Password') }}">
                                    @error('current_password')
                                        <span class="invalid-current_password" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">

                                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                                    <input class="form-control" name="password" type="password" id="password" required
                                        autocomplete="password" placeholder="{{ __('Enter New Password') }}">
                                    @error('password')
                                        <span class="invalid-password" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="confirm_password"
                                        class="form-label">{{ __('Confirm Password') }}</label>
                                    <input class="form-control" name="confirm_password" type="password"
                                        id="confirm_password" required autocomplete="confirm_password"
                                        placeholder="{{ __('Confirm New Password') }}">
                                    @error('confirm_password')
                                        <span class="invalid-confirm_password" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="text-end">
                            <button type="submit" class="btn-submit btn btn-primary "> {{ __('Change Password') }}
                            </button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>



        </div>
    </div>

@endsection
