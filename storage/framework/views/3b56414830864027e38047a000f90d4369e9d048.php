<?php if(Auth::user()->parent_id == 0): ?>
    <?php $__env->startSection('page-title', __('Owners List')); ?>
<?php else: ?>
    <?php $__env->startSection('page-title', __('Users List')); ?>
<?php endif; ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">
            <?php if(Auth::user()->parent_id == 0): ?>
                <?php echo e(__('Owners List')); ?>

            <?php else: ?>
                <?php echo e(__('Users List')); ?>

            <?php endif; ?>
        </h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>

  
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create User')): ?>
            <a href="#" data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip"
                data-title="<?php if(Auth::user()->parent_id == 0): ?> <?php echo e(__('Add Owner')); ?> <?php else: ?> <?php echo e(__('Add User')); ?> <?php endif; ?>"
                title="<?php if(Auth::user()->parent_id == 0): ?> <?php echo e(__('Add Owner')); ?> <?php else: ?> <?php echo e(__('Add User')); ?> <?php endif; ?>"
                data-url="<?php echo e(route('users.create')); ?>" class="btn btn-sm btn-primary btn-icon">
                <i class="ti ti-plus text-white"></i></a>
            </a>
        <?php endif; ?>
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>

    <?php if(Auth::user()->parent_id == 0): ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(__('Owners')); ?></li>
    <?php else: ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(__('Users')); ?></li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage User')): ?>
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
                                        <th><?php echo e(__('Name')); ?></th>
                                        <th><?php echo e(__('Email')); ?></th>
                                        <th><?php echo e(__('Lastlogin')); ?></th>
                                        <?php if(Auth::user()->isSuperAdmin()): ?>
                                            <th><?php echo e(__('Total Users')); ?></th>
                                            <th><?php echo e(__('Plan')); ?></th>
                                            <th><?php echo e(__('Plan Expiry Date')); ?></th>
                                        <?php else: ?>
                                            <th><?php echo e(__('User Role')); ?></th>
                                        <?php endif; ?>
                                        <th class="text-end"><?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e(ucfirst($user->name)); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php echo e($user->last_login_at); ?></td>
                                            <?php if(Auth::user()->isSuperAdmin()): ?>
                                                <td><?php echo e($user->users); ?></td>
                                                <td><?php echo e(!empty($user->getPlan) ? $user->getPlan->name : ''); ?></td>
                                                <td>
                                                    <?php if(!empty($user->plan_expire_date)): ?>
                                                        <?php echo e(Auth::user()->datetimeFormat($user->plan_expire_date)); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('Unlimited')); ?>

                                                    <?php endif; ?>
                                                </td>
                                            <?php else: ?>
                                                <td>
                                                    <?php $__currentLoopData = $user->roles()->pluck('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pername): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <span class="badge bg-success p-2 px-3 rounded"><?php echo e($pername); ?></span>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                            <?php endif; ?>
                                            <td class="Action text-end">
                                                <?php if(Auth::user()->isSuperAdmin()): ?>
                                                    <div class="action-btn btn-warning ms-2">
                                                        <a href="#" data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            data-title="<?php echo e(__('Upgrade Plan')); ?>"
                                                            title="<?php echo e(__('Upgrade Plan')); ?>" data-size="lg"
                                                            data-url="<?php echo e(route('plan.upgrade', $user->id)); ?>"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                            <i class="ti ti-trophy text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if($user->is_active == 1): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit User')): ?>
                                                        <div class="action-btn btn-secondary ms-2">
                                                            <a href="#" data-ajax-popup="true" data-bs-toggle="tooltip"
                                                                data-title="<?php echo e(__('Edit User')); ?>" title="<?php echo e(__('Edit')); ?>"
                                                                data-size="lg" data-url="<?php echo e(route('users.edit', $user->id)); ?>"
                                                                class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                <i class="ti ti-pencil text-white"></i>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete User')): ?>
                                                        <div
                                                            class="action-btn  <?php echo e($user->user_status == 1 ? 'btn-success' : 'btn-danger'); ?>  ms-2 ">
                                                            <a href="#" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                                data-text="Do you want to continue?" data-bs-toggle="tooltip"
                                                                data-confirm-yes="status-form-<?php echo e($user->id); ?>"
                                                                class="bs-pass-para mx-3 btn btn-sm d-inline-flex align-items-center">
                                                                <?php if($user->user_status == 1): ?>
                                                                    <i class="ti ti-user-check text-white"
                                                                        data-title="<?php echo e(__('Active')); ?>"></i>
                                                                <?php else: ?>
                                                                    <i class="ti ti-user-x text-white"
                                                                        data-title="<?php echo e(__('Deactive')); ?>"></i>
                                                                <?php endif; ?>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a href="#" class="">
                                                        <i class="ti ti-lock text-white"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if(Auth::user()->isSuperAdmin() || Auth::user()->isOwner()): ?>
                                                    <div class="action-btn btn-info ms-2">
                                                        <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                            data-url="<?php echo e(route('user.reset', \Crypt::encrypt($user->id))); ?>"
                                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            title="<?php echo e(__('Reset Password')); ?>" data-toggle="tooltip"
                                                            data-title="<?php echo e(__('Reset Password')); ?>"><i
                                                                class="ti ti-key text-white"></i> </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php echo Form::open(['method' => 'PATCH', 'route' => ['user.status', $user->id], 'id' => 'status-form-' . $user->id]); ?>

                                                <?php echo Form::close(); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>





<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).on('change', '#branch_id', function(e) {
            $.ajax({
                url: '<?php echo e(route('get.cash.registers')); ?>',
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
                    show_toastr('<?php echo e(__('Error')); ?>', data.message, 'error');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\wetransfer_scripts-to-install-onn-your-local-machine_2022-05-23_0954\posgo\main_file\resources\views/users/index.blade.php ENDPATH**/ ?>