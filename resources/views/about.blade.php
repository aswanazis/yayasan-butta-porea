@extends('layouts.app')

@section('title', 'Tentang Kami - Yayasan Butta Porea Indonesia')

@section('content')

    <section class="bg-brand-50 py-16">
        <div
            x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)"
            class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span
                x-show="show" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 -translate-y-3" x-transition:enter-end="opacity-100 translate-y-0"
                class="text-brand-600 font-semibold text-sm uppercase tracking-wide">{{ __('site.page_about_badge') }}</span>
            <h1
                x-show="show" x-transition:enter="transition ease-out duration-700 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="text-4xl font-bold text-brand-900 mt-2">{{ __('site.page_about_title') }}</h1>
            <p
                x-show="show" x-transition:enter="transition ease-out duration-700 delay-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="text-brand-700 mt-4 text-lg leading-relaxed">
                {{ __('site.page_about_desc') }}
            </p>
        </div>
    </section>

    {{-- STAT STRIP --}}
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 relative z-10">
        <div
            x-data="{ show: false }" x-intersect.once="show = true"
            :class="show ? 'reveal-show' : ''"
            class="reveal-stagger grid grid-cols-3 divide-x divide-brand-200 bg-white rounded-2xl shadow-lg shadow-brand-900/5 py-6">
            <div class="text-center px-4">
                <p class="text-2xl md:text-3xl font-extrabold text-brand-700">2023</p>
                <p class="text-xs text-brand-600 mt-1">{{ __('site.stat_year_label') }}</p>
            </div>
            <div class="text-center px-4">
                <p class="text-2xl md:text-3xl font-extrabold text-brand-700">🌱</p>
                <p class="text-xs text-brand-600 mt-1">{{ __('site.stat_farming_label') }}</p>
            </div>
            <div class="text-center px-4">
                <p class="text-2xl md:text-3xl font-extrabold text-brand-700">WBP</p>
                <p class="text-xs text-brand-600 mt-1">{{ __('site.stat_focus_label') }}</p>
            </div>
        </div>
    </section>

    {{-- VISI --}}
    <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
        <div
            x-data="{ show: false }" x-intersect.once="show = true"
            :class="show ? 'reveal-show' : ''"
            class="reveal text-center">
            <div class="w-14 h-14 bg-brand-100 rounded-xl flex items-center justify-center text-2xl mb-4 mx-auto">🎯</div>
            <h2 class="text-sm font-semibold text-brand-600 uppercase tracking-wide mb-2">{{ __('site.vision_title') }}</h2>
            <p class="text-brand-900 text-xl md:text-2xl font-bold leading-snug">
                {{ __('site.vision_text') }}
            </p>
        </div>
    </section>

    {{-- MISI --}}
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div
            x-data="{ show: false }" x-intersect.once="show = true"
            :class="show ? 'reveal-show' : ''"
            class="reveal">
            <div class="flex items-center gap-3 justify-center mb-8">
                <div class="w-10 h-10 bg-brand-100 rounded-lg flex items-center justify-center text-xl">🌿</div>
                <h2 class="text-2xl font-bold text-brand-900">{{ __('site.mission_title') }}</h2>
            </div>

            <ul class="grid md:grid-cols-2 gap-x-8 gap-y-5 text-brand-700">
                @foreach(__('site.mission_items') as $index => $mission)
                    <li class="flex gap-3 group bg-white rounded-xl p-4 shadow-sm border border-brand-100">
                        <span class="text-brand-600 font-bold shrink-0">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="leading-relaxed">{{ $mission }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- DIVISI --}}
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div
            x-data="{ show: false }" x-intersect.once="show = true"
            :class="show ? 'reveal-show' : ''"
            class="reveal text-center mb-10">
            <h2 class="text-2xl font-bold text-brand-900">{{ __('site.divisions_title') }}</h2>
        </div>

        @php
            $divisionIcons = ['🌾', '🐄', '🌳', '⚖️', '📢', '🐟'];
        @endphp

        <div
            x-data="{ show: false }" x-intersect.once="show = true"
            :class="show ? 'reveal-show' : ''"
            class="reveal-stagger grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
            @foreach(__('site.divisions_items') as $index => $division)
                <div class="bg-white rounded-xl p-6 text-center shadow-sm border border-brand-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="w-12 h-12 bg-brand-100 rounded-full flex items-center justify-center text-2xl mx-auto mb-3">
                        {{ $divisionIcons[$index] ?? '🌱' }}
                    </div>
                    <p class="text-brand-900 font-semibold text-sm md:text-base">{{ $division }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- MENGAPA URBAN FARMING --}}
    <section class="bg-earth-100 py-16">
        <div
            x-data="{ show: false }" x-intersect.once="show = true"
            :class="show ? 'reveal-show' : ''"
            class="reveal max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold text-brand-900 mb-4">{{ __('site.why_urban_farming_title') }}</h2>
            <p class="text-brand-700 leading-relaxed max-w-2xl mx-auto">
                {{ __('site.why_urban_farming_text') }}
            </p>
        </div>
    </section>

    {{-- CTA --}}
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
        <div
            x-data="{ show: false }" x-intersect.once="show = true"
            :class="show ? 'reveal-show' : ''"
            class="reveal">
            <h2 class="text-2xl font-bold text-brand-900 mb-4">{{ __('site.cta_collab_title') }}</h2>
            <p class="text-brand-700 mb-8">
                {{ __('site.cta_collab_text') }}
            </p>
            <a href="{{ route('contact.index') }}" class="inline-block px-8 py-3 bg-brand-600 text-white font-semibold rounded-full hover:bg-brand-700 hover:shadow-lg hover:shadow-brand-600/30 hover:-translate-y-0.5 transition-all duration-300">
                {{ __('site.contact_us') }}
            </a>
        </div>
    </section>

@endsection