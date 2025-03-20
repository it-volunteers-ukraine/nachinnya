function projectsCategoryHidden(event, classOpen) {
    const button = event.currentTarget;

    // Переключаем класс на самой кнопке (опционально)
    button.classList.toggle(classOpen);

    // Находим родителя по data-атрибуту
    const wrapper = button.closest('[data-category-block]');
    console.log("Wrapper: ", wrapper);
    if (!wrapper) return;

    // Галерея внутри wrapper
    const gallery = wrapper.querySelector('[data-category-gallery]');

    // Посты после wrapper
    const posts = wrapper.querySelector('[data-category-posts]');

    console.log("Posts: ", posts);

    // Переключаем классы скрытия/показа
    if (gallery) {
        gallery.classList.toggle(classOpen);
    }

    if (posts) {
        posts.classList.toggle(classOpen);
    }
}



function toggleTextMore(event) {
    const button = event.currentTarget;
    const card = button.closest('[data-item-text]');
    const content = card.querySelector('[data-text-content]');
  
    const showMoreText = button.getAttribute('data-text-more') || 'Показать ещё';
    const showLessText = button.getAttribute('data-text-less') || 'Показать меньше';
  
    const isExpanded = content.classList.toggle('expanded');
  
    if (isExpanded) {
      content.style.webkitLineClamp = 'unset';
      content.style.display = 'block';
      button.textContent = showLessText;
      button.setAttribute('data-clamping', 'no');
    } else {
      content.style.display = '-webkit-box';
      content.style.webkitLineClamp = button.getAttribute('data-clamp');
      button.textContent = showMoreText;
      button.setAttribute('data-clamping', 'yes');
      checkOverflow(card);
    }
  }
  

function checkOverflow(card) {
    const content = card.querySelector('[data-text-content]');
    const button = card.querySelector('[data-btn-more]');

    const wasExpanded = content.classList.contains('expanded');

    if (wasExpanded) {
        content.classList.remove('expanded');
        content.style.display = '-webkit-box';
        content.style.webkitLineClamp = button.getAttribute('data-clamp');
    }

    const isOverflowing = content.scrollHeight > content.clientHeight;

    button.style.display = isOverflowing ? 'inline-block' : 'none';

    if (wasExpanded) {
        content.classList.add('expanded');
        content.style.display = 'block';
        content.style.webkitLineClamp = 'unset';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const textBlocks = document.querySelectorAll('[data-item-text]');
  
    textBlocks.forEach(block => {
      const button = block.querySelector('[data-btn-more]');
      const content = block.querySelector('[data-text-content]');
  
      const clampValue = button.getAttribute('data-clamp') || 3;
      content.style.webkitLineClamp = clampValue;
      content.style.display = '-webkit-box';
  
      checkOverflow(block);
    });
  
    window.addEventListener('resize', () => {
      document.querySelectorAll('[data-item-text]').forEach(block => checkOverflow(block));
    });
  });