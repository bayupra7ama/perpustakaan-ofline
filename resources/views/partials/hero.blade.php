<section class="relative h-56 md:h-72 bg-amber-500">
    <div class="relative h-full flex flex-col justify-center">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- breadcrumb --}}
            <p class="text-xs text-amber-100 mb-2">
                {{ $breadcrumb ?? 'Home' }}
            </p>

            {{-- judul besar --}}
            <h1 class="text-3xl md:text-4xl font-bold text-white tracking-wide">
                {{ $title ?? 'Halaman' }}
            </h1>

            {{-- garis merah --}}
            <div class="mt-3 h-1 w-24 bg-red-600 rounded-full"></div>
        </div>
    </div>
</section>
