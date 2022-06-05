@extends('layouts.app')

@section('page-title', __('Products'))

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{ __('Products') }}</h5>
    </div>
@endsection

@section('action-btn')
    @can('Create Vendor')
        <a href="#" data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip" data-title="{{ __('Add New Vendor') }}"
        title="{{ __('Create Product') }}"
            data-url="{{ route('vendors.create') }}" class="btn btn-sm btn-primary btn-icon ">
            <span class=""><i class="ti ti-plus text-white"></i></span>
        </a>
    @endcan

    <a href="{{ route('vendors.export') }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="{{ __('Export') }}"> 
        <i class="ti ti-file-export text-white"></i> 
    </a>

    <a href="#" class="btn btn-sm btn-primary btn-icon " data-url="{{ route('vendors.file.import') }}" data-bs-toggle="tooltip" title="{{ __('Import') }}"
        data-ajax-popup="true" data-title="{{ __('Import vendor CSV file') }}">
        <i class="ti ti-file-import text-white"></i> 
    </a>

    
@endsection

@section('breadcrumb')
         <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Products') }}</li>
@endsection

@section('content')
    @can('Manage Vendor')
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header card-body table-border-style">
                        <h5></h5>
                   <div class="table-responsive">
                        <table class="table dataTable" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>{{ __('Product') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Stock') }}</th>
                                    <th>{{ __('Created at') }}</th>
                                    <th class="text-right">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendors as $key => $vendor)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $vendor->name }}</td>
                                        <td>{{ $vendor->email }}</td>
                                        <td>{{ Auth::user()->datetimeFormat($vendor->created_at) }}</td>
                                        <td class="text-right">
                                            @if ($vendor->is_active == 1)
                                                @can('Edit Vendor')
                                                 <div class="action-btn btn-info ms-2">
                                                    <a href="#" data-ajax-popup="true" data-title="{{ __('Edit Vendor') }}"
                                                        data-url="{{ route('vendors.edit', $vendor->id) }}" data-size="lg"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center" data-bs-toggle="tooltip" title="{{ __('Edit Vendor') }}">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                                @endcan
                                                @can('Delete Vendor')
                                                  <div class="action-btn bg-danger ms-2">
                                                    <a href="#" class="bs-pass-para mx-3 btn btn-sm d-inline-flex align-items-center" data-toggle="sweet-alert" data-bs-toggle="tooltip"
                                                        data-confirm="{{ __('Are You Sure?') }}" data-text="{{__('This action can not be undone. Do you want to continue?')}}"
                                                        data-confirm-yes="delete-form-{{ $vendor->id }}"
                                                        title="{{ __('Delete') }}">
                                                        <i class="ti ti-trash text-white"></i>
                                                    </a>
                                                   
                                                  

                                                </div>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['vendors.destroy', $vendor->id], 'id' => 'delete-form-' . $vendor->id]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            @else
                                                <a href="#" class="btn btn-danger btn-sm">
                                                    <i class="ti ti-lock text-white"></i>
                                                </a>
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
    @endcan
@endsection
