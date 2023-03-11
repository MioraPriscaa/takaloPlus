<div class="slider-container">
  <img src="<?php echo base_url('assets/images/f1') ?>" >
  <img src="<?php echo base_url('assets/images/f2') ?>" >
  <img src="<?php echo base_url('assets/images/f3') ?>" >
</div>

<button id="prev-button">Previous</button>
<button id="next-button">Next</button>


<script>
    // Get references to HTML elements
const sliderContainer = document.querySelector('.slider-container');
const sliderImages = document.querySelectorAll('.slider-container img');
const prevButton = document.querySelector('#prev-button');
const nextButton = document.querySelector('#next-button');

// Set initial slide index
let currentSlideIndex = 0;

// Display current slide
function showSlide() {
  // Hide all slides
  sliderImages.forEach(image => image.style.display = 'none');

  // Show current slide
  sliderImages[currentSlideIndex].style.display = 'block';
}

// Move to previous slide
function moveToPrevSlide() {
  currentSlideIndex--;

  if (currentSlideIndex < 0) {
    currentSlideIndex = sliderImages.length - 1;
  }

  showSlide();
}

// Move to next slide
function moveToNextSlide() {
  currentSlideIndex++;

  if (currentSlideIndex >= sliderImages.length) {
    currentSlideIndex = 0;
  }

  showSlide();
}

// Add event listeners to buttons
prevButton.addEventListener('click', moveToPrevSlide);
nextButton.addEventListener('click', moveToNextSlide);

// Show first slide
showSlide();
</script>