<?php
    use Illuminate\Support\Facades\Storage;
?>



<?php $__env->startSection('title', 'Materi Edukasi - Yayasan Butta Porea Indonesia'); ?>

<?php $__env->startSection('content'); ?>

    <section class="bg-brand-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide"><?php echo e(__('site.page_materials_badge')); ?></span>
            <h1 class="text-4xl font-bold text-brand-900 mt-2"><?php echo e(__('site.page_materials_title')); ?></h1>
            <p class="text-brand-700 mt-4 max-w-2xl mx-auto">
                <?php echo e(__('site.page_materials_desc')); ?>

            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('materials.show', $material)); ?>" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition border border-brand-100">
                    <div class="aspect-video bg-earth-200 overflow-hidden flex items-center justify-center">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($material->thumbnail): ?>
                            <img src="<?php echo e(Storage::url($material->thumbnail)); ?>" alt="<?php echo e($material->title); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <?php else: ?>
                            <span class="text-5xl">📄</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="p-6">
                        <span class="inline-block text-xs font-semibold text-brand-600 uppercase mb-2">PDF</span>
                        <h3 class="font-bold text-brand-900 mb-2 text-lg"><?php echo e($material->title); ?></h3>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($material->description): ?>
                            <p class="text-sm text-brand-600 line-clamp-2"><?php echo e($material->description); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <span class="inline-block mt-4 text-brand-600 text-sm font-semibold"><?php echo e(__('site.read_more')); ?> &rarr;</span>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-brand-500 col-span-3 text-center py-12"><?php echo e(__('site.page_materials_empty')); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="mt-12">
            <?php echo e($materials->links()); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\yayasan-butta-porea\resources\views/materials/index.blade.php ENDPATH**/ ?>