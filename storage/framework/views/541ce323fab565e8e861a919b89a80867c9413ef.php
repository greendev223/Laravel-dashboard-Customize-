<!-- 
    <?php echo e(Form::open(array('route' => array('vendors.import'),'method'=>'post', 'enctype' => "multipart/form-data"))); ?>

    <div class="modal-body">
    <div class="row">
        <div class="col-md-12 mb-2 d-flex align-items-center justify-content-between">
            <?php echo e(Form::label('file',__('Download sample vendor CSV file'),['class'=>'col-form-label w-100'])); ?>

            <a href="<?php echo e(asset(Storage::url('uploads/sample')).'/sample-vendor.csv'); ?>" class="btn btn-xs btn-white btn-icon-only w-50">
                <i class="fa fa-download"></i> <?php echo e(__('Download')); ?>

            </a>
        </div>
        <div class="col-md-12">
            <?php echo e(Form::label('file',__('Select CSV File'),['class'=>'col-form-label'])); ?>

            <div class="choose-file form-group">
                <label for="file" class="col-form-label w-100">
                    <div><?php echo e(__('Choose file here')); ?></div>
                    <input type="file" class="form-control h-auto" name="file" id="file" data-filename="upload_file" required>
                </label>
                <p class="upload_file"></p>
            </div>
        </div>
    </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <input class="btn btn-primary" type="submit" value="<?php echo e(__('Upload')); ?>">
    </div>
    </div>
    <?php echo e(Form::close()); ?> -->




<div class="modal-body">
    <?php echo e(Form::open(array('route' => array('vendors.import'),'method'=>'post', 'enctype' => "multipart/form-data"))); ?>

    <div class="row">

        <div class="col-md-12 mb-6">
            <?php echo e(Form::label('file',__('Download sample vendor CSV file'),['class'=>'col-form-label'])); ?>

                <a href="<?php echo e(asset(Storage::url('uploads/sample')).'/sample-vendor.csv'); ?>" class="btn btn-sm btn-primary btn-icon">
                    <i class="fa fa-download"></i>
                </a>
        </div>
        <div class="col-md-12">
            <?php echo e(Form::label('file',__('Select CSV File'),['class'=>'form-control-label'])); ?>

            <div class="choose-file form-group">
                <label for="file" class="col-form-label">
                    <div><?php echo e(__('Choose file here')); ?></div>
                    <input type="file" class="form-control" name="file" id="file" data-filename="upload_file" required>
                </label>
                <p class="upload_file"></p>
            </div>
        </div>
    </div>            
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <button type="submit" class="btn  btn-primary"><?php echo e(__('Update')); ?></button>
</div>

<?php echo e(Form::close()); ?><?php /**PATH D:\My task\Germany\Laravel-dashboard-Customize-\resources\views/vendors/import.blade.php ENDPATH**/ ?>