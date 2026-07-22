<?php
    use Illuminate\Support\Facades\Storage;
?>



<?php $__env->startSection('title', $article->title . ' - Yayasan Butta Porea Indonesia'); ?>
<?php $__env->startSection('meta_description', $article->excerpt); ?>

<?php $__env->startSection('content'); ?>

    <section class="bg-brand-50 py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="<?php echo e(route('articles.index')); ?>" class="text-brand-600 text-sm font-semibold hover:text-brand-800 transition">
                &larr; Kembali ke Berita
            </a>

            <span class="inline-block mt-6 px-3 py-1 bg-brand-100 text-brand-700 text-xs font-semibold rounded-full">
                <?php echo e($article->category->name ?? ''); ?>

            </span>

            <h1 class="text-3xl md:text-4xl font-bold text-brand-900 mt-4 leading-tight">
                <?php echo e($article->title); ?>

            </h1>

            <div class="flex items-center gap-3 mt-6 text-sm text-brand-600">
                <span>Oleh <?php echo e($article->author->name ?? 'Admin'); ?></span>
                <span>&bull;</span>
                <span><?php echo e($article->published_at?->translatedFormat('d F Y')); ?></span>
            </div>
        </div>
    </section>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->thumbnail): ?>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8">
            <div class="aspect-video rounded-2xl overflow-hidden shadow-lg">
                <img src="<?php echo e(Storage::url($article->thumbnail)); ?>" alt="<?php echo e($article->title); ?>" class="w-full h-full object-cover">
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <article class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16 prose prose-lg prose-headings:text-brand-900 prose-p:text-brand-700 max-w-none">
        <?php echo $article->content; ?>

    </article>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\yayasan-butta-porea\resources\views/articles/show.blade.php ENDPATH**/ ?>