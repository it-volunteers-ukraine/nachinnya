// Toggle the state of the language switcher dropdown menu
const toggleHeaderLanguageSwitcherDropdown = () => {
  //
  const overlay = document.getElementById("headerLanguageSwitcherOverlay");
  overlay.classList.toggle("header__language-switcher-overlay-hidden");
  //
  const el = document.getElementById("headerLanguageSwitcherDropdown");
  el.classList.toggle("header__language-switcher-dropdown-hidden");
};

// Toggle the state of the header dropdown menu
const toggleHeaderDropdownMenu = () => {
  //
  const overlay = document.getElementById("headerDropdownMenuOverlay");
  overlay.classList.toggle("header__dropdown-menu-overlay-hidden");
  //
  const menu = document.getElementById("headerDropdownMenu");
  menu.classList.toggle("header__dropdown-menu-hidden");
  //
  document.body.classList.toggle("header__prevent-scrolling");
};

document.addEventListener("DOMContentLoaded", function () {
  let lastScrollTop = 0;
  const scrollButton = document.getElementById("headerScrollToTopButton");

  window.addEventListener("scroll", function () {
    let scrollTop = document.documentElement.scrollTop;
    let windowHeight = window.innerHeight;

    if (scrollTop > lastScrollTop && scrollTop > windowHeight) {
      // Скроллим вниз и прокрутили больше высоты экрана - скрываем кнопку
      scrollButton.classList.remove("header__scroll-to-top-button-visible");
    } else if (scrollTop < lastScrollTop && scrollTop > windowHeight) {
      //   scrollButton.style.pointerEvents = "auto";
      scrollButton.classList.add("header__scroll-to-top-button-visible");
    } else {
      // Если прокручено меньше высоты экрана, скрываем кнопку
      scrollButton.classList.remove("header__scroll-to-top-button-visible");
    }
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Для мобильных устройств
  });
});
