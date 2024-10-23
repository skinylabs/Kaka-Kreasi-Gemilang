<x-frontend-layout>
    <x-ui.headingBanner title="Tour & Travel" image="images/carousel/bali2.webp" />
    <section>
        <div>
            <h1>Paling Sering Dikunjungi</h1>
        </div>

        <div class="mt-8">
            <div class="w-full flex justify-between items-center">
                <div>
                    <p class="text-pink-500 font-semibold">WISATA TERBAIK</p>
                    <h1 class="text-2xl font-bold">Mulai Perjalanan Anda</h1>
                </div>

                <!-- Tombol untuk Mobile -->
                <a href="#" class="md:hidden mx-2 overflow-hidden bg-transparent border-0">
                    <ion-icon name="arrow-forward-outline"
                        class="transition-transform duration-300 ease-in-out animate-swing text-blue-500 w-8 h-8 animate-arrow"></ion-icon>
                </a>

                <!-- Tombol untuk Tablet dan Desktop -->
                <a href="#" class="seeMoreButton hidden md:flex items-center relative overflow-hidden">
                    <span class="mr-2">Lihat Selengkapnya</span>
                    <svg class="transition-transform duration-300 ease-in-out animate-swing" width="15px"
                        height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5" class="stroke-blue-500"></path>
                        <polyline points="8 1 12 5 8 9" class="stroke-blue-500"></polyline>
                    </svg>
                </a>
            </div>

            {{-- Mobile Layout (Swiper) --}}
            <div class="md:hidden">
                <div class="swiper mt-4" id="tourPopular">
                    <div class="swiper-wrapper">
                        @for ($i = 0; $i < 10; $i++)
                            <a href="#" class="swiper-slide overflow-visible">
                                <div class="relative hover:scale-105 transition-all duration-300 ease-in-out">
                                    <!-- H1 di pojok kiri atas -->
                                    <h1
                                        class="absolute top-2 left-2 text-white font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                        Bali
                                    </h1>
                                    <img src="{{ asset('images/carousel/bali1.webp') }}" alt="Image {{ $i + 1 }}"
                                        class="rounded-lg w-full h-auto" />
                                    <!-- Rating di pojok kanan bawah -->
                                    <div
                                        class="absolute bottom-2 right-2 text-yellow-500 font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                        ★★★★★
                                    </div>
                                </div>
                            </a>
                        @endfor

                        {{-- <!-- Card terakhir: Lihat Semua Tour -->
                        <a href="#" class="swiper-slide overflow-visible">
                            <div
                                class="relative hover:scale-105 transition-all duration-300 ease-in-out bg-blue-500 text-white rounded-lg h-full flex items-center justify-center">
                                <span class="text-lg font-bold">Lihat Semua Tour</span>
                            </div>
                        </a> --}}
                    </div>
                </div>
            </div>

            {{-- Desktop Layout (Grid) --}}
            <div class="hidden md:grid grid-cols-4 gap-6 mt-4">
                @for ($i = 0; $i < 8; $i++)
                    <a href="#" class="overflow-visible">
                        <div class="relative hover:scale-105 transition-all duration-300 ease-in-out">
                            <!-- H1 di pojok kiri atas -->
                            <h1
                                class="absolute top-2 left-2 text-white font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                Bali
                            </h1>
                            <img src="{{ asset('images/carousel/bali1.webp') }}" alt="Image {{ $i + 1 }}"
                                class="rounded-lg w-full h-auto" />
                            <!-- Rating di pojok kanan bawah -->
                            <div
                                class="absolute bottom-2 right-2 text-yellow-500 font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                ★★★★★
                            </div>
                        </div>
                    </a>
                @endfor
            </div>
        </div>
    </section>
    <section>
        <div class="mt-8">
            <div class="w-full flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">Semua Tempat</h1>
                    <p class="text-pink-500 font-semibold">487 Tour Tersedia</p>
                </div>
                {{-- <!-- Tombol untuk Mobile -->
                <a href="#" class="md:hidden mx-2 overflow-hidden bg-transparent border-0">
                    <ion-icon name="arrow-forward-outline"
                        class="transition-transform duration-300 ease-in-out animate-swing text-blue-500 w-8 h-8 animate-arrow"></ion-icon>
                </a>

                <!-- Tombol untuk Tablet dan Desktop -->
                <a href="#" class="seeMoreButton hidden md:flex items-center relative overflow-hidden">
                    <span class="mr-2">Lihat Selengkapnya</span>
                    <svg class="transition-transform duration-300 ease-in-out animate-swing" width="15px"
                        height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5" class="stroke-blue-500"></path>
                        <polyline points="8 1 12 5 8 9" class="stroke-blue-500"></polyline>
                    </svg>
                </a> --}}
            </div>



            {{-- Desktop Layout (Grid) --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-4">
                @for ($i = 0; $i < 50; $i++)
                    <a href="#" class="overflow-visible">
                        <div class="relative hover:scale-105 transition-all duration-300 ease-in-out">
                            <!-- H1 di pojok kiri atas -->
                            <h1
                                class="absolute top-2 left-2 text-white font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                Bali
                            </h1>
                            <img src="{{ asset('images/carousel/bali1.webp') }}" alt="Image {{ $i + 1 }}"
                                class="rounded-lg w-full h-auto" />
                            <!-- Rating di pojok kanan bawah -->
                            <div
                                class="absolute bottom-2 right-2 text-yellow-500 font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
                                ★★★★★
                            </div>
                        </div>
                    </a>
                @endfor
            </div>
        </div>
    </section>

    @vite('resources/js/swiper/init/tour.js')
</x-frontend-layout>
