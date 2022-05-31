<div class="col-md-12">
    <div class="card">


        @foreach ($plans as $plan)
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                       <!--  <img src="{{ asset(Storage::url('/')) . '/' . $plan->image }}"
                                            class="wid-60" alt="images"> -->
                                        <div class="ms-3">
                                            <h6 class="m-0">{{ $plan->name }}</h6>
                                            <small class="text-muted">{{ env('CURRENCY_SYMBOL') . $plan->price }}
                                                {{ ' / ' . $plan->duration }}</small>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <small class="text-muted">{{ $plan->max_users }}</small>
                                    <h6 class="m-0">{{ __('Users') }}</h6>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $plan->max_customers }}</small>
                                    <h6 class="m-0">{{ __('Customers') }}</h6>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $plan->max_vendors }}</small>
                                    <h6 class="m-0">{{ __('Vendors') }}</h6>
                                </td>
                                <td>
                                    @if ($user->plan_id == $plan->id)
                                        <div class="active-label font14">{{ __('Active') }}</div>
                                    @else
                                        <a href="{{ route('plan.active', [$user->id, $plan->id]) }}"
                                            class="btn btn-sm btn-outline-primary"
                                            title="{{ __('Click to Upgrade Plan') }}"><i
                                                class="fas fa-cart-plus"></i></a>
                                    @endif
                                </td>

                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

    </div>
</div>
