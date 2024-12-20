@php
    $usefulLinks = [
        [
            'title' => 'Homepage',
            'link' => '/',
        ],
        [
            'title' => 'Tentang Kaka',
            'link' => '/tentangkaka',
        ],
        [
            'title' => 'Tour',
            'link' => '/tour',
        ],
        [
            'title' => 'Gallery',
            'link' => '/galleries',
        ],
        [
            'title' => 'Contact',
            'link' => '/contact',
        ],
    ];
    $document = [
        [
            'title' => 'Syarat dan ketentuan',
            'link' => '/syarat-dan-ketentuan',
        ],
        [
            'title' => 'Kebijakan Privasi',
            'link' => '/kebijakan-privasi',
        ],
    ];
    $sosialMedia = [
        [
            'title' => 'Instagram',
            'link' => '/',
        ],
    ];
@endphp

<section class="w-full bg-blue-500 text-white mt-8 md:mt-16 md:px-12 md:py-4">
    <div class="md:grid grid-cols-2 ">
        <div
            class="mx-4 py-4 flex flex-col justify-center items-center gap-2 md:justify-normal md:items-start md:mx-0 md:py-0">
            <!-- Company Logo and Name -->
            <div class="flex gap-1 items-center">
                <img src="{{ asset('images/logo/logo-aja.webp') }}" alt="Logo PT. KAKA KREASI GEMILANG" class="w-6 h-6">
                <h1 class=" font-bold md:text-2xl">PT. KAKA KREASI GEMILANG</h1>
            </div>

            <!-- Company Description -->
            <p class="text-xs text-center hidden md:block md:text-start md:text-lg">
                PT. Kakakreasigemilang adalah perusahaan yang bergerak di bidang tour and travel, menyediakan layanan
                perjalanan berkualitas dengan komitmen untuk memberikan pengalaman liburan yang nyaman, aman, dan tak
                terlupakan.
            </p>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <!-- Useful Links Section -->
            <div class="text-center">
                <h1 class="text-lg font-bold text-yellow-500">Useful Links</h1>
                <div>
                    @foreach ($usefulLinks as $link)
                        <a href="{{ $link['link'] }}" class="block text-white hover:text-yellow-500">
                            {{ $link['title'] }}
                        </a>
                    @endforeach
                </div>
            </div>
            <!-- Document Section -->
            <div class="text-center">
                <h1 class="text-lg font-bold text-yellow-500">Dokumen</h1>
                <div>
                    @foreach ($document as $link)
                        <a href="{{ $link['link'] }}" class="block text-white hover:text-yellow-500">
                            {{ $link['title'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Sosial Media Section -->
            <div class="text-center">
                <h1 class="text-lg font-bold text-yellow-500">Sosial Media</h1>
                <div>
                    @foreach ($sosialMedia as $link)
                        <a href="{{ $link['link'] }}" class="block text-white hover:text-yellow-500">
                            {{ $link['title'] }}
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <div class="border-t border-gray-300 mt-4 mx-4"></div>
    <div class="text-center font-semibold py-4">
        <h1>© 2024 Make With ❤️ PT. Kaka Kreasi Gemilang</h1>
    </div>
</section>
