<?php $__env->startSection('title', 'Add employee'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('components.header1', ['title' => 'Employee', 'subtitle' => 'add'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <form method="POST" action="#">
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('components.input', ['field' => 'id', 'fieldLabel' => 'ID', 'value' => ($employee->id ?? null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $__env->make('components.input', ['field' => 'firstName', 'fieldLabel' => 'First name', 'value' => ($employee->firstName ?? null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $__env->make('components.input', ['field' => 'lastName', 'fieldLabel' => 'Last name', 'value' => ($employee->lastName ?? null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $__env->make('components.input', ['field' => 'age', 'fieldLabel' => 'Age', 'type' => 'number', 'value' => ($employee->age ?? null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $__env->make('components.select', ['field' => 'gender', 'fieldLabel' => 'Gender', 'value' => ($employee->gender ?? null), 'options' => ['male', 'female', 'other'], 'default' => ($employee->gender ?? 'male')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php echo $__env->make('components.input', ['field' => 'address', 'fieldLabel' => 'Address', 'value' => ($employee->address ?? null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('components.input', ['field' => 'phone', 'fieldLabel' => 'Phone number', 'value' => ($employee->phone ?? null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-12">
                <hr class="my-4">
            </div>
            <div class="col-md-12">
                <a href="<?php echo e(route("getHomePage")); ?>" class="btn btn-outline-danger">Cancel</a>
                <div class="form-group float-end">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thanhlongb/gcloud/gcp/resources/views/create.blade.php ENDPATH**/ ?>