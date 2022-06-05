

<?php $__env->startSection('page-title', __('Tax List') ); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Tax List')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Tax')): ?>
        <a href="#" data-ajax-popup="true" data-size="md" data-bs-toggle="tooltip"
            data-title="<?php echo e(__('Add New Tax')); ?>"title="<?php echo e(__('Add New Tax')); ?>"  data-url="<?php echo e(route('taxes.create')); ?>"
            class="btn btn-sm btn-primary btn-icon">
            <span class=""><i class="ti ti-plus text-white"></i></span>
        </a>        
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
         <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(__('Tax')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Tax')): ?>
       <div class="row">
            <div class="col-12">
                <div class="card table-card">
                     <div class="card-header card-body table-border-style">
                        <h5></h5>
                       <div class="table-responsive"> 
                            <table class="table dataTable" id="pc-dt-simple">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Percentage')); ?></th>
                                    <th><?php echo e(__('Is Default')); ?>    </th>
                                    <th class="text-right" width="114px"><?php echo e(__('Action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($tax->name); ?></td>
                                        <td><?php echo e((float)$tax->percentage . '%'); ?></td>
                                        <td><?php echo e($tax->is_default == 0 ? __('No') : __('Yes')); ?></td>
                                        <td class="text-right">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Tax')): ?>
                                            <div class="action-btn btn-info ms-2">
                                                <a href="#" data-ajax-popup="true" data-bs-toggle="tooltip" data-title="<?php echo e(__('Edit Tax')); ?>" title="<?php echo e(__('Edit Tax')); ?>"
                                                    data-url="<?php echo e(route('taxes.edit', $tax->id)); ?>"
                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                    <i class="ti ti-pencil text-white"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Tax')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <a href="#" class="bs-pass-para mx-3 btn btn-sm d-inline-flex align-items-center" data-toggle="sweet-alert"
                                                    data-confirm="<?php echo e(__('Are You Sure?')); ?>" data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-bs-toggle="tooltip"
                                                    data-confirm-yes="delete-form-<?php echo e($tax->id); ?>"  title="<?php echo e(__('Delete')); ?>">
                                                   <i class="ti ti-trash text-white"></i>
                                                </a>

                                            </div>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['taxes.destroy', $tax->id],'id' => 'delete-form-'.$tax->id]); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My task\Germany\Laravel-dashboard-Customize-\resources\views/taxes/index.blade.php ENDPATH**/ ?>