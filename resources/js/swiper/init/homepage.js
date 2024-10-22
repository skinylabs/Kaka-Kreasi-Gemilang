// resources/js/swiper/init/homepage.js
import { Swiper, Navigation, Autoplay, Pagination } from "../swiper"; // Pastikan ini diimport dengan benar

// Inisialisasi Swiper untuk homepage
const homepageSlider = new Swiper("#homepageSlider", {
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

// Inisialisasi Swiper untuk produk
const wisataTerbaikSlider = new Swiper("#wisataTerbaikSlider", {
    loop: false,
    slidesPerView: 2,
    spaceBetween: 30,
    grabCursor: true,
});

const testimonialSwiper = new Swiper("#testimonialSwiper", {
    modules: [Navigation, Autoplay],
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".testimonial-swiper-button-next",
        prevEl: ".testimonial-swiper-button-prev",
    },
});
