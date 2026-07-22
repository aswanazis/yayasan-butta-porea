<?php
    use Illuminate\Support\Facades\Storage;
?>



<?php $__env->startSection('title', 'Berita - Yayasan Butta Porea Indonesia'); ?>

<?php $__env->startSection('content'); ?>

    <section class="bg-brand-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide"><?php echo e(__('site.page_articles_badge')); ?></span>
            <h1 class="text-4xl font-bold text-brand-900 mt-2"><?php echo e(__('site.page_articles_title')); ?></h1>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('articles.show', $article)); ?>" class="group">
                    <div class="aspect-video bg-earth-200 rounded-xl overflow-hidden mb-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->thumbnail): ?>
                            <img src="<?php echo e(Storage::url($article->thumbnail)); ?>" alt="<?php echo e($article->title); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <span class="text-xs font-semibold text-brand-600 uppercase"><?php echo e($article->category->name ?? ''); ?></span>
                    <h3 class="font-bold text-brand-900 mt-1 text-lg group-hover:text-brand-600 transition"><?php echo e($article->title); ?></h3>
                    <p class="text-sm text-brand-600 mt-2 line-clamp-2"><?php echo e($article->excerpt); ?></p>
                    <p class="text-xs text-brand-400 mt-3"><?php echo e($article->published_at?->translatedFormat('d F Y')); ?></p>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-brand-500 col-span-3 text-center py-12"><?php echo e(__('site.page_articles_empty')); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="mt-12">
            <?php echo e($articles->links()); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\yayasan-butta-porea\resources\views/articles/index.blade.php ENDPATH**/ ?>