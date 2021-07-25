<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.css">
    <link rel="stylesheet" href="https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    </head>
  <body>
  <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
        <a href="<?php echo e(route("getHomePage")); ?>" class="navbar-brand">Assignment 1</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route("getHomePage")); ?>">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route("getHomePageWithFrequency")); ?>">Employees (with frequency)</a>
                </li>
            </ul>
        </div>
      </div>
</div>

    <div class="container">
    <div class="bs-docs-section clearfix">

    <?php if(isset($alert)): ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('components.alert', ['type' => $alert, 'content' => $alertMessage], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php endif; ?>
<?php /**PATH /home/thanhlongb/gcloud/gcp/resources/views/layouts/header.blade.php ENDPATH**/ ?>