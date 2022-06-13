<?php echo e(Form::open(['url' => 'vendors'])); ?>

<div class="modal-body">
<div class="row">
    <div class="form-group col-md-6">
        <?php echo e(Form::label('name', __('Name'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter new vendor name'), 'required'=>'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('Product Categories', __('Product Categories'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::email('Product Categories', null, ['class' => 'form-control', 'required'=>'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('SKU', __('SKU'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('SKU', null, ['class' => 'form-control', 'maxlength' => '15', 'placeholder' => __('Enter SKU')])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('Product Tax', __('Product Tax'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('Product Tax', null, ['class' => 'form-control'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('Price', __('Price'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('Price', null, ['class' => 'form-control', 'maxlength' => '15'])); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('Last Price', __('Last Price'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('Last Price', null, ['class' => 'form-control', 'maxlength' => '15'])); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('Stock Quantity', __('Stock Quantity'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('Stock Quantity', null, ['class' => 'form-control', 'maxlength' => '15', 'placeholder' => __('Enter Stock Quantity')])); ?>

    </div>

    <div class="form-group col-md-6">
        <label for="attachment" class="col-form-label"><?php echo e(__('Attachment')); ?></label>
        <input type="file" name="attachment" id="attachment" class="form-control">
    </div>
    <div class="form-group col-md-6">
    
    <label for="downloadable_prodcut"
        class="col-form-label font-bold-700"><?php echo e(__('Downloadable Product')); ?></label>
        <input type="file" name="downloadable_prodcut" id="downloadable_prodcut" class="custom-input-file form-control">
    </div>
    
    <div class="form-group col-md-12">
        <h6><?php echo e(_('Custom Field')); ?></h6>
    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('custom_field_1', __('Custom Field'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('custom_field_1', null, ['class' => 'form-control','placeholder' => __('Enter Custom Field'),'required' => 'required'])); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('custom_value_1', __('Custom Value'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('custom_value_1', null, ['class' => 'form-control','placeholder' => __('Enter Custom Value'),'required' => 'required'])); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('custom_field_1', __('Custom Field'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('custom_field_1', null, ['class' => 'form-control','placeholder' => __('Enter Custom Field'),'required' => 'required'])); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('custom_value_1', __('Custom Value'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('custom_value_1', null, ['class' => 'form-control','placeholder' => __('Enter Custom Value'),'required' => 'required'])); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('custom_field_1', __('Custom Field'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('custom_field_1', null, ['class' => 'form-control','placeholder' => __('Enter Custom Field'),'required' => 'required'])); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('custom_value_1', __('Custom Value'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('custom_value_1', null, ['class' => 'form-control','placeholder' => __('Enter Custom Value'),'required' => 'required'])); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('custom_field_1', __('Custom Field'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('custom_field_1', null, ['class' => 'form-control','placeholder' => __('Enter Custom Field'),'required' => 'required'])); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('custom_value_1', __('Custom Value'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('custom_value_1', null, ['class' => 'form-control','placeholder' => __('Enter Custom Value'),'required' => 'required'])); ?>

    </div>

    <div class="form-group col-md-6 py-4">
        <div class="form-check form-switch">
            <input type="checkbox" name="product_display" class="form-check-input" id="product_display">
                <?php echo e(Form::label('product_display', __('Product Display'), ['class' => 'form-check-label'])); ?>

        </div>
        <?php $__errorArgs = ['product_display'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-product_display" role="alert">
            <strong class="text-danger"><?php echo e($message); ?></strong>
        </span>
         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group col-md-6 py-4">
        <div class="form-check form-switch">
            <input type="checkbox" class="form-check-input" name="enable_product_variant"
                id="enable_product_variant" >

            <label class="form-check-label  " for="enable_product_variant"><?php echo e(__('Display Variants')); ?></label>
        </div>
    </div>

    <div class="col-12 border-0">
        <div class="row">
            <div class="col-6">
                <h5 class="mb-0"><?php echo e(__('Product Image')); ?></h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?php echo e(Form::label('sub_images', __('Upload Product Images'), ['class' => 'col-form-label'])); ?>

                </div>
                <div class="dropzone dropzone-multiple" data-toggle="dropzone1"
                    data-dropzone-url="http://" data-dropzone-multiple>
                    <div class="fallback">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="dropzone-1" name="file" multiple>
                            <label class="custom-file-label" for="customFileUpload"><?php echo e(__('Choose file')); ?></label>
                        </div>
                    </div>
                        <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar">
                                            <img class="rounded" src="" alt="Image placeholder" data-dz-thumbnail>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-sm mb-1" data-dz-name>...</h6>
                                        <p class="small text-muted mb-0" data-dz-size>
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="dropdown-item" data-dz-remove>
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="is_cover_image" class="col-form-label"><?php echo e(__('Upload Cover Image')); ?></label>
                    <input type="file" name="is_cover_image" id="is_cover_image" class="form-control custom-input-file">
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="form-group">
        <?php echo e(Form::label('sub_images', __('Product Description'), ['class' => 'col-form-label'])); ?>

    </div>
    <div class="form-group">
    <?php echo e(Form::textarea('description', null, ['class' => 'form-control summernote-simple','rows' => 2,'placeholder' => __('Product Description')])); ?>

    </div> -->

    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('sub_images', __('Product Description'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::textarea('description', null, ['class' => 'form-control summernote-simple','rows' => 2,'placeholder' => __('Product Description')])); ?>

        </div>
    </div>



    
</div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <input class="btn btn-primary" type="submit" value="<?php echo e(__('Create')); ?>">
</div>

<?php echo e(Form::close()); ?>

<?php /**PATH D:\My task\Germany\Laravel-dashboard-Customize-\resources\views/vendors/create.blade.php ENDPATH**/ ?>