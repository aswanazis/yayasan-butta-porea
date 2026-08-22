@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', 'Program - Yayasan Butta Porea Indonesia')

@section('content')

    <section class="bg-brand-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-brand-600 font-semibold text-sm uppercase tracking-wide">{{ __('site.page_programs_badge') }}</span>
            <h1 class="text-4xl font-bold text-brand-900 mt-2">{{ __('site.page_programs_title') }}</h1>
            <p class="text-brand-700 mt-4 max-w-2xl mx-auto">
                {{ __('site.page_programs_desc') }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-8 reveal-stagger" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
            @forelse($programs as $program)
                <a href="{{ route('programs.show', $program) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition border border-brand-100">
                    <div class="aspect-video bg-brand-200 overflow-hidden">
                        @if($program->thumbnail)
                            <img src="{{ Storage::url($program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-full object-cover {{ $program->thumbnailPositionClass() }} group-hover:scale-105 transition duration-300">
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-brand-900 mb-2 text-lg">{{ $program->name }}</h3>
                        <p class="text-sm text-brand-600 line-clamp-2">{{ $program->excerpt }}</p>
                        <span class="inline-block mt-4 text-brand-600 text-sm font-semibold">{{ __('site.read_more') }} &rarr;</span>
                    </div>
                </a>
            @empty
                <p class="text-brand-500 col-span-3 text-center py-12">{{ __('site.page_programs_empty') }}</p>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $programs->links() }}
        </div>
    </section>

@endsection