document.addEventListener('DOMContentLoaded', function () {
    const paginationLinks = document.querySelectorAll('.pagination-links');
    const partnersBlock = document.querySelector('.partners-block-module__partners___mLvz4');


    paginationLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();


            const page = this.getAttribute('data-page');
            if (!page) return;

            fetch(my_ajax.ajaxurl + '?action=load_partners_blocks&paged=' + page)
                .then(response => response.json())
                .then(data => {

                    partnersBlock.innerHTML = data.html;

                    partnersBlock.querySelectorAll('.partners-title').forEach(el => el.classList.add('partners-block-module__partners-title___UD3cM'));
                    partnersBlock.querySelectorAll('.post-item').forEach(el => el.classList.add('partners-block-module__post-item___-psmy'));
                    partnersBlock.querySelectorAll('.partner-text').forEach(el => el.classList.add('partners-block-module__partner-text___Xu7oC'));
                    partnersBlock.querySelectorAll('.partner-image').forEach(el => el.classList.add('partners-block-module__partner-image___WFbJ-'));

                })
                .catch(error => console.error('Error:', error));
        });
    });
});



