<?php
    use Illuminate\Support\Facades\Storage;
?>



<?php $__env->startSection('title', 'Galeri - Yayasan Butta Porea Indonesia'); ?>

<?php $__env->startSection('content'); ?>

    <section class="bg-brand-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide"><?php echo e(__('site.section_gallery_label')); ?></span>
            <h1 class="text-4xl font-bold text-brand-900 mt-2"><?php echo e(__('site.section_gallery_title')); ?></h1>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php $cover = $gallery->photos->first(); ?>
                <a href="<?php echo e(route('galleries.show', $gallery)); ?>" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition border border-brand-100">
                    <div class="aspect-video bg-brand-200 overflow-hidden">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cover): ?>
                            <img src="<?php echo e(Storage::url($cover->image_path)); ?>" alt="<?php echo e($gallery->title); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="p-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gallery->program): ?>
                            <span class="text-xs font-semibold text-brand-600 uppercase"><?php echo e($gallery->program->name); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <h3 class="font-bold text-brand-900 mt-1 mb-2 text-lg"><?php echo e($gallery->title); ?></h3>
                        <p class="text-sm text-brand-500"><?php echo e(__('site.photo_count', ['count' => $gallery->photos->count()])); ?></p>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-brand-500 col-span-3 text-center py-12"><?php echo e(__('site.page_gallery_empty')); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="mt-12">
            <?php echo e($galleries->links()); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\yayasan-butta-porea\resources\views/galleries/index.blade.php ENDPATH**/ ?>