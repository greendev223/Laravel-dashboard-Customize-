@extends('layouts.app')

@section('page-title', __('Plans'))

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{ __('Manage Plans') }}</h5>
    </div>
@endsection

@section('action-btn')
    @can('Create Plan')
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" data-bs-placement="top"
            title="{{ __('Add Plan') }}" data-ajax-popup="true" data-size="lg" data-title="{{ __('Add Plan') }}"
            data-url="{{ route('plans.create') }}"><i class="fas fa-plus text-white"></i></a>
    @endcan
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Plans') }}</li>
@endsection

@section('content')


    <div class="row">


        {{-- @if (empty($admin_payment_setting['stripe_key']) || empty($admin_payment_setting['stripe_secret']))
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
                    <span class="alert-icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <span
                        class="alert-text"><strong>{{ __('Please set stripe api key & secret key for add new plan') }}</strong></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        @endif
        @if (empty($admin_payment_setting['paypal_client_id']) || empty($admin_payment_setting['paypal_secret_key']))
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
                    <span class="alert-icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <span
                        class="alert-text"><strong>{{ __('Please set paypal client id & secret key for add new plan') }}</strong></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        @endif --}}






        @foreach ($plans as $plan)
            <div class="col-lg-3 col-md-6">
                <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s" style="
                                                                                visibility: visible;
                                                                                animation-delay: 0.2s;
                                                                                animation-name: fadeInUp;
                                                                              ">
                    <div class="card-body">
                        <span class="price-badge bg-primary">{{ $plan->name }}</span>


                        <span
                            class="mb-4 f-w-600 p-price">{{ (!empty(env('CURRENCY_SYMBOL')) ? env('CURRENCY_SYMBOL') : '$') . $plan->price }}<small
                                class="text-sm">{{ __('Duration : ') . __(\App\Models\Plan::$arrDuration[$plan->duration]) }}</small></span>



                        <p class="mb-0">
                            {{ $plan->description }}
                        </p>

                        @if (Auth::user()->isOwner() && Auth::user()->plan_id == $plan->id && date('Y-m-d') < \Auth::user()->plan_expire_date)
                            <h5 class="h6 my-4 bg-primary text-white p-2 expires_tag">
                                {{ __('Expires on : ') }}
                                {{ \Auth::user()->plan_expire_date ? \Auth::user()->dateFormat(\Auth::user()->plan_expire_date) : __('Unlimited') }}
                            </h5>
                        @endif



                        <ul class="list-unstyled my-5">
                            <li>
                                <span class="theme-avtar">
                                    <i class="text-primary ti ti-circle-plus"></i></span>
                                {{ $plan->max_users == -1 ? __('Unlimited') : $plan->max_users }} {{ __('Users') }}
                            </li>
                            <li>
                                <span class="theme-avtar">
                                    <i class="text-primary ti ti-circle-plus"></i></span>
                                {{ $plan->max_customers == -1 ? __('Unlimited') : $plan->max_customers }}
                                {{ __('Customers') }}
                            </li>
                            <li>
                                <span class="theme-avtar">
                                    <i class="text-primary ti ti-circle-plus"></i></span>
                                {{ $plan->max_vendors == -1 ? __('Unlimited') : $plan->max_vendors }}
                                {{ __('Vendors') }}
                            </li>
                        </ul>

                        <div class="text-right">
                            <div class="actions">
                                @can('Edit Plan')
                                    <div class="action-btn btn-primary ms-2">
                                        <a title="{{ _('Edit Plan') }}" data-size="lg" href="#"
                                            class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                            data-url="{{ route('plans.edit', $plan->id) }}" data-ajax-popup="true"
                                            data-title="{{ __('Edit Plan') }}" data-toggle="tooltip"
                                            data-original-title="{{ __('Edit') }}"><span class="text-white"> <i
                                                    class="ti ti-edit"></i></span></a>
                                    </div>
                                @endcan
                            </div>
                        </div>

                        <div class="row">
                            @can('Buy Plan')
                                @if (\Auth::user()->isOwner() && \Auth::user()->plan_id == $plan->id)
                                    <div class="d-grid text-center">

                                        <h5 class="h6 my-4 bg-success text-white p-2 expires_tag">
                                            {{ __('Active') }}
                                        </h5>
                                    </div>
                                @endif


                                <div class="d-flex justify-content-center">
                                    @if ($plan->id != \Auth::user()->plan_id && \Auth::user()->isOwner())
                                        @if ($plan->price > 0)
                                            <ul class="list-unstyled ">
                                                <li>
                                                    <span class="btn btn-primary btn-icon m-1">
                                                        <a href="{{ route('stripe', \Illuminate\Support\Facades\Crypt::encrypt($plan->id)) }}"
                                                            class="text-white"> <i
                                                                class="ti ti-shopping-cart text-white px-2"></i></a>
                                                    </span>
                                                </li>
                                            </ul>
                                        @endif
                                    @endif
                                    @if (\Auth::user()->plan_id != $plan->id)
                                        @if ($plan->id != 1)
                                            @if (\Auth::user()->plan_requests != $plan->id)
                                                <ul class="list-unstyled ">
                                                    <li>
                                                        <span class="btn btn-primary btn-icon m-1">
                                                            <a href="{{ route('send.request', [\Illuminate\Support\Facades\Crypt::encrypt($plan->id)]) }}"
                                                                data-title="{{ __('Send Request') }}" data-toggle="tooltip">
                                                                <span class=""><i
                                                                        class="ti ti-arrow-forward-up text-white"></i></span>
                                                            </a>
                                                    </li>
                                                </ul>
                                            @else
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <span class="btn btn-danger btn-icon m-1">
                                                            <a href="{{ route('request.cancel', \Auth::user()->id) }}"
                                                                data-title="{{ __('Cancle Request') }}"
                                                                data-toggle="tooltip">
                                                                <span class=""><i
                                                                        class="ti ti-trash text-white "></i></span>
                                                            </a>

                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            @endcan
                            {{-- {{ dd($plan->id) }} --}}

                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('public/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(document).on('keypress keydown keyup', '.max-users, .max-customers, .max-vendors', function() {
                if ($(this).val() == '' || $(this).val() < -1) {
                    $(this).val('0');
                }
            });
        });
    </script>
@endpush
