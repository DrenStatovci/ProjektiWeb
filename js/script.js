function scrollSlider(sliderId, direction) {
    const slider = document.getElementById(sliderId);
    const cardWidth = slider.querySelector(".card").offsetWidth + 15;

    if (direction === 'left') {
        slider.scrollLeft -= cardWidth;
    } else if (direction === 'right') {
        slider.scrollLeft += cardWidth;
    }
}

document.getElementById('year').innerHTML = new Date().getFullYear();