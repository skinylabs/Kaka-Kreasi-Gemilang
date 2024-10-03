<header class="fixed w-full bg-white h-16 flex items-center shadow-lg z-50">
    <nav class="flex justify-between items-center w-[92%] mx-auto">
        <div>
            <img class="w-40 cursor-pointer" src="{{ asset('images/logo/kakatour.webp') }}" alt="logo kaka tour">
        </div>

        <div class="md:hidden">
            <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer"></ion-icon>
        </div>
    </nav>

    <!-- Sidebar untuk mobile -->
    <div
        class="nav-links fixed bg-white h-screen w-64 top-0 shadow-lg transition-transform duration-300 ease-in-out z-50">
        <ul class="flex flex-col items-start p-5">
            <li class="py-2">
                <a class="hover:text-gray-500" href="#">Hotel</a>
            </li>
            <li class="py-2">
                <a class="hover:text-gray-500" href="#">Rundown</a>
            </li>
            <li class="py-2">
                <a class="hover:text-gray-500" href="#">Transportasi</a>
            </li>
            {{-- <li class="py-2">
                <a class="hover:text-gray-500" href="#">Tentang Kaka</a>
            </li> --}}
        </ul>
    </div>
</header>

<script>
    const navLinks = document.querySelector('.nav-links');

    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu';
        navLinks.classList.toggle('active');
    }

    // Menyembunyikan sidebar pada awalnya saat halaman dimuat
    window.onload = function() {
        navLinks.classList.remove('active');
    };

    document.addEventListener('click', function(event) {
        const isClickInside = navLinks.contains(event.target) || event.target.matches('ion-icon');

        if (!isClickInside) {
            navLinks.classList.remove('active');
            const menuIcon = document.querySelector('ion-icon[name="close"]');
            if (menuIcon) menuIcon.name = 'menu'; // Ubah kembali ikon menu
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
</style>
