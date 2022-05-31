@extends('layouts.app')

@section('page-title', __('Order List') )

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{ __('Order List') }}</h5>
    </div>
@endsection


@section('breadcrumb')
         <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Orders list') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                 <div class="card-header card-body table-border-style">
                        <h5></h5>
                        <div class="table-responsive">
                    <table class="table" id="pc-dt-simple" role="grid">
                        <thead class="thead-light">
                        <tr>
                            <th>{{__('Order Id')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Plan Name')}}</th>
                            <th>{{__('Price')}}</th>
                            <th>{{__('Type')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>{{__('Coupon')}}</th>
                            <th>{{__('Date')}}</th>
                            <th class="text-right">{{__('Invoice')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->order_id}}</td>
                                <td>{{ucfirst($order->user_name)}}</td>
                                <td>{{$order->plan_name}}</td>
                                <td>${{number_format($order->price)}}</td>
                                <td>{{$order->payment_type}}</td>
                                <td>
                                        <span class="badge p-2 px-3 rounded @if($order->payment_status == 'succeeded' || $order->payment_status == 'approved') bg-success @else bg-danger @endif">
                                            {{-- badge bg-warning p-2 px-3 rounded --}}
                                            {{ucfirst($order->payment_status)}}
                                        </span>
                                </td>
                                <td>{{ !empty($order->appliedCoupon->coupon_detail) ? (!empty($order->appliedCoupon->coupon_detail->code) ? $order->appliedCoupon->coupon_detail->code : '') : '' }}</td>
                                <td>{{$order->created_at->format('d M Y H:i:s')}}</td>
                                <td class="text-right">
                                    @if(!empty($order->receipt))
                                        <a href="{{$order->receipt}}" title="Invoice" target="_blank" class="view-icon"><i class="ti ti-file-invoice text-white"></i> </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>

        </div>
    </div>
@endsection
