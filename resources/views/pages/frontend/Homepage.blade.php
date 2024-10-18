<x-frontend-layout>
    <section class="swiper ">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="{{ asset('images/carousel/bali1.webp') }}" alt="Image 1"
                    class="h-36 w-full object-cover object-center rounded-lg md:h-72 lg:h-96" />
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/carousel/bali2.webp') }}" alt="Image 2"
                    class="h-36 w-full object-cover object-center rounded-lg md:h-72 lg:h-96" />
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/carousel/bali3.webp') }}" alt="Image 3"
                    class="h-36 w-full object-cover object-center rounded-lg md:h-72 lg:h-96" />
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/carousel/bali4.webp') }}" alt="Image 4"
                    class="h-36 w-full object-cover object-center rounded-lg md:h-72 lg:h-96" />
            </div>

        </div>
        <!-- Custom Navigation Buttons -->
        <div class="homepage-swiper-button-prev homepage-navigation-prev">
            <ion-icon name="chevron-back-outline" class="text-lg"></ion-icon>
        </div>
        <div class="homepage-swiper-button-next homepage-navigation-next">
            <ion-icon name="chevron-forward-outline" class="text-lg"></ion-icon>
        </div>
    </section>

    <section class="mt-8 ">
        <div class="flex justify-between items-center">
            <div class="">
                <p class="text-pink-500 font-semibold">WISATA TERBAIK</p>
                <h1 class="text-2xl font-bold">Mulai Perjalanan Anda</h1>
            </div>
            <!-- Tombol untuk Mobile -->
            <button
                class="relative block w-14 h-14 mx-0 overflow-hidden outline-none bg-transparent cursor-pointer border-0 md:hidden">
                <div class="absolute top-0 left-0 flex animate-pulse">
                    <span class="block w-5 h-5 mx-4 mt-4 transform rotate-180 fill-blue-500 animate-arrow">
                        <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z">
                            </path>
                        </svg>
                    </span>
                </div>
            </button>

            <!-- Tombol untuk Tablet dan Desktop -->
            <button class="cta hidden md:block relative items-center">
                <span class="mr-2">Hover me</span>
                <svg class="transition-transform duration-300 ease-in-out" width="15px" height="10px"
                    viewBox="0 0 13 10">
                    <path d="M1,5 L11,5" class="stroke-blue-500"></path>
                    <polyline points="8 1 12 5 8 9" class="stroke-blue-500"></polyline>
                </svg>
            </button>

        </div>

        <div class="swiper mySwiper mt-4" id="productSwiper">
            <div class="swiper-wrapper">
                @for ($i = 0; $i < 10; $i++)
                    <div class="swiper-slide w-60 h-80 bg-gray-50 p-3 flex flex-col gap-1 rounded-2xl">
                        <div class="h-48 bg-gray-700 rounded-xl">
                            <img src="{{ asset('images/carousel/bali1.webp') }}" alt="Long Chair"
                                class="w-full h-full object-cover overflow-hidden rounded-lg">
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-row justify-between">
                                <div class="flex flex-col">
                                    <span class="text-xl font-bold">Long Chair</span>
                                    <p class="text-xs text-gray-700">ID: 23432252</p>
                                </div>
                                <span class="font-bold text-red-600">$25.99</span>
                            </div>
                            <button class="hover:bg-sky-700 text-gray-50 bg-sky-800 py-2 rounded-md">Add to
                                cart</button>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
    <section class="relative flex flex-col justify-center items-center mt-8">
        <!-- Gambar -->
        <div class="flex flex-col items-center justify-center gap-6 md:flex-row md:text-left md:gap-8">
            <!-- Teks -->
            <div class="md:w-1/2">
                <p class="text-pink-500 font-semibold">KAKA TOUR</p>
                <h1 class="text-2xl font-bold">Solusi Kebutuhan Wisata Anda!</h1>
                <p class="text-xs text-slate-500">Kami siap memenuhi segala kebutuhan wisata Anda dengan layanan terbaik
                    untuk
                    pengalaman
                    liburan yang tak terlupakan.</p>
            </div>
            <div class="flex justify-center items-center ">

                <div class="grid grid-cols-2 gap-4 text-center">
                    <div class="border border-gray-300 p-2 rounded-lg  w-full">
                        <h1>700+</h1>
                        <p class="text-sm">Destinasi Wisata</p>
                    </div>
                    <div class="border border-gray-300 p-2 rounded-lg w-full">
                        <h1>2K+</h1>
                        <p class="text-sm">Happy Customers</p>
                    </div>
                    <div class="border border-gray-300 p-2 rounded-lg w-full">
                        <h1>500+</h1>
                        <p class="text-sm">Paket Liburan</p>
                    </div>
                    <div class="border border-gray-300 p-2 rounded-lg w-full">
                        <h1>100</h1>
                        <p class="text-sm">Luxury Hotel</p>
                    </div>
                </div>
                <!-- Gambar -->
                <div class="">
                    <img src="{{ asset('images/girl-sparcle.webp') }}" alt="Girl Sparkle"
                        class="w-48 h-auto object-cover rounded-lg md:w-64" />
                </div>
            </div>

            <!-- Gambar -->
            <div class="md:w-1/2 hidden">
                <img src="{{ asset('images/girl-sparcle.webp') }}" alt="Girl Sparkle"
                    class="w-48 h-auto object-cover rounded-lg md:w-64" />
            </div>
        </div>

    </section>
    <section class="flex flex-col  mt-8">
        <!-- Teks -->
        <div class="md:w-1/2">
            <p class="text-pink-500 font-semibold">FITUR UTAMA</p>
            <h1 class="text-2xl font-bold">Tawaran Yang Kami Berikan</h1>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-2 gap-4 text-center">
            <div class="bg-slate-200 w-full p-4 rounded-lg">
                <h1 class="font-bold text-lg text-slate-700">Paket Liburan Custom</h1>
            </div>
            <div class="bg-yellow-200 w-full p-4 rounded-lg">
                <h1 class="font-bold text-lg text-slate-700">Paket Liburan Custom</h1>
            </div>
            <div class="bg-blue-200 w-full p-4 rounded-lg">
                <h1 class="font-bold text-lg text-slate-700">Paket Liburan Custom</h1>
            </div>
            <div class="bg-pink-200 w-full p-4 rounded-lg">
                <h1 class="font-bold text-lg text-slate-700">Paket Liburan Custom</h1>
            </div>
            <div class="bg-green-200 w-full p-4 rounded-lg">
                <h1 class="font-bold text-lg text-slate-700">Paket Liburan Custom</h1>
            </div>
            <div class="bg-purple-200 w-full p-4 rounded-lg">
                <h1 class="font-bold text-lg text-slate-700">Paket Liburan Custom</h1>
            </div>

        </div>
    </section>

    @vite('resources/js/swiper/init/homepage.js')
</x-frontend-layout>
