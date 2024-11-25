const carouselImages = document.getElementById("carouselImages");
const prevButton = document.getElementById("prevButton");
const nextButton = document.getElementById("nextButton");

// Keep track of the current slide
let currentSlide = 0;

// Select all slides
const slides = carouselImages.children;
const totalSlides = slides.length;

// Function to update the carousel position
function updateCarousel() {
    const slideWidth = slides[0].clientWidth;
    carouselImages.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}

// Add event listeners for navigation buttons
nextButton.addEventListener("click", () => {
    currentSlide = (currentSlide + 1) % totalSlides; // Wrap around to the first slide
    updateCarousel();
});

prevButton.addEventListener("click", () => {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; // Wrap around to the last slide
    updateCarousel();
});

// Adjust carousel on window resize
window.addEventListener("resize", updateCarousel);