<table class="table table-hover">
    <thead>
      <tr>
        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th scope="col"><?php echo e($field); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr <?php if($loop->even): ?> class="table-active" <?php endif; ?>>
            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->first): ?>
                    <th scope="row"><?php echo e($record[$field]); ?></th>
                <?php else: ?>
                    <td><?php echo e($record[$field]); ?></td>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td><a class="btn btn-info btn-sm" alt="Show employee details" href="<?php echo e(route('getUpdatePage', ['id' => $record['id']])); ?>"><i class="fa fa-eye"></i></a></td></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
<?php /**PATH /home/thanhlongb/gcloud/gcp/resources/views/components/table.blade.php ENDPATH**/ ?>