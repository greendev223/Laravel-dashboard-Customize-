@extends('layouts.app')

@section('page-title', __('Used Coupon List') )

@section('breadcrumb')
         <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
         <li class="breadcrumb-item"><a href="{{ route('coupons.index') }}">{{ __('Coupon list') }}</a></li>
        <li class="breadcrumb-item">{{ __('Used Coupon') }}</li>
@endsection

@section('content')
    @can('Manage Coupon')
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                     <div class="card-header card-body table-border-style">
                        
                         <h5>{{ __('Used Coupon List') }}</h5>
                    </div>
                    
                        <div class="table-responsive">
                            <table class="table dataTable" id="pc-dt-simple" role="grid">
                                <thead>
                                <tr>
                                    <th> {{__('User')}}</th>
                                    <th> {{__('Date')}}</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    @foreach ($userCoupons as $userCoupon)
                                        <tr>
                                            <td>{{ !empty($userCoupon->user_detail) ? $userCoupon->user_detail->name : '' }}</td>
                                            <td>{{ $userCoupon->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </tbody>
                            </table>
                        </div>
                    
                </div>
            </div>
        </div>
    @endcan
@endsection