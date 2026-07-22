<?php
    use Illuminate\Support\Facades\Storage;
?>



<?php $__env->startSection('title', $program->name . ' - Yayasan Butta Porea Indonesia'); ?>
<?php $__env->startSection('meta_description', $program->excerpt); ?>

<?php $__env->startSection('content'); ?>

    <section class="bg-brand-50 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="<?php echo e(route('programs.index')); ?>" class="text-brand-600 text-sm font-semibold hover:text-brand-800 transition">
                &larr; Kembali ke Program
            </a>
            <h1 class="text-4xl font-bold text-brand-900 mt-4"><?php echo e($program->name); ?></h1>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($program->excerpt): ?>
                <p class="text-brand-700 mt-4 text-lg"><?php echo e($program->excerpt); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($program->thumbnail): ?>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8">
            <div class="aspect-video rounded-2xl overflow-hidden shadow-lg">
                <img src="<?php echo e(Storage::url($program->thumbnail)); ?>" alt="<?php echo e($program->name); ?>" class="w-full h-full object-cover">
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 prose prose-lg prose-headings:text-brand-900 prose-p:text-brand-700 max-w-none">
        <?php echo $program->description; ?>

    </article>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($program->galleries->isNotEmpty()): ?>
        <section class="bg-earth-100 py-16">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-brand-900 mb-8">Dokumentasi Kegiatan</h2>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $program->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-10">
                        <h3 class="font-semibold text-brand-800 mb-4"><?php echo e($gallery->title); ?></h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $gallery->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="aspect-square rounded-xl overflow-hidden bg-brand-200">
                                    <img src="<?php echo e(Storage::url($photo->image_path)); ?>" alt="<?php echo e($photo->caption); ?>" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\yayasan-butta-porea\resources\views/programs/show.blade.php ENDPATH**/ ?>