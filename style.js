document.addEventListener("DOMContentLoaded", function () {
    let index = 0;
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");
    const totalSlides = slides.length;
    const slider = document.querySelector(".sliderr");

    function showSlide() {
        // Use transform to slide to the correct position based on index
        slider.style.transform = `translateX(${-index * 100}%)`;  // 100% of the slide's width
        updateDots();
    }

    function nextSlide() {
        index = (index + 1) % totalSlides;
        showSlide();
    }

    function prevSlide() {
        index = (index - 1 + totalSlides) % totalSlides;
        showSlide();
    }

    function setSlide(slideIndex) {
        index = slideIndex;
        showSlide();
    }

    function updateDots() {
        dots.forEach((dot, i) => {
            dot.classList.toggle("active", i === index);
        });
    }

    let autoSlide = setInterval(nextSlide, 5000);

    function resetInterval() {
        clearInterval(autoSlide);
        autoSlide = setInterval(nextSlide, 5000);
    }

    const prevButton = document.querySelector(".prev");
    const nextButton = document.querySelector(".next");
    const sliderContainer = document.querySelector(".slider-containerr");

    if (prevButton) {
        prevButton.addEventListener("click", () => {
            prevSlide();
            resetInterval();
        });
    }

    if (nextButton) {
        nextButton.addEventListener("click", () => {
            nextSlide();
            resetInterval();
        });
    }

    if (sliderContainer) {
        sliderContainer.addEventListener("mouseenter", () => clearInterval(autoSlide));
        sliderContainer.addEventListener("mouseleave", () => autoSlide = setInterval(nextSlide, 5000));
    }

    dots.forEach((dot, i) => {
        dot.addEventListener("click", () => {
            setSlide(i);
            resetInterval();
        });
    });
});
