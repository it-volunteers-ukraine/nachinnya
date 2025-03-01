document.addEventListener('DOMContentLoaded', function () {

    const partnersBlock = document.querySelector('.partners-block-module__partners___mLvz4');

    const showMoreButton = document.getElementById('show-more');

    let currentPage = 1;


    showMoreButton.addEventListener('click', () => {
        const dataType = showMoreButton.getAttribute('data-type');

        currentPage++;

        sendRequest(dataType, currentPage, dataType === 'partners' ?
            partnersBlock : document.querySelector('.some-other-container'));

    })


    function sendRequest(dataType, currentPage, container) {

        const viewportWidth = window.innerWidth;

        fetch(my_ajax.ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                action: 'load_more',
                post_type: dataType,
                paged: currentPage,
                width: viewportWidth,
            })
        })
            .then(response => response.json())
            .then(data => {
                console.log('Response data:', data);

                container.innerHTML += data.html;

                // add classes for module styles

                const elementsToStyle = getElementsToStyle(dataType);

                addClasses(container, elementsToStyle)

            })
            .catch(error => {
                console.error('Error:', error);
            });
    }


    function getElementsToStyle(dataType) {
        switch (dataType) {
            case 'partners':
                return [
                    {selector: '.partners-title', className: 'partners-block-module__partners-title___UD3cM'},
                    {selector: '.post-item', className: 'partners-block-module__post-item___-psmy'},
                    {selector: '.partner-text', className: 'partners-block-module__partner-text___Xu7oC'},
                    {selector: '.partner-image', className: 'partners-block-module__partner-image___WFbJ-'}
                ];

            // for other type posts add class
            // case 'other':
            //     return [
            //         {selector: '.other-title', className: 'other-block-module__other-title___XYZ'},
            //         {selector: '.other-item', className: 'other-block-module__other-item___ABC'}
            //     ];
            default:
                return [];
        }
    }


    function addClasses(container, elements) {
        elements.forEach(item => {
            container.querySelectorAll(item.selector).forEach(el => el.classList.add(item.className));
        });
    }

})



