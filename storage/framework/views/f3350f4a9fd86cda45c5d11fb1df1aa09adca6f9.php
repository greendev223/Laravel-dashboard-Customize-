

<?php $__env->startSection('page-title', __('Plans')); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Manage Plans')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Plan')): ?>
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" data-bs-placement="top"
            title="<?php echo e(__('Add Plan')); ?>" data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Add Plan')); ?>"
            data-url="<?php echo e(route('plans.create')); ?>"><i class="fas fa-plus text-white"></i></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Plans')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">


        






        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6">
                <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s" style="
                                                                                visibility: visible;
                                                                                animation-delay: 0.2s;
                                                                                animation-name: fadeInUp;
                                                                              ">
                    <div class="card-body">
                        <span class="price-badge bg-primary"><?php echo e($plan->name); ?></span>


                        <span
                            class="mb-4 f-w-600 p-price"><?php echo e((!empty(env('CURRENCY_SYMBOL')) ? env('CURRENCY_SYMBOL') : '$') . $plan->price); ?><small
                                class="text-sm"><?php echo e(__('Duration : ') . __(\App\Models\Plan::$arrDuration[$plan->duration])); ?></small></span>



                        <p class="mb-0">
                            <?php echo e($plan->description); ?>

                        </p>

                        <?php if(Auth::user()->isOwner() && Auth::user()->plan_id == $plan->id && date('Y-m-d') < \Auth::user()->plan_expire_date): ?>
                            <h5 class="h6 my-4 bg-primary text-white p-2 expires_tag">
                                <?php echo e(__('Expires on : ')); ?>

                                <?php echo e(\Auth::user()->plan_expire_date ? \Auth::user()->dateFormat(\Auth::user()->plan_expire_date) : __('Unlimited')); ?>

                            </h5>
                        <?php endif; ?>



                        <ul class="list-unstyled my-5">
                            <li>
                                <span class="theme-avtar">
                                    <i class="text-primary ti ti-circle-plus"></i></span>
                                <?php echo e($plan->max_users == -1 ? __('Unlimited') : $plan->max_users); ?> <?php echo e(__('Users')); ?>

                            </li>
                            <li>
                                <span class="theme-avtar">
                                    <i class="text-primary ti ti-circle-plus"></i></span>
                                <?php echo e($plan->max_customers == -1 ? __('Unlimited') : $plan->max_customers); ?>

                                <?php echo e(__('Customers')); ?>

                            </li>
                            <li>
                                <span class="theme-avtar">
                                    <i class="text-primary ti ti-circle-plus"></i></span>
                                <?php echo e($plan->max_vendors == -1 ? __('Unlimited') : $plan->max_vendors); ?>

                                <?php echo e(__('Vendors')); ?>

                            </li>
                        </ul>

                        <div class="text-right">
                            <div class="actions">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Plan')): ?>
                                    <div class="action-btn btn-primary ms-2">
                                        <a title="<?php echo e(_('Edit Plan')); ?>" data-size="lg" href="#"
                                            class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                            data-url="<?php echo e(route('plans.edit', $plan->id)); ?>" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Edit Plan')); ?>" data-toggle="tooltip"
                                            data-original-title="<?php echo e(__('Edit')); ?>"><span class="text-white"> <i
                                                    class="ti ti-edit"></i></span></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Buy Plan')): ?>
                                <?php if(\Auth::user()->isOwner() && \Auth::user()->plan_id == $plan->id): ?>
                                    <div class="d-grid text-center">

                                        <h5 class="h6 my-4 bg-success text-white p-2 expires_tag">
                                            <?php echo e(__('Active')); ?>

                                        </h5>
                                    </div>
                                <?php endif; ?>


                                <div class="d-flex justify-content-center">
                                    <?php if($plan->id != \Auth::user()->plan_id && \Auth::user()->isOwner()): ?>
                                        <?php if($plan->price > 0): ?>
                                            <ul class="list-unstyled ">
                                                <li>
                                                    <span class="btn btn-primary btn-icon m-1">
                                                        <a href="<?php echo e(route('stripe', \Illuminate\Support\Facades\Crypt::encrypt($plan->id))); ?>"
                                                            class="text-white"> <i
                                                                class="ti ti-shopping-cart text-white px-2"></i></a>
                                                    </span>
                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(\Auth::user()->plan_id != $plan->id): ?>
                                        <?php if($plan->id != 1): ?>
                                            <?php if(\Auth::user()->plan_requests != $plan->id): ?>
                                                <ul class="list-unstyled ">
                                                    <li>
                                                        <span class="btn btn-primary btn-icon m-1">
                                                            <a href="<?php echo e(route('send.request', [\Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>"
                                                                data-title="<?php echo e(__('Send Request')); ?>" data-toggle="tooltip">
                                                                <span class=""><i
                                                                        class="ti ti-arrow-forward-up text-white"></i></span>
                                                            </a>
                                                    </li>
                                                </ul>
                                            <?php else: ?>
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <span class="btn btn-danger btn-icon m-1">
                                                            <a href="<?php echo e(route('request.cancel', \Auth::user()->id)); ?>"
                                                                data-title="<?php echo e(__('Cancle Request')); ?>"
                                                                data-toggle="tooltip">
                                                                <span class=""><i
                                                                        class="ti ti-trash text-white "></i></span>
                                                            </a>

                                                    </li>
                                                </ul>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            

                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            $(document).on('keypress keydown keyup', '.max-users, .max-customers, .max-vendors', function() {
                if ($(this).val() == '' || $(this).val() < -1) {
                    $(this).val('0');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My task\Germany\Laravel-dashboard-Customize-\resources\views/plans/index.blade.php ENDPATH**/ ?>