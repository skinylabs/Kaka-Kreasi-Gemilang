<x-frontend-layout>
    <section>
        <div class="relative w-screen h-32 -mx-4 flex justify-center items-center overflow-hidden md:h-64">
            <!-- Overlay hitam tipis di atas gambar -->
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <!-- H1 di tengah-tengah gambar -->
            <h1 class="absolute text-white text-3xl font-bold z-10">Tour & Travel</h1>
            <!-- Gambar -->
            <img src="{{ asset('images/carousel/bali2.webp') }}" alt="Tentang Kaka" class="w-full h-full object-cover">
        </div>
    </section>

</x-frontend-layout>
