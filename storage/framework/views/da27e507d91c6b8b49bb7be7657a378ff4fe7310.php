<?php echo e(Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT'])); ?>

<div class="modal-body">

<div class="form-group">
    <?php echo e(Form::label('name', __('Category Name'), ['class' => 'col-form-label'])); ?>

    <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter new Category Name')])); ?>

</div>
</div>

 <div class="modal-footer">
    <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <input class="btn btn-primary" type="submit" value="<?php echo e(__('Edit')); ?>">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH D:\My task\Germany\Laravel-dashboard-Customize-\resources\views/categories/edit.blade.php ENDPATH**/ ?>