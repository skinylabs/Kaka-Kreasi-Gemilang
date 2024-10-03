import "./bootstrap";
// resources/js/app.js

// Impor Tiny Slider CSS
import "tiny-slider/dist/tiny-slider.css";

// Impor Tiny Slider
import { tns } from "tiny-slider/src/tiny-slider";

document.addEventListener("DOMContentLoaded", function () {
    const slider = tns({
        container: ".my-slider", // Ganti dengan selector yang sesuai
        items: 1,
        slideBy: "page",
        autoplay: true, // Aktifkan autoplay
        speed: 300,
        nav: false, // Tampilkan navigasi (tombol prev/next)
        controls: true, // Tampilkan kontrol (tombol prev/next)
        controlsText: [
            `<ion-icon name="chevron-back-outline"></ion-icon>`,
            `<ion-icon name="chevron-forward-outline"></ion-icon>`,
        ],
        autoplayButtonOutput: false,
    });
});
