@extends('layouts.app')

@section('header-content')
    <div class="row mt-3">

        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-warning">
                                    <i class="ti ti-users"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted">{{ __('Total Users') }}</h6>
                                    <h6 class="text-muted">{{ __('Paid Users') }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <h4 class="m-0">{{ $ownersCount }}</h4>
                            <h4 class="m-0">{{ $paidOwnersCount }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-danger">
                                    <i class="ti ti-chart-pie"></i>
                                </div>
                                <div class="ms-3">

                                    <h6 class="text-muted">{{ __('Total Orders') }}</h6>
                                    <h6 class="text-muted">{{ __('Total Order Amount') }}</h6>

                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <h4 class="m-0">{{ $ordersCount }}</h4>
                            <h4 class="m-0">{{ $ordersPrice }}</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-primary">
                                    <i class="ti ti-database"></i>
                                </div>
                                <div class="ms-3">

                                    <h6 class="text-muted">{{ __('Total Plans') }}</h6>
                                    <h6 class="text-muted">{{ __('Most Purchased Plan') }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <h4 class="m-0">{{ $plansCount }}</h4>
                            <h4 class="m-0">{{ $mostPurchasedPlan }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row ">
                        <div class="col-11">
                            <h5>{{ __('Last 14 Days') }}</h5>
                        </div>
                        <div class="col-1">
                            <h6>{{ __('Order Report') }}</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="order-chart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{__('Dashboard')}}</h5>
    </div>
@endsection



@push('scripts')
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>

    <script>
        (function() {
            var options = {

                series: [{
                    name: '{{ __('Order') }}',
                    data: {!! json_encode($getOrderChart['data']) !!}
                }, ],

                chart: {
                    height: 150,
                    type: 'area',
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },
                    toolbar: {
                        show: false,
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 2,
                    curve: 'smooth'
                },

                title: {
                    text: '',
                    align: 'left'
                },

                xaxis: {
                    categories: {!! json_encode($getOrderChart['label']) !!},
                    title: {
                        text: 'Days'
                    }
                },

                colors: ['#ffa21d', '#FF3A6E'],

                grid: {
                    strokeDashArray: 4,
                },
                legend: {
                    show: false,
                },
                markers: {
                    size: 4,
                    colors: ['#ffa21d', '#FF3A6E'],
                    opacity: 0.9,
                    strokeWidth: 2,
                    hover: {
                        size: 7,
                    }
                },
                yaxis: {
                    title: {
                        text: 'Amount'
                    },
                }
            };
            var chart = new ApexCharts(document.querySelector("#order-chart"), options);
            chart.render();
        })();
    </script>
@endpush
