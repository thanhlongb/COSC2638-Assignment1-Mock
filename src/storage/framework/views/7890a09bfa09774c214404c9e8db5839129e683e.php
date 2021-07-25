<?php $__env->startSection('title', 'Babies dataset'); ?>

<?php $__env->startSection('content'); ?>
<div class="bs-docs-section clearfix">
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('components.header1', ['title' => 'Empoyees', 'subtitle' => 'dataset'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-8">
            <?php echo $__env->make('components.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('components.table', ['fields' => $fields, 'records' => $records], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thanhlongb/gcloud/gcp/resources/views/baby.blade.php ENDPATH**/ ?>