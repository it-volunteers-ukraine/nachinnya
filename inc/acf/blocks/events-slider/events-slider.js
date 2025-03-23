//
const eventsSliderHideMoreText = (id) => {
    if (id) {
        // The event item with the data attributes
        const eventItem = document.getElementById(`${id}EventItem`);
        const showMoreText = eventItem.dataset.showMoreText;
        const textBlockClassToShow = eventItem.dataset.textClassToShow;

        // Retrieving the related elements
        const btn = document.getElementById(`eventsToggleMoreTextButton${id}`);
        const textBlock = document.getElementById(`eventsItemTextPartCardMainText${id}`);
        
        // Moving to the state "Show less text"
        btn.eventsShowMoreText = true;
        btn.innerHTML = showMoreText;
        textBlock.classList.remove(textBlockClassToShow);
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