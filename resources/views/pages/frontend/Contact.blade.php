<x-frontend-layout>
    <x-ui.headingBanner title="Hubungi Kami" image="images/carousel/bali2.webp" />

    <section class="mt-4 lg:mt-8">
        <div class="flex flex-col gap-8">
            <div class="grid lg:grid-cols-3 gap-2">
                @php
                    // Array warna yang akan digunakan untuk setiap item
                    $colors = ['bg-pink-500', 'bg-slate-800', 'bg-green-500', 'bg-yellow-500', 'bg-purple-500'];
                    $iconColors = [
                        'text-pink-500',
                        'text-slate-800',
                        'text-green-500',
                        'text-yellow-500',
                        'text-purple-500',
                    ];
                @endphp

                @foreach ($contact as $index => $c)
                    @if ($c->name !== 'Maps')
                        <a href="{{ $c->link }}" target="_blank"
                            class="hover:scale-105 transition-all duration-300 ease-in-out">
                            <div
                                class="w-full h-full flex items-center gap-4 {{ $colors[$index % count($colors)] }} rounded-lg p-2 md:p-4">
                                <div class="bg-white rounded-lg p-2">
                                    <x-icons.icon type="{{ $c->name }}"
                                        class="w-6 h-6 lg:w-12 lg:h-12 fill-current {{ $iconColors[$index % count($iconColors)] }}" />
                                </div>
                                <h1 class="text-white text-2xl font-semibold">{{ $c->name }}</h1>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>

            <div>
                <iframe src="{{ $contact->where('name', 'Maps')->first()->link ?? '' }}" style="border:0;"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="w-full lg:h-96 rounded-lg"></iframe>
            </div>
        </div>
    </section>
</x-frontend-layout>
