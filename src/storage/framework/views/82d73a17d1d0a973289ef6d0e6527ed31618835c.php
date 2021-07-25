<div class="page-header">
    <h1><?php echo e($title); ?>

        <?php if(isset($subtitle)): ?>
            <small class="text-muted"><?php echo e($subtitle); ?></small>
        <?php endif; ?>
        <?php if(isset($addButton, $addUrl)): ?>
            <a type="button" href="<?php echo e($addUrl); ?>" class="btn btn-primary" style="float: right;margin: 10px 0;">
                <i class="fa fa-plus"> <?php echo e($addButton); ?>

            </a>
        <?php endif; ?>
    </h1>
</div>
<?php /**PATH /home/thanhlongb/gcloud/asm1/src/resources/views/components/header1.blade.php ENDPATH**/ ?>