import { Swiper, Navigation, Autoplay, Pagination } from "../swiper";
import "swiper/swiper-bundle.css";

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
