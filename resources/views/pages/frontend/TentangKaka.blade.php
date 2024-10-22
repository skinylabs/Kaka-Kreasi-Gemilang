<x-frontend-layout>
    <section>
        <div class="relative w-screen h-32 -mx-4 flex justify-center items-center overflow-hidden md:h-64">
            <!-- Overlay hitam tipis di atas gambar -->
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <!-- H1 di tengah-tengah gambar -->
            <h1 class="absolute text-white text-3xl font-bold z-10">Tentang Kaka</h1>
            <!-- Gambar -->
            <img src="{{ asset('images/carousel/bali2.webp') }}" alt="Tentang Kaka" class="w-full h-full object-cover">
        </div>
    </section>
    <section class="mt-4 flex flex-col gap-4">
        <h1 class="text-justify">
            <b>PT. Kakakreasigemilang</b> adalah perusahaan yang bergerak di bidang tour and
            travel,
            menyediakan layanan
            perjalanan berkualitas bagi wisatawan domestik dan internasional. Dengan komitmen untuk memberikan liburan
            yang nyaman, aman, dan tak terlupakan, perusahaan ini menawarkan berbagai paket wisata menarik serta layanan
            perjalanan kustom. Dukungan penuh selama perjalanan juga disediakan untuk memastikan pengalaman liburan
            berjalan dengan lancar dari awal hingga akhir.
        </h1>
        <div>
            <div>
                <h1 class="text-2xl pl-2 my-2 border-l-4  font-sans font-bold border-blue-400 ">
                    Visi</h1>
                <p class="pl-4 text-justify">
                    Menjadi perusahaan tour and travel terkemuka yang dikenal karena memberikan pengalaman perjalanan
                    terbaik dan layanan berkualitas tinggi bagi wisatawan di seluruh dunia.
                </p>
            </div>
            <div>
                <h1 class="text-2xl pl-2 my-2 border-l-4  font-sans font-bold border-blue-400 ">
                    Misi</h1>
                <ol class="list-decimal mx-4">
                    <li class="text-justify">Menyediakan layanan perjalanan yang nyaman, aman, dan berkualitas dengan
                        mengutamakan kepuasan
                        pelanggan.</li>
                    <li class="text-justify">Mengembangkan paket wisata inovatif dan fleksibel yang sesuai dengan
                        kebutuhan dan preferensi
                        pelanggan.</li>
                    <li class="text-justify">Memberikan dukungan penuh dan profesional selama perjalanan untuk
                        memastikan pengalaman liburan
                        yang menyenangkan dan tak terlupakan.</li>
                    <li class="text-justify">Membangun hubungan jangka panjang dengan mitra dan pelanggan melalui
                        pelayanan yang unggul dan
                        berkelanjutan.</li>
                    <li class="text-justify">Berkontribusi pada perkembangan industri pariwisata dengan menjunjung
                        tinggi nilai-nilai etika
                        dan tanggung jawab sosial.</li>
                </ol>
            </div>
        </div>
    </section>
</x-frontend-layout>
