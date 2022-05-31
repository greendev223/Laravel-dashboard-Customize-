
<!DOCTYPE html>
@php  $SITE_RTL = Cookie::get('SITE_RTL'); @endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  dir="{{$SITE_RTL == 'on'?'rtl':''}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if(trim($__env->yieldContent('page-title')))
            @yield('page-title') -
        @endif
        {{ \App\Models\Utility::settings()['company_name'] != '' ? \App\Models\Utility::settings()['company_name'] : config('app.name', 'POSGo Saas') }}
    </title>

    @php $logo = asset(Storage::url('logo')); @endphp

    <link rel="icon" href="{{ $logo.'/favicon.png' }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/libs/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-daterangepicker/daterangepicker.css') }}">
    @stack('stylesheets')

    <link rel="stylesheet" href="{{ asset('assets/css/datatable/jquery.dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/site-'.$user->mode.'.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/ac.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-'.$user->mode.'.css') }}">

    @if($SITE_RTL=='on')
        <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.css') }}">
    @endif
</head>

     <div class="m-6">
        <div class="container position-relative">
            <div class="download_btn">                   
                <a onclick="saveAsPDF2()" class="btn btn-sm btn-white btn-icon-only rounded-circle ml-2 shadow-sm">
                    <span class="btn-inner--icon"><i class="fas fa-download"></i></span>
                </a>
            </div>
            <div class="row invoice" id="printableArea2">
                <div class="col-12 card p-4">
                
                    <div class="invoice-details">
                        <h1 class="invoice-id h4">{{ $details['invoice_id'] }}</h1>
                        <div class="date mb-3">{{ __('Date of Invoice') }}: {{ $details['date'] }}</div>
                        <div class="date mb-3 float-right">{!! DNS2D::getBarcodeHTML($details['invoice_id'], 'QRCODE',5,5) !!}</div>
                        <span class="clearfix" style="clear: both; display: block;"></span>
                    </div>
                    <div class="contacts">
                        <div class="invoice-to">
                            <div class="text-gray-light text-uppercase">{{ __('Invoice To:') }}</div>
                            {!! $details['customer']['details']  !!}
                        </div>
                        <div class="company-details">
                            <div class="text-gray-light text-uppercase">{{ __('Invoice From:') }}</div>
                            {!! $details['user']['details']  !!}
                        </div>
                    </div>
                    <div class="">
                        <div class="invoice-table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-left">{{ __('Items') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th class="text-right">{{ __('Price') }}</th>
                                    <th class="text-right">{{ __('Tax') }}</th>
                                    <th class="text-right">{{ __('Tax Amount') }}</th>
                                    <th class="text-right">{{ __('Total') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    
                                @foreach($sales['data'] as $key => $value)
                                    <tr>
                                        <td class="cart-summary-table text-left">
                                            {{ $value['name'] }}
                                        </td>
                                        <td class="cart-summary-table">
                                            {{ $value['quantity'] }}
                                        </td>
                                        <td class="text-right cart-summary-table">
                                            {{ $value['price'] }}
                                        </td>
                                        <td class="text-right cart-summary-table">
                                            {{ $value['tax'] }}
                                        </td>
                                        <td class="text-right cart-summary-table">
                                            {{ $value['tax_amount'] }}
                                        </td>
                                        <td class="text-right cart-summary-table">
                                            {{ $value['subtotal'] }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="text-left font-weight-bold">{{ __('Total') }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right font-weight-bold">{{ $sales['total'] }}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        @if($details['pay'] == 'show')
                            <button class="btn btn-primary btn-sm btn-done-payment text-right float-right rounded-pill" data-url="{{route('sales.store')}}">{{ __('Done Payment') }}</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
     </div>

    <script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
    <script>

        function saveAsPDF2() {
            var element = document.getElementById('printableArea2');
            var opt = {
                margin: 0.3,
                filename:'sale_invoice',
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 4,
                    dpi: 72,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A3'
                }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
    
    <script>
        $('.copy_link').click(function (e) {
            e.preventDefault();
            var copyText = $(this).attr('href');

            document.addEventListener('copy', function (e) {
                e.clipboardData.setData('text/plain', copyText);
                e.preventDefault();
            }, true);

            document.execCommand('copy');
            show_toastr('Success', 'Url copied to clipboard', 'success');
        });
    </script>

   


<script src="{{ asset('assets/js/site.core.js')}}"></script>
<script src="{{ asset('assets/libs/progressbar.js/dist/progressbar.min.js')}}"></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/libs/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('assets/libs/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{ asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{ asset('assets/libs/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>
<script src="{{ asset('assets/js/letter.avatar.js')}}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>


<script>
    var toster_pos="{{$SITE_RTL=='on' ?'left' : 'right'}}";
</script>
<script src="{{ asset('js/custom.js') }}"></script>

@stack('scripts')

@if(Session::has('success'))
    <script>
        show_toastr("{{__('Success') }}", "{!! session('success') !!}", 'success');
    </script>
@endif
@if(Session::has('error'))
    <script>
        show_toastr("{{__('Error') }}", "{!! session('error') !!}", 'error');
    </script>
@endif

</body>
</html>

