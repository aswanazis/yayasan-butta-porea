@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', 'Materi Edukasi - Yayasan Butta Porea Indonesia')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,400..700&family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="bg-surface text-on-surface font-body-md text-body-md">
    <main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-lg space-y-stack-lg">

        {{-- HERO --}}
        <section class="relative rounded-xl overflow-hidden min-h-[300px] flex items-end p-margin-mobile md:p-margin-desktop bg-primary-container">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="relative z-10 max-w-2xl text-white">
                <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg mb-stack-sm">{{ __('site.page_materials_title') }}</h1>
                <p class="font-body-lg text-body-lg text-white/90">
                    {{ __('site.page_materials_desc') }}
                </p>
            </div>
        </section>

        {{-- SEARCH --}}
        <section>
            <form method="GET" action="{{ route('materials.index') }}" class="relative w-full md:w-1/2">
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">search</span>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="w-full pl-12 pr-4 py-3 bg-surface-container-lowest border border-outline-variant rounded-full font-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                    placeholder="{{ __('site.search_materials_placeholder') }}">
            </form>
        </section>

        {{-- GRID --}}
        @if($materials->isEmpty())
            <section class="flex flex-col items-center justify-center py-stack-lg text-center">
                <span class="material-symbols-outlined text-[64px] text-outline-variant mb-4">folder_off</span>
                <p class="font-body-md text-body-md text-on-surface-variant">{{ __('site.page_materials_empty') }}</p>
            </section>
        @else
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
                @foreach($materials as $material)
                    <div class="bg-surface-container-lowest rounded-xl p-6 border border-surface-container-highest shadow-sm hover:shadow-md transition-all duration-300 flex flex-col hover:-translate-y-1 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary-fixed opacity-10 rounded-bl-full -z-0 group-hover:scale-110 transition-transform"></div>

                        <div class="flex items-start gap-4 mb-4 relative z-10">
                            <div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center flex-shrink-0 text-primary overflow-hidden">
                                @if($material->thumbnail)
                                    <img src="{{ Storage::url($material->thumbnail) }}" alt="{{ $material->title }}" class="w-full h-full object-cover {{ $material->thumbnailPositionClass() }}">
                                @else
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">picture_as_pdf</span>
                                @endif
                            </div>
                            <div>
                                <span class="inline-block px-2 py-1 bg-surface-container-high rounded text-label-md font-label-md text-on-surface-variant mb-2">PDF</span>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface line-clamp-2 leading-tight">{{ $material->title }}</h3>
                            </div>
                        </div>

                        <div class="mt-auto relative z-10">
                            <div class="flex items-center gap-4 text-label-md font-label-md text-outline mb-6">
                                <div class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[16px]">sd_storage</span>
                                    <span>{{ $material->formattedFileSize() }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[16px]">download</span>
                                    <span>{{ __('site.material_downloads', ['count' => $material->downloads_count]) }}</span>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <a href="{{ Storage::url($material->file_path) }}" target="_blank" rel="noopener" class="flex-1 text-center px-4 py-2 border border-secondary text-secondary rounded-lg font-button text-button hover:bg-secondary hover:text-on-secondary transition-colors duration-200">
                                    {{ __('site.btn_read') }}
                                </a>
                                <a href="{{ route('materials.download', $material) }}" class="flex-1 px-4 py-2 bg-primary text-on-primary rounded-lg font-button text-button flex items-center justify-center gap-2 hover:bg-primary/90 transition-colors duration-200">
                                    {{ __('site.btn_download') }} <span class="material-symbols-outlined text-[18px]">download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>

            <div class="mt-8">
                {{ $materials->links() }}
            </div>
        @endif

    </main>
</div>
@endsection