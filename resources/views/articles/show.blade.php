@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', $article->title . ' - Yayasan Butta Porea Indonesia')
@section('meta_description', $article->excerpt)

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,400..700&family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .article-content p { margin-bottom: 1.5rem; line-height: 1.8; color: #42493e; }
        .article-content h2 { font-family: "Source Serif 4"; font-weight: 600; font-size: 1.75rem; margin-top: 2.5rem; margin-bottom: 1rem; color: #154212; }
        .article-content h3 { font-family: "Source Serif 4"; font-weight: 600; font-size: 1.4rem; margin-top: 2rem; margin-bottom: 0.75rem; color: #154212; }
        .article-content ul, .article-content ol { margin: 0 0 1.5rem 1.5rem; color: #42493e; }
        .article-content ul { list-style: disc; }
        .article-content ol { list-style: decimal; }
        .article-content blockquote {
            margin: 2.5rem 0;
            background: #f3f3f3;
            padding: 2rem;
            border-radius: 0.75rem;
            border: 1px solid #c2c9bb;
            font-family: "Source Serif 4";
            font-style: italic;
            font-size: 1.25rem;
            line-height: 1.6;
            color: #1a1c1c;
        }
        .article-content a { color: #154212; text-decoration: underline; }
    </style>
@endpush

@section('content')
<div class="bg-surface text-on-surface font-body-md text-body-md">
    <main class="pt-8 pb-stack-lg">

        {{-- BREADCRUMB --}}
        <div class="max-w-[800px] mx-auto px-margin-mobile md:px-0 mb-stack-sm">
            <nav class="flex items-center flex-wrap gap-2 text-label-md font-label-md text-on-surface-variant">
                <a href="{{ route('home') }}" class="hover:text-primary">{{ __('site.nav_home') }}</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <a href="{{ route('articles.index') }}" class="hover:text-primary">{{ __('site.page_articles_title') }}</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <span class="text-primary font-bold">{{ $article->title }}</span>
            </nav>
        </div>

        {{-- HEADER --}}
        <header class="max-w-[800px] mx-auto px-margin-mobile md:px-0 mb-stack-md">
            <div class="flex items-center flex-wrap gap-4 mb-4">
                @if($article->category)
                    <span class="bg-primary-container text-on-primary-container px-3 py-1 rounded-full text-label-md font-label-md">
                        {{ $article->category->name }}
                    </span>
                @endif
                <span class="text-on-surface-variant text-label-md font-label-md flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                    {{ $article->published_at?->translatedFormat('d F Y') }}
                </span>
            </div>

            <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-primary leading-tight mb-6">
                {{ $article->title }}
            </h1>

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center overflow-hidden">
                    <span class="material-symbols-outlined text-outline">person</span>
                </div>
                <div>
                    <p class="text-on-surface font-bold text-label-md">{{ $article->author->name ?? __('site.article_default_author') }}</p>
                    <p class="text-on-surface-variant text-[12px]">{{ __('site.article_written_by') }}</p>
                </div>
            </div>
        </header>

        {{-- GAMBAR UTAMA --}}
        @if($article->thumbnail)
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mb-stack-lg reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                <div class="rounded-xl overflow-hidden aspect-[16/9] md:aspect-[21/9] shadow-md relative bg-surface-container">
                    <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover {{ $article->thumbnailPositionClass() }}">
                </div>
            </div>
        @endif

        {{-- BODY --}}
        <article class="max-w-[800px] mx-auto px-margin-mobile md:px-0 article-content reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
            @if($article->excerpt)
                <p class="font-body-lg text-body-lg text-primary-container font-medium italic border-l-4 border-primary pl-6 py-2 mb-8 bg-primary/5">
                    {{ $article->excerpt }}
                </p>
            @endif

            {!! $article->content !!}

            {{-- SHARE --}}
            <div class="mt-16 pt-8 border-t border-outline-variant flex flex-col md:flex-row md:items-center justify-between gap-4">
                <p class="font-label-md text-label-md text-on-surface-variant">{{ __('site.article_share') }}</p>
                <div class="flex gap-4">
                    <button type="button" onclick="shareArticle()" class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all shadow-sm">
                        <span class="material-symbols-outlined">share</span>
                    </button>
                    <button type="button" onclick="copyArticleLink(this)" class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all shadow-sm">
                        <span class="material-symbols-outlined">link</span>
                    </button>
                </div>
            </div>
        </article>

        {{-- BERITA TERKAIT --}}
        @if($relatedArticles->isNotEmpty())
            <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mt-stack-lg">
                <h3 class="font-headline-md text-headline-md text-primary mb-stack-md reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">{{ __('site.related_articles_title') }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter reveal-stagger" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                    @foreach($relatedArticles as $related)
                        <a href="{{ route('articles.show', $related) }}" class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md hover:scale-[1.02] transition-all group border border-surface-container-highest">
                            <div class="aspect-[4/3] bg-surface-container-high relative overflow-hidden">
                                @if($related->thumbnail)
                                    <img src="{{ Storage::url($related->thumbnail) }}" alt="{{ $related->title }}" class="w-full h-full object-cover {{ $related->thumbnailPositionClass() }}">
                                @endif
                            </div>
                            <div class="p-6">
                                @if($related->category)
                                    <span class="text-[12px] font-bold text-primary uppercase tracking-wider">{{ $related->category->name }}</span>
                                @endif
                                <h4 class="font-headline-sm text-headline-sm text-on-surface mt-2 mb-4 group-hover:text-primary transition-colors">{{ $related->title }}</h4>
                                <span class="text-primary font-button text-button inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                                    {{ __('site.read_more_full') }}
                                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

    </main>
</div>

<script>
    function shareArticle() {
        if (navigator.share) {
            navigator.share({
                title: document.title,
                url: window.location.href,
            }).catch(() => {});
        } else {
            copyArticleLink();
        }
    }

    function copyArticleLink(btn) {
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert('{{ __('site.link_copied') }}');
        });
    }
</script>
@endsection