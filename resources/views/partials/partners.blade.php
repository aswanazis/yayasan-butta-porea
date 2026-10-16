@php
    $groups = [
        ['label' => __('site.partners_kemitraan_title'), 'items' => $partners->where('type', 'kemitraan')],
        ['label' => __('site.partners_pendukung_title'), 'items' => $partners->where('type', 'pendukung')],
    ];
@endphp

<style>
    .bp-partner-title { font-family: 'Source Serif 4', Georgia, serif; font-size: 28px; font-weight: 600; line-height: 1.25; color: #1a1c18; text-align: center; margin: 0 0 28px; }
    .bp-partner-grid { display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; margin-bottom: 48px; }
    .bp-partner-card { flex: 0 0 calc((100% - 20px) / 2); height: 132px; padding: 14px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border-radius: 16px; background: #fff; border: 1px solid #e2e3dc; box-shadow: 0 1px 2px rgba(0,0,0,.06); text-decoration: none; transition: transform .3s ease, box-shadow .3s ease; }
    .bp-partner-card:hover { transform: translateY(-4px); box-shadow: 0 10px 24px rgba(0,0,0,.12); }
    .bp-partner-card img { max-width: 88%; max-height: 100%; width: auto; height: auto; object-fit: contain; transition: transform .3s ease; }
    .bp-partner-card:hover img { transform: scale(1.06); }
    .bp-partner-card span { text-align: center; font-weight: 600; font-size: 14px; line-height: 1.3; color: #44483d; }
    @media (min-width: 640px) { .bp-partner-card { flex-basis: calc((100% - 40px) / 3); } }
    @media (min-width: 1024px) { .bp-partner-card { flex-basis: calc((100% - 60px) / 4); height: 148px; } }
</style>

@if($partners->isNotEmpty())
<section style="max-width: 1200px; margin: 0 auto; padding: 40px 24px 0;">
    @foreach($groups as $group)
        @if($group['items']->isNotEmpty())
            <h2 class="bp-partner-title reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">{{ $group['label'] }}</h2>

            <div class="bp-partner-grid reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
                @foreach($group['items'] as $partner)
                    @php $tag = $partner->url ? 'a' : 'div'; @endphp
                    <{{ $tag }} class="bp-partner-card" title="{{ $partner->name }}" @if($partner->url) href="{{ $partner->url }}" target="_blank" rel="noopener" @endif>
                        @if($partner->logo)
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" loading="lazy">
                        @else
                            <span>{{ $partner->name }}</span>
                        @endif
                    </{{ $tag }}>
                @endforeach
            </div>
        @endif
    @endforeach
</section>
@endif