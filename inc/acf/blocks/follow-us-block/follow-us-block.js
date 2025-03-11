document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth <= 767) {
        new Swiper(".swiper-container", {
            slidesPerViev: "auto",
            loop: true,
            pagination: {
                el: ".swiper-pagination",
            },
        });
    }
});