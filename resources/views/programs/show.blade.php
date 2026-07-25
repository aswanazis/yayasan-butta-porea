@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', $program->name . ' - Yayasan Butta Porea Indonesia')
@section('meta_description', $program->excerpt)

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,400..700&family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="bg-surface text-on-surface font-body-md text-body-md">

    {{-- BREADCRUMB & HERO --}}
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop pt-8 mb-stack-lg">
        <nav aria-label="Breadcrumb" class="flex text-on-surface-variant font-label-md text-label-md mb-stack-sm">
            <ol class="inline-flex items-center flex-wrap gap-1">
                <li><a href="{{ route('home') }}" class="hover:text-primary transition-colors">{{ __('site.nav_home') }}</a></li>
                <li class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                    <a href="{{ route('programs.index') }}" class="hover:text-primary transition-colors">{{ __('site.prog_breadcrumb_program') }}</a>
                </li>
                <li class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                    <span class="text-primary font-bold">{{ $program->name }}</span>
                </li>
            </ol>
        </nav>

        <div class="relative rounded-2xl overflow-hidden min-h-[300px] flex items-end p-margin-mobile md:p-margin-desktop">
            <div class="absolute inset-0 z-0 bg-primary-container">
                @if($program->hero_image)
                    <img src="{{ Storage::url($program->hero_image) }}" alt="{{ $program->name }}" class="w-full h-full object-cover">
                @elseif($program->thumbnail)
                    <img src="{{ Storage::url($program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-full object-cover {{ $program->thumbnailPositionClass() }}">
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            </div>
            <div class="relative z-10 max-w-2xl">
                <span class="inline-block px-3 py-1 bg-tertiary-fixed text-on-tertiary-fixed font-label-md text-label-md rounded-full mb-4">{{ __('site.page_programs_badge') }}</span>
                <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-white mb-4 text-shadow-sm">{{ $program->name }}</h1>
                @if($program->excerpt)
                    <p class="font-body-lg text-body-lg text-white/90">{{ $program->excerpt }}</p>
                @endif
            </div>
        </div>
    </section>

    {{-- DESKRIPSI LENGKAP --}}
    @if($program->description)
        <article class="max-w-4xl mx-auto px-margin-mobile md:px-margin-desktop py-stack-md prose prose-lg prose-headings:font-headline-md prose-headings:text-on-surface prose-p:text-on-surface-variant prose-p:font-body-md max-w-none">
            {!! $program->description !!}
        </article>
    @endif

    {{-- PROSES KERJA --}}
    @if(!empty($program->process_steps))
        <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mb-stack-lg">
            <div class="text-center mb-stack-md">
                <h2 class="font-headline-md text-headline-md text-primary mb-2">{{ __('site.prog_process_title') }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mx-auto">{{ __('site.prog_process_desc') }}</p>
            </div>

            <div class="relative">
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-surface-container-high -translate-y-1/2 z-0"></div>
                <div class="grid grid-cols-1 md:grid-cols-{{ min(count($program->process_steps), 4) }} gap-gutter relative z-10">
                    @foreach($program->process_steps as $index => $step)
                        @php $isLast = $index === count($program->process_steps) - 1; @endphp
                        <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-surface-variant text-center flex flex-col items-center">
                            <div class="w-16 h-16 rounded-full {{ $isLast ? 'bg-primary text-on-primary shadow-md' : 'bg-surface-container text-primary' }} flex items-center justify-center mb-4 border-4 border-surface">
                                <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">{{ $step['icon'] ?? 'eco' }}</span>
                            </div>
                            <h3 class="font-headline-sm text-headline-sm {{ $isLast ? 'text-primary' : 'text-on-surface' }} mb-2">{{ $index + 1 }}. {{ $step['title'] }}</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant">{{ $step['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- DAMPAK & MANFAAT --}}
    @if(!empty($program->impact_items) || !empty($program->impact_stats) || $program->impact_image_1)
        <section class="bg-surface-container-low py-stack-lg mb-stack-lg rounded-3xl mx-margin-mobile md:mx-margin-desktop">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-stack-lg items-center">
                    <div>
                        <h2 class="font-headline-md text-headline-md text-primary mb-stack-sm">{{ __('site.prog_impact_title') }}</h2>

                        @if(!empty($program->impact_items))
                            <ul class="space-y-4">
                                @foreach($program->impact_items as $item)
                                    <li class="flex items-start gap-4">
                                        <div class="p-2 bg-primary-container/20 rounded-lg text-primary mt-1">
                                            <span class="material-symbols-outlined">{{ $item['icon'] ?? 'eco' }}</span>
                                        </div>
                                        <div>
                                            <h4 class="font-headline-sm text-on-surface text-[20px]">{{ $item['title'] }}</h4>
                                            <p class="font-body-md text-body-md text-on-surface-variant">{{ $item['description'] }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4 {{ isset($program->impact_stats[1]) ? 'pt-8' : '' }}">
                            @if($program->impact_image_1)
                                <img src="{{ Storage::url($program->impact_image_1) }}" alt="{{ $program->name }}" class="w-full h-48 object-cover rounded-xl shadow-sm">
                            @endif
                            @if(isset($program->impact_stats[0]))
                                <div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm text-center">
                                    <span class="font-display-lg text-3xl text-primary block font-bold">{{ $program->impact_stats[0]['value'] }}</span>
                                    <span class="font-label-md text-label-md text-on-surface-variant">{{ $program->impact_stats[0]['label'] }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="space-y-4">
                            @if(isset($program->impact_stats[1]))
                                <div class="bg-tertiary-fixed p-4 rounded-xl shadow-sm text-center">
                                    <span class="font-display-lg text-3xl text-on-tertiary-fixed block font-bold">{{ $program->impact_stats[1]['value'] }}</span>
                                    <span class="font-label-md text-label-md text-on-tertiary-fixed-variant">{{ $program->impact_stats[1]['label'] }}</span>
                                </div>
                            @endif
                            @if($program->impact_image_2)
                                <img src="{{ Storage::url($program->impact_image_2) }}" alt="{{ $program->name }}" class="w-full h-48 object-cover rounded-xl shadow-sm">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- GALERI DOKUMENTASI --}}
    @if($program->galleries->isNotEmpty())
        <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mb-stack-lg">
            <h2 class="font-headline-md text-headline-md text-on-surface mb-stack-md">{{ __('site.prog_documentation_title') }}</h2>

            @foreach($program->galleries as $gallery)
                <div class="mb-8">
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-4">{{ $gallery->title }}</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($gallery->photos as $photo)
                            <div class="aspect-square rounded-xl overflow-hidden bg-surface-container">
                                <img src="{{ Storage::url($photo->image_path) }}" alt="{{ $photo->caption }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </section>
    @endif

    {{-- CTA --}}
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop pb-stack-lg">
        <div class="bg-primary text-on-primary rounded-2xl p-margin-desktop text-center relative overflow-hidden">
            <div class="absolute top-0 right-0 opacity-10 pointer-events-none">
                <span class="material-symbols-outlined text-[200px]" style="font-variation-settings: 'FILL' 1;">volunteer_activism</span>
            </div>
            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="font-headline-md text-headline-md mb-4">{{ __('site.prog_cta_title') }}</h2>
                <p class="font-body-lg text-body-lg text-on-primary/90 mb-8">{{ __('site.prog_cta_desc') }}</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact.index') }}" class="bg-tertiary-fixed text-on-tertiary-fixed font-button text-button px-8 py-3 rounded-full hover:bg-tertiary-fixed-dim transition-all">
                        {{ __('site.prog_cta_primary') }}
                    </a>
                    <a href="{{ route('programs.index') }}" class="bg-transparent border border-on-primary text-on-primary font-button text-button px-8 py-3 rounded-full hover:bg-on-primary/10 transition-all">
                        {{ __('site.prog_cta_secondary') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection