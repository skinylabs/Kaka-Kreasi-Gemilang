<header class="bg-white z-50">
    <nav class="flex justify-between items-center w-[92%] mx-auto">
        <div>
            <img class="w-16 cursor-pointer" src="https://cdn-icons-png.flaticon.com/512/5968/5968204.png" alt="...">
        </div>
        <div
            class="nav-links duration-500 md:static absolute bg-white md:min-h-fit h-screen md:h-auto left-[-100%] top-0 md:w-auto w-[70%] flex items-center px-5 z-50">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                <li>
                    <a class="hover:text-gray-500" href="#">Products</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="#">Solution</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="#">Resource</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="#">Developers</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="#">Pricing</a>
                </li>
            </ul>
        </div>
        <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
    </nav>
</header>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden z-40"></div>

<script>
    const navLinks = document.querySelector('.nav-links');
    const overlay = document.getElementById('overlay');

    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu';
        navLinks.classList.toggle('left-0'); // Tampilkan menu dari kiri
        navLinks.classList.toggle('left-[-100%]'); // Sembunyikan menu ke kiri
        overlay.classList.toggle('hidden'); // Tampilkan atau sembunyikan overlay
    }

    // Menutup menu saat mengklik overlay
    overlay.addEventListener('click', function() {
        navLinks.classList.add('left-[-100%]');
        navLinks.classList.remove('left-0');
        overlay.classList.add('hidden');
    });
</script>
