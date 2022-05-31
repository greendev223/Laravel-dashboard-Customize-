@php
$user = Auth::user();
if ($user) {
    $currantLang = $user->lang;
    $languages = \App\Models\Utility::languages();
}

@endphp


@if ((isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on') || env('SITE_RTL') == 'on')
    <header class="dash-header transprent-bg">
    @else
        <header class="dash-header">
@endif

<div class="header-wrapper">
    <div class="me-auto dash-mob-drp">
        <ul class="list-unstyled">
            <li class="dash-h-item mob-hamburger">
                <a href="#!" class="dash-head-link" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
            </li>
           
            <li class="dropdown dash-h-item drp-company">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    @php
                        $image_url = !empty($user->avatar) && asset(Storage::exists($user->avatar)) ? $user->avatar : 'logo/avatar.png';
                    @endphp
                    <!-- <span class="theme-avtar rounded-circle"> <img src="{{ asset(Storage::url($image_url)) }}" class="wid-35 rounded-circle" onerror="this.onerror=null;this.src='{{ asset('public/img/theme/avatar.png') }}';"></span>   -->
                    <span class="theme-avtar rounded-circle"> <img src="{{ asset('assets/img/theme/avatar.png') }}"  class="wid-35 rounded-circle"></span>  
                    <span class="hide-mob ms-2">{{ ucfirst(Auth::user()->name) }}</span>
                    <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                </a>



                <div class="dropdown-menu dash-h-dropdown">
                    {{-- <a href="#!" class="dropdown-item">
                        <i class="ti ti-checks text-success"></i>
                        <!-- <span>{{ __('Hi,') }}</span> -->
                        <span class="badge bg-dark">{{ ucfirst(Auth::user()->name) }}</span>
                    </a>

                    <hr class="dropdown-divider" /> --}}
                    <a href="{{ route('profile.display') }}" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span>{{ __('Profile') }}</span>
                    </a>


                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form1').submit();">
                        <i class="ti ti-power"></i>
                        <span>{{ __('Logout') }}</span>
                        {!! Form::open(['method' => 'POST', 'id' => 'logout-form1', 'route' => ['logout'], 'style' => 'display:none']) !!}
                        {!! Form::close() !!}
                    </a>
                </div>
            </li>

        </ul>
    </div>
    <div class="ms-auto">
        <ul class="list-unstyled">

            <li class="dropdown dash-h-item drp-language">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ti ti-world nocolor"></i>
                    <span class="drp-text hide-mob">{{ Str::upper($currantLang) }}</span>
                    <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    @can('Manage Language')
                        <a class="dropdown-item"
                            href="{{ route('manage.language', [isset($currantLang) ? $currantLang : 'en']) }}">{{ __('Create & Customize') }}</a>
                    @endcan
                    @foreach ($languages as $language)
                        <a href="{{ route('change.language', $language) }}"
                            class="dropdown-item @if ($language == $currantLang) active-language @endif">
                            <span> {{ Str::upper($language) }}</span>
                        </a>
                    @endforeach
                </div>
            </li>

        </ul>
    </div>
</div>
</header>
