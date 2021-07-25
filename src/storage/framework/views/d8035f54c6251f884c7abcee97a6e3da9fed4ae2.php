<ul class="pagination" style="float: right">
    <li class="page-item <?php if($page == 1): ?> disabled <?php endif; ?>">
        <a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
    </li>
    <?php for($i = 1; $i <= $pageCount; $i++): ?>
        <?php if($i <= $page + ($offset ?? 1) and $i >= $page - ($offset ?? 1)): ?>
            <li class="page-item <?php if($i == $page): ?> active <?php endif; ?>">
                <a class="page-link" href="#"><?php echo e($i); ?></a>
            </li>
        <?php else: ?>
            <?php if($i == $page+($offset ?? 1)+1 or $i == $page-($offset ?? 1)-1): ?>
                <li class="page-item">
                    <a class="page-link" href="#">...</a>
                </li>
            <?php elseif($i == 1 or $i == $pageCount): ?>
                <li class="page-item">
                    <a class="page-link" href="#"><?php echo e($i); ?></a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
    <?php endfor; ?>
    <li class="page-item <?php if($page == $pageCount): ?> disabled <?php endif; ?>">
      <a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
    </li>
</ul>
<?php /**PATH /home/thanhlongb/gcloud/gcp/resources/views/components/pagination.blade.php ENDPATH**/ ?>