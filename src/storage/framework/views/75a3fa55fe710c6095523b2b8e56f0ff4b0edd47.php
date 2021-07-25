<div class="accordion mb-4" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Apply filter
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
        <div class="accordion-body">
            <form action="<?php echo e(route("getHomePage")); ?>" method="GET">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $__env->make('components.select', ['field' => 'gender', 'fieldLabel' => 'Gender', 'value' => ($gender ?? null), 'options' => ['any', 'male', 'female', 'other'], 'default' => ($gender ?? 'any')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <?php echo $__env->make('components.input', ['field' => 'ageLessThan', 'fieldLabel' => 'Age Less Than', 'type' => 'number', 'value' => ($ageLessThan ?? null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $__env->make('components.input', ['field' => 'ageGreaterThan', 'fieldLabel' => 'Age Greater Than', 'type' => 'number', 'value' => ($ageGreaterThan ?? null)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-success my-2 float-end" type="submit">Apply</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
<?php /**PATH /home/thanhlongb/gcloud/gcp/resources/views/components/subheader.blade.php ENDPATH**/ ?>