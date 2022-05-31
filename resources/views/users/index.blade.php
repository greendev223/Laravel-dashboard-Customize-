@extends('layouts.app')

@if (Auth::user()->parent_id == 0)
    @section('page-title', __('Owners List'))
@else
    @section('page-title', __('Users List'))
@endif

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">
            @if (Auth::user()->parent_id == 0)
                {{ __('Owners List') }}
            @else
                {{ __('Users List') }}
            @endif
        </h5>
    </div>
@endsection

@section('action-btn')

  
        @can('Create User')
            <a href="#" data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip"
                data-title="@if (Auth::user()->parent_id == 0) {{ __('Add Owner') }} @else {{ __('Add User') }} @endif"
                title="@if (Auth::user()->parent_id == 0) {{ __('Add Owner') }} @else {{ __('Add User') }} @endif"
                data-url="{{ route('users.create') }}" class="btn btn-sm btn-primary btn-icon">
                <i class="ti ti-plus text-white"></i></a>
            </a>
        @endcan
    

@endsection

@section('breadcrumb')

    @if (Auth::user()->parent_id == 0)
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Owners') }}</li>
    @else
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Users') }}</li>
    @endif
@endsection

@section('content')
    @can('Manage User')
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header card-body table-border-style">
                        <h5></h5>
                        <div class="table-responsive">
                            <table class=" mb-0" id="pc-dt-simple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Lastlogin') }}</th>
                                        @if (Auth::user()->isSuperAdmin())
                                            <th>{{ __('Total Users') }}</th>
                                            <th>{{ __('Plan') }}</th>
                                            <th>{{ __('Plan Expiry Date') }}</th>
                                        @else
                                            <th>{{ __('User Role') }}</th>
                                        @endif
                                        <th class="text-end">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ ucfirst($user->name) }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->last_login_at }}</td>
                                            @if (Auth::user()->isSuperAdmin())
                                                <td>{{ $user->users }}</td>
                                                <td>{{ !empty($user->getPlan) ? $user->getPlan->name : '' }}</td>
                                                <td>
                                                    @if (!empty($user->plan_expire_date))
                                                        {{ Auth::user()->datetimeFormat($user->plan_expire_date) }}
                                                    @else
                                                        {{ __('Unlimited') }}
                                                    @endif
                                                </td>
                                            @else
                                                <td>
                                                    @foreach ($user->roles()->pluck('name') as $pername)
                                                        <span class="badge bg-success p-2 px-3 rounded">{{ $pername }}</span>
                                                    @endforeach
                                                </td>
                                            @endif
                                            <td class="Action text-end">
                                                @if (Auth::user()->isSuperAdmin())
                                                    <div class="action-btn btn-warning ms-2">
                                                        <a href="#" data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            data-title="{{ __('Upgrade Plan') }}"
                                                            title="{{ __('Upgrade Plan') }}" data-size="lg"
                                                            data-url="{{ route('plan.upgrade', $user->id) }}"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                            <i class="ti ti-trophy text-white"></i>
                                                        </a>
                                                    </div>
                                                @endif

                                                @if ($user->is_active == 1)
                                                    @can('Edit User')
                                                        <div class="action-btn btn-secondary ms-2">
                                                            <a href="#" data-ajax-popup="true" data-bs-toggle="tooltip"
                                                                data-title="{{ __('Edit User') }}" title="{{ __('Edit') }}"
                                                                data-size="lg" data-url="{{ route('users.edit', $user->id) }}"
                                                                class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                <i class="ti ti-pencil text-white"></i>
                                                            </a>
                                                        </div>
                                                    @endcan
                                                    @can('Delete User')
                                                        <div
                                                            class="action-btn  {{ $user->user_status == 1 ? 'btn-success' : 'btn-danger' }}  ms-2 ">
                                                            <a href="#" data-confirm="{{ __('Are You Sure?') }}"
                                                                data-text="Do you want to continue?" data-bs-toggle="tooltip"
                                                                data-confirm-yes="status-form-{{ $user->id }}"
                                                                class="bs-pass-para mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                @if ($user->user_status == 1)
                                                                    <i class="ti ti-user-check text-white"
                                                                        data-title="{{ __('Active') }}"></i>
                                                                @else
                                                                    <i class="ti ti-user-x text-white"
                                                                        data-title="{{ __('Deactive') }}"></i>
                                                                @endif
                                                            </a>
                                                        </div>
                                                    @endcan
                                                @else
                                                    <a href="#" class="">
                                                        <i class="ti ti-lock text-white"></i>
                                                    </a>
                                                @endif
                                                @if (Auth::user()->isSuperAdmin() || Auth::user()->isOwner())
                                                    <div class="action-btn btn-info ms-2">
                                                        <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                            data-url="{{ route('user.reset', \Crypt::encrypt($user->id)) }}"
                                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            title="{{ __('Reset Password') }}" data-toggle="tooltip"
                                                            data-title="{{ __('Reset Password') }}"><i
                                                                class="ti ti-key text-white"></i> </a>
                                                    </div>
                                                @endif
                                                {!! Form::open(['method' => 'PATCH', 'route' => ['user.status', $user->id], 'id' => 'status-form-' . $user->id]) !!}
                                                {!! Form::close() !!}
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
    @endcan





@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).on('change', '#branch_id', function(e) {
            $.ajax({
                url: '{{ route('get.cash.registers') }}',
                dataType: 'json',
                data: {
                    'branch_id': $(this).val()
                },
                success: function(data) {
                    $('#cash_register_id').find('option').not(':first').remove();
                    $.each(data, function(key, value) {
                        $('#cash_register_id')
                            .append($("<option></option>")
                                .attr("value", value.id)
                                .text(value.name));
                    });
                },
                error: function(data) {
                    data = data.responseJSON;
                    show_toastr('{{ __('Error') }}', data.message, 'error');
                }
            });
        });
    </script>
@endpush
