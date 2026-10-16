@php
    $videoId = 'wu7nms7a2rk';
    $isEn = app()->getLocale() === 'en';
@endphp

<section class="py-stack-lg max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
    <div class="text-center max-w-2xl mx-auto mb-stack-md reveal" x-data="{ show: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
        <h2 class="font-headline-md text-headline-md text-on-surface mb-4">{{ $isEn ? 'Get to Know Our Foundation' : 'Kenali Yayasan Kami' }}</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant">{{ $isEn ? 'Watch the profile video of Yayasan Butta Porea Indonesia.' : 'Tonton video profil Yayasan Butta Porea Indonesia.' }}</p>
    </div>

    <div class="reveal" style="max-width: 56rem; margin: 0 auto;" x-data="{ show: false, play: false }" x-intersect.once="show = true" :class="show ? 'reveal-show' : ''">
        <div style="position: relative; aspect-ratio: 16 / 9; border-radius: 1rem; overflow: hidden; background: #000; box-shadow: 0 8px 24px rgba(0,0,0,.15);">
            <template x-if="!play">
                <button type="button" @click="play = true" aria-label="Putar video" style="position: absolute; inset: 0; width: 100%; height: 100%; border: 0; padding: 0; cursor: pointer; background: transparent;">
                    <img src="https://i.ytimg.com/vi/{{ $videoId }}/hqdefault.jpg" alt="Video profil Yayasan Butta Porea Indonesia" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                    <span style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,.25);">
                        <span style="width: 5rem; height: 5rem; border-radius: 9999px; background: #fff; display: flex; align-items: center; justify-content: center;">
                            <span class="material-symbols-outlined" style="font-size: 2.5rem; color: #1b4d1b; font-variation-settings: 'FILL' 1;">play_arrow</span>
                        </span>
                    </span>
                </button>
            </template>
            <template x-if="play">
                <iframe src="https://www.youtube-nocookie.com/embed/{{ $videoId }}?autoplay=1&rel=0" title="Video profil Yayasan Butta Porea Indonesia" style="position: absolute; inset: 0; width: 100%; height: 100%; border: 0;" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture; fullscreen" allowfullscreen></iframe>
            </template>
        </div>
    </div>
</section>