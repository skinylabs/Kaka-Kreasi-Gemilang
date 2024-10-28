<x-information-layout :tour="$tour">
    <section class="flex flex-col gap-6">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-slate-800">
                {{ $tour->name }}
            </h1>
            <p class="font-bold text-slate-600">
                {{ $tour->client }}
            </p>
        </div>

        <!-- Search Form -->
        <form action="{{ route('galleries', ['slug' => $tour->slug]) }}" method="GET" class="flex gap-1 mb-4">
            <select name="category" class="textInput" onchange="this.form.submit()">
                <option value="" {{ request('category') == '' ? 'selected' : '' }}>Semua Gambar</option>
                @foreach ($availableCategories as $category)
                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                        {{ ucfirst($category) }}
                    </option>
                @endforeach
            </select>
        </form>

        <!-- Gallery Section with Pinterest-style layout -->
        <div class="columns-2 md:columns-3 lg:columns-4 gap-4">
            @forelse ($tourImages as $image)
                <div class="break-inside-avoid mb-4 overflow-hidden rounded-lg shadow-lg cursor-pointer"
                    onclick="openSlider({{ $loop->index }})">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Tour Image"
                        class="w-full object-cover">
                </div>
            @empty
                <p class="text-center">Belum ada gambar tersedia untuk tour ini.</p>
            @endforelse
        </div>
    </section>

    <!-- Slider Modal -->
    <div id="slider-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 hidden"
        onclick="closeSlider(event)">
        <div class="swiper swiper-container" id="gallerySlider">
            <div class="swiper-wrapper">
                @foreach ($tourImages as $image)
                    <div class="swiper-slide flex items-center justify-center h-full">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Tour Image"
                            class="w-auto max-h-[80vh] object-contain">
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Custom Navigation Buttons -->
            <div class="gallery-navigation-prev">
                <ion-icon name="chevron-back-outline" class="text-lg"></ion-icon>
            </div>
            <div class="gallery-navigation-next">
                <ion-icon name="chevron-forward-outline" class="text-lg"></ion-icon>
            </div>
        </div>
        <button class="absolute top-5 right-5 text-white" onclick="closeSlider(event)">X</button>
    </div>

    <script>
        let gallerySwiper;

        function openSlider(initialIndex) {
            const sliderModal = document.getElementById('slider-modal');
            sliderModal.classList.remove('hidden');

            // Inisialisasi Swiper dan set slide aktif
            if (!gallerySwiper) {
                gallerySwiper = new Swiper('#gallerySlider', {
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.gallery-navigation-next',
                        prevEl: '.gallery-navigation-prev',
                    },
                    initialSlide: initialIndex, // Set slide awal
                });
            } else {
                gallerySwiper.slideTo(initialIndex); // Jika Swiper sudah ada, pindah ke slide yang dipilih
            }
        }

        function closeSlider(event) {
            // Cek jika yang di-klik adalah modal itu sendiri
            if (event.target.id === 'slider-modal' || event.target.tagName === 'BUTTON') {
                const sliderModal = document.getElementById('slider-modal');
                sliderModal.classList.add('hidden');
            }
        }
    </script>

    <style>
        #slider-modal {
            z-index: 1000;
        }

        .swiper-container {
            width: 80%;
            height: 80%;
        }

        .swiper-slide img {
            transition: transform 0.3s ease;
            height: 100%;
        }

        .swiper-slide img:hover {
            transform: scale(1.05);
            /* Zoom sedikit saat hover */
        }
    </style>

    @vite('resources/js/swiper/init/information.js')


</x-information-layout>
