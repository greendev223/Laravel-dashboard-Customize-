@extends('layouts.app')
@section('page-title')
    {{ __('Plan-Request') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{ __('Plan Request') }}</h5>
    </div>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Plan Request') }}</li>
@endsection


@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <h5></h5>
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th>{{ __('User Name') }}</th>
                                <th>{{ __('Plan Name') }}</th>
                                <th>{{ __('Duration') }}</th>
                                <th>{{ __('expiry date') }}</th>
                                <th width="150px">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($plan_requests->count() > 0)
                                @foreach ($plan_requests as $prequest)
                                    <tr>
                                        <td>
                                            <div class="font-style font-weight-bold">{{ $prequest->user->name }}</div>
                                        </td>
                                        <td>
                                            <div class="font-style font-weight-bold">{{ $prequest->plan->name }}</div>
                                        </td>


                                        <td>
                                            <div class="font-style font-weight-bold">
                                                {{ $prequest->duration == 'monthly' ? __('One Month') : __('One Year') }}
                                            </div>
                                        </td>
                                        <td>{{ \App\Models\Utility::getDateFormated($prequest->created_at, true) }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('response.request', [$prequest->id, 1]) }}"
                                                    class="action-btn btn-success ms-2">
                                                    <i class="ti ti-check"></i>
                                                </a>
                                                <a href="{{ route('response.request', [$prequest->id, 0]) }}"
                                                    class="action-btn btn-danger ms-2">
                                                    <i class="ti ti-x"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="col" colspan="7">
                                        <h6 class="text-center">{{ __('No Manually Plan Request Found.') }}</h6>
                                    </th>
                                </tr>
                            @endif

                            {{-- @if ($plan_requests->count() > 0)
                            @foreach ($plan_requests as $prequest)
                                <tr>
                                    <td>
                                        <div class="font-style font-weight-bold">{{ $prequest->user->name }}</div>
                                    </td>
                                    <td>
                                        <div class="font-style font-weight-bold">{{ $prequest->plan->name }}</div>
                                    </td>
                                    <td>
                                        <div class="font-weight-bold">{{ $prequest->plan->max_employee }}</div>
                                        <div>{{__('Employee')}}</div>
                                    </td>
                                    <td>
                                        <div class="font-weight-bold">{{ $prequest->plan->max_client }}</div>
                                        <div>{{__('Client')}}</div>
                                    </td>
                                    <td>
                                        <div class="font-style font-weight-bold">{{ ($prequest->duration == 'monthly') ? __('One Month') : __('One Year') }}</div>
                                    </td>
                                    <td>{{ \App\Models\Utility::getDateFormated($prequest->created_at,true) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{route('response.request',[$prequest->id,1])}}" class="btn btn-success btn-xs">
                                                <i class="ti ti-check"></i>
                                            </a>
                                            <a href="{{route('response.request',[$prequest->id,0])}}" class="btn btn-danger btn-xs">
                                                <i class="ti ti-x"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th scope="col" colspan="7"><h6 class="text-center">{{__('No Manually Plan Request Found.')}}</h6></th>
                            </tr>
                        @endif --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
