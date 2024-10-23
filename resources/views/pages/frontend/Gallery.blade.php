<x-frontend-layout>
    <x-ui.headingBanner title="Gallery Kaka" image="images/carousel/bali2.webp" />
    <section>
        <!-- Menampilkan daftar galeri -->
        <div class="grid grid-cols-2 gap-4 mt-6">
            @foreach ($galleries as $g)
                <div class="">
                    @if ($g->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $g->images->first()->image_path) }}" alt="{{ $g->title }}"
                            class="w-full h-auto object-cover rounded-lg">
                    @else
                        <img src="{{ asset('placeholder-image.jpg') }}" alt="No Image" class="w-full h-48 object-cover">
                    @endif
                </div>
            @endforeach
        </div>
    </section>
</x-frontend-layout>
