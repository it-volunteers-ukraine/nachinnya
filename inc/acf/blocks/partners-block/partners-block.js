document.addEventListener('DOMContentLoaded', function () {

    const paginationLinks = document.querySelectorAll('.pagination-links');
    const partnersBlock = document.getElementById('partners-block');


    paginationLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            const page = this.getAttribute('data-page');
            if (!page) return;
            sendRequest(page)
        })
        })

        async function sendRequest(page) {
            try {
                const response = await fetch(my_ajax.ajaxurl + '?action=load_partners_blocks&paged=' + page + '&nonce=' + my_ajax.nonce);

                if (!response.ok) {
                    throw new Error('response was not ok');
                }

                const data = await response.json();
                console.log('response data', data);
                partnersBlock.innerHTML = data.html;
                addClasses(partnersBlock);
            } catch (error) {
                console.error('Error:', error);
            }
        }


        function addClasses(partnersBlock) {
            const elements = partnersBlock.querySelectorAll('.partners-title, .post-item, .partner-text, .partner-image');
            const classMap = {
                'partners-title': 'partners-block-module__partners-title___UD3cM',
                'post-item': 'partners-block-module__post-item___-psmy',
                'partner-text': 'partners-block-module__partner-text___Xu7oC',
                'partner-image': 'partners-block-module__partner-image___WFbJ-'
            };

            elements.forEach(el =>
                Object.keys(classMap).forEach(className => {
                    if (el.classList.contains(className)) el.classList.add(classMap[className]);
                })
            )
        }

    })



