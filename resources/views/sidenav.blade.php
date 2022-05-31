@php
$user = Auth::user();
if ($user) {
    $currantLang = $user->lang;
    $languages = \App\Models\Utility::languages();
}

$logo = asset(Storage::url('logo'));

if (\Auth::user()->type == 'Super Admin') {
    $company_logo = Utility::get_superadmin_logo();
} else {
    $company_logo = Utility::get_company_logo();
}

@endphp

@if ((isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on') || env('SITE_RTL') == 'on')
    <nav class="dash-sidebar light-sidebar transprent-bg">
    @else
        <nav class="dash-sidebar light-sidebar">
@endif


<div class="navbar-wrapper">
    <div class="m-header main-logo">
        <a href="{{ route('home') }}" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <!-- <img src="{{ $logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
                alt="{{ config('app.name', 'Posgo') }}" class="logo logo-lg"> -->
            <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="" class="logo logo-lg">
            <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="" class="logo logo-sm">
        </a>
    </div>
    <div class="navbar-content">
        <ul class="dash-navbar">
        <li class="dash-item dash-hasmenu">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-home"></i></span><span
                                class="dash-mtext">{{ __('Dashboard') }}</span><span class="dash-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">

                            
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link" href="{{ route('home') }}">Dashboard</a>
                                </li>
                            

                            @can('Manage Role')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link" href="{{ route('roles.index') }}">Store Analytics</a>
                                </li>
                            @endcan

                        </ul>
                    </li>

            @if (Auth::user() && Auth::user()->parent_id == 0)
                <li class="dash-item dash-hasmenu">
                    <a href="{{ route('users.index') }}" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-users"></i></span><span
                            class="dash-mtext">{{ __('Owners') }}</span></a>
                </li>
            @else
                @if (Gate::check('Manage User') || Gate::check('Manage Role') || Gate::check('Manage Permission'))
                    <li class="dash-item dash-hasmenu">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-users"></i></span><span
                                class="dash-mtext">{{ __('Shop') }}</span><span class="dash-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">


                        <!-- -------------------- shop section ----------------------- -->

                            @can('Manage User')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link" href="{{ route('users.index') }}">Products</a>
                                </li>
                            @endcan

                            @can('Manage Role')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link" href="{{ route('roles.index') }}">Product Category</a>
                                </li>
                            @endcan
                            @can('Manage User')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link" href="{{ route('users.index') }}">Product Tax</a>
                                </li>
                            @endcan

                            @can('Manage Role')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link" href="{{ route('roles.index') }}">Product Coupon</a>
                                </li>
                            @endcan
                            @can('Manage User')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link" href="{{ route('users.index') }}">Subscriber</a>
                                </li>
                            @endcan

                            @can('Manage Role')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link" href="{{ route('roles.index') }}">shipping</a>
                                </li>
                            @endcan
                            @can('Manage User')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link" href="{{ route('users.index') }}">Custom Page</a>
                                </li>
                            @endcan

                            @can('Manage Role')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link" href="{{ route('roles.index') }}">Blog</a>
                                </li>
                            @endcan



                            @can('Manage Permission')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link" href="{{ route('permissions.index') }}">permissions</a>
                                </li>
                            @endcan

                        <!---------------------------------- shop section end -------------------- -->
                        </ul>
                    </li>
                @endif
            @endif

            @can('Manage Customer')
                <li class="dash-item ">
                    <a href="{{ route('customers.index') }}"
                        class="dash-link {{ Request::segment(1) == 'customers' ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-user"></i></span><span
                            class="dash-mtext">{{ __('Customers') }}</span>
                    </a>
                </li>
            @endcan


            <!-- @can('Manage Vendor')
                <li class="dash-item ">
                    <a href="{{ route('vendors.index') }}"
                        class="dash-link {{ Request::segment(1) == 'customers' ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-user-plus"></i></span><span
                            class="dash-mtext">{{ __('Vendors') }}</span>
                    </a>
                </li>
            @endcan -->


            <!-- @if (Gate::check('Manage Product') || Gate::check('Manage Category') || Gate::check('Manage Brand') || Gate::check('Manage Tax') || Gate::check('Manage Unit'))
                <li class="dash-item dash-hasmenu">
                    <a href="#" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-brand-producthunt"></i></span><span
                            class="dash-mtext">{{ __('Products') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>



                    <ul class="dash-submenu">

                        @can('Manage Product')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="{{ route('products.index') }}">Products</a>
                            </li>
                        @endcan

                        @can('Manage Category')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="{{ route('categories.index') }}">Categories</a>
                            </li>
                        @endcan

                        @can('Manage Brand')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="{{ route('brands.index') }}">Brands</a>
                            </li>
                        @endcan

                        @can('Manage Tax')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="{{ route('taxes.index') }}">Tax</a>
                            </li>
                        @endcan

                        @can('Manage Unit')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="{{ route('units.index') }}">Unit</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endif -->

            @can('Manage Purchases')
                <li class="dash-item dash-hasmenu">
                    <a href="#navbar-purchases"
                        class="dash-link {{ Request::segment(1) == 'purchases' || Request::segment(1) . '/' . Request::segment(2) == 'reports/purchases'? 'active': '' }}"><span
                            class="dash-micon"><i class="ti ti-shopping-cart"></i></span><span
                            class="dash-mtext">{{ __('Purchases') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>



                    <ul class="dash-submenu">

                        @can('Manage Product')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="{{ route('purchases.index') }}">Add Purchase</a>
                            </li>
                        @endcan

                        @can('Manage Category')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="{{ route('reports.purchases') }}">Purchases</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('Manage Sales')
                <li class="dash-item dash-hasmenu">
                    <a href="#" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-book"></i></span><span
                            class="dash-mtext">{{ __('Sales') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>


                    <ul class="dash-submenu">

                        @can('Manage Product')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="{{ route('sales.index') }}">Add Sale</a>
                            </li>
                        @endcan

                        @can('Manage Category')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="{{ route('reports.sales') }}">Sales</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('Manage Returns')
                <li class="dash-item ">
                    <a href="{{ route('productsreturn.index') }}"
                        class="dash-link {{ Request::segment(1) == 'productsreturn' ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-receipt-refund"></i></span><span
                            class="dash-mtext">{{ __('Returns') }}</span>
                    </a>
                </li>
            @endcan

            @can('Manage Quotations')
                <li class="dash-item ">
                    <a href="{{ route('quotations.index') }}"
                        class="dash-link {{ Request::segment(1) == 'quotations' ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-currency-pound"></i></span><span
                            class="dash-mtext">{{ __('Quotations') }}</span>
                    </a>
                </li>
            @endcan

            @if (Gate::check('Manage Expense') || Gate::check('Manage Expense Category'))
                <li class="dash-item dash-hasmenu">
                    <a href="#"
                        class="dash-link {{ Request::segment(1) == 'expenses' || Request::segment(1) == 'expensecategories' ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-report-money"></i></span><span
                            class="dash-mtext">{{ __('Expenses') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>


                    <ul class="dash-submenu">

                        @can('Manage Expense')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="{{ route('expenses.index') }}">Expense List</a>
                            </li>
                        @endcan

                        @can('Manage Expense Category')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link" href="{{ route('expensecategories.index') }}">Expense
                                    Category</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endif


            @can('Manage Calendar Event')
                <li class="dash-item ">
                    <a href="{{ route('calendars.index') }}"
                        class="dash-link {{ Request::segment(1) == 'calendars' ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-calendar"></i></span><span
                            class="dash-mtext">{{ __('Calendars') }}</span>
                    </a>
                </li>
            @endcan


            @can('Manage Notification')
                <li class="dash-item ">
                    <a href="{{ route('notifications.index') }}"
                        class="dash-link {{ Request::segment(1) == 'notifications' ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-notification"></i></span><span
                            class="dash-mtext">{{ __('Notifications') }}</span>
                    </a>
                </li>
            @endcan

            @can('Manage Plan')
                <li class="dash-item ">
                    <a href="{{ route('plans.index') }}"
                        class="dash-link {{ Request::segment(1) == 'plans' ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-currency-dollar"></i></span><span
                            class="dash-mtext">{{ __('Plans') }}</span>
                    </a>
                </li>
            @endcan


            @if (Auth::user()->isSuperAdmin())
                <li class="dash-item ">
                    <a href="{{ route('plan_request.index') }}"
                        class="dash-link {{ request()->is('plan_request*') ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-plane"></i></span><span
                            class="dash-mtext">{{ __('Plan Request') }}</span>
                    </a>
                </li>
            @endif


            @can('Manage Coupon')
                <li class="dash-item dash-hasmenu">
                    <a href="{{ route('coupons.index') }}"
                        class="dash-link {{ Request::segment(1) == 'coupons' ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-gift"></i></span><span
                            class="dash-mtext">{{ __('Coupons') }}</span>
                    </a>
                </li>
            @endcan


            @can('Manage Order')
                <li class="dash-item dash-hasmenu">
                    <a href="{{ route('order.index') }}"
                        class="dash-link {{ Request::segment(1) == 'orders' ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-calendar-plus"></i></span><span
                            class="dash-mtext">{{ __('Orders') }}</span>
                    </a>
                </li>
            @endcan


            {{-- @can('Manage Language') --}}
            @if (Auth::user()->isSuperAdmin())
                <li class="dash-item dash-hasmenu">
                    <a href="{{ route('manage.language', Auth::user()->lang) }}"
                        class="dash-link {{ Request::segment(1) == 'manage-language' ? 'active' : '' }}"><span
                            class="dash-micon"><i class="ti ti-language"></i></span><span
                            class="dash-mtext">{{ __('Language') }}</span>
                    </a>
                </li>
            @endcan

            @if (Gate::check('Manage Product') || Gate::check('Manage Category') || Gate::check('Manage Brand') || Gate::check('Manage Tax') || Gate::check('Manage Expense') || Gate::check('Manage Customer') || Gate::check('Manage Vendor') || Gate::check('Manage Purchases') || Gate::check('Manage Sales'))
                <li class="dash-item dash-hasmenu">
                    <a href="#"
                        class="dash-link {{ Request::segment(1) == 'product-stock-analysis' ||
                        Request::segment(1) == 'product-category-analysis' ||
                        Request::segment(1) == 'product-brand-analysis' ||
                        Request::segment(1) == 'product-tax-analysis' ||
                        Request::segment(1) == 'expense-analysis' ||
                        Request::segment(1) == 'customer-sales-analysis' ||
                        Request::segment(1) == 'vendor-purchased-analysis' ||
                        Request::segment(1) == 'purchased-daily-analysis' ||
                        Request::segment(1) == 'purchased-monthly-analysis' ||
                        Request::segment(1) == 'sold-daily-analysis' ||
                        Request::segment(1) == 'sold-monthly-analysis'
                            ? 'active'
                            : '' }}"><span
                            class="dash-micon"><i class="ti ti-report"></i></span><span
                            class="dash-mtext">{{ __('Reports') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>

                    <ul class="dash-submenu">


                        @can('Manage Product')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link"
                                    href="{{ route('product.stock.analysis') }}">{{ __('Stock Analysis') }}</a>
                            </li>
                        @endcan

                        @can('Manage Category')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link"
                                    href="{{ route('product.category.analysis') }}">{{ __('Category Report') }}</a>
                            </li>
                        @endcan

                        @can('Manage Brand')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link"
                                    href="{{ route('product.brand.analysis') }}">{{ __('Brand Report') }}</a>
                            </li>
                        @endcan

                        @can('Manage Tax')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link"
                                    href="{{ route('product.tax.analysis') }}">{{ __('Tax Report') }}</a>
                            </li>
                        @endcan

                        @can('Manage Expense')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link"
                                    href="{{ route('expense.analysis') }}">{{ __('Expense Report') }}</a>
                            </li>
                        @endcan

                        @can('Manage Customer')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link"
                                    href="{{ route('customer.sales.analysis') }}">{{ __('Customer Report') }}</a>
                            </li>
                        @endcan

                        @can('Manage Vendor')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link"
                                    href="{{ route('vendor.purchased.analysis') }}">{{ __('Vendor Report') }}</a>
                            </li>
                        @endcan

                        @can('Manage Purchases')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link {{ Request::segment(1) == 'purchased-daily-analysis' || Request::segment(1) == 'purchased-monthly-analysis'? 'active': '' }}"
                                    href="{{ route('purchased.daily.analysis') }}">{{ __('Purchase Daily/Monthly Report') }}</a>
                            </li>
                        @endcan

                        @can('Manage Sales')
                            <li class="dash-item dash-hasmenu">
                                <a class="dash-link {{ Request::segment(1) == 'sold-daily-analysis' || Request::segment(1) == 'sold-monthly-analysis'? 'active': '' }}"
                                    href="{{ route('sold.daily.analysis') }}">{{ __('Sale Daily/Monthly Report') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif


            @if (Auth::user() && Auth::user()->parent_id == 0)
                <li class="dash-item dash-hasmenu">
                    <a href="{{ route('systems.index') }}" class="dash-link"><span
                            class="dash-micon"><i class="ti ti-settings"></i></span><span
                            class="dash-mtext">{{ __('Store/Shop Builder') }}</span></a>
                </li>
            @else
                @if (Gate::check('Store Settings') || Gate::check('Manage Branch') || Gate::check('Manage Cash Register') || Gate::check('Manage Branch Sales Target'))
                    <li class="dash-item dash-hasmenu">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-settings"></i></span><span
                                class="dash-mtext">{{ __('Settings') }}</span><span
                                class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">

                            @can('Store Settings')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link"
                                        href="{{ route('systems.index') }}">{{ __('Store Settings') }}</a>
                                </li>
                            @endcan

                            @can('Manage Branch')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link"
                                        href="{{ route('branches.index') }}">{{ __('Branches') }}</a>
                                </li>
                            @endcan

                            @can('Manage Cash Register')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link"
                                        href="{{ route('cashregisters.index') }}">{{ __('Cash Registers') }}</a>
                                </li>
                            @endcan

                            @can('Manage Branch Sales Target')
                                <li class="dash-item dash-hasmenu">
                                    <a class="dash-link"
                                        href="{{ route('branchsalestargets.index') }}">{{ __('Branch Sales Target') }}</a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endif
            @endif
    </ul>
</div>
</ul>

</div>
</div>
</nav>
