<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Yayasan Butta Porea Indonesia'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Membangun kemandirian Warga Binaan Pemasyarakatan melalui program Integrated Urban Farming.'); ?>">

     <link rel="icon" type="image/png" href="<?php echo e(asset('images/Bplogo.png')); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('images/Bplogo.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('images/Bplogo.png')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
     <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-earth-50 text-brand-900 antialiased">

    <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>
</html><?php /**PATH C:\laragon\www\yayasan-butta-porea\resources\views/layouts/app.blade.php ENDPATH**/ ?>