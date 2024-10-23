<header id="header" class="bg-white z-50 fixed w-full top-0 py-4">
    <nav class="flex justify-between items-center w-[92%] mx-auto">
        <a href="/">
            <img class="w-28 cursor-pointer" src="{{ asset('images/logo/kakatour.webp') }}" alt="...">
        </a>

        <div
            class="nav-links duration-500 md:static absolute bg-white md:min-h-fit h-screen md:h-auto left-[-100%] top-0 md:w-auto w-[70%] flex items-center px-5 z-50">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                <li>
                    <a class="hover:text-gray-500" href="/">Homepage</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="/tentangkaka">Tentang Kaka</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="/tour">Tour</a>
                </li>
                <!-- Dropdown Layanan (hanya untuk desktop) -->
                <li class="relative md:block hidden">
                    <button id="dropdown-btn" class="flex items-center hover:text-gray-500 cursor-pointer">
                        Layanan
                        <!-- Icon panah -->
                        <svg id="arrow-icon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <ul id="dropdown-menu"
                        class="absolute left-0 top-full mt-2 bg-white shadow-lg rounded-lg hidden flex-col min-w-[150px] z-50">
                        <li>
                            <a class="block px-4 py-2 hover:bg-gray-100" href="/gallery">Gallery</a>
                        </li>
                        <li>
                            <a class="block px-4 py-2 hover:bg-gray-100" href="/sewa-kendaraan">Sewa Kendaraan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
        <ion-icon id="menu-icon" onclick="onToggleMenu(this)" name="menu"
            class="text-3xl cursor-pointer md:hidden"></ion-icon>
    </nav>
</header>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden z-40"></div>

<script>
    const navLinks = document.querySelector('.nav-links');
    const overlay = document.getElementById('overlay');
    const header = document.getElementById('header');
    const menuIcon = document.getElementById('menu-icon');
    const body = document.body; // Akses ke body
    const dropdownBtn = document.getElementById('dropdown-btn');
    const dropdownMenu = document.getElementById('dropdown-menu');
    const arrowIcon = document.getElementById('arrow-icon');

    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu';
        navLinks.classList.toggle('left-0'); // Tampilkan menu dari kiri
        navLinks.classList.toggle('left-[-100%]'); // Sembunyikan menu ke kiri
        overlay.classList.toggle('hidden'); // Tampilkan atau sembunyikan overlay

        // Ubah header background saat menu aktif
        if (navLinks.classList.contains('left-0')) {
            header.classList.remove('bg-white');
            header.classList.add('bg-transparent');
            menuIcon.style.color = 'red'; // Ganti warna icon menjadi merah
            body.classList.add('overflow-hidden'); // Kunci scroll saat menu aktif
        } else {
            header.classList.remove('bg-transparent');
            header.classList.add('bg-white');
            menuIcon.style.color = 'black'; // Ganti warna icon kembali ke hitam
            body.classList.remove('overflow-hidden'); // Aktifkan kembali scroll
        }
    }

    // Menutup menu saat mengklik overlay
    overlay.addEventListener('click', function() {
        navLinks.classList.add('left-[-100%]');
        navLinks.classList.remove('left-0');
        overlay.classList.add('hidden');
        header.classList.remove('bg-transparent');
        header.classList.add('bg-white');
        menuIcon.style.color = 'black'; // Ganti warna icon kembali ke hitam
        body.classList.remove('overflow-hidden'); // Aktifkan kembali scroll
    });

    // Toggle dropdown saat tombol diklik (hanya untuk desktop)
    if (dropdownBtn) {
        dropdownBtn.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden'); // Tampilkan atau sembunyikan dropdown

            // Rotasi ikon panah saat dropdown aktif
            arrowIcon.classList.toggle('rotate-180');
        });
    }

    // Mengatur menu mobile
    function setupMobileMenu() {
        const dropdownItems = `
            <li><a class="hover:text-gray-500" href="#">Gallery</a></li>
            <li><a class="hover:text-gray-500" href="#">Sewa Kendaraan</a></li>
        `;
        const menuItems = `
            <li><a class="hover:text-gray-500" href="/">Homepage</a></li>
            <li><a class="hover:text-gray-500" href="/tentangkaka">Tentang Kaka</a></li>
            <li><a class="hover:text-gray-500" href="/tour">Tour</a></li>
            ${dropdownItems}
            <li><a class="hover:text-gray-500" href="/contact">Contact</a></li>
        `;
        navLinks.querySelector('ul').innerHTML = menuItems; // Ganti konten menu dengan menu mobile
    }

    // Panggil fungsi untuk menyiapkan menu mobile
    if (window.innerWidth < 768) {
        setupMobileMenu();
    }
</script>
