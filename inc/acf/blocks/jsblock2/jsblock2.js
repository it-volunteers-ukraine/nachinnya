document.addEventListener("DOMContentLoaded", () => {
    const button_a = document.querySelectorAll('[class*="jsblock2-module__button_a"]');
    const button_b = document.querySelectorAll('[class*="jsblock2-module__button_b"]');

    if (button_a.length) {
        button_a.forEach((button_a) => {
            button_a.addEventListener("click", () => {
                console.log("block2 button A clicked");
                console.log(`${button_a.className}`);
            });
        });
    } else {
        console.log("block2 button A not found");
    }

    if (button_b.length) {
        button_b.forEach((button_b) => {
            button_b.addEventListener("click", () => {
                console.log("block2 button B clicked");
                console.log(`${button_b.className}`);
            });
        });
    } else {
        console.log("block2 button B not found");
    }
});