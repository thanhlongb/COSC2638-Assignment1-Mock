<div class="form-group">
    <label for="<?php echo e($field); ?>" class="form-label mt-4"><?php echo e($fieldLabel); ?></label>
    <select class="form-select" id="<?php echo e($field); ?>" name="<?php echo e($field); ?>">
        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($option); ?>" <?php if($option == $default): ?> selected <?php endif; ?>>
                <?php echo e($option); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php /**PATH /home/thanhlongb/gcloud/gcp/resources/views/components/select.blade.php ENDPATH**/ ?>