<x-frontend-layout>
    <div class="home-slider">
        <div class="h-96 object-cover object-center overflow-hidden rounded-lg">
            <img src="{{ asset('images/carousel/bali1.webp') }}" alt="Image 1" />
        </div>
        <div class="h-96 object-cover object-center overflow-hidden rounded-lg">
            <img src="{{ asset('images/carousel/bali2.webp') }}" alt="Image 2" />
        </div>
        <div class="h-96 object-cover object-center overflow-hidden rounded-lg">
            <img src="{{ asset('images/carousel/bali3.webp') }}" alt="Image 3" />
        </div>
        <div class="h-96 object-cover object-center overflow-hidden rounded-lg">
            <img src="{{ asset('images/carousel/bali4.webp') }}" alt="Image 4" />
        </div>
        <div class="h-96 object-cover object-center overflow-hidden rounded-lg">
            <img src="{{ asset('images/carousel/bali5.webp') }}" alt="Image 5" />
        </div>
        <div class="h-96 object-cover object-center overflow-hidden rounded-lg">
            <img src="{{ asset('images/carousel/bali6.webp') }}" alt="Image 6" />
        </div>

        <!-- Kontrol -->
        <div class="tns-controls">
            <button data-controls="prev"><ion-icon name="chevron-back-outline"></ion-icon></button>
            <button data-controls="next"><ion-icon name="chevron-forward-outline"></ion-icon></button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slider = tns({
                container: ".home-slider",
                items: 1,
                slideBy: "page",
                autoplay: true,
                speed: 300,
                nav: false,
                controls: true,
                controlsText: [
                    `<ion-icon name="chevron-back-outline"></ion-icon>`,
                    `<ion-icon name="chevron-forward-outline"></ion-icon>`,
                ],
                autoplayButtonOutput: false,
            });
        });
    </script>
</x-frontend-layout>
