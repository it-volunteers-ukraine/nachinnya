

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
      if (className.includes('close')) {
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

// text more 
function calcHeight(domBlock) {
  let currentHeight = domBlock.scrollHeight;
  const allTextBlock = domBlock.querySelectorAll('[data-text-content');
  for (item of allTextBlock) {
    currentHeight += item.scrollHeight;
  }

  return currentHeight + 60;
}

function calculateCollapsedHeight(content) {
  // 360 - 10 line
  // 768 - 9 line
  // 1440 - 11 line
  // 1920 - 16 line
  const lineHeight = parseFloat(getComputedStyle(content).lineHeight);
  let clampLines = 10; // дефолт

  const screenWidth = window.innerWidth;

  if (screenWidth < 768) {
    clampLines = 10; // мобилка
  } else if (screenWidth < 1440) {
    clampLines = 9; // планшет
  } else if (screenWidth < 1920) {
    clampLines = 11; // планшет
  } else {
    clampLines = 16; // десктоп
  }
  return lineHeight * clampLines;
}

function textMoreSetMaxHeight(content, isExpandet = false) {
  content.dataset.height = calculateCollapsedHeight(content) + 'px';
  content.dataset.maxHeight = (content.scrollHeight) + 'px';
  if (isExpandet) {
    content.style.maxHeight = content.dataset.maxHeight;
  } else {
    content.style.maxHeight = content.dataset.height;
  }

}

function checkOverflow(card) {

  const content = card.querySelector('[data-text-content]');
  const button = card.querySelector('[data-btn-more]');

  const wasExpanded = content.dataset.expandet === 'true';
  textMoreSetMaxHeight(content, wasExpanded);

  const isOverflowing = content.scrollHeight > content.clientHeight;
  button.style.display = (isOverflowing || wasExpanded)  ? 'inline-block' : 'none';
}

function toggleTextMore(event) {
  const button = event.currentTarget;
  const card = button.closest('[data-item-text]');
  const content = card.querySelector('[data-text-content]');
  const showMoreText = button.getAttribute('data-text-more') || 'Показать больше';
  const showLessText = button.getAttribute('data-text-less') || 'Показать меньше';

  content.dataset.expandet = content.dataset.expandet === 'true' ? 'false' : 'true';
  const isExpandet = content.dataset.expandet === 'true';

  if (isExpandet) {
    // console.log('to Expandet', content.dataset.maxHeight)
    content.style.maxHeight = content.dataset.maxHeight;
    button.textContent = showLessText;
    button.setAttribute('data-clamping', 'no');
  } else {
    content.style.maxHeight = content.dataset.height;
    button.textContent = showMoreText;
    button.setAttribute('data-clamping', 'yes');
    // checkOverflow(card);
  }
}


// const initSwiper = () => {
  const swiper = new Swiper('.swiper', {
    loop: true,
    navigation: {
      prevEl: '.swiper-button-left',
      nextEl: '.swiper-button-right',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      // dynamicBullets: true,
    },
    slidesPerView: 1,
    spaceBetween: 10,
    // breakpoints: {
    //   640: {
    //     slidesPerView: 2,
    //     spaceBetween: 20
    //   },
    //   1024: {
    //     slidesPerView: 3,
    //     spaceBetween: 30
    //   }
    // }
  });
// }

document.addEventListener('DOMContentLoaded', () => {

  // initSwiper();


  // Кнопки скрытия/показа категории
  const textBlocks = document.querySelectorAll('[data-item-text]');
  // console.log('textBlock: ', textBlocks)
  textBlocks.forEach(block => {
    const button = block.querySelector('[data-btn-more]');
    const content = block.querySelector('[data-text-content]');

    // console.log(`offsetHeight: ${content.offsetHeight} \n scrolHeight: ${content.scrollHeight} \n`)
    textMoreSetMaxHeight(content);

    content.dataset.expandet = 'false';
    checkOverflow(block);
  });

  window.addEventListener('resize', () => {
    document.querySelectorAll('[data-item-text]').forEach(block => checkOverflow(block));
  });
});