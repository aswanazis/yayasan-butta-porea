<?php
    use Illuminate\Support\Facades\Storage;
?>



<?php $__env->startSection('title', $gallery->title . ' - Yayasan Butta Porea Indonesia'); ?>

<?php $__env->startSection('content'); ?>

    <section class="bg-brand-50 py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <a href="<?php echo e(route('galleries.index')); ?>" class="inline-flex items-center gap-1 text-sm font-semibold text-brand-600 hover:text-brand-800 transition mb-4">
                &larr; <?php echo e(__('site.back_to_gallery')); ?>

            </a>
            <span class="block text-brand-600 font-semibold text-sm uppercase tracking-wide">
                <?php echo e($gallery->program->name ?? __('site.section_gallery_label')); ?>

            </span>
            <h1 class="text-4xl font-bold text-brand-900 mt-2"><?php echo e($gallery->title); ?></h1>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gallery->description): ?>
                <p class="text-brand-700 mt-4 max-w-2xl mx-auto"><?php echo e($gallery->description); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="{ activePhoto: null }">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($gallery->photos->isEmpty()): ?>
            <p class="text-brand-500 text-center py-12"><?php echo e(__('site.page_gallery_photos_empty')); ?></p>
        <?php else: ?>
            <div
                x-data="{ show: false }" x-intersect.once="show = true"
                :class="show ? 'reveal-show' : ''"
                class="reveal-stagger grid grid-cols-2 md:grid-cols-3 gap-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $gallery->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button
                        type="button"
                        @click="activePhoto = { url: '<?php echo e(Storage::url($photo->image_path)); ?>', caption: <?php echo \Illuminate\Support\Js::from($photo->caption)->toHtml() ?> }"
                        class="group aspect-square bg-brand-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                        <img src="<?php echo e(Storage::url($photo->image_path)); ?>" alt="<?php echo e($photo->caption ?? $gallery->title); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div
            x-show="activePhoto"
            x-cloak
            @click.self="activePhoto = null"
            @keydown.escape.window="activePhoto = null"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[100] bg-black/80 flex items-center justify-center p-4">
            <div class="max-w-4xl w-full" @click.stop>
                <img :src="activePhoto?.url" class="w-full max-h-[80vh] object-contain rounded-lg" :alt="activePhoto?.caption">
                <p x-show="activePhoto?.caption" x-text="activePhoto?.caption" class="text-white text-center mt-4 text-sm"></p>
                <button @click="activePhoto = null" class="mt-4 mx-auto block text-white/80 hover:text-white text-sm">
                    &times; <?php echo e(__('site.close')); ?>

                </button>
            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\yayasan-butta-porea\resources\views/galleries/show.blade.php ENDPATH**/ ?>