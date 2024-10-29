<x-frontend-layout>
    <x-ui.headingBanner title="Gallery Kaka" image="images/carousel/bali2.webp" />
    <section>
        <!-- Menampilkan daftar galeri -->
        <div class="grid grid-cols-2 gap-2 mt-6">
            @foreach ($galleries as $g)
                @if ($g->images->isNotEmpty())
                    @foreach ($g->images as $image)
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $g->title }}"
                                class="w-full h-auto object-cover rounded-lg">
                        </div>
                    @endforeach
                @else
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('placeholder-image.jpg') }}" alt="No Image" class="w-full h-48 object-cover">
                    </div>
                @endif
            @endforeach
        </div>
    </section>
</x-frontend-layout>
