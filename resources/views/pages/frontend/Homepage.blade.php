<x-frontend-layout>
    <section class="swiper " id="homepageSlider">
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

    <section class="mt-8">
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
                <svg class="transition-transform duration-300 ease-in-out animate-swing" width="15px" height="10px"
                    viewBox="0 0 13 10">
                    <path d="M1,5 L11,5" class="stroke-blue-500"></path>
                    <polyline points="8 1 12 5 8 9" class="stroke-blue-500"></polyline>
                </svg>
            </a>
        </div>

        {{-- Mobile Layout (Swiper) --}}
        <div class="md:hidden">
            <div class="swiper mt-4" id="wisataTerbaikSlider">
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

                    <!-- Card terakhir: Lihat Semua Tour -->
                    <a href="#" class="swiper-slide overflow-visible">
                        <div
                            class="relative hover:scale-105 transition-all duration-300 ease-in-out bg-blue-500 text-white rounded-lg h-full flex items-center justify-center">
                            <span class="text-lg font-bold">Lihat Semua Tour</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- Desktop Layout (Grid) --}}
        <div class="hidden md:grid grid-cols-4 gap-6 mt-4">
            @for ($i = 0; $i < 8; $i++)
                <a href="#" class="overflow-visible">
                    <div class="relative hover:scale-105 transition-all duration-300 ease-in-out">
                        <!-- H1 di pojok kiri atas -->
                        <h1 class="absolute top-2 left-2 text-white font-bold bg-black bg-opacity-50 px-2 py-1 rounded">
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
    </section>




    <section class="w-full flex flex-col justify-center items-center mt-8 md:flex-row">
        <!-- Gambar (Elemen Kiri) -->
        <div class="w-full md:w-2/5">
            <div
                class="bg-yellow-400 h-64 w-full -mx-4 rounded-r-full overflow-visible flex justify-center items-center">
                <div>
                    <img src="{{ asset('images/girl-sparcle.webp') }}" alt="Girl Sparkle"
                        class="w-80 h-auto object-cover rounded-lg" />
                </div>
            </div>
        </div>

        <!-- Teks (Elemen Kanan) -->
        <div class="w-full md:w-3/5 flex flex-col justify-center gap-6 md:text-left md:gap-8">
            <div>
                <p class="text-pink-500 font-semibold">KAKA TOUR</p>
                <h1 class="text-2xl font-bold">Solusi Kebutuhan Wisata Anda!</h1>
                <p class="text-xs text-slate-500">Kami siap memenuhi segala kebutuhan wisata Anda dengan layanan terbaik
                    untuk pengalaman liburan yang tak terlupakan.</p>
            </div>
            <div class="w-full md:w-3/4">
                <div class="grid grid-cols-2 gap-4 text-center">
                    <div class="border border-pink-700 p-2 rounded-lg  w-full">
                        <h1 class="font-bold text-xl text-slate-800">700+</h1>
                        <p class="text-sm">Destinasi Wisata</p>
                    </div>
                    <div class="border border-pink-700 p-2 rounded-lg w-full">
                        <h1 class="font-bold text-xl text-slate-800">2K+</h1>
                        <p class="text-sm">Happy Customers</p>
                    </div>
                    <div class="border border-pink-700 p-2 rounded-lg w-full">
                        <h1 class="font-bold text-xl text-slate-800">500+</h1>
                        <p class="text-sm">Paket Liburan</p>
                    </div>
                    <div class="border border-pink-700 p-2 rounded-lg w-full">
                        <h1 class="font-bold text-xl text-slate-800">100</h1>
                        <p class="text-sm">Luxury Hotel</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block md:hidden mt-12">
        <div class="flex flex-col">
            <!-- Teks -->
            <div class="md:w-1/2">
                <p class="text-pink-500 font-semibold">FITUR UTAMA</p>
                <h1 class="text-2xl font-bold">Tawaran Yang Kami Berikan</h1>
            </div>

            <div class="mt-8" x-data="{
                openModal: false,
                selectedPackage: null,
                packages: [
                    { name: 'Paket Liburan Custom 1', description: 'Deskripsi untuk Paket 1' },
                    { name: 'Paket Liburan Custom 2', description: 'Deskripsi untuk Paket 2' },
                    { name: 'Paket Liburan Custom 3', description: 'Deskripsi untuk Paket 3' },
                    { name: 'Paket Liburan Custom 4', description: 'Deskripsi untuk Paket 4' },
                    { name: 'Paket Liburan Custom 5', description: 'Deskripsi untuk Paket 5' },
                    { name: 'Paket Liburan Custom 6', description: 'Deskripsi untuk Paket 6' }
                ],
                colors: ['bg-red-200', 'bg-green-200', 'bg-blue-200', 'bg-yellow-200', 'bg-purple-200', 'bg-pink-200']
            }">
                <!-- Grid Paket Liburan -->
                <div class="grid grid-cols-2 md:grid-cols-2 gap-4 text-center mt-6 ">
                    <template x-for="(pkg, index) in packages" :key="index">
                        <div @click="selectedPackage = pkg; openModal = true"
                            :class="colors[index % colors.length] + ' cursor-pointer w-full p-4 rounded-lg'">
                            <h1 class="font-bold text-lg text-slate-700" x-text="pkg.name"></h1>
                        </div>
                    </template>
                </div>

                <!-- Modal -->
                <div x-show="openModal"
                    class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50 transition-opacity duration-300 ease-in-out"
                    x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    @click="openModal = false" x-cloak>

                    <!-- Bagian Modal Putih -->
                    <div class="bg-white rounded-lg shadow-lg w-full p-6 relative transition-transform transform scale-75 duration-300 ease-in-out"
                        x-transition:enter="scale-75" x-transition:enter-end="scale-100"
                        x-transition:leave="scale-100" x-transition:leave-end="scale-75" @click.stop>
                        <!-- Ini akan mencegah penutupan modal saat klik di bagian dalam modal -->

                        <!-- Tombol Close (X) di pojok kanan atas -->
                        <button @click="openModal = false"
                            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <!-- Isi Modal -->
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold" x-text="selectedPackage?.name"></h2>
                        </div>
                        <div class="mt-4">
                            <p x-text="selectedPackage?.description"></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hidden md:block mt-12">
        <div class="flex flex-col ">
            <!-- Teks -->
            <div class="md:w-1/2">
                <p class="text-pink-500 font-semibold">FITUR UTAMA</p>
                <h1 class="text-2xl font-bold">Tawaran Yang Kami Berikan</h1>
            </div>
            <div class="mt-8" x-data="{
                cards: [{
                        title: 'Paket Liburan Custom',
                        description: 'Sesuaikan itinerary sesuai preferensi dan kebutuhan Anda untuk pengalaman yang benar-benar personal',
                        bg: 'bg-slate-200',
                        iconBg: 'bg-red-500'
                    },
                    {
                        title: 'Pemandu Wisata Berpengalaman',
                        description: 'Nikmati tur dengan pemandu lokal yang berpengetahuan untuk pengalaman mendalam dan autentik ',
                        bg: 'bg-yellow-200',
                        iconBg: 'bg-red-500'
                    },
                    {
                        title: 'Layanan Concierge 24/7',
                        description: 'Dukungan penuh selama perjalanan untuk memastikan setiap detail diurus dengan baik',
                        bg: 'bg-blue-200',
                        iconBg: 'bg-red-500'
                    },
                    {
                        title: 'Pengalaman Kuliner Unik',
                        description: 'Nikmati kesempatan untuk mencicipi hidangan khas dan pengalaman kuliner eksklusif di destinasi pilihan',
                        bg: 'bg-pink-200',
                        iconBg: 'bg-red-500'
                    },
                    {
                        title: 'Transportasi dan Akomodasi Premium',
                        description: 'Pilih dari opsi transportasi dan akomodasi bintang lima untuk kenyamanan maksimal',
                        bg: 'bg-green-200',
                        iconBg: 'bg-red-500'
                    },
                    {
                        title: 'Garansi Kepuasan atau Uang Kembali',
                        description: 'Kami menjamin kepuasan Anda dengan jaminan uang kembali jika layanan tidak memenuhi standar yang dijanjikan',
                        bg: 'bg-violet-200',
                        iconBg: 'bg-red-500'
                    },
                ]
            }">
                <div class="grid grid-cols-2 gap-4 ">
                    <!-- Looping Cards -->
                    <template x-for="card in cards" :key="card.title">
                        <div
                            :class="`${card.bg} text-slate-800 p-4 rounded-lg flex gap-4 items-center hover:scale-105 transition-all duration-300 ease-in-out`">
                            <!-- Icon Section -->
                            <div :class="`${card.iconBg} p-4 rounded-lg`">
                                <x-icons.icon type="gift" width="48" height="48" fill="#fff" />
                            </div>
                            <!-- Content Section -->
                            <div>
                                <h1 class="font-bold" x-text="card.title"></h1>
                                <p class="text-xs text-slate-600" x-text="card.description"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-8">
        <div class="md:w-1/2 mb-4">
            <p class="text-pink-500 font-semibold">TESTIMONI</p>
            <h1 class="text-2xl font-bold">Apa Kata Mereka?</h1>
        </div>

        <!-- Swiper Slider untuk Testimoni -->
        <div class="swiper testimonialSwiper" id="testimonialSwiper">
            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <div class="swiper-slide flex flex-col items-center text-center">
                    <div class="w-full flex justify-center">
                        <img src="{{ asset('images/testimonials/profile1.jpg') }}" alt="Profile 1"
                            class="w-16 h-16 rounded-full object-cover mb-4">
                    </div>
                    <h2 class="font-semibold text-lg">John Doe</h2>
                    <div class="flex items-center justify-center mt-2 mb-4 text-yellow-500">
                        <span>★★★★★</span>
                    </div>
                    <p class="text-gray-500 italic">"Layanan sangat baik dan pengalaman wisata yang luar biasa!"
                    </p>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide flex flex-col items-center text-center">
                    <div class="w-full flex justify-center">
                        <img src="{{ asset('images/testimonials/profile2.jpg') }}" alt="Profile 2"
                            class="w-16 h-16 rounded-full object-cover mb-4">
                    </div>
                    <h2 class="font-semibold text-lg">Jane Smith</h2>
                    <div class="flex items-center justify-center mt-2 mb-4 text-yellow-500">
                        <span>★★★★☆</span>
                    </div>
                    <p class="text-gray-500 italic">"Sangat puas dengan fasilitas dan pelayanan tur ini!"</p>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide flex flex-col items-center text-center">
                    <div class="w-full flex justify-center">
                        <img src="{{ asset('images/testimonials/profile3.jpg') }}" alt="Profile 3"
                            class="w-16 h-16 rounded-full object-cover mb-4">
                    </div>
                    <h2 class="font-semibold text-lg">Sarah Lee</h2>
                    <div class="flex items-center justify-center mt-2 mb-4 text-yellow-500">
                        <span>★★★★★</span>
                    </div>
                    <p class="text-gray-500 italic">"Pengalaman yang tidak akan terlupakan!"</p>
                </div>

            </div>

            <!-- Navigation -->

            <div class="testimonial-swiper-button-next">
                <ion-icon name="chevron-back-outline" class="text-lg"></ion-icon>
            </div>
            <div class="testimonial-swiper-button-prev">
                <ion-icon name="chevron-forward-outline" class="text-lg"></ion-icon>
            </div>

        </div>
    </section>
    <section class="flex flex-col  mt-8 mx-0">
        <div class="bg-gradient-to-r from-[#EC4899] to-[#FDE047] p-4 rounded-lg text-white text-center">
            <h1 class="text-xl font-bold">
                Ingin tau lebih tentang kami?
            </h1>
            <p class="text-xs ">
                Segera hubungi kami dan akan kami bantu sepenuh hati
            </p>
            <a href="#" class="w-full flex justify-center">
                <div class="m-2 text-pink-500 bg-white p-2 rounded-lg w-[50%] font-bold">
                    Hubungi Kami
                </div>
            </a>

        </div>
    </section>

    @vite('resources/js/swiper/init/homepage.js')
</x-frontend-layout>
