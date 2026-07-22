@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', $article->title . ' - Yayasan Butta Porea Indonesia')
@section('meta_description', $article->excerpt)

@section('content')

    <section class="bg-brand-50 py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('articles.index') }}" class="text-brand-600 text-sm font-semibold hover:text-brand-800 transition">
                &larr; Kembali ke Berita
            </a>

            <span class="inline-block mt-6 px-3 py-1 bg-brand-100 text-brand-700 text-xs font-semibold rounded-full">
                {{ $article->category->name ?? '' }}
            </span>

            <h1 class="text-3xl md:text-4xl font-bold text-brand-900 mt-4 leading-tight">
                {{ $article->title }}
            </h1>

            <div class="flex items-center gap-3 mt-6 text-sm text-brand-600">
                <span>Oleh {{ $article->author->name ?? 'Admin' }}</span>
                <span>&bull;</span>
                <span>{{ $article->published_at?->translatedFormat('d F Y') }}</span>
            </div>
        </div>
    </section>

    @if($article->thumbnail)
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8">
            <div class="aspect-video rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover {{ $article->thumbnailPositionClass() }}">
            </div>
        </div>
    @endif

    <article class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16 prose prose-lg prose-headings:text-brand-900 prose-p:text-brand-700 max-w-none">
        {!! $article->content !!}
    </article>

@endsection