<div class="form-group">
    <label for="<?php echo e($field); ?>" class="form-label mt-4"><?php echo e($fieldLabel); ?></label>
    <input type="<?php echo e($type ?? 'text'); ?>"
           class="form-control"
           id="<?php echo e($field); ?>"
           name="<?php echo e($field); ?>"
           aria-describedby="<?php echo e($fieldLabel); ?>"
           placeholder="Enter <?php echo e($fieldLabel); ?>"
           <?php if(isset($value)): ?> value="<?php echo e($value); ?>" <?php endif; ?>
           <?php if($disabled ?? false): ?> disabled <?php endif; ?>
           <?php if($readonly ?? false): ?> readonly <?php endif; ?>>
</div>
<?php /**PATH /home/thanhlongb/gcloud/gcp/resources/views/components/input.blade.php ENDPATH**/ ?>