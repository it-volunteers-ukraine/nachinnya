//
const eventsSliderHideMoreText = (id) => {
    if (id) {
        // The event item with the data attributes
        const eventItem = document.getElementById(`${id}EventItem`);
        const showMoreText = eventItem.dataset.showMoreText;

        // 360
        // Retrieving the related elements
        const btn360 = document.getElementById(`eventsToggleMoreTextButton${id}Mobile`);
        const textBlock360 = document.getElementById(`eventsItemTextPartCardMainText${id}Mobile`);
        // Moving to the state "Show less text"
        btn360.eventsShowMoreText = true;
        btn360.innerHTML = showMoreText;
        textBlock360.classList.remove(eventItem.dataset.textClassToShowMobile);

        // 768
        // Retrieving the related elements
        const btn768 = document.getElementById(`eventsToggleMoreTextButton${id}Tablet`);
        const textBlock768 = document.getElementById(`eventsItemTextPartCardMainText${id}Tablet`);
        // Moving to the state "Show less text"
        btn768.eventsShowMoreText = true;
        btn768.innerHTML = showMoreText;
        textBlock768.classList.remove(eventItem.dataset.textClassToShowTablet);
    }
}

/**
 * Toggle the "Show more" state of the event
 * @param {*} id the id of the event
 */
const eventsSliderToggleShowMoreText = (id) => {
    // The event item with the data attributes
    const eventItem = document.getElementById(`${id}EventItem`);
    const showMoreText = eventItem.dataset.showMoreText;
    const showLessText = eventItem.dataset.showLessText;
    const textBlockClassToShow = eventItem.dataset.textClassToShow;

    // Retrieving the related elements
    const btn = document.getElementById(`eventsToggleMoreTextButton${id}`);
    const textBlock = document.getElementById(`eventsItemTextPartCardMainText${id}`);
    
    // Checking the current state: does it show more text?
    if (('eventsShowMoreText' in btn) && (!btn.eventsShowMoreText)) {
        // Moving to the state "Show less text"
        btn.eventsShowMoreText = true;
        btn.innerHTML = showMoreText;
        textBlock.classList.remove(textBlockClassToShow);
    } else {
        // Moving to the state "Show more text"
        btn.eventsShowMoreText = false;
        btn.innerHTML = showLessText;
        textBlock.classList.add(textBlockClassToShow);
    }
}

/**
 * Toggle the "Show more" state of the event
 * @param {*} id the id of the event
 */
const eventsSliderToggleShowMoreTextTablet = (id) => {
    // The event item with the data attributes
    const eventItem = document.getElementById(`${id}EventItem`);
    const showMoreText = eventItem.dataset.showMoreText;
    const showLessText = eventItem.dataset.showLessText;
    const textBlockClassToShowTablet = eventItem.dataset.textClassToShowTablet;

    // Retrieving the related elements
    const btn = document.getElementById(`eventsToggleMoreTextButton${id}Tablet`);
    const textBlock = document.getElementById(`eventsItemTextPartCardMainText${id}Tablet`);
    
    // Checking the current state: does it show more text?
    if (('eventsShowMoreText' in btn) && (!btn.eventsShowMoreText)) {
        // Moving to the state "Show less text"
        btn.eventsShowMoreText = true;
        btn.innerHTML = showMoreText;
        textBlock.classList.remove(textBlockClassToShowTablet);
    } else {
        // Moving to the state "Show more text"
        btn.eventsShowMoreText = false;
        btn.innerHTML = showLessText;
        textBlock.classList.add(textBlockClassToShowTablet);
    }
}


//
const eventsSlideTo = (currentEventId, index) => {
    //
    eventsSliderHideMoreText(currentEventId);

    //
    const itemsElement = document.getElementById('eventsItems');
    const itemsCount = Number(itemsElement.dataset.itemsCount);
    if (itemsCount > 0) {
        //
        const translateX = window.innerWidth * (itemsCount - 1) / 2 - window.innerWidth * index;
        itemsElement.style.transform = `translateX(${translateX}px)`;
        //
        itemsElement.dataset.currentIndex = index;
    }
}

//
const eventsSlideLeft = (currentEventId) => {
    //
    const itemsElement = document.getElementById('eventsItems');
    const itemsCount = Number(itemsElement.dataset.itemsCount);
    const itemsIndex = Number(itemsElement.dataset.currentIndex);
    if (itemsIndex > 0) {
        eventsSlideTo(currentEventId, itemsIndex - 1);
    } else {
        eventsSlideTo(currentEventId, itemsCount - 1);
    }
}

//
const eventsSlideRight = (currentEventId) => {
    //
    const itemsElement = document.getElementById('eventsItems');
    const itemsCount = Number(itemsElement.dataset.itemsCount);
    const itemsIndex = Number(itemsElement.dataset.currentIndex);
    if (itemsIndex < itemsCount - 1) {
        eventsSlideTo(currentEventId, itemsIndex + 1);
    } else {
        eventsSlideTo(currentEventId, 0);
    }
}

//
eventsSlideTo(undefined, 0);