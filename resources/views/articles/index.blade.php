@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', 'Berita - Yayasan Butta Porea Indonesia')

@section('content')

    <section class="bg-brand-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide">{{ __('site.page_articles_badge') }}</span>
            <h1 class="text-4xl font-bold text-brand-900 mt-2">{{ __('site.page_articles_title') }}</h1>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($articles as $article)
                <a href="{{ route('articles.show', $article) }}" class="group">
                    <div class="aspect-video bg-earth-200 rounded-xl overflow-hidden mb-4">
                        @if($article->thumbnail)
                            <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @endif
                    </div>
                    <span class="text-xs font-semibold text-brand-600 uppercase">{{ $article->category->name ?? '' }}</span>
                    <h3 class="font-bold text-brand-900 mt-1 text-lg group-hover:text-brand-600 transition">{{ $article->title }}</h3>
                    <p class="text-sm text-brand-600 mt-2 line-clamp-2">{{ $article->excerpt }}</p>
                    <p class="text-xs text-brand-400 mt-3">{{ $article->published_at?->translatedFormat('d F Y') }}</p>
                </a>
            @empty
                <p class="text-brand-500 col-span-3 text-center py-12">{{ __('site.page_articles_empty') }}</p>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    </section>

@endsection