@extends('layouts.app')

@section('title', 'Kontak & Donasi - Yayasan Butta Porea Indonesia')

@section('content')

    <section class="bg-brand-50 py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide">{{ __('site.contact_us') }}</span>
            <h1 class="text-4xl font-bold text-brand-900 mt-2">{{ __('site.page_contact_title') }}</h1>
            <p class="text-brand-700 mt-4">
                {{ __('site.page_contact_desc') }}
            </p>
        </div>
    </section>

    <section class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        @if(session('success'))
            <div class="mb-8 p-4 bg-brand-100 border border-brand-300 text-brand-800 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6" x-data="{ type: '{{ old('type', 'kontak') }}' }">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-brand-800 mb-2">{{ __('site.form_type_label') }} <span class="text-red-500">*</span></label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="type" value="kontak" x-model="type" class="text-brand-600 focus:ring-brand-500">
                        <span class="text-brand-700">{{ __('site.form_type_kontak') }}</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="type" value="donasi" x-model="type" class="text-brand-600 focus:ring-brand-500">
                        <span class="text-brand-700">{{ __('site.form_type_donasi') }}</span>
                    </label>
                </div>
                @error('type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="name" class="block text-sm font-semibold text-brand-800 mb-2">{{ __('site.form_name_label') }} <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full px-4 py-3 border border-brand-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-transparent outline-none transition">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="email" class="block text-sm font-semibold text-brand-800 mb-2">{{ __('site.form_email_label') }} <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3 border border-brand-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-transparent outline-none transition">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-semibold text-brand-800 mb-2">{{ __('site.form_phone_label') }}</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-3 border border-brand-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-transparent outline-none transition">
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="subject" class="block text-sm font-semibold text-brand-800 mb-2">{{ __('site.form_subject_label') }}</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                    x-bind:placeholder="type === 'donasi' ? '{{ __('site.form_subject_placeholder_donasi') }}' : '{{ __('site.form_subject_placeholder_kontak') }}'"
                    class="w-full px-4 py-3 border border-brand-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-transparent outline-none transition">
                @error('subject')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="block text-sm font-semibold text-brand-800 mb-2">{{ __('site.form_message_label') }} <span class="text-red-500">*</span></label>
                <textarea name="message" id="message" rows="5"
                    x-bind:placeholder="type === 'donasi' ? '{{ __('site.form_message_placeholder_donasi') }}' : '{{ __('site.form_message_placeholder_kontak') }}'"
                    class="w-full px-4 py-3 border border-brand-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-transparent outline-none transition">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full py-3.5 bg-brand-600 text-white font-semibold rounded-full hover:bg-brand-700 transition">
                {{ __('site.form_submit') }}
            </button>

        </form>
    </section>

@endsection