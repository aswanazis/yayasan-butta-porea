@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', 'Beranda - Yayasan Butta Porea Indonesia')

@section('content')

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-brand-50 to-earth-50">

        <div class="absolute -top-20 -right-20 w-72 h-72 bg-brand-200/40 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-earth-200/40 rounded-full blur-3xl animate-float-delayed"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 grid md:grid-cols-2 gap-12 items-center">
            <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">
                <span
                    x-show="show" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 -translate-y-3" x-transition:enter-end="opacity-100 translate-y-0"
                    class="inline-block px-4 py-1.5 bg-brand-100 text-brand-700 text-xs font-semibold rounded-full mb-6">
                    🌱 {{ __('site.hero_badge') }}
                </span>
                <h1
                    x-show="show" x-transition:enter="transition ease-out duration-700 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                    class="text-4xl md:text-5xl font-extrabold text-brand-900 leading-tight mb-6">
                    {{ __('site.hero_title_1') }} <span class="text-brand-600">{{ __('site.hero_title_2') }}</span>
                </h1>
                <p
                    x-show="show" x-transition:enter="transition ease-out duration-700 delay-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                    class="text-brand-700 text-lg mb-8 leading-relaxed">
                    {{ __('site.hero_desc') }}
                </p>
                <div
                    x-show="show" x-transition:enter="transition ease-out duration-700 delay-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                    class="flex gap-4">
                    <a href="{{ route('programs.index') }}" class="px-6 py-3 bg-brand-600 text-white font-semibold rounded-full hover:bg-brand-700 hover:shadow-lg hover:shadow-brand-600/30 hover:-translate-y-0.5 transition-all duration-300">
                        {{ __('site.btn_view_programs') }}
                    </a>
                    <a href="{{ route('about') }}" class="px-6 py-3 border border-brand-300 text-brand-700 font-semibold rounded-full hover:bg-brand-100 hover:-translate-y-0.5 transition-all duration-300">
                        {{ __('site.btn_about') }}
                    </a>
                </div>
            </div>
            <div
                x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)"
                x-show="show" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                class="relative">
                <div class="aspect-square bg-brand-200 rounded-3xl overflow-hidden shadow-2xl shadow-brand-900/10">
                    @if($programs->first()?->thumbnail)
                        <img src="{{ Storage::url($programs->first()->thumbnail) }}" alt="Urban Farming" class="w-full h-full object-cover">
                    @endif
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-xl p-4 flex items-center gap-3">
                    <div class="w-10 h-10 bg-brand-100 rounded-full flex items-center justify-center text-brand-600 text-lg">🌿</div>
                    <div>
                        <p class="text-sm font-bold text-brand-900">{{ $programs->count() }}+ Program</p>
                        <p class="text-xs text-brand-500">Aktif Berjalan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TENTANG YAYASAN --}}
    <section id="tentang" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div
            x-data="{ show: false }"
            x-intersect.once="show = true"
            :class="show ? 'reveal-show' : ''"
            class="reveal-stagger grid md:grid-cols-2 gap-12 items-center">
            <div class="relative aspect-video rounded-2xl overflow-hidden shadow-xl shadow-brand-900/10">
                <iframe
                    class="w-full h-full"
                    src="https://www.youtube.com/embed/wu7nms7a2rk"
                    title="Yayasan Butta Porea Indonesia"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
                </iframe>
            </div>
            <div>
                <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide">{{ __('site.section_about_label') }}</span>
                <h2 class="text-3xl font-bold text-brand-900 mt-2 mb-4">
                    {{ __('site.section_about_title') }}
                </h2>
                <p class="text-brand-700 leading-relaxed mb-4">
                    {{ __('site.about_text_1') }}
                </p>
                <p class="text-brand-700 leading-relaxed">
                    {{ __('site.about_text_2') }}
                </p>
            </div>
        </div>
    </section>

    {{-- PROGRAM UNGGULAN --}}
    <section class="bg-brand-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                x-data="{ show: false }" x-intersect.once="show = true"
                :class="show ? 'reveal-show' : ''"
                class="reveal text-center max-w-2xl mx-auto mb-12">
                <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide">{{ __('site.section_programs_label') }}</span>
                <h2 class="text-3xl font-bold text-brand-900 mt-2">{{ __('site.section_programs_title') }}</h2>
            </div>

            <div
                x-data="{ show: false }" x-intersect.once="show = true"
                :class="show ? 'reveal-show' : ''"
                class="grid md:grid-cols-3 gap-8 reveal-stagger">
                @forelse($programs as $program)
                    <a href="{{ route('programs.show', $program) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="aspect-video bg-brand-200 overflow-hidden">
                            @if($program->thumbnail)
                                <img src="{{ Storage::url($program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-brand-900 mb-2 group-hover:text-brand-600 transition">{{ $program->name }}</h3>
                            <p class="text-sm text-brand-600 line-clamp-2">{{ $program->excerpt }}</p>
                            <span class="inline-flex items-center gap-1 mt-4 text-brand-600 text-sm font-semibold">
                                {{ __('site.read_more') }}
                                <span class="transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                            </span>
                        </div>
                    </a>
                @empty
                    <p class="text-brand-500 col-span-3 text-center">Belum ada program yang tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- BERITA TERBARU --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div
            x-data="{ show: false }" x-intersect.once="show = true"
            :class="show ? 'reveal-show' : ''"
            class="reveal flex items-end justify-between mb-12">
            <div>
                <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide">{{ __('site.section_articles_label') }}</span>
                <h2 class="text-3xl font-bold text-brand-900 mt-2">{{ __('site.section_articles_title') }}</h2>
            </div>
            <a href="{{ route('articles.index') }}" class="text-brand-600 font-semibold text-sm hover:text-brand-800 hover:gap-2 flex items-center gap-1 transition-all">
                {{ __('site.view_all') }} <span>&rarr;</span>
            </a>
        </div>

        <div
            x-data="{ show: false }" x-intersect.once="show = true"
            :class="show ? 'reveal-show' : ''"
            class="grid md:grid-cols-3 gap-8 reveal-stagger">
            @forelse($articles as $article)
                <a href="{{ route('articles.show', $article) }}" class="group">
                    <div class="aspect-video bg-earth-200 rounded-xl overflow-hidden mb-4 shadow-sm group-hover:shadow-lg transition-shadow duration-300">
                        @if($article->thumbnail)
                            <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        @endif
                    </div>
                    <span class="text-xs font-semibold text-brand-600 uppercase">{{ $article->category->name ?? '' }}</span>
                    <h3 class="font-bold text-brand-900 mt-1 group-hover:text-brand-600 transition">{{ $article->title }}</h3>
                </a>
            @empty
                <p class="text-brand-500 col-span-3 text-center">Belum ada berita yang dipublikasikan.</p>
            @endforelse
        </div>
    </section>

    {{-- GALERI --}}
    <section class="bg-earth-100 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                x-data="{ show: false }" x-intersect.once="show = true"
                :class="show ? 'reveal-show' : ''"
                class="reveal flex items-end justify-between mb-12">
                <div>
                    <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide">{{ __('site.section_gallery_label') }}</span>
                    <h2 class="text-3xl font-bold text-brand-900 mt-2">{{ __('site.section_gallery_title') }}</h2>
                </div>
                <a href="{{ route('galleries.index') }}" class="text-brand-600 font-semibold text-sm hover:text-brand-800 hover:gap-2 flex items-center gap-1 transition-all">
                    {{ __('site.view_all') }} <span>&rarr;</span>
                </a>
            </div>

            <div
                x-data="{ show: false }" x-intersect.once="show = true"
                :class="show ? 'reveal-show' : ''"
                class="grid grid-cols-2 md:grid-cols-4 gap-4 reveal-stagger">
                @forelse($galleries as $gallery)
                    @php $photo = $gallery->photos->first(); @endphp
                    @if($photo)
                        <a href="{{ route('galleries.show', $gallery) }}" class="aspect-square bg-brand-200 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 group block">
                            <img src="{{ Storage::url($photo->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </a>
                    @endif
                @empty
                    <p class="text-brand-500 col-span-4 text-center">{{ __('site.page_gallery_empty') }}</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection