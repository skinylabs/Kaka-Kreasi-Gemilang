<header class="fixed w-full h-16 flex items-center shadow-lg z-50 transition-all duration-300 bg-white" id="navbar">
    <nav class="flex justify-between items-center w-[92%] mx-auto">
        <div>
            <img class="w-40 cursor-pointer" src="{{ asset('images/logo/kakatour.webp') }}" alt="logo kaka tour">
        </div>

        <div class="md:hidden">
            <ion-icon onclick="onToggleMenu(this)" name="menu"
                class="text-3xl cursor-pointer transition-colors duration-300" id="menu-icon"></ion-icon>
        </div>
    </nav>

    <!-- Sidebar untuk mobile -->
    <div
        class="nav-links fixed flex flex-col gap-4 bg-white h-screen w-64 top-0 shadow-lg transition-transform duration-300 ease-in-out z-50 p-5">
        <div>
            <img class="w-40 cursor-pointer" src="{{ asset('images/logo/kakatour.webp') }}" alt="logo kaka tour">
        </div>
        <div class="flex flex-col items-start gap-4">
            <a href="{{ route('transportation', ['slug' => $tour->slug]) }}"
                class="py-2 {{ request()->is('information/' . $tour->slug . '/transportation') ? 'bg-blue-500 text-white' : 'text-gray-800' }} rounded-lg px-4 w-full">
                <p class="font-semibold">
                    Transportasi
                </p>
            </a>
            {{-- <a href="{{ route('hotel', ['slug' => $tour->slug]) }}"
                class="py-2 {{ request()->is('information/' . $tour->slug . '/hotel') ? 'bg-blue-500 text-white' : 'text-gray-800' }} rounded-lg px-4 w-full">
                <p class="font-semibold">
                    Hotel
                </p>
            </a> --}}
            <a href="{{ route('rundown', ['slug' => $tour->slug]) }}"
                class="py-2 {{ request()->is('information/' . $tour->slug . '/rundown') ? 'bg-blue-500 text-white' : 'text-gray-800' }} rounded-lg px-4 w-full">
                <p class="font-semibold">
                    Rundown
                </p>
            </a>
        </div>
        {{-- <form method="POST" action="{{ route('tour.logout') }}">
                @csrf
                <button type="submit" class="py-2 px-4 bg-red-500 text-white font-semibold rounded-lg">Logout</button>
            </form> --}}
        <form method="POST" action="{{ route('tour.logout') }}" class="w-full">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</header>

<div id="blur-background"></div> <!-- Tambahkan div untuk efek blur -->

<script>
    const navLinks = document.querySelector('.nav-links');
    const blurBackground = document.getElementById('blur-background'); // Ambil elemen blur
    const navbar = document.getElementById('navbar'); // Ambil elemen navbar
    const menuIcon = document.getElementById('menu-icon'); // Ambil elemen ikon menu

    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu';
        navLinks.classList.toggle('active');
        blurBackground.classList.toggle('active'); // Tambahkan atau hapus kelas aktif pada background blur
        navbar.classList.toggle('bg-dark opacity-50'); // Toggle kelas gelap navbar

        // Ubah warna ikon
        if (e.name === 'close') {
            menuIcon.classList.remove('text-black'); // Hapus warna hitam
            menuIcon.classList.add('text-red-500'); // Tambah warna merah
        } else {
            menuIcon.classList.remove('text-red-500'); // Hapus warna merah
            menuIcon.classList.add('text-black'); // Kembali ke warna hitam
        }
    }

    // Menyembunyikan sidebar pada awalnya saat halaman dimuat
    window.onload = function() {
        navLinks.classList.remove('active');
        blurBackground.classList.remove('active'); // Menghapus kelas blur saat halaman dimuat
        navbar.classList.remove('bg-dark'); // Pastikan navbar tidak gelap saat halaman dimuat
        menuIcon.classList.remove('text-red-500'); // Pastikan warna ikon tidak merah saat halaman dimuat
        menuIcon.classList.add('text-black'); // Pastikan warna ikon hitam saat halaman dimuat
    };

    document.addEventListener('click', function(event) {
        const isClickInside = navLinks.contains(event.target) || event.target.matches('ion-icon');

        if (!isClickInside) {
            navLinks.classList.remove('active');
            blurBackground.classList.remove('active'); // Menghapus kelas blur saat sidebar ditutup
            const menuIcon = document.querySelector('ion-icon[name="close"]');
            if (menuIcon) {
                menuIcon.name = 'menu'; // Ubah kembali ikon menu
                menuIcon.classList.remove('text-red-500'); // Kembalikan warna ikon ke hitam
                menuIcon.classList.add('text-black'); // Kembalikan warna ikon ke hitam
            }
            navbar.classList.remove('bg-dark'); // Pastikan navbar tidak gelap saat ditutup
        }
    });
</script>

<style>
    /* Menyembunyikan sidebar pada awalnya */
    .nav-links {
        transform: translateX(-100%);
        transition: transform 0.3s ease-in-out;
    }

    /* Ketika sidebar aktif */
    .nav-links.active {
        transform: translateX(0);
    }

    /* Efek blur pada background */
    #blur-background {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        /* Warna latar belakang semi-transparan */
        backdrop-filter: blur(10px);
        /* Efek blur */
        transition: opacity 0.3s ease-in-out;
        opacity: 0;
        /* Awalnya tidak terlihat */
        pointer-events: none;
        /* Tidak menghalangi klik */
        z-index: 49;
        /* Di bawah sidebar */
    }

    /* Ketika blur aktif */
    #blur-background.active {
        opacity: 1;
        /* Menampilkan blur */
        pointer-events: auto;
        /* Menghalangi klik saat terlihat */
    }

    /* Navbar gelap saat sidebar aktif */
    #navbar.bg-dark {
        background-color: rgba(0, 0, 0, 0.8);
        /* Warna latar belakang gelap */
    }

    /* Transisi warna ikon */
    ion-icon {
        transition: color 0.3s ease-in-out;
        /* Transisi warna halus */
    }
</style>
