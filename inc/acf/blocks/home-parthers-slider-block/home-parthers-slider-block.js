function initSwiper() {
    var swiper = new Swiper(".partnersSwiper", {
        loop: true,
        slidesPerView: "auto",
        spaceBetween: 10,
        navigation: {
            nextEl: ".slide-next",
            prevEl: ".slide-prev",
        },
        breakpoints: {
            360: {
                spaceBetween: 40,
            },
            768: {
                spaceBetween: 40,
            },
            1040: {
                spaceBetween: 100,
            },
            1440: {
                spaceBetween: 64,
            },
            1920: {
                spaceBetween: 130,
            },
        }
    });

    if (window.matchMedia("(max-width: 767px)").matches) {
        swiper.params.autoplay = {
            delay: 2000,
            disableOnInteraction: false,
        };
        swiper.autoplay.start();
    }
}

initSwiper();
