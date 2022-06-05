

<?php $__env->startSection('page-title', __('Notification List')); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Notification List')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Notification')): ?>
        <a class="btn btn-sm btn-primary btn-icon " data-size="lg" data-bs-toggle="tooltip" data-ajax-popup="true"
            data-title="<?php echo e(__('Add New Notification')); ?>" data-url="<?php echo e(route('notifications.create')); ?>"
            title="<?php echo e(__('Add Notification')); ?>">
            <span class=""><i class="ti ti-plus text-white"></i></span>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Notification')); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Notification')): ?>
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header card-body table-border-style">
                        <h5></h5>
                        <div class="table-responsive">
                            <table class="table dataTable" id="pc-dt-simple" role="grid">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('Notifications')); ?></th>
                                        <th><?php echo e(__('Date/Time Added')); ?></th>
                                        <th><?php echo e(__('From')); ?></th>
                                        <th><?php echo e(__('To')); ?></th>
                                        <th><?php echo e(__('Status')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td class="td-white-space">
                                                <?php echo $notification->description; ?>

                                            </td>
                                            <td><?php echo e(Auth::user()->datetimeFormat($notification->created_at)); ?></td>
                                            <td><?php echo e(Auth::user()->dateFormat($notification->from)); ?></td>
                                            <td><?php echo e(Auth::user()->dateFormat($notification->to)); ?></td>
                                            <td>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Notification')): ?>
                                                    <div class="nav-item dropdown display-notification"
                                                        data-li-id="<?php echo e($notification->id); ?>">
                                                        <span data-toggle="dropdown"
                                                            class="badge badge-bg rounded notification-label py-2 px-3 notification-<?php echo e($notification->status == 0 ? 'open' : 'close'); ?> bg-<?php echo e($notification->status == 0 ? 'success' : 'danger'); ?>  ">
                                                            <?php echo e($notification->status == 0 ? __('Open') : __('Close')); ?> </span> 
                                                        <div
                                                            class="dropdown-menu dropdown-list notification-status dropdown-menu-right">
                                                            <div class="dropdown-list-content notification-actions"
                                                                data-id="<?php echo e($notification->id); ?>"
                                                                data-url="<?php echo e(route('update.notification.status', $notification->id)); ?>">
                                                                <a href="#" data-status="0" data-class="notification-open"
                                                                    class="dropdown-item notification-action <?php echo e($notification->status == 0 ? 'selected' : ''); ?>"><?php echo e(__('Open')); ?>

                                                                </a>
                                                                <a href="#" data-status="1" data-class="notification-close"
                                                                    class="dropdown-item notification-action <?php echo e($notification->status == 1 ? 'selected' : ''); ?>"><?php echo e(__('Close')); ?>

                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Notification')): ?>
                                                    <div class="action-btn btn-info ms-2">
                                                        <a href="#" data-ajax-popup="true"
                                                            data-title="<?php echo e(__('Edit Notification')); ?>"
                                                            title="<?php echo e(__('Edit')); ?>" data-size="lg" data-bs-toggle="tooltip"
                                                            data-url="<?php echo e(route('notifications.edit', $notification->id)); ?>"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Notification')): ?>
                                                    <div class="action-btn bg-danger ms-2">
                                                        <a href="#"
                                                            class="bs-pass-para mx-3 btn btn-sm d-inline-flex align-items-center"
                                                            data-toggle="sweet-alert" title="<?php echo e(__('Delete')); ?>"
                                                            data-bs-toggle="tooltip" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                            data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                            data-confirm-yes="delete-form-<?php echo e($notification->id); ?>">
                                                            <i class="ti ti-trash text-white"></i>
                                                        </a>
                                                    </div>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['notifications.destroy', $notification->id], 'id' => 'delete-form-' . $notification->id]); ?>

                                                    <?php echo Form::close(); ?>

                                                <?php endif; ?>
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
    <script src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>
    <script>
        $(document).on('change', '#from, #to', function(e) {
            if ((Date.parse($('#from').val()) > Date.parse($('#to').val()))) {
                $('#to').val('');
                alert("End date should be greater than Start date");
            }
        });

        $(document).on('click', '.notification-action', function(e) {
            e.stopPropagation();
            e.preventDefault();

            var ele = $(this);

            var id = ele.parent().attr('data-id');
            var url = ele.parent().attr('data-url');
            var status = ele.attr('data-status');

            $.ajax({
                url: url,
                method: 'PATCH',
                data: {
                    status: status
                },
                success: function(response) {

                    if (response) {

                        $('[data-li-id="' + id + '"] .notification-action').removeClass('selected');

                        if (ele.hasClass('selected')) {

                            ele.removeClass('selected');

                        } else {
                            ele.addClass('selected');
                        }

                        var notification = $('[data-li-id="' + id + '"] .notification-actions').find(
                            '.selected').text().trim();

                        var notification_class = $('[data-li-id="' + id + '"] .notification-actions')
                            .find('.selected').attr('data-class');
                        $('[data-li-id="' + id + '"] .notification-label').removeClass(
                                'notification-open notification-close').addClass(notification_class)
                            .text(notification);
                    }
                },
                error: function(data) {
                    data = data.responseJSON;
                    show_toastr('<?php echo e(__('Error')); ?>', data.error, 'error');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My task\Germany\Laravel-dashboard-Customize-\resources\views/notifications/index.blade.php ENDPATH**/ ?>