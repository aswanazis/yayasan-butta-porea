<?php
    use Illuminate\Support\Facades\Storage;
?>



<?php $__env->startSection('title', $material->title . ' - Yayasan Butta Porea Indonesia'); ?>

<?php $__env->startSection('content'); ?>

    <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <a href="<?php echo e(route('materials.index')); ?>" class="inline-flex items-center gap-1 text-sm font-semibold text-brand-600 hover:text-brand-800 transition mb-8">
            &larr; <?php echo e(__('site.back_to_materials')); ?>

        </a>

        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-brand-100">
            <div class="aspect-video bg-earth-200 flex items-center justify-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($material->thumbnail): ?>
                    <img src="<?php echo e(Storage::url($material->thumbnail)); ?>" alt="<?php echo e($material->title); ?>" class="w-full h-full object-cover">
                <?php else: ?>
                    <span class="text-7xl">📄</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="p-8">
                <span class="inline-block text-xs font-semibold text-brand-600 uppercase mb-2">PDF</span>
                <h1 class="text-3xl font-bold text-brand-900 mb-4"><?php echo e($material->title); ?></h1>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($material->description): ?>
                    <p class="text-brand-700 leading-relaxed mb-8"><?php echo e($material->description); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo e(Storage::url($material->file_path)); ?>" target="_blank" rel="noopener"
                        class="px-6 py-3 border border-brand-300 text-brand-700 font-semibold rounded-full hover:bg-brand-100 transition-all duration-300">
                        <?php echo e(__('site.btn_view_pdf')); ?>

                    </a>
                    <a href="<?php echo e(Storage::url($material->file_path)); ?>" download
                        class="px-6 py-3 bg-brand-600 text-white font-semibold rounded-full hover:bg-brand-700 hover:shadow-lg hover:shadow-brand-600/30 transition-all duration-300">
                        <?php echo e(__('site.btn_download')); ?>

                    </a>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\yayasan-butta-porea\resources\views/materials/show.blade.php ENDPATH**/ ?>