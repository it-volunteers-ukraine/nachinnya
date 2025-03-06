/**
 * Toggle the "Show more" state of the event
 * @param {*} id the id of the event
 * @param {*} showMoreText the text for the button to prompt to show the more text
 * @param {*} showLessText the text for the button to prompt to show the less text
 * @param {*} textBlockClassToShow the class for the text block to show it
 */
const eventsToggleShowMoreText = (id, showMoreText, showLessText, textBlockClassToShow) => {
    // Retrieving the related elements
    btn = document.getElementById(`eventsToggleMoreTextButton${id}`);
    textBlock = document.getElementById(`eventsItemTextPartCardMainText${id}`);
    
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