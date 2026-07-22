@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', 'Materi Edukasi - Yayasan Butta Porea Indonesia')

@section('content')

    <section class="bg-brand-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide">{{ __('site.page_materials_badge') }}</span>
            <h1 class="text-4xl font-bold text-brand-900 mt-2">{{ __('site.page_materials_title') }}</h1>
            <p class="text-brand-700 mt-4 max-w-2xl mx-auto">
                {{ __('site.page_materials_desc') }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($materials as $material)
                <a href="{{ route('materials.show', $material) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition border border-brand-100">
                    <div class="aspect-video bg-earth-200 overflow-hidden flex items-center justify-center">
                        @if($material->thumbnail)
                            <img src="{{ Storage::url($material->thumbnail) }}" alt="{{ $material->title }}" class="w-full h-full object-cover {{ $material->thumbnailPositionClass() }} group-hover:scale-105 transition duration-300">
                        @else
                            <span class="text-5xl">📄</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <span class="inline-block text-xs font-semibold text-brand-600 uppercase mb-2">PDF</span>
                        <h3 class="font-bold text-brand-900 mb-2 text-lg">{{ $material->title }}</h3>
                        @if($material->description)
                            <p class="text-sm text-brand-600 line-clamp-2">{{ $material->description }}</p>
                        @endif
                        <span class="inline-block mt-4 text-brand-600 text-sm font-semibold">{{ __('site.read_more') }} &rarr;</span>
                    </div>
                </a>
            @empty
                <p class="text-brand-500 col-span-3 text-center py-12">{{ __('site.page_materials_empty') }}</p>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $materials->links() }}
        </div>
    </section>

@endsection