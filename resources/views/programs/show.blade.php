@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('title', $program->name . ' - Yayasan Butta Porea Indonesia')
@section('meta_description', $program->excerpt)

@section('content')

    <section class="bg-brand-50 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('programs.index') }}" class="text-brand-600 text-sm font-semibold hover:text-brand-800 transition">
                &larr; Kembali ke Program
            </a>
            <h1 class="text-4xl font-bold text-brand-900 mt-4">{{ $program->name }}</h1>
            @if($program->excerpt)
                <p class="text-brand-700 mt-4 text-lg">{{ $program->excerpt }}</p>
            @endif
        </div>
    </section>

    @if($program->thumbnail)
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8">
            <div class="aspect-video rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ Storage::url($program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-full object-cover">
            </div>
        </div>
    @endif

    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 prose prose-lg prose-headings:text-brand-900 prose-p:text-brand-700 max-w-none">
        {!! $program->description !!}
    </article>

    @if($program->galleries->isNotEmpty())
        <section class="bg-earth-100 py-16">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-brand-900 mb-8">Dokumentasi Kegiatan</h2>

                @foreach($program->galleries as $gallery)
                    <div class="mb-10">
                        <h3 class="font-semibold text-brand-800 mb-4">{{ $gallery->title }}</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($gallery->photos as $photo)
                                <div class="aspect-square rounded-xl overflow-hidden bg-brand-200">
                                    <img src="{{ Storage::url($photo->image_path) }}" alt="{{ $photo->caption }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

@endsection