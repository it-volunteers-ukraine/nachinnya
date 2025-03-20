function projectsCategoryHidden(event, classOpen) {
    event.currentTarget.classList.toggle(classOpen);
}

document.addEventListener('DOMContentLoaded', () => {
    // Ищем все элементы карточек по data-атрибуту
    const textBlocks = document.querySelectorAll('[data-item-text]');
  
    textBlocks.forEach(block => {
      const content = block.querySelector('[data-text-content]');
      const button = block.querySelector('[data-btn-more]');
  
      const clampValue = button.getAttribute('data-clamp') || 3;
      const showMoreText = 'Показать ещё';
      const showLessText = 'Показать меньше';
  
      // Устанавливаем изначальный clamp в CSS переменную или inline (если нужно)
      content.style.webkitLineClamp = clampValue;
      content.style.display = '-webkit-box';
  
      // Основная функция переключения
      button.addEventListener('click', () => {
        const isExpanded = content.classList.toggle('expanded');
  
        if (isExpanded) {
          content.style.webkitLineClamp = 'unset';
          content.style.display = 'block';
          button.textContent = showLessText;
          button.setAttribute('data-clamping', 'no');
        } else {
          content.style.webkitLineClamp = clampValue;
          content.style.display = '-webkit-box';
          button.textContent = showMoreText;
          button.setAttribute('data-clamping', 'yes');
  
          // Проверяем, показывать ли кнопку снова
          checkOverflow(block);
        }
      });
  
      // Проверка переполнения
      checkOverflow(block);
  
      // При изменении размера окна
      window.addEventListener('resize', () => {
        checkOverflow(block);
      });
    });
  
    // Проверка overflow-а одного блока
    function checkOverflow(block) {
      const content = block.querySelector('[data-text-content]');
      const button = block.querySelector('[data-btn-more]');
  
      // Сохраняем текущее состояние
      const wasExpanded = content.classList.contains('expanded');
  
      // Временно "закрываем" текст, чтобы проверить переполнение
      if (wasExpanded) {
        content.classList.remove('expanded');
        content.style.display = '-webkit-box';
        content.style.webkitLineClamp = button.getAttribute('data-clamp');
      }
  
      const isOverflowing = content.scrollHeight > content.clientHeight;
  
      if (!isOverflowing) {
        button.style.display = 'none';
      } else {
        button.style.display = 'inline-block';
      }
  
      // Возвращаем "открытое" состояние, если было
      if (wasExpanded) {
        content.classList.add('expanded');
        content.style.display = 'block';
        content.style.webkitLineClamp = 'unset';
      }
    }
  });
  