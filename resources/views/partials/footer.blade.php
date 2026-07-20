<footer class="bg-brand-900 text-brand-100 mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid grid-cols-1 md:grid-cols-4 gap-10">

        <div class="md:col-span-2">
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ asset('images/tanami-removebg-preview.png') }}" alt="Yayasan Butta Porea Indonesia" class="h-16 w-auto">
                <p class="font-bold text-white text-lg">Yayasan Butta Porea Indonesia</p>
            </div>
            <p class="text-sm text-brand-300 max-w-md leading-relaxed mb-6">
                {{ __('site.footer_desc') }}
            </p>

            {{-- SOSIAL MEDIA --}}
            <div class="flex items-center gap-3">
                <a href="https://www.instagram.com/buttaporea/" target="_blank" rel="noopener" aria-label="Instagram" class="w-9 h-9 rounded-full bg-brand-800 hover:bg-brand-700 flex items-center justify-center transition">
                    <svg class="w-4 h-4 text-brand-200" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM12 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                </a>
                <a href="https://www.facebook.com/people/Yayasan-Butta-Porea-Indonesia/61582095270107/" target="_blank" rel="noopener" aria-label="Facebook" class="w-9 h-9 rounded-full bg-brand-800 hover:bg-brand-700 flex items-center justify-center transition">
                    <svg class="w-4 h-4 text-brand-200" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.891h-2.33v6.987C18.343 21.128 22 16.991 22 12z"/></svg>
                </a>
                <a href="https://www.youtube.com/@ButtaPorea" target="_blank" rel="noopener" aria-label="YouTube" class="w-9 h-9 rounded-full bg-brand-800 hover:bg-brand-700 flex items-center justify-center transition">
                    <svg class="w-4 h-4 text-brand-200" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
                <a href="#" target="_blank" rel="noopener" aria-label="WhatsApp" class="w-9 h-9 rounded-full bg-brand-800 hover:bg-brand-700 flex items-center justify-center transition">
                    <svg class="w-4 h-4 text-brand-200" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.523 0-10 4.477-10 10 0 1.766.462 3.49 1.34 5.008L2 22l5.13-1.345A9.96 9.96 0 0 0 12.04 22c5.523 0 10-4.477 10-10s-4.477-10-10-10zm5.83 14.29c-.246.694-1.43 1.324-1.976 1.372-.505.045-1.02.19-3.42-.816-2.897-1.207-4.72-4.11-4.86-4.302-.14-.192-1.155-1.638-1.155-3.126 0-1.488.752-2.212 1.017-2.51.264-.297.577-.372.77-.372.192 0 .385.002.552.01.177.008.415-.067.65.497.246.594.836 2.049.909 2.198.072.15.12.325.024.517-.096.192-.144.312-.288.48-.144.168-.303.375-.432.504-.144.144-.294.3-.126.588.168.288.744 1.23 1.598 1.992 1.098.978 2.024 1.28 2.313 1.424.288.144.456.12.624-.072.168-.192.72-.84.912-1.128.192-.288.384-.24.648-.144.264.096 1.68.792 1.968.936.288.144.48.216.552.336.072.12.072.696-.174 1.39z"/></svg>
                </a>
            </div>
        </div>

        <div>
            <p class="font-semibold text-white mb-4">{{ __('site.footer_links_title') }}</p>
            <ul class="space-y-2 text-sm text-brand-300">
                <li><a href="{{ route('programs.index') }}" class="hover:text-white transition">{{ __('site.footer_link_programs') }}</a></li>
                <li><a href="{{ route('articles.index') }}" class="hover:text-white transition">{{ __('site.footer_link_articles') }}</a></li>
                <li><a href="{{ route('materials.index') }}" class="hover:text-white transition">{{ __('site.footer_link_materials') }}</a></li>
                <li><a href="{{ route('galleries.index') }}" class="hover:text-white transition">{{ __('site.footer_link_gallery') }}</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-white transition">{{ __('site.footer_link_about') }}</a></li>
            </ul>
        </div>

        <div>
            <p class="font-semibold text-white mb-4">{{ __('site.footer_contact_title') }}</p>
            <ul class="space-y-2 text-sm text-brand-300">
                <li><a href="mailto:buttaporeaindonesia@gmail.com" class="hover:text-white transition">📩: buttaporeaindonesia@gmail.com</a></li>
                
            </ul>
            <p class="font-semibold text-white mt-6 mb-2 text-sm">{{ __('site.footer_address_title') }}</p>
            <p class="text-sm text-brand-300 leading-relaxed">{{ __('site.footer_address') }}</p>
        </div>

    </div>

    <div class="border-t border-brand-800">
        <p class="text-center text-xs text-brand-400 py-6">
            &copy; {{ date('Y') }} Yayasan Butta Porea Indonesia. {{ __('site.footer_copyright') }}
        </p>
    </div>
</footer>