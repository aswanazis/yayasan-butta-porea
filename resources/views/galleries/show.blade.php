@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', $gallery->title . ' - Yayasan Butta Porea Indonesia')

@section('content')

    <section class="bg-brand-50 py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <a href="{{ route('galleries.index') }}" class="inline-flex items-center gap-1 text-sm font-semibold text-brand-600 hover:text-brand-800 transition mb-4">
                &larr; {{ __('site.back_to_gallery') }}
            </a>
            <span class="block text-brand-600 font-semibold text-sm uppercase tracking-wide">
                {{ $gallery->program->name ?? __('site.section_gallery_label') }}
            </span>
            <h1 class="text-4xl font-bold text-brand-900 mt-2">{{ $gallery->title }}</h1>
            @if($gallery->description)
                <p class="text-brand-700 mt-4 max-w-2xl mx-auto">{{ $gallery->description }}</p>
            @endif
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="{ activePhoto: null }">

        @if($gallery->photos->isEmpty())
            <p class="text-brand-500 text-center py-12">{{ __('site.page_gallery_photos_empty') }}</p>
        @else
            <div
                x-data="{ show: false }" x-intersect.once="show = true"
                :class="show ? 'reveal-show' : ''"
                class="reveal-stagger grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($gallery->photos as $photo)
                    <button
                        type="button"
                        @click="activePhoto = { url: '{{ Storage::url($photo->image_path) }}', caption: @js($photo->caption) }"
                        class="group aspect-square bg-brand-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                        <img src="{{ Storage::url($photo->image_path) }}" alt="{{ $photo->caption ?? $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </button>
                @endforeach
            </div>
        @endif

        {{-- LIGHTBOX --}}
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
                    &times; {{ __('site.close') }}
                </button>
            </div>
        </div>

    </section>

@endsection