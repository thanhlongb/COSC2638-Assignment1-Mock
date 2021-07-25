<?php $__env->startSection('title', 'Delete confirm'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(isset($employee)): ?>
        <div class="row">
            <div class="col-lg-12">
                <?php echo $__env->make('components.header1', ['title' => $employee->getFullName(), 'subtitle' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <form method="POST" action="">
            <div class="row">
                <div class="col-lg-12">
                    <p>Are you sure you want to delete this employee's information?</p>
                    <a href="<?php echo e(route("getHomePage")); ?>" class="btn btn-outline-danger">Cancel</a>
                    <div class="form-group float-end">
                        <button type="submit" class="btn btn-danger">Yes, delete it!</button>
                    </div>
                </div>
            </div>
        </form>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thanhlongb/gcloud/asm1/src/resources/views/delete.blade.php ENDPATH**/ ?>