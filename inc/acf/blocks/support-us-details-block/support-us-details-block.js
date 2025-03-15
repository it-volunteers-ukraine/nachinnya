document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth <= 767) {
        new Swiper(".swiper-container-support", {
            slidesPerView: "auto",
            loop: true,
            pagination: {
                el: ".swiper-pagination",
            },
        });
    }
});