function projectsCategoryHidden(event, classClose) {
  const button = event.currentTarget;

  // Переключаем класс на самой кнопке (опционально)
  button.classList.toggle(classClose);

  // Находим родителя по data-атрибуту
  const wrapper = button.closest('[data-category-block]');
  if (!wrapper) return;

  if (wrapper.classList.contains(classClose)) {
    // const clone = wrapper.
  }

  // Галерея внутри wrapper
  const gallery = wrapper.querySelector('[data-category-gallery]');

  // Посты после wrapper
  const posts = wrapper.querySelector('[data-category-posts]');

  // console.log("Posts: ", posts);
  // console.log('getBoundingClientRect: ', posts.getBoundingClientRect().height)
  // console.log('scrollHeight: ', posts.scrollHeight);

  postsHeight = (posts.scrollHeight * 1.2) + 'px';


  // Переключаем классы скрытия/показа
  if (gallery) {
    gallery.classList.toggle(classClose);
  }

  if (posts) {
    if (posts.classList.contains(classClose)) {
      posts.style.maxHeight = postsHeight;
    } else {
      posts.style.maxHeight = '0px';
    }
    posts.classList.toggle(classClose);
  }
}

function initialPosts() {
  const allPosts = document.querySelectorAll('[data-category-posts]');
  console.log('allPosts: ', allPosts);
  let hasClose = false;
  allPosts.classList.forEach(className => {
    if (className.includes('close')){
      hasClose = true;
    }
  })
  allPosts.forEach(block => {
    blockHeight = (block.scrollHeight * 2) + 'px';
    if (block.classList.contains('*close*')) {
      block.style.maxHeight = '0px';
    } else {
      block.style.maxHeight = blockHeight;
    }
  })
}

window.addEventListener('DOMContentLoaded', () => {
  initialPosts();
});

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