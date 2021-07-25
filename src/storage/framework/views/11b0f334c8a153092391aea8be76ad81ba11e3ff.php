<?php $__env->startSection('title', 'Employee details'); ?>

<?php $__env->startSection('content'); ?>
<?php if($employee): ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('components.header1', ['title' => $employee->getFullName(), 'subtitle' => 'details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <form method="POST" action="">
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('components.input', ['field' => 'id', 'fieldLabel' => 'ID', 'readonly' => true, 'value' => ($employee->id ?? null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <?php echo $__env->make('components.input', ['field' => 'age', 'fieldLabel' => 'Age', 'value' => ($employee->age ?? null), 'type' => 'number'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $__env->make('components.select', ['field' => 'gender', 'fieldLabel' => 'Gender', 'options' => ['male', 'female', 'other'], 'default' => ($employee->gender ?? 'male')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php echo $__env->make('components.input', ['field' => 'address', 'fieldLabel' => 'Address', 'value' => ($employee->address ?? null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('components.input', ['field' => 'phone', 'fieldLabel' => 'Phone number', 'value' => ($employee->phone ?? null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr class="my-4">
            </div>
            <div class="col-md-12">
                <div class="form-group float-start">
                    <a href="<?php echo e(route('getDeletePage', ['id' => $employee->id])); ?>" class="btn btn-outline-danger">Delete</a>
                </div>
                <div class="form-group float-end">
                    <button type="submit" class="btn btn-success">Save details</button>
                </div>
            </div>
        </div>
    </form>
<?php else: ?>
    <p>This employee doesn't exists.</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thanhlongb/gcloud/asm1/src/resources/views/update.blade.php ENDPATH**/ ?>