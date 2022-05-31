@extends('layouts.app')

@section('page-title', __('Languages'))

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{ __('Languages') }}</h5>
    </div>
@endsection

@section('action-btn')
    <a class="btn btn-sm btn-primary btn-icon m-1" data-ajax-popup="true"  
    data-bs-toggle="tooltip" title="{{ __('Create language') }}" data-bs-placement="top"
        data-title="{{ __('Create New Language') }}" data-url="{{ route('create.language') }}">
        <span class=""><i class="ti ti-plus text-white"></i></span>
    </a>

    @if ($currantLang != (env('DEFAULT_LANG') ?? 'en'))
        <a href="#" class="btn btn-sm btn-danger btn-icon-only rounded-circle shadow-sm"
            data-confirm="{{ __('Are You Sure?') }}|{{ __('This action can not be undone. Do you want to continue?') }}"
            data-confirm-yes="document.getElementById('delete-lang-{{ $currantLang }}').submit();">
            <i class="fas fa-trash"></i>
        </a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['lang.destroy', $currantLang], 'id' => 'delete-lang-' . $currantLang]) !!}
        {!! Form::close() !!}
    @endif
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Languages') }}</li>
@endsection

@section('content')
    <div class="row min-vh-78 mt-3">
        <div class="col">
            <div class="language-wrap">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 language-list-wrap">
                        <div class="card">
                            <div class="card-body">
                                <div class="language-list">
                                    <div class="nav flex-column nav-pills language-listt">
                                        @foreach ($languages as $lang)
                                            <a href="{{ route('manage.language', [$lang]) }}"
                                                class="nav-link text-sm font-weight-bold {{ $currantLang == $lang ? 'active' : '' }}">
                                                <i class="d-lg-none d-block mr-1"></i>
                                                <span class="d-none d-lg-block">{{ Str::upper($lang) }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 language-form-wrap">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div id="nav-pills-tabs-component" class="tab-pane tab-example-result fade show active"
                                        role="tabpanel" aria-labelledby="nav-pills-tabs-component-tab">
                                        <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="pills-user-tab-1" data-bs-toggle="pill"
                                                    href="#tabs-icons-text-1" data-bs-toggle="#pills-user-1"><i
                                                        class="ti ti-cloud-upload "></i>{{ __('Labels') }}</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="pills-user-tab-2" data-bs-toggle="pill"
                                                    href="#tabs-icons-text-2" data-bs-toggle="#pills-user-2"><i
                                                        class="ti ti-bell"> </i>{{ __('Messages') }}</a>
                                            </li>
                                        </ul>

                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade active show" id="tabs-icons-text-1"
                                                        role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                                        <form method="post"
                                                            action="{{ route('store.language.data', [$currantLang]) }}">
                                                            @csrf
                                                            <div class="row">
                                                                @foreach ($arrLabel as $label => $value)
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label"
                                                                                for="example3cols1Input">{{ $label }}
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                name="label[{{ $label }}]"
                                                                                value="{{ $value }}">
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                <div class="col-lg-12 text-right">
                                                                    <button class="btn btn-primary btn-sm rounded-pill"
                                                                        type="submit">{{ __('Save Changes') }}</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                                        aria-labelledby="tabs-icons-text-2-tab">
                                                        <form method="post"
                                                            action="{{ route('store.language.data', [$currantLang]) }}">
                                                            @csrf
                                                            <div class="row">
                                                                @foreach ($arrMessage as $fileName => $fileValue)
                                                                    <div class="col-lg-12">
                                                                        <h6>{{ ucfirst($fileName) }}</h6>
                                                                    </div>
                                                                    @foreach ($fileValue as $label => $value)
                                                                        @if (is_array($value))
                                                                            @foreach ($value as $label2 => $value2)
                                                                                @if (is_array($value2))
                                                                                    @foreach ($value2 as $label3 => $value3)
                                                                                        @if (is_array($value3))
                                                                                            @foreach ($value3 as $label4 => $value4)
                                                                                                @if (is_array($value4))
                                                                                                    @foreach ($value4 as $label5 => $value5)
                                                                                                        <div
                                                                                                            class="col-md-6">
                                                                                                            <div
                                                                                                                class="form-group">
                                                                                                                <label>{{ $fileName }}.{{ $label }}.{{ $label2 }}.{{ $label3 }}.{{ $label4 }}.{{ $label5 }}</label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    name="message[{{ $fileName }}][{{ $label }}][{{ $label2 }}][{{ $label3 }}][{{ $label4 }}][{{ $label5 }}]"
                                                                                                                    value="{{ $value5 }}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    @endforeach
                                                                                                @else
                                                                                                    <div
                                                                                                        class="col-lg-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label>{{ $fileName }}.{{ $label }}.{{ $label2 }}.{{ $label3 }}.{{ $label4 }}</label>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="message[{{ $fileName }}][{{ $label }}][{{ $label2 }}][{{ $label3 }}][{{ $label4 }}]"
                                                                                                                value="{{ $value4 }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @else
                                                                                            <div class="col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label>{{ $fileName }}.{{ $label }}.{{ $label2 }}.{{ $label3 }}</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name="message[{{ $fileName }}][{{ $label }}][{{ $label2 }}][{{ $label3 }}]"
                                                                                                        value="{{ $value3 }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @else
                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label>{{ $fileName }}.{{ $label }}.{{ $label2 }}</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="message[{{ $fileName }}][{{ $label }}][{{ $label2 }}]"
                                                                                                value="{{ $value2 }}">
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>{{ $fileName }}.{{ $label }}</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="message[{{ $fileName }}][{{ $label }}]"
                                                                                        value="{{ $value }}">
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </div>
                                                            <div class="col-lg-12 text-right">
                                                                <button class="btn btn-primary btn-sm rounded-pill"
                                                                    type="submit">{{ __('Save Changes') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
