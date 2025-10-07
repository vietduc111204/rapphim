document.addEventListener("DOMContentLoaded", function () {
    // Slider phim
    const track = document.querySelector('.slider-track');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    const cards = document.querySelectorAll('.movie-card');
    const cardWidth = 270;
    const visibleCards = 3;
    let index = 0;

    function updateSlider() {
        track.style.transform = `translateX(-${index * cardWidth}px)`;
    }

    next.addEventListener('click', () => {
        index++;
        if (index > cards.length - visibleCards) index = 0;
        updateSlider();
    });

    prev.addEventListener('click', () => {
        index--;
        if (index < 0) index = cards.length - visibleCards;
        updateSlider();
    });

    // Slider sự kiện
    const trackEvent = document.querySelector('.slider-track-event');
    const prevEvent = document.querySelector('.prev-event');
    const nextEvent = document.querySelector('.next-event');
    const eventCards = document.querySelectorAll('.event-card');
    const eventCardWidth = 270;
    const visibleEventCards = 3;
    let eventIndex = 0;

    function updateEventSlider() {
        trackEvent.style.transform = `translateX(-${eventIndex * eventCardWidth}px)`;
    }

    nextEvent.addEventListener('click', () => {
        eventIndex++;
        if (eventIndex > eventCards.length - visibleEventCards) eventIndex = 0;
        updateEventSlider();
    });

    prevEvent.addEventListener('click', () => {
        eventIndex--;
        if (eventIndex < 0) eventIndex = eventCards.length - visibleEventCards;
        updateEventSlider();
    });
});
