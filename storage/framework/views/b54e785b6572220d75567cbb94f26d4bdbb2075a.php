<?php $__env->startSection('page-title', __('Expenses')); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Expenses List')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Expenses')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
   
    <a href="<?php echo e(route('Expense.export')); ?>" class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip"
        title="<?php echo e(__('Export')); ?>">
        <span class="text-white"><i class="ti ti-file-export"></i></span>
    </a>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Expense')): ?>
        <a class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" data-ajax-popup="true"
            data-title="<?php echo e(__('Add New Expense')); ?>" data-url="<?php echo e(route('expenses.create')); ?>"
            title="<?php echo e(__('Add Expense')); ?>">
            <span class="text-white"><i class="ti ti-plus"></i></span>
        </a>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Expense')): ?>
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header card-body table-border-style">
                        <h5></h5>
                        <div class="table-responsive" id="expense-table">
                            <table class="table expense_table" id="pc-dt-simple" role="grid">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('Branch')); ?></th>
                                        <th><?php echo e(__('Expense Date')); ?></th>
                                        <th><?php echo e(__('Expense Category')); ?></th>
                                        <th><?php echo e(__('Amount')); ?></th>
                                        <th class="text-right" width="117px"><?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e($expense->branchname); ?></td>
                                            <td><?php echo e(Auth::user()->dateFormat($expense->date)); ?></td>
                                            <td><?php echo e($expense->ecname); ?></td>
                                            <td><?php echo e(Auth::user()->priceFormat($expense->amount)); ?></td>
                                            <td class="text-right">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Expense')): ?>
                                                <div class="action-btn btn-info ms-2">
                                                    <a href="#" data-ajax-popup="true" data-title="<?php echo e(__('Edit Expense')); ?>"
                                                      data-bs-toggle="tooltip"
                                                        data-url="<?php echo e(route('expenses.edit', $expense->id)); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center" title="<?php echo e(__('Edit')); ?>">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Expense')): ?>
                                                <div class="action-btn bg-danger ms-2">
                                                    <a href="#" class="bs-pass-para mx-3 btn btn-sm d-inline-flex align-items-center" data-toggle="sweet-alert"
                                                        title="<?php echo e(__('Delete')); ?>"    data-bs-toggle="tooltip"
                                                        data-confirm="<?php echo e(__('Are You Sure?')); ?>" data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="delete-form-<?php echo e($expense->id); ?>">
                                                        <i class="ti ti-trash text-white"></i>
                                                    </a>
                                                </div>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['expenses.destroy', $expense->id], 'id' => 'delete-form-' . $expense->id]); ?>

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
    <script>
        $(document).ready(function() {
            $('#expense-table .expense_table').DataTable().destroy();
            $('#expense-table .expense_table').DataTable({
                "language": dataTabelLang,
                dom: 'Bfrtip',
                buttons: [{
                        "extend": 'copy',
                        "text": 'Copy',
                        "className": 'btn btn-warning btn-sm badge badge-soft-warning badge-lg border-0',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        "extend": 'csv',
                        "text": 'CSV',
                        "className": 'btn btn-info btn-sm badge badge-soft-info badge-lg border-0',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        "extend": 'excel',
                        "text": 'Excel',
                        "className": 'btn btn-success btn-sm badge badge-soft-success badge-lg border-0',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        "extend": 'pdf',
                        "text": 'PDF',
                        "className": 'btn btn-danger btn-sm badge badge-soft-danger badge-lg border-0',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        "extend": 'print',
                        "text": 'Print',
                        "className": 'btn btn-primary btn-sm badge badge-soft-primary badge-lg border-0',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    }
                ]
            });
        });
    </script>
    <script src="<?php echo e(asset('js/datatables/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables/buttons.print.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\wetransfer_scripts-to-install-onn-your-local-machine_2022-05-23_0954\posgo\main_file\resources\views/expenses/index.blade.php ENDPATH**/ ?>