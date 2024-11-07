import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/swiper/init/homepage.js",
                "resources/js/swiper/init/information.js",
                "resources/js/swiper/init/tour.js",
            ],
            refresh: true,
        }),
    ],
});
