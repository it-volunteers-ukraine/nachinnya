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
    let parentDiv = element.closest(`[data-class]`);

    if (!parentDiv) return;

    let textElement = parentDiv.querySelector('.details-text');

    if (textElement) {
        let text = textElement.innerText || textElement.textContent;

        let tempInput = document.createElement("textarea");
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
    }
}