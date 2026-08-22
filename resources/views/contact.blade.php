@extends('layouts.app')

@section('title', 'Hubungi Kami - Yayasan Butta Porea Indonesia')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,400..700&family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="bg-surface text-on-surface font-body-md text-body-md">
    <main class="pb-stack-lg">

        {{-- HERO --}}
        <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-lg text-center">
            <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-primary mb-stack-sm">{{ __('site.contact2_title') }}</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">{{ __('site.contact2_desc') }}</p>
        </section>

        @if(session('success'))
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mb-6">
                <div class="p-4 bg-primary-container/10 border border-primary-container text-primary rounded-xl">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        {{-- BENTO LAYOUT --}}
        <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter reveal-stagger" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">

                {{-- FORM --}}
                <div class="lg:col-span-7 bg-surface-container-lowest p-stack-md md:p-margin-desktop rounded-xl shadow-sm border border-surface-variant">
                    <h2 class="font-headline-md text-headline-md text-primary mb-stack-md">{{ __('site.contact2_form_title') }}</h2>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-stack-md" x-data="{ type: '{{ old('type', 'kontak') }}' }">
                        @csrf

                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-2">{{ __('site.form_type_label') }} <span class="text-error">*</span></label>
                            <div class="flex gap-2">
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="type" value="kontak" x-model="type" class="peer sr-only">
                                    <span class="block text-center px-4 py-2 rounded-full border font-label-md text-label-md transition-colors"
                                        :class="type === 'kontak' ? 'bg-primary text-on-primary border-primary' : 'bg-surface text-on-surface-variant border-outline-variant'">
                                        {{ __('site.form_type_kontak') }}
                                    </span>
                                </label>
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="type" value="donasi" x-model="type" class="peer sr-only">
                                    <span class="block text-center px-4 py-2 rounded-full border font-label-md text-label-md transition-colors"
                                        :class="type === 'donasi' ? 'bg-primary text-on-primary border-primary' : 'bg-surface text-on-surface-variant border-outline-variant'">
                                        {{ __('site.form_type_donasi') }}
                                    </span>
                                </label>
                            </div>
                            @error('type')
                                <p class="text-error text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                            <div>
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-2" for="name">{{ __('site.form_name_label') }}</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-on-surface font-body-md">
                                @error('name')
                                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-2" for="email">{{ __('site.form_email_label') }}</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-on-surface font-body-md">
                                @error('email')
                                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                            <div>
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-2" for="phone">{{ __('site.form_phone_label') }}</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                    class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-on-surface font-body-md">
                                @error('phone')
                                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-2" for="subject">{{ __('site.form_subject_label') }}</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                    x-bind:placeholder="type === 'donasi' ? '{{ __('site.form_subject_placeholder_donasi') }}' : '{{ __('site.form_subject_placeholder_kontak') }}'"
                                    class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-on-surface font-body-md">
                                @error('subject')
                                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-2" for="message">{{ __('site.form_message_label') }}</label>
                            <textarea name="message" id="message" rows="5"
                                x-bind:placeholder="type === 'donasi' ? '{{ __('site.form_message_placeholder_donasi') }}' : '{{ __('site.form_message_placeholder_kontak') }}'"
                                class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-on-surface font-body-md resize-none">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-error text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="bg-primary text-on-primary px-8 py-3 rounded-full font-button text-button hover:opacity-90 transition-opacity w-full md:w-auto shadow-sm hover:shadow-md">
                            {{ __('site.btn_send_now') }}
                        </button>
                    </form>
                </div>

                {{-- INFO & MAP --}}
                <div class="lg:col-span-5 flex flex-col gap-gutter">
                    <div class="bg-primary text-on-primary p-stack-md rounded-xl shadow-sm">
                        <h3 class="font-headline-sm text-headline-sm mb-stack-md">{{ __('site.contact_info_title') }}</h3>
                        <div class="space-y-stack-sm font-body-md text-body-md text-primary-fixed">
                            <div class="flex items-start gap-4">
                                <span class="material-symbols-outlined mt-1">location_on</span>
                                <div>
                                    <strong class="block text-on-primary font-semibold mb-1">{{ __('site.contact_office_title') }}</strong>
                                    {{ __('site.footer_address') }}
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="material-symbols-outlined">call</span>
                                <div>
                                    <strong class="block text-on-primary font-semibold mb-1">{{ __('site.contact_phone_title') }}</strong>
                                    <a href="tel:+6281234567890" class="hover:underline">+62 812-3456-7890</a>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="material-symbols-outlined">mail</span>
                                <div>
                                    <strong class="block text-on-primary font-semibold mb-1">{{ __('site.contact_email_title') }}</strong>
                                    <a href="mailto:info@buttaporea.id" class="hover:underline">info@buttaporea.id</a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-stack-md pt-stack-sm border-t border-primary-container">
                            <strong class="block text-on-primary font-semibold mb-3">{{ __('site.footer_social_title') }}</strong>
                            <div class="flex gap-3">
                                <a href="#" target="_blank" rel="noopener" aria-label="Instagram" class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center hover:bg-surface-tint transition-colors">
                                    <svg class="w-4 h-4 text-on-primary" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM12 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                                </a>
                                <a href="#" target="_blank" rel="noopener" aria-label="Facebook" class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center hover:bg-surface-tint transition-colors">
                                    <svg class="w-4 h-4 text-on-primary" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.891h-2.33v6.987C18.343 21.128 22 16.991 22 12z"/></svg>
                                </a>
                                <a href="#" target="_blank" rel="noopener" aria-label="YouTube" class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center hover:bg-surface-tint transition-colors">
                                    <svg class="w-4 h-4 text-on-primary" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </a>
                                <a href="#" target="_blank" rel="noopener" aria-label="WhatsApp" class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center hover:bg-surface-tint transition-colors">
                                    <svg class="w-4 h-4 text-on-primary" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.523 0-10 4.477-10 10 0 1.766.462 3.49 1.34 5.008L2 22l5.13-1.345A9.96 9.96 0 0 0 12.04 22c5.523 0 10-4.477 10-10s-4.477-10-10-10zm5.83 14.29c-.246.694-1.43 1.324-1.976 1.372-.505.045-1.02.19-3.42-.816-2.897-1.207-4.72-4.11-4.86-4.302-.14-.192-1.155-1.638-1.155-3.126 0-1.488.752-2.212 1.017-2.51.264-.297.577-.372.77-.372.192 0 .385.002.552.01.177.008.415-.067.65.497.246.594.836 2.049.909 2.198.072.15.12.325.024.517-.096.192-.144.312-.288.48-.144.168-.303.375-.432.504-.144.144-.294.3-.126.588.168.288.744 1.23 1.598 1.992 1.098.978 2.024 1.28 2.313 1.424.288.144.456.12.624-.072.168-.192.72-.84.912-1.128.192-.288.384-.24.648-.144.264.096 1.68.792 1.968.936.288.144.48.216.552.336.072.12.072.696-.174 1.39z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="h-64 rounded-xl overflow-hidden shadow-sm border border-surface-variant">
                        <iframe
                            src="https://www.google.com/maps?q={{ urlencode(__('site.footer_address')) }}&output=embed"
                            class="w-full h-full border-0"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

            </div>
        </section>

    </main>
</div>
@endsection