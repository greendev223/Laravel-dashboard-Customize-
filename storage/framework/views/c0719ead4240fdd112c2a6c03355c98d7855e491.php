<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Custom Page')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Custom Page')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Custom Page')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="pr-2">
        <a href="#" data-size="lg" data-url="<?php echo e(route('custom-page.create')); ?>" data-ajax-popup="true"
            data-title="<?php echo e(__('Create New Page')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('Create New Page')); ?>"><i class="ti ti-plus"></i></a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Page Slug')); ?></th>
                                    <th><?php echo e(__('Header')); ?></th>
                                    <th class="text-right"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pageoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageoption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-name="<?php echo e($pageoption->name); ?>">
                                        <td><?php echo e($pageoption->name); ?></td>
                                        <?php if($store && $store->enable_domain == 'on'): ?>
                                            <td>
                                                <?php echo e($store->domains . '/page/' . $pageoption->slug); ?>

                                            </td>
                                        <?php elseif($sub_store && $sub_store->enable_subdomain == 'on'): ?>
                                            <td>
                                                <?php echo e($sub_store->subdomain . '/page/' . $pageoption->slug); ?></td>
                                        <?php else: ?>
                                            <td>
                                                <?php echo e(env('APP_URL') . '/page/' . $pageoption->slug); ?>

                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <?php echo e(ucfirst($pageoption->enable_page_header == 'on' ? $pageoption->enable_page_header : 'Off')); ?>

                                        </td>
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn btn-primary ms-2">
                                                    <a href="#" data-size="lg"
                                                        data-url="<?php echo e(route('custom-page.edit', $pageoption->id)); ?>"
                                                        data-ajax-popup="true" data-title="<?php echo e(__('Edit Custom Page')); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Edit')); ?>"><i
                                                            class="ti ti-pencil text-white"></i></a>
                                                </div>

                                                <div class="action-btn bg-danger ms-2">
                                                    <a class="bs-pass-para align-items-center btn btn-sm d-inline-flex"
                                                        href="#" data-title="<?php echo e(__('Delete Lead')); ?>"
                                                        data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                        data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="delete-form-<?php echo e($pageoption->id); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Delete')); ?>">

                                                        <i class="ti ti-trash"></i>

                                                    </a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['custom-page.destroy', $pageoption->id], 'id' => 'delete-form-' . $pageoption->id]); ?>

                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </span>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '.search-user', function() {
                var value = $(this).val();
                $('.employee_tableese tbody>tr').each(function(index) {
                    var name = $(this).attr('data-name').toLowerCase();
                    if (name.includes(value.toLowerCase())) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My task\Germany\Laravel-dashboard-Customize-\resources\views/pageoption/index.blade.php ENDPATH**/ ?>