<section class="relative h-56 md:h-72 text-white" style="background-color:#00499c">
    <div class="relative h-full flex flex-col justify-center">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- breadcrumb --}}
            <p class="text-xs mb-2" style="color:#cfe4ff">
                {{ $breadcrumb ?? 'Home' }}
            </p>

            {{-- judul besar --}}
            <h1 class="text-3xl md:text-4xl font-bold tracking-wide">
                {{ $title ?? 'Halaman' }}
            </h1>

            {{-- garis aksen --}}
            <div class="mt-3 h-1 w-24 rounded-full" style="background-color:#0098d9"></div>

        </div>
    </div>
</section>
