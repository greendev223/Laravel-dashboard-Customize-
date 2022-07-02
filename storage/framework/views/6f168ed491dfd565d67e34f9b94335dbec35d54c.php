<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-2"><?php echo e(__('Product')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Product')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="pr-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" data-bs-placement="top"
            title="<?php echo e(__('Import')); ?>" data-ajax-popup="true" data-size="lg"
            data-title="<?php echo e(__('Import customer CSV file')); ?>" data-url="<?php echo e(route('product.file.import')); ?>"><i
                class="ti ti-file-import"></i></a>

        <a href="<?php echo e(route('product.export')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('Export')); ?>"><i class="ti ti-file-export"></i></a>

        <a href="<?php echo e(route('product.grid')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('Grid View')); ?>"><i class="ti ti-grid-dots"></i></a>

        <a href="<?php echo e(route('product.create')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('Create Product')); ?>"><i class="ti ti-plus"></i></a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Product')); ?></th>
                                    <th><?php echo e(__('Category')); ?></th>
                                    <th><?php echo e(__('Price')); ?></th>
                                    <th><?php echo e(__('Quantity')); ?></th>
                                    <th><?php echo e(__('Stock')); ?></th>
                                    <th><?php echo e(__('Created at')); ?></th>
                                    <th class="text-right"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                    <?php if(!empty($product->is_cover)): ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                                            class="rounded-circle" alt="images">
                                                    <?php else: ?>
                                                        <img alt="Image placeholder"
                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                            class="rounded-circle" alt="images">
                                                    <?php endif; ?>
                                                <div class="ms-3">
                                                    <a href="<?php echo e(route('product.show', $product->id)); ?>"
                                                        class="name h6 mb-0 text-sm">
                                                        <?php echo e($product->name); ?>

                                                    </a>
                                                    <span class="static-rating static-rating-sm d-block">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                            <?php
                                                                $icon = 'fa-star';
                                                                $color = '';
                                                                $newVal1 = $i - 0.5;
                                                                if ($product->product_rating() < $i && $product->product_rating() >= $newVal1) {
                                                                    $icon = 'fa-star-half-alt';
                                                                }
                                                                if ($product->product_rating() >= $newVal1) {
                                                                    $color = 'text-warning';
                                                                }
                                                            ?>
                                                            <i class="fas <?php echo e($icon . ' ' . $color); ?>"></i>
                                                        <?php endfor; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td> <?php echo e(!empty($product->product_category()) ? $product->product_category() : '-'); ?>

                                        </td>
                                        <td>
                                            <?php if($product->enable_product_variant == 'on'): ?>
                                                <?php echo e(__('In Variant')); ?>

                                            <?php else: ?>
                                                <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($product->enable_product_variant == 'on'): ?>
                                                <?php echo e(__('In Variant')); ?>

                                            <?php else: ?>
                                                <?php echo e($product->quantity); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($product->enable_product_variant == 'on'): ?>
                                                <span class="badge bg-success p-2 px-3 rounded">
                                                    <?php echo e(__('In Variant')); ?>

                                                </span>
                                            <?php else: ?>
                                                <?php if($product->quantity == 0): ?>
                                                    <span class="badge bg-danger p-2 px-3 rounded">
                                                        <?php echo e(__('Out of stock')); ?>

                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge bg-primary p-2 px-3 rounded">
                                                        <?php echo e(__('In stock')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo e(\App\Models\Utility::dateFormat($product->created_at)); ?>

                                        </td>
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn bg-info ms-2">
                                                    <a href="<?php echo e(route('product.show', $product->id)); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-toggle="tooltip" data-original-title="<?php echo e(__('View')); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('View')); ?>"><i
                                                            class="ti ti-eye text-white"></i></a>
                                                </div>

                                                <div class="action-btn btn-primary ms-2">
                                                    <a href="<?php echo e(route('product.edit', $product->id)); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Edit')); ?>"><i
                                                            class="ti ti-pencil text-white"></i></a>
                                                </div>
                                                <div class="action-btn bg-danger ms-2">
                                                    <a class="bs-pass-para align-items-center btn btn-sm d-inline-flex" href="#"
                                                        data-title="<?php echo e(__('Delete Lead')); ?>"
                                                        data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                        data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="delete-form-<?php echo e($product->id); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Delete ')); ?>">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $product->id], 'id' => 'delete-form-' . $product->id]); ?>

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
        $(document).on('click', '#billing_data', function() {
            $("[name='shipping_address']").val($("[name='billing_address']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My task\Germany\Laravel-dashboard-Customize-\resources\views/product/index.blade.php ENDPATH**/ ?>