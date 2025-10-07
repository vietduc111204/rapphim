document.addEventListener("DOMContentLoaded", () => {
    const track = document.querySelector('.slider-track');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    const cards = document.querySelectorAll('.movie-card');
    const cardWidth = 270; // 250px + khoảng cách
    const visibleCards = 3; // số lượng phim hiển thị cùng lúc
    let index = 0;

    function updateSlider() {
        track.style.transform = `translateX(-${index * cardWidth}px)`;
    }

    next.addEventListener('click', () => {
        index++;
        if (index > cards.length - visibleCards) {
            index = 0; // quay lại đầu
        }
        updateSlider();
    });

    prev.addEventListener('click', () => {
        index--;
        if (index < 0) {
            index = cards.length - visibleCards; // quay về cuối
        }
        updateSlider();
    });
});
