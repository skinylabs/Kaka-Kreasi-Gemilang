<x-information-layout :tour="$tour">
    <section class="flex flex-col gap-6">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-slate-800">
                {{ $tour->name }}
            </h2>
            <p class="font-bold text-slate-600">
                {{ $tour->client }}
            </p>
        </div>

        <section class="swiper max-w-full" id="informationSlider">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @forelse ($tourImages as $i)
                    <!-- Slides -->
                    <div class="swiper-slide w-full overflow-hidden">
                        <img src="{{ asset('storage/' . $i->image_path) }}" alt="Tour Image"
                            class="h-36 w-full object-cover object-center rounded-lg md:h-72 lg:h-96" />
                    </div>
                @empty
                    <!-- Default Slide if no images are available -->
                    <div class="swiper-slide w-full overflow-hidden">
                        <img src="{{ asset('images/default-image.webp') }}" alt="Default Image"
                            class="h-36 w-full object-cover object-center rounded-lg md:h-72 lg:h-96" />
                    </div>
                @endforelse
            </div>
            <!-- Custom Navigation Buttons -->
            <div class="homepage-swiper-button-prev homepage-navigation-prev">
                <ion-icon name="chevron-back-outline" class="text-lg"></ion-icon>
            </div>
            <div class="homepage-swiper-button-next homepage-navigation-next">
                <ion-icon name="chevron-forward-outline" class="text-lg"></ion-icon>
            </div>
        </section>


        <div class="grid grid-cols-2 gap-4 ">
            <a href="{{ route('transportation', ['slug' => $tour->slug]) }}"
                class="block relative w-full h-32 overflow-hidden rounded-xl">
                <img src="{{ asset('images/barcode/bus.webp') }}" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <h1
                    class="absolute inset-0 flex items-center justify-center text-white font-bold text-xl uppercase text-center">
                    Transportasi
                </h1>
            </a>
            <a href="{{ route('rundown', ['slug' => $tour->slug]) }}"
                class="block relative w-full h-32 overflow-hidden rounded-xl">
                <img src="{{ asset('images/barcode/rundown.webp') }}" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <h1
                    class="absolute inset-0 flex items-center justify-center text-white font-bold text-xl uppercase text-center">
                    Rundown
                </h1>
            </a>
            <a href="{{ route('galleries', ['slug' => $tour->slug]) }}"
                class="block relative w-full h-32 overflow-hidden rounded-xl">
                <img src="{{ asset('images/barcode/rundown.webp') }}" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <h1
                    class="absolute inset-0 flex items-center justify-center text-white font-bold text-xl uppercase text-center">
                    Gallery
                </h1>
            </a>
            <a href="{{ route('tatatertib', ['slug' => $tour->slug]) }}"
                class="block relative w-full h-32 overflow-hidden rounded-xl">
                <img src="{{ asset('images/barcode/rundown.webp') }}" alt=""
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <h1
                    class="absolute inset-0 flex items-center justify-center text-white font-bold text-xl uppercase text-center">
                    Tata Tertib
                </h1>
            </a>
        </div>
    </section>
    @vite('resources/js/swiper/init/information.js')
</x-information-layout>
