@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', 'Galeri - Yayasan Butta Porea Indonesia')

@section('content')

    <section class="bg-brand-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide">{{ __('site.section_gallery_label') }}</span>
            <h1 class="text-4xl font-bold text-brand-900 mt-2">{{ __('site.section_gallery_title') }}</h1>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-8 reveal-stagger" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
            @forelse($galleries as $gallery)
                @php $cover = $gallery->photos->first(); @endphp
                <a href="{{ route('galleries.show', $gallery) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition border border-brand-100">
                    <div class="aspect-video bg-brand-200 overflow-hidden">
                        @if($cover)
                            <img src="{{ Storage::url($cover->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @endif
                    </div>
                    <div class="p-6">
                        @if($gallery->program)
                            <span class="text-xs font-semibold text-brand-600 uppercase">{{ $gallery->program->name }}</span>
                        @endif
                        <h3 class="font-bold text-brand-900 mt-1 mb-2 text-lg">{{ $gallery->title }}</h3>
                        <p class="text-sm text-brand-500">{{ __('site.photo_count', ['count' => $gallery->photos->count()]) }}</p>
                    </div>
                </a>
            @empty
                <p class="text-brand-500 col-span-3 text-center py-12">{{ __('site.page_gallery_empty') }}</p>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $galleries->links() }}
        </div>
    </section>

@endsection