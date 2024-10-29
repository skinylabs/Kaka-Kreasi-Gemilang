<x-frontend-layout>
    <x-ui.headingBanner title="Tour & Travel" image="images/carousel/bali2.webp" />

    <!-- Section: Paling Sering Dikunjungi -->
    <section>
        <div class="mt-8">
            <div class="w-full flex justify-between items-center">
                <div>
                    <p class="text-pink-500 font-semibold">WISATA TERBAIK</p>
                    <h1 class="text-2xl font-bold">Mulai Perjalanan Anda</h1>
                </div>
            </div>

            {{-- Mobile Layout (Swiper) --}}
            <div class="md:hidden">
                <div class="swiper mt-4" id="tourPopular">
                    <div class="swiper-wrapper">
                        @foreach ($tours as $tour)
                            <a href="#" class="swiper-slide overflow-visible">
                                <div class="relative hover:scale-105 transition-all duration-300 ease-in-out">
                                    <!-- Nama Tour di pojok kiri atas -->
                                    <h1
                                        class="absolute top-2 left-2 text-white font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                        {{ $tour->name }}
                                    </h1>
                                    <!-- Gambar Tour -->
                                    @if ($tour->images->isNotEmpty())
                                        @foreach ($tour->images as $image)
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $tour->name }}"
                                                class="rounded-lg w-40 h-32 object-cover" />
                                            <!-- Set height dan width yang sama -->
                                        @endforeach
                                    @else
                                        <span>No Image</span>
                                    @endif
                                    <!-- Rating di pojok kanan bawah -->
                                    <div
                                        class="absolute bottom-2 right-2 text-yellow-500 font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                        ★ {{ $tour->rating }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Desktop Layout (Grid) --}}
            <div class="hidden md:grid grid-cols-4 gap-6 mt-4">
                @foreach ($tours as $tour)
                    <a href="#" class="overflow-visible">
                        <div class="relative hover:scale-105 transition-all duration-300 ease-in-out">
                            <!-- Nama Tour di pojok kiri atas -->
                            <h1
                                class="absolute top-2 left-2 text-white font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                {{ $tour->name }}
                            </h1>
                            <!-- Gambar Tour -->
                            <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->name }}"
                                class="rounded-lg w-40 h-32 object-cover" /> <!-- Set height dan width yang sama -->
                            <!-- Rating di pojok kanan bawah -->
                            <div
                                class="absolute bottom-2 right-2 text-yellow-500 font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                ★ {{ $tour->rating }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section: Semua Tempat -->
    <section>
        <div class="mt-8">
            <div class="w-full flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">Semua Tempat</h1>
                    <p class="text-pink-500 font-semibold">{{ $tours->count() }} Tour Tersedia</p>
                </div>
            </div>

            {{-- Grid Layout for Semua Tempat --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-4">
                @foreach ($tours as $tour)
                    <a href="#" class="overflow-visible">
                        <div class="relative hover:scale-105 transition-all duration-300 ease-in-out">
                            <!-- Nama Tour di pojok kiri atas -->
                            <h1
                                class="absolute top-2 left-2 text-white font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                {{ $tour->name }}
                            </h1>
                            <!-- Gambar Tour -->
                            @if ($tour->images->isNotEmpty())
                                @foreach ($tour->images as $image)
                                    <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $tour->name }}"
                                        class="rounded-lg w-40 h-32 object-cover" />
                                    <!-- Set height dan width yang sama -->
                                @endforeach
                            @else
                                <span>No Image</span>
                            @endif
                            <!-- Rating di pojok kanan bawah -->
                            <div
                                class="absolute bottom-2 right-2 text-yellow-500 font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                ★ {{ $tour->rating }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @vite('resources/js/swiper/init/tour.js')
</x-frontend-layout>
