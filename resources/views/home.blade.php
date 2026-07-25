@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', 'Beranda - Yayasan Butta Porea Indonesia')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,400..700&family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="bg-background text-on-background font-body-md text-body-md">

    {{-- HERO --}}
    <section class="relative min-h-[85vh] flex items-center bg-surface-container-lowest overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-20 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-primary-fixed via-background to-background"></div>

        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop w-full grid grid-cols-1 lg:grid-cols-2 gap-stack-lg items-center relative z-10 py-stack-lg">
            <div class="space-y-stack-md">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-low border border-outline-variant text-primary font-label-md text-label-md">
                    <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">eco</span>
                    {{ __('site.hero2_badge') }}
                </div>

                <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface text-balance">
                    {{ __('site.hero2_title_1') }} <span class="text-primary italic">{{ __('site.hero2_title_italic') }}</span> {{ __('site.hero2_title_2') }}
                </h1>

                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl text-pretty">
                    {{ __('site.hero2_desc') }}
                </p>

                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('contact.index') }}" class="inline-flex items-center justify-center bg-primary text-on-primary font-button text-button px-8 py-3 rounded-full hover:bg-on-primary-fixed-variant transition-all hover:shadow-lg hover:shadow-primary/20 active:scale-95 group">
                        {{ __('site.btn_partnership') }}
                        <span class="material-symbols-outlined ml-2 group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                    <a href="{{ route('programs.index') }}" class="inline-flex items-center justify-center bg-transparent border-2 border-secondary text-secondary font-button text-button px-8 py-3 rounded-full hover:bg-secondary-container hover:border-secondary-container hover:text-on-secondary-container transition-all active:scale-95">
                        {{ __('site.btn_learn_programs') }}
                    </a>
                </div>
            </div>

            <div class="relative h-[400px] lg:h-[600px] w-full rounded-2xl overflow-hidden shadow-2xl shadow-primary/10 group">
                @if($programs->first()?->thumbnail)
                    <img src="{{ Storage::url($programs->first()->thumbnail) }}" alt="{{ $programs->first()->name }}" class="absolute inset-0 w-full h-full object-cover {{ $programs->first()->thumbnailPositionClass() }} transition-transform duration-700 group-hover:scale-105">
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-gutter text-white">
                    <p class="font-label-md text-label-md opacity-90 mb-1">{{ __('site.hero2_impact_label') }}</p>
                    <p class="font-headline-sm text-headline-sm text-shadow-sm">{{ __('site.hero2_impact_text') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- STATS --}}
    <section
        class="py-stack-md bg-surface relative z-20 -mt-8 mx-auto max-w-3xl rounded-2xl shadow-sm border border-surface-variant"
        x-data="{
            stats: [
                { target: {{ count(__('site.divisions_items')) }}, suffix: '', label: @js(__('site.stat2_divisions')), icon: 'diversity_3', current: 0 },
                { target: {{ $totalPrograms }}, suffix: '+', label: @js(__('site.stat2_programs')), icon: 'agriculture', current: 0 },
                { target: 2023, suffix: '', label: @js(__('site.stat2_founded')), icon: 'calendar_month', current: 0 }
            ],
            animateCounters() {
                this.stats.forEach(stat => {
                    let startTimestamp = null;
                    const duration = 1500;
                    const step = (timestamp) => {
                        if (!startTimestamp) startTimestamp = timestamp;
                        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                        const easeProgress = 1 - Math.pow(1 - progress, 3);
                        stat.current = Math.floor(easeProgress * stat.target);
                        if (progress < 1) {
                            window.requestAnimationFrame(step);
                        } else {
                            stat.current = stat.target;
                        }
                    };
                    window.requestAnimationFrame(step);
                });
            }
        }"
    >
        <div class="grid grid-cols-1 md:grid-cols-3 gap-stack-sm px-6 md:px-10 divide-y md:divide-y-0 md:divide-x divide-surface-variant" x-intersect.once="animateCounters()">
            <template x-for="stat in stats" :key="stat.label">
                <div class="flex flex-col items-center text-center py-3 md:py-0 px-4 group">
                    <div class="w-12 h-12 rounded-full bg-primary-container/10 text-primary flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;" x-text="stat.icon"></span>
                    </div>
                    <div class="font-display-lg text-3xl md:text-4xl text-primary font-bold mb-1 flex items-baseline">
                        <span x-text="stat.current"></span><span class="text-2xl ml-1" x-text="stat.suffix"></span>
                    </div>
                    <p class="font-body-md text-sm text-on-surface-variant" x-text="stat.label"></p>
                </div>
            </template>
        </div>
    </section>

    {{-- PROGRAM UNGGULAN --}}
    <section class="py-stack-lg max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mt-stack-md">
        <div class="text-center max-w-2xl mx-auto mb-stack-lg">
            <h2 class="font-headline-md text-headline-md text-on-surface mb-4">{{ __('site.section2_programs_title') }}</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant">{{ __('site.section2_programs_desc') }}</p>
        </div>

        @php
            $cardIcons = ['compost', 'pets', 'local_florist'];
            $cardColors = [
                ['bg' => 'bg-surface-tint/10', 'text' => 'text-surface-tint', 'hover' => 'group-hover:text-primary', 'link' => 'text-primary'],
                ['bg' => 'bg-secondary/10', 'text' => 'text-secondary', 'hover' => 'group-hover:text-secondary', 'link' => 'text-secondary'],
                ['bg' => 'bg-tertiary/10', 'text' => 'text-tertiary', 'hover' => 'group-hover:text-tertiary', 'link' => 'text-tertiary'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            @forelse($programs as $index => $program)
                @php $c = $cardColors[$index % 3]; @endphp
                <div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 border border-surface-variant group flex flex-col h-full">
                    <div class="w-12 h-12 rounded-lg {{ $c['bg'] }} {{ $c['text'] }} flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">{{ $cardIcons[$index % 3] }}</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3 {{ $c['hover'] }} transition-colors">{{ $program->name }}</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 flex-grow">{{ $program->excerpt }}</p>
                    <a href="{{ route('programs.show', $program) }}" class="inline-flex items-center font-button text-button {{ $c['link'] }} hover:opacity-80 transition-colors mt-auto">
                        {{ __('site.read_more') }}
                        <span class="material-symbols-outlined ml-1 text-sm transition-transform group-hover:translate-x-1">arrow_forward</span>
                    </a>
                </div>
            @empty
                <p class="text-on-surface-variant col-span-3 text-center">{{ __('site.page_programs_empty') }}</p>
            @endforelse
        </div>
    </section>

    {{-- BERITA --}}
    <section class="py-stack-lg bg-surface-container-low mt-stack-lg">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="flex justify-between items-end mb-stack-lg">
                <div>
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-2">{{ __('site.section2_news_title') }}</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">{{ __('site.section2_news_desc') }}</p>
                </div>
                <a href="{{ route('articles.index') }}" class="hidden md:inline-flex items-center font-button text-button text-primary hover:underline">
                    {{ __('site.view_all') }} <span class="material-symbols-outlined ml-1">arrow_forward</span>
                </a>
            </div>

            @php
                $newsBadgeColors = ['text-primary', 'text-secondary', 'text-tertiary'];
                $newsHoverColors = ['group-hover:text-primary', 'group-hover:text-secondary', 'group-hover:text-tertiary'];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                @forelse($articles as $index => $article)
                    <a href="{{ route('articles.show', $article) }}" class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow group flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            @if($article->thumbnail)
                                <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover {{ $article->thumbnailPositionClass() }} group-hover:scale-105 transition-transform duration-500">
                            @endif
                            @if($article->category)
                                <div class="absolute top-4 left-4 bg-surface-container-lowest/90 backdrop-blur px-3 py-1 rounded-full text-xs font-label-md {{ $newsBadgeColors[$index % 3] }} font-bold shadow-sm">
                                    {{ $article->category->name }}
                                </div>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <time class="font-label-md text-xs text-on-surface-variant mb-2 block">{{ $article->published_at?->translatedFormat('d F Y') }}</time>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3 line-clamp-2 {{ $newsHoverColors[$index % 3] }} transition-colors">{{ $article->title }}</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-3 mb-4 flex-grow">{{ $article->excerpt }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-on-surface-variant col-span-3 text-center">{{ __('site.page_articles_empty') }}</p>
                @endforelse
            </div>

            <div class="mt-8 text-center md:hidden">
                <a href="{{ route('articles.index') }}" class="inline-flex items-center font-button text-button text-primary border border-outline rounded-full px-6 py-2 hover:bg-surface-container-high">
                    {{ __('site.view_all') }}
                </a>
            </div>
        </div>
    </section>

</div>
@endsection