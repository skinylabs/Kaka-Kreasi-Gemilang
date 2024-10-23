// resources/js/swiper/init/homepage.js
import { Swiper, Navigation, Autoplay, Pagination } from "../swiper";

// Inisialisasi Swiper untuk produk
const tourPopular = new Swiper("#tourPopular", {
    loop: true,
    slidesPerView: 2,
    spaceBetween: 30,
    grabCursor: true,
});
