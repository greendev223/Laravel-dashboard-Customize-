<?php $__env->startSection('page-title', __('Languages')); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Languages')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <a class="btn btn-sm btn-primary btn-icon m-1" data-ajax-popup="true"  
    data-bs-toggle="tooltip" title="<?php echo e(__('Create language')); ?>" data-bs-placement="top"
        data-title="<?php echo e(__('Create New Language')); ?>" data-url="<?php echo e(route('create.language')); ?>">
        <span class=""><i class="ti ti-plus text-white"></i></span>
    </a>

    <?php if($currantLang != (env('DEFAULT_LANG') ?? 'en')): ?>
        <a href="#" class="btn btn-sm btn-danger btn-icon-only rounded-circle shadow-sm"
            data-confirm="<?php echo e(__('Are You Sure?')); ?>|<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
            data-confirm-yes="document.getElementById('delete-lang-<?php echo e($currantLang); ?>').submit();">
            <i class="fas fa-trash"></i>
        </a>
        <?php echo Form::open(['method' => 'DELETE', 'route' => ['lang.destroy', $currantLang], 'id' => 'delete-lang-' . $currantLang]); ?>

        <?php echo Form::close(); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Languages')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row min-vh-78 mt-3">
        <div class="col">
            <div class="language-wrap">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 language-list-wrap">
                        <div class="card">
                            <div class="card-body">
                                <div class="language-list">
                                    <div class="nav flex-column nav-pills language-listt">
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('manage.language', [$lang])); ?>"
                                                class="nav-link text-sm font-weight-bold <?php echo e($currantLang == $lang ? 'active' : ''); ?>">
                                                <i class="d-lg-none d-block mr-1"></i>
                                                <span class="d-none d-lg-block"><?php echo e(Str::upper($lang)); ?></span>
                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 language-form-wrap">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div id="nav-pills-tabs-component" class="tab-pane tab-example-result fade show active"
                                        role="tabpanel" aria-labelledby="nav-pills-tabs-component-tab">
                                        <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="pills-user-tab-1" data-bs-toggle="pill"
                                                    href="#tabs-icons-text-1" data-bs-toggle="#pills-user-1"><i
                                                        class="ti ti-cloud-upload "></i><?php echo e(__('Labels')); ?></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="pills-user-tab-2" data-bs-toggle="pill"
                                                    href="#tabs-icons-text-2" data-bs-toggle="#pills-user-2"><i
                                                        class="ti ti-bell"> </i><?php echo e(__('Messages')); ?></a>
                                            </li>
                                        </ul>

                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade active show" id="tabs-icons-text-1"
                                                        role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                                        <form method="post"
                                                            action="<?php echo e(route('store.language.data', [$currantLang])); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="row">
                                                                <?php $__currentLoopData = $arrLabel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label"
                                                                                for="example3cols1Input"><?php echo e($label); ?>

                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                name="label[<?php echo e($label); ?>]"
                                                                                value="<?php echo e($value); ?>">
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-lg-12 text-right">
                                                                    <button class="btn btn-primary btn-sm rounded-pill"
                                                                        type="submit"><?php echo e(__('Save Changes')); ?></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                                        aria-labelledby="tabs-icons-text-2-tab">
                                                        <form method="post"
                                                            action="<?php echo e(route('store.language.data', [$currantLang])); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="row">
                                                                <?php $__currentLoopData = $arrMessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fileName => $fileValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="col-lg-12">
                                                                        <h6><?php echo e(ucfirst($fileName)); ?></h6>
                                                                    </div>
                                                                    <?php $__currentLoopData = $fileValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(is_array($value)): ?>
                                                                            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if(is_array($value2)): ?>
                                                                                    <?php $__currentLoopData = $value2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label3 => $value3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php if(is_array($value3)): ?>
                                                                                            <?php $__currentLoopData = $value3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label4 => $value4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php if(is_array($value4)): ?>
                                                                                                    <?php $__currentLoopData = $value4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label5 => $value5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                        <div
                                                                                                            class="col-md-6">
                                                                                                            <div
                                                                                                                class="form-group">
                                                                                                                <label><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?>.<?php echo e($label3); ?>.<?php echo e($label4); ?>.<?php echo e($label5); ?></label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>][<?php echo e($label3); ?>][<?php echo e($label4); ?>][<?php echo e($label5); ?>]"
                                                                                                                    value="<?php echo e($value5); ?>">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php else: ?>
                                                                                                    <div
                                                                                                        class="col-lg-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?>.<?php echo e($label3); ?>.<?php echo e($label4); ?></label>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>][<?php echo e($label3); ?>][<?php echo e($label4); ?>]"
                                                                                                                value="<?php echo e($value4); ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <?php endif; ?>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php else: ?>
                                                                                            <div class="col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?>.<?php echo e($label3); ?></label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>][<?php echo e($label3); ?>]"
                                                                                                        value="<?php echo e($value3); ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php else: ?>
                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label><?php echo e($fileName); ?>.<?php echo e($label); ?>.<?php echo e($label2); ?></label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>][<?php echo e($label2); ?>]"
                                                                                                value="<?php echo e($value2); ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php else: ?>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label><?php echo e($fileName); ?>.<?php echo e($label); ?></label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="message[<?php echo e($fileName); ?>][<?php echo e($label); ?>]"
                                                                                        value="<?php echo e($value); ?>">
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <div class="col-lg-12 text-right">
                                                                <button class="btn btn-primary btn-sm rounded-pill"
                                                                    type="submit"><?php echo e(__('Save Changes')); ?></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\wetransfer_scripts-to-install-onn-your-local-machine_2022-05-23_0954\posgo\main_file\resources\views/languages/index.blade.php ENDPATH**/ ?>