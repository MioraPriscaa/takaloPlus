const carousel = document.querySelector(".carousel");
const carouselItems = document.querySelectorAll(".carousel-item");
const prevBtn = document.querySelector(".carousel-prev");
const nextBtn = document.querySelector(".carousel-next");
let currentSlide = 0;
const slideWidth = carouselItems[0].clientWidth;

// Function to move the carousel to the current slide
function moveToSlide() {
    carousel.style= `
    transform : translateX(-${ currentSlide * slideWidth}px)
    `;
}

// Function to show the previous slide
function showPrevSlide() {
    currentSlide--;
    if (currentSlide < 0) {
        currentSlide = carouselItems.length - 1;
    }
    moveToSlide();
}

// Function to show the next slide
function showNextSlide() {
    currentSlide++;
    if (currentSlide >= carouselItems.length) {
        currentSlide = 0;
    }
    moveToSlide();
}

// Event listeners for the previous and next buttons
prevBtn.addEventListener("click", showPrevSlide);
nextBtn.addEventListener("click", showNextSlide);