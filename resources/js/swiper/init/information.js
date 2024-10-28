import { Swiper, Navigation, Autoplay, Pagination } from "../swiper";
import "swiper/swiper-bundle.css";

// Slider untuk informasi
const informationSlider = new Swiper("#informationSlider", {
    modules: [Navigation, Autoplay],
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".homepage-swiper-button-next",
        prevEl: ".homepage-swiper-button-prev",
    },
});

const gallerySlider = new Swiper("#gallerySlider", {
    modules: [Navigation, Autoplay],
    loop: true,
    autoplay: {
        delay: 2000,
    },
    navigation: {
        nextEl: ".gallery-navigation-next",
        prevEl: ".gallery-navigation-prev",
    },
});

// Pastikan untuk memanggil initializeGallerySlider() jika modal dibuka
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".gallery-image").forEach((image, index) => {
        image.addEventListener("click", () => {
            openSlider(index);
            initializeGallerySlider();
        });
    });
});
