@php
    use Illuminate\Support\Facades\Storage;
    use App\Models\TeamMember;
@endphp

@extends('layouts.app')

@section('title', 'Tentang Kami - Yayasan Butta Porea Indonesia')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,400..700&family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="bg-surface text-on-surface font-body-md text-body-md">
    <main>

        {{-- HERO --}}
        <section class="relative w-full py-stack-lg flex items-center justify-center overflow-hidden bg-primary-container">
            <div class="absolute inset-0 bg-gradient-to-b from-primary/20 to-primary-container"></div>
            <div class="relative z-20 text-center max-w-3xl mx-auto px-margin-mobile md:px-margin-desktop">
                <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-white mb-stack-md">{{ __('site.about2_title') }}</h1>
                <p class="font-body-lg text-body-lg text-white/90 leading-relaxed">{{ __('site.about2_desc') }}</p>
            </div>
        </section>

        {{-- PROFIL YAYASAN (legal) --}}
        @if(!empty($foundationProfile->profile_text))
            <section class="py-stack-lg px-margin-mobile md:px-margin-desktop max-w-4xl mx-auto reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                <h2 class="font-headline-md text-headline-md text-primary mb-stack-sm text-center">{{ __('site.profile_section_title') }}</h2>
                <div class="prose prose-lg prose-p:text-on-surface-variant prose-p:font-body-md max-w-none text-center">
                    {!! $foundationProfile->profile_text !!}
                </div>
            </section>
        @endif

        {{-- VISI & MISI --}}
        <section class="py-stack-lg px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-stack-lg items-start reveal-stagger" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                <div class="bg-surface-container-lowest p-stack-md rounded-xl shadow-sm border border-surface-variant">
                    <div class="flex items-center gap-4 mb-stack-sm">
                        <div class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center text-primary-container">
                            <span class="material-symbols-outlined text-3xl">visibility</span>
                        </div>
                        <h2 class="font-headline-md text-headline-md text-primary">{{ __('site.vision_title') }}</h2>
                    </div>
                    <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">{{ __('site.vision_text') }}</p>
                </div>

                <div class="bg-surface-container-lowest p-stack-md rounded-xl shadow-sm border border-surface-variant">
                    <div class="flex items-center gap-4 mb-stack-sm">
                        <div class="w-12 h-12 rounded-full bg-secondary-container/20 flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined text-3xl">flag</span>
                        </div>
                        <h2 class="font-headline-md text-headline-md text-primary">{{ __('site.mission_title') }}</h2>
                    </div>
                    <ul class="space-y-4">
                        @foreach(__('site.mission_items') as $mission)
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary-container mt-1">check_circle</span>
                                <span class="font-body-md text-body-md text-on-surface-variant">{{ $mission }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        {{-- NILAI-NILAI --}}
        <section class="py-stack-lg bg-surface-container-low">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop text-center">
                <h2 class="font-headline-md text-headline-md text-primary mb-stack-lg reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">{{ __('site.values_title') }}</h2>
                @php
                    $valueColors = ['text-tertiary-fixed-dim', 'text-primary-container', 'text-secondary'];
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter reveal-stagger" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                    @foreach(__('site.values_items') as $index => $value)
                        <div class="bg-surface-container-lowest p-stack-md rounded-xl shadow-sm flex flex-col items-center text-center">
                            <span class="material-symbols-outlined text-5xl {{ $valueColors[$index % 3] }} mb-4">{{ $value['icon'] }}</span>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">{{ $value['title'] }}</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant">{{ $value['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- KOMITMEN YAYASAN --}}
        @if(!empty($foundationProfile->commitment_items))
            <section class="py-stack-lg px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
                <h2 class="font-headline-md text-headline-md text-primary mb-stack-lg text-center reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">{{ __('site.commitment_section_title') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter reveal-stagger" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                    @foreach($foundationProfile->commitment_items as $item)
                        <div class="bg-primary text-on-primary rounded-xl p-stack-md flex flex-col items-center text-center shadow-sm">
                            <span class="material-symbols-outlined text-4xl mb-3" style="font-variation-settings: 'FILL' 1;">{{ $item['icon'] ?? 'verified' }}</span>
                            <h3 class="font-headline-sm text-headline-sm">{{ $item['title'] }}</h3>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- DIVISI KAMI (dipertahankan dari desain sebelumnya) --}}
        <section class="py-stack-lg px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
            <h2 class="font-headline-md text-headline-md text-primary mb-stack-lg text-center reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">{{ __('site.divisions_title') }}</h2>
            @php
                $divisionIcons = ['🌾', '🐄', '🌳', '⚖️', '📢', '🐟'];
            @endphp
            <div class="grid grid-cols-2 md:grid-cols-3 gap-gutter reveal-stagger" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                @foreach(__('site.divisions_items') as $index => $division)
                    <div class="bg-surface-container-lowest rounded-xl p-6 text-center shadow-sm border border-surface-variant">
                        <div class="w-12 h-12 bg-primary-container/10 rounded-full flex items-center justify-center text-2xl mx-auto mb-3">
                            {{ $divisionIcons[$index] ?? '🌱' }}
                        </div>
                        <p class="font-body-md font-semibold text-on-surface">{{ $division }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- STRUKTUR ORGANISASI --}}
        <section class="py-stack-lg px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
            <div class="text-center mb-stack-lg reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                <h2 class="font-headline-md text-headline-md text-primary mb-4">{{ __('site.structure_section_title') }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mx-auto">{{ __('site.structure_section_desc') }}</p>
            </div>

            @if($teamMembers->isEmpty())
                <p class="text-center text-on-surface-variant">{{ __('site.structure_empty') }}</p>
            @else
                @php $groupLabels = __('site.structure_groups'); @endphp
                @foreach(TeamMember::GROUPS as $groupKey => $fallbackLabel)
                    @php $members = $teamMembers->get($groupKey, collect()); @endphp
                    @if($members->isNotEmpty())
                        <div class="mb-stack-md">
                            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-4 pb-2 border-b border-outline-variant">
                                {{ $groupLabels[$groupKey] ?? $fallbackLabel }}
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter reveal-stagger" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                                @foreach($members as $member)
                                    <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm border {{ $member->is_coordinator ? 'border-primary ring-1 ring-primary' : 'border-surface-variant' }} group">
                                        <div class="h-56 overflow-hidden bg-surface-container flex items-center justify-center">
                                            @if($member->photo)
                                                <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            @else
                                                <span class="material-symbols-outlined text-6xl text-outline-variant">person</span>
                                            @endif
                                        </div>
                                        <div class="p-4 text-center">
                                            @if($member->is_coordinator)
                                                <span class="inline-block mb-1 px-2 py-0.5 rounded-full bg-primary/10 text-primary text-[11px] font-label-md font-bold uppercase tracking-wide">
                                                    {{ $member->position }}
                                                </span>
                                            @endif
                                            <h4 class="font-headline-sm text-headline-sm text-on-surface text-base">{{ $member->name }}</h4>
                                            @if(!$member->is_coordinator)
                                                <p class="font-label-md text-label-md text-primary mt-1">{{ $member->position }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </section>

        {{-- PENGHARGAAN --}}
        @if($awards->isNotEmpty())
            <section class="py-stack-lg bg-surface-container-low">
                <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                    <h2 class="font-headline-md text-headline-md text-primary mb-stack-lg text-center reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">{{ __('site.awards_section_title') }}</h2>
                    <div class="space-y-gutter reveal-stagger" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                        @foreach($awards as $award)
                            <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-surface-variant p-stack-md grid grid-cols-1 md:grid-cols-3 gap-gutter items-center">
                                @if($award->photo)
                                    <div class="rounded-lg overflow-hidden aspect-[4/3] bg-surface-container">
                                        <img src="{{ Storage::url($award->photo) }}" alt="{{ $award->title }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                                <div class="{{ $award->photo ? 'md:col-span-2' : 'md:col-span-3' }}">
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">{{ $award->title }}</h3>
                                    @if($award->description)
                                        <p class="font-body-md text-body-md text-on-surface-variant">{{ $award->description }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- LEGALITAS YAYASAN --}}
        @if($legalDocuments->isNotEmpty())
            <section class="py-stack-lg px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
                <h2 class="font-headline-md text-headline-md text-primary mb-stack-lg text-center reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">{{ __('site.legal_section_title') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter reveal-stagger" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                    @foreach($legalDocuments as $document)
                        <div class="text-center">
                            @if($document->image)
                                <div class="rounded-xl overflow-hidden shadow-sm border border-surface-variant mb-3 bg-surface-container-lowest">
                                    <img src="{{ Storage::url($document->image) }}" alt="{{ $document->title }}" class="w-full h-auto object-contain">
                                </div>
                            @endif
                            <h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">{{ $document->title }}</h4>
                            @if($document->caption)
                                <p class="font-body-md text-sm text-on-surface-variant">{{ $document->caption }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

    </main>
</div>
@endsection
