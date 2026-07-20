<header
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 20)"
    :class="scrolled ? 'shadow-md bg-earth-50/95' : 'shadow-none bg-earth-50/80'"
    class="sticky top-0 z-50 backdrop-blur-sm border-b border-brand-200 transition-all duration-300"
>
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-24">

            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/Bplogo.png') }}" alt="Yayasan Butta Porea Indonesia" class="h-14 w-auto">
                <div class="leading-tight">
                    <p class="font-bold text-brand-800 text-sm sm:text-base">Yayasan Butta Porea</p>
                    <p class="text-xs text-brand-600">Indonesia</p>
                </div>
                <div class="hidden sm:block w-px h-10 bg-brand-300 mx-1"></div>
                <img src="{{ asset('images/tanami-removebg-preview.png') }}" alt="Tanami Tanata Urban Farming Movement" class="hidden sm:block h-12 w-auto rounded-full">
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="relative text-sm font-medium text-brand-700 hover:text-brand-900 transition group {{ request()->routeIs('home') ? 'text-brand-900 font-semibold' : '' }}">
                    {{ __('site.nav_home') }}
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('home') ? 'w-full' : '' }}"></span>
                </a>
                <a href="{{ route('programs.index') }}" class="relative text-sm font-medium text-brand-700 hover:text-brand-900 transition group {{ request()->routeIs('programs.*') ? 'text-brand-900 font-semibold' : '' }}">
                    {{ __('site.nav_programs') }}
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('programs.*') ? 'w-full' : '' }}"></span>
                </a>
                <a href="{{ route('articles.index') }}" class="relative text-sm font-medium text-brand-700 hover:text-brand-900 transition group {{ request()->routeIs('articles.*') ? 'text-brand-900 font-semibold' : '' }}">
                    {{ __('site.nav_articles') }}
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('articles.*') ? 'w-full' : '' }}"></span>
                </a>
                <a href="{{ route('materials.index') }}" class="relative text-sm font-medium text-brand-700 hover:text-brand-900 transition group {{ request()->routeIs('materials.*') ? 'text-brand-900 font-semibold' : '' }}">
                    {{ __('site.nav_materials') }}
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('materials.*') ? 'w-full' : '' }}"></span>
                </a>
                <a href="{{ route('about') }}" class="relative text-sm font-medium text-brand-700 hover:text-brand-900 transition group {{ request()->routeIs('about') ? 'text-brand-900 font-semibold' : '' }}">
                    {{ __('site.nav_about') }}
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('about') ? 'w-full' : '' }}"></span>
                </a>
                 <a href="{{ route('galleries.index') }}" class="relative text-sm font-medium text-brand-700 hover:text-brand-900 transition group {{ request()->routeIs('galleries.*') ? 'text-brand-900 font-semibold' : '' }}">
                    {{ __('site.section_gallery_label') }}
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('galleries.*') ? 'w-full' : '' }}"></span>
                </a>

                <div class="flex items-center gap-1 border border-brand-300 rounded-full p-1">
                    <a href="{{ route('lang.switch', 'id') }}" class="px-2.5 py-1 text-xs font-semibold rounded-full transition {{ app()->getLocale() === 'id' ? 'bg-brand-600 text-white' : 'text-brand-600' }}">ID</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-2.5 py-1 text-xs font-semibold rounded-full transition {{ app()->getLocale() === 'en' ? 'bg-brand-600 text-white' : 'text-brand-600' }}">EN</a>
                </div>

                <a href="{{ route('contact.index') }}" class="px-5 py-2.5 bg-brand-600 text-white text-sm font-semibold rounded-full hover:bg-brand-700 hover:shadow-lg hover:shadow-brand-600/30 hover:-translate-y-0.5 transition-all duration-300">
                    {{ __('site.nav_donate') }}
                </a>
            </div>

            <button @click="open = !open" class="md:hidden text-brand-800">
                <svg x-show="!open" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div x-show="open" x-transition x-cloak class="md:hidden pb-4 flex flex-col gap-3">
            <a href="{{ route('home') }}" class="text-sm font-medium text-brand-700">{{ __('site.nav_home') }}</a>
            <a href="{{ route('programs.index') }}" class="text-sm font-medium text-brand-700">{{ __('site.nav_programs') }}</a>
            <a href="{{ route('articles.index') }}" class="text-sm font-medium text-brand-700">{{ __('site.nav_articles') }}</a>
            <a href="{{ route('materials.index') }}" class="text-sm font-medium text-brand-700">{{ __('site.nav_materials') }}</a>
            <a href="{{ route('about') }}" class="text-sm font-medium text-brand-700">{{ __('site.nav_about') }}</a>
             <a href="{{ route('galleries.index') }}" class="text-sm font-medium text-brand-700">{{ __('site.section_gallery_label') }}</a>

            <div class="flex items-center gap-1 border border-brand-300 rounded-full p-1 w-fit">
                <a href="{{ route('lang.switch', 'id') }}" class="px-3 py-1 text-xs font-semibold rounded-full transition {{ app()->getLocale() === 'id' ? 'bg-brand-600 text-white' : 'text-brand-600' }}">ID</a>
                <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1 text-xs font-semibold rounded-full transition {{ app()->getLocale() === 'en' ? 'bg-brand-600 text-white' : 'text-brand-600' }}">EN</a>
            </div>

            <a href="{{ route('contact.index') }}" class="px-5 py-2.5 bg-brand-600 text-white text-sm font-semibold rounded-full text-center">{{ __('site.nav_donate') }}</a>
        </div>
    </nav>
</header>