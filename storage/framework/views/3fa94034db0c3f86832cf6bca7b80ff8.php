

<?php $__env->startSection('title', 'Kontak & Donasi - Yayasan Butta Porea Indonesia'); ?>

<?php $__env->startSection('content'); ?>

    <section class="bg-brand-50 py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide"><?php echo e(__('site.contact_us')); ?></span>
            <h1 class="text-4xl font-bold text-brand-900 mt-2"><?php echo e(__('site.page_contact_title')); ?></h1>
            <p class="text-brand-700 mt-4">
                <?php echo e(__('site.page_contact_desc')); ?>

            </p>
        </div>
    </section>

    <section class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="mb-8 p-4 bg-brand-100 border border-brand-300 text-brand-800 rounded-xl">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <form action="<?php echo e(route('contact.store')); ?>" method="POST" class="space-y-6" x-data="{ type: '<?php echo e(old('type', 'kontak')); ?>' }">
            <?php echo csrf_field(); ?>

            <div>
                <label class="block text-sm font-semibold text-brand-800 mb-2"><?php echo e(__('site.form_type_label')); ?> <span class="text-red-500">*</span></label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="type" value="kontak" x-model="type" class="text-brand-600 focus:ring-brand-500">
                        <span class="text-brand-700"><?php echo e(__('site.form_type_kontak')); ?></span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="type" value="donasi" x-model="type" class="text-brand-600 focus:ring-brand-500">
                        <span class="text-brand-700"><?php echo e(__('site.form_type_donasi')); ?></span>
                    </label>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div>
                <label for="name" class="block text-sm font-semibold text-brand-800 mb-2"><?php echo e(__('site.form_name_label')); ?> <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>"
                    class="w-full px-4 py-3 border border-brand-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-transparent outline-none transition">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="email" class="block text-sm font-semibold text-brand-800 mb-2"><?php echo e(__('site.form_email_label')); ?> <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>"
                        class="w-full px-4 py-3 border border-brand-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-transparent outline-none transition">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-semibold text-brand-800 mb-2"><?php echo e(__('site.form_phone_label')); ?></label>
                    <input type="text" name="phone" id="phone" value="<?php echo e(old('phone')); ?>"
                        class="w-full px-4 py-3 border border-brand-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-transparent outline-none transition">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <div>
                <label for="subject" class="block text-sm font-semibold text-brand-800 mb-2"><?php echo e(__('site.form_subject_label')); ?></label>
                <input type="text" name="subject" id="subject" value="<?php echo e(old('subject')); ?>"
                    x-bind:placeholder="type === 'donasi' ? '<?php echo e(__('site.form_subject_placeholder_donasi')); ?>' : '<?php echo e(__('site.form_subject_placeholder_kontak')); ?>'"
                    class="w-full px-4 py-3 border border-brand-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-transparent outline-none transition">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div>
                <label for="message" class="block text-sm font-semibold text-brand-800 mb-2"><?php echo e(__('site.form_message_label')); ?> <span class="text-red-500">*</span></label>
                <textarea name="message" id="message" rows="5"
                    x-bind:placeholder="type === 'donasi' ? '<?php echo e(__('site.form_message_placeholder_donasi')); ?>' : '<?php echo e(__('site.form_message_placeholder_kontak')); ?>'"
                    class="w-full px-4 py-3 border border-brand-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-transparent outline-none transition"><?php echo e(old('message')); ?></textarea>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <button type="submit" class="w-full py-3.5 bg-brand-600 text-white font-semibold rounded-full hover:bg-brand-700 transition">
                <?php echo e(__('site.form_submit')); ?>

            </button>

        </form>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\yayasan-butta-porea\resources\views/contact.blade.php ENDPATH**/ ?>