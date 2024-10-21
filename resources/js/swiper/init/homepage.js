// resources/js/swiper/init/homepage.js
import { Swiper, Navigation, Autoplay, Pagination } from "../swiper"; // Pastikan ini diimport dengan benar

// Inisialisasi Swiper untuk homepage
const homepageSwiper = new Swiper("#homepageSwiper", {
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
const productSwiper = new Swiper("#productSwiper", {
    modules: [Navigation, Pagination],
    loop: true,
    slidesPerView: 2,
    centeredSlides: true,
    spaceBetween: 30,
    grabCursor: true,
    navigation: {
        nextEl: ".homepage-navigation-next",
        prevEl: ".homepage-navigation-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
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
