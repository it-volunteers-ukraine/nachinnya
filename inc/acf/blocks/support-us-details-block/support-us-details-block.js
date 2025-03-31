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

function copyToClipboard(element) {
    let parent = element.closest(`[data-class]`);
    if (!parent) return;

    let textElement = parent.querySelector('.details-text');
    if (!textElement) return;

    let text = textElement.textContent || textElement.innerText;

    document.querySelectorAll('[data-original-class]').forEach(el => {
        el.className = el.getAttribute('data-original-class');
    });

    navigator.clipboard.writeText(text).then(() => {
        element.className = element.getAttribute('data-copied-class');
    }).catch(err => {
        console.error('Copying error:', err);
    });
}