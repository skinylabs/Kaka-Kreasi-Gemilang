<x-frontend-layout>
    <x-ui.headingBanner title="Hubungi Kami" image="images/header/contact-us.webp" />

    <section class="mt-4 lg:mt-8">
        <div class="flex flex-col gap-8">
            <div>
                <p class="text-pink-500 font-semibold">STALKING-IN</p>
                <h1 class="text-2xl font-bold">Sosial Media Kami</h1>
            </div>
            <div class="grid lg:grid-cols-4 gap-2">
                @php
                    // Array warna yang akan digunakan untuk setiap item
                    $colors = ['bg-green-500', 'bg-rose-500', 'bg-slate-800', 'bg-blue-500', 'bg-purple-500'];
                    $iconColors = [
                        'text-green-500',
                        'text-rose-500',
                        'text-slate-800',
                        'text-blue-500',
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
                <p class="text-pink-500 font-semibold">KUNJUNGI</p>
                <h1 class="text-2xl font-bold">Lokasi Kami</h1>
            </div>
            <div>
                <iframe src="{{ $contact->where('name', 'Maps')->first()->link ?? '' }}" style="border:0;"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="w-full lg:h-96 rounded-lg"></iframe>
            </div>
        </div>
    </section>
</x-frontend-layout>
