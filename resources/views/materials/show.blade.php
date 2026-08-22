@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', $material->title . ' - Yayasan Butta Porea Indonesia')

@section('content')

    <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <a href="{{ route('materials.index') }}" class="inline-flex items-center gap-1 text-sm font-semibold text-brand-600 hover:text-brand-800 transition mb-8">
            &larr; {{ __('site.back_to_materials') }}
        </a>

        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-brand-100 reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
            <div class="aspect-video bg-earth-200 flex items-center justify-center">
                @if($material->thumbnail)
                    <img src="{{ Storage::url($material->thumbnail) }}" alt="{{ $material->title }}" class="w-full h-full object-cover {{ $material->thumbnailPositionClass() }}">
                @else
                    <span class="text-7xl">📄</span>
                @endif
            </div>

            <div class="p-8">
                <span class="inline-block text-xs font-semibold text-brand-600 uppercase mb-2">PDF</span>
                <h1 class="text-3xl font-bold text-brand-900 mb-4">{{ $material->title }}</h1>

                @if($material->description)
                    <p class="text-brand-700 leading-relaxed mb-8">{{ $material->description }}</p>
                @endif

                <div class="flex flex-wrap gap-4">
                    <a href="{{ Storage::url($material->file_path) }}" target="_blank" rel="noopener"
                        class="px-6 py-3 border border-brand-300 text-brand-700 font-semibold rounded-full hover:bg-brand-100 transition-all duration-300">
                        {{ __('site.btn_view_pdf') }}
                    </a>
                    <a href="{{ route('materials.download', $material) }}"
                    class="px-6 py-3 bg-brand-600 text-white font-semibold rounded-full hover:bg-brand-700 hover:shadow-lg hover:shadow-brand-600/30 transition-all duration-300">
                        {{ __('site.btn_download') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection