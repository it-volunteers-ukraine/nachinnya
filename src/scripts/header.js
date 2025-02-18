// Toggle the state of the language switcher dropdown menu
const toggleHeaderLanguageSwitcherDropdown = () => {
    const el = document.getElementById("headerLanguageSwitcherDropdown");
    el.classList.toggle("header__language-switcher-dropdown-hidden");
}

// Toggle the state of the header dropdown menu
const toggleHeaderDropdownMenu = () => {
    //
    const overlay = document.getElementById("headerDropdownMenuOverlay");
    overlay.classList.toggle("header__dropdown-menu-overlay-hidden");
    //
    const menu = document.getElementById("headerDropdownMenu");
    menu.classList.toggle("header__dropdown-menu-hidden");
}

// The event listener for the window's scroll changes
window.addEventListener('scroll', () => {
    const btn = document.getElementById("headerScrollToTopButton");
    // Show the button if we have scrolled past the window's inner height
    btn.classList.toggle("header__scroll-to-top-button-visible", window.scrollY > window.innerHeight);
});