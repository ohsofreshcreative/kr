import Swiper from 'swiper';
import { FreeMode } from 'swiper/modules';

import 'swiper/css';

document.querySelectorAll('.offerings-swiper').forEach((el) => {

    new Swiper(el, {
        modules: [FreeMode],
        slidesPerView: 1,
        spaceBetween: 32,
        freeMode: true,
        grabCursor: true,

        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 32,
            },

            1024: {
                slidesPerView: 4,
                spaceBetween: 32,
            },
        },
    });

});