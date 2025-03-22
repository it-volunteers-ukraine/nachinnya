function calcHeight(domBlock){
  let currentHeight = domBlock.scrollHeight;
  // console.log('currnetHeihjt: ', currentHeight);
  const allTextBlock = domBlock.querySelectorAll('[data-text-content');
  // let additiuonHeight = 0;
  for (item of allTextBlock){
    console.log('item: ', item);
    console.log('item offsetHeight: ', item.offsetHeight);
    console.log('item scrolHeight: ', item.scrollHeight);
    // currentHeight += item.scrollHeight - item.offsetHeight;
    currentHeight += item.scrollHeight ;
  }
  // console.log('currentHeight after text: ', currentHeight);
  return currentHeight;
}

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

  // let postsHeight = (posts.scrollHeight) + 'px';
  const postsHeight = calcHeight(posts) + 'px';


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


function initialPostsHeight() {
  const allPosts = document.querySelectorAll('[data-category-posts]');
  // console.log('allPosts: ', allPosts);
  
  allPosts.forEach(block => {
    // console.log('block height: ', block.scrollHeight);
    totalBlockHeight = calcHeight(block);
    // console.log('block height after calc: ', totalBlockHeight);

    let hasClose = false;
  
    block.classList.forEach(className => {
      if (className.includes('close')){
        hasClose = true;
      }
    })
    blockHeight = (block.scrollHeight) + 'px';
    // if (block.classList.contains('*close*')) {
      if (hasClose) {
      block.style.maxHeight = '0px';
    } else {
      block.style.maxHeight = totalBlockHeight + 'px';
    }
  })
}

window.addEventListener('DOMContentLoaded', () => {
  initialPostsHeight();
});

function toggleTextMore(event) {
  const button = event.currentTarget;
  const card = button.closest('[data-item-text]');
  const content = card.querySelector('[data-text-content]');

  const showMoreText = button.getAttribute('data-text-more') || 'Показать ещё';
  const showLessText = button.getAttribute('data-text-less') || 'Показать меньше';

  const isExpanded = content.toggle('expanded');

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

  // Кнопки скрытия/показа категории
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