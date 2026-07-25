@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', 'Berita & Kegiatan - Yayasan Butta Porea Indonesia')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,400..700&family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="bg-surface text-on-surface font-body-md text-body-md">
    <main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-lg space-y-stack-lg">

        {{-- HERO --}}
        <section class="text-center space-y-stack-md py-stack-lg bg-surface-container-low rounded-xl">
            <div class="max-w-2xl mx-auto px-margin-mobile">
                <h1 class="font-display-lg-mobile md:font-display-lg text-primary mb-4">{{ __('site.page_articles_title') }}</h1>
                <p class="font-body-lg text-primary">{{ __('site.page_articles_hero_desc') }}</p>
            </div>
        </section>

        {{-- SEARCH & FILTER --}}
        <section class="flex flex-col md:flex-row gap-gutter items-center justify-between">
            <form method="GET" action="{{ route('articles.index') }}" class="relative w-full md:w-1/3">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary transition-colors font-body-md text-body-md placeholder-outline text-on-surface"
                    placeholder="{{ __('site.search_articles_placeholder') }}">
            </form>

            <div class="flex flex-wrap gap-2 justify-center md:justify-end w-full md:w-2/3">
                <a href="{{ route('articles.index', array_filter(['search' => request('search')])) }}"
                    class="px-4 py-2 rounded-full font-label-md text-label-md transition-colors {{ !request('category') ? 'bg-primary text-on-primary' : 'bg-surface-container border border-outline-variant text-on-surface-variant hover:bg-surface-container-high' }}">
                    {{ __('site.filter_all') }}
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('articles.index', array_filter(['search' => request('search'), 'category' => $category->slug])) }}"
                        class="px-4 py-2 rounded-full font-label-md text-label-md transition-colors {{ request('category') === $category->slug ? 'bg-primary text-on-primary' : 'bg-surface-container border border-outline-variant text-on-surface-variant hover:bg-surface-container-high' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </section>

        {{-- NEWS GRID --}}
        @php
            $badgeStyles = [
                'bg-primary-container text-on-primary-container',
                'bg-tertiary-container text-on-tertiary-container',
                'bg-secondary-container text-on-secondary-container',
                'bg-surface-variant text-on-surface',
            ];
        @endphp

        @if($articles->isEmpty())
            <section class="text-center py-16">
                <p class="text-on-surface-variant">{{ __('site.articles_no_results') }}</p>
            </section>
        @else
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                @foreach($articles as $index => $article)
                    <a href="{{ route('articles.show', $article) }}" class="bg-surface-container-lowest rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 hover:scale-[1.01] flex flex-col group border border-surface-container-highest">
                        <div class="relative h-48 overflow-hidden">
                            @if($article->thumbnail)
                                <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover {{ $article->thumbnailPositionClass() }} group-hover:scale-105 transition-transform duration-500">
                            @endif
                            @if($article->category)
                                <span class="absolute top-4 left-4 {{ $badgeStyles[$index % 4] }} px-3 py-1 rounded-full font-label-md text-label-md">{{ $article->category->name }}</span>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <time class="text-sm text-outline mb-2 font-body-md block">{{ $article->published_at?->translatedFormat('d F Y') }}</time>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3 line-clamp-2">{{ $article->title }}</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3 flex-grow">{{ $article->excerpt }}</p>
                            <span class="inline-flex items-center text-primary font-button text-button mt-auto">
                                {{ __('site.read_more_full') }}
                                <span class="material-symbols-outlined ml-1 text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </span>
                        </div>
                    </a>
                @endforeach
            </section>

            <div class="mt-8">
                {{ $articles->links() }}
            </div>
        @endif


    </main>
</div>
@endsection