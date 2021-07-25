<?php $__env->startSection('title', 'Babies dataset'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('components.header1', ['title' => 'Employees', 'subtitle' => 'dataset'.($showFrequency ? ' (including name frequency)' : '')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <?php echo $__env->make('components.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-4">
            <?php echo $__env->make('components.search', ['search' => ($search ?: null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php if(count($records)): ?>
        <div class="row">
            <div class="col-lg-12">
                <?php echo $__env->make('components.table', ['fields' => $fields, 'records' => $records], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    <?php else: ?>
        <p>Found 0 employee. Please try adding some using the button below.</p>
    <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo e(route("getCreatePage")); ?>" class="btn btn-success float-end">Add employee</a>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thanhlongb/gcloud/gcp/resources/views/home.blade.php ENDPATH**/ ?>