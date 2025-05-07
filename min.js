
/*======================= SWIPER CATEGORIES =======================*/
let swiperInstance;

function initializeSwiper() {
    if (swiperInstance) swiperInstance.destroy(true, true); // Destroy previous instance

    swiperInstance = new Swiper(".categories_container", {
        spaceBetween: 24,
        loop: true,
        observer: true,
        observeParents: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            350: { slidesPerView: 2, spaceBetween: 24 },
            768: { slidesPerView: 3, spaceBetween: 24 },
            992: { slidesPerView: 4, spaceBetween: 24 },
            1200: { slidesPerView: 5, spaceBetween: 24 },
            1400: { slidesPerView: 6, spaceBetween: 24 },
        },
    });
}

// Run on page load
initializeSwiper();

// Run on window resize to prevent flickering
window.addEventListener("resize", initializeSwiper);


document.addEventListener("DOMContentLoaded", function () {
  var swiperProducts = new Swiper(".new_container", {
      spaceBetween: 24,
      loop: true,
      observer: true, // Ensure dynamic elements are observed
      observeParents: true, // Observe parent container for changes
      navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
      },
      breakpoints: {
          350: { slidesPerView: 1, spaceBetween: 20 },
          768: { slidesPerView: 2, spaceBetween: 24 },
          992: { slidesPerView: 3, spaceBetween: 24 },
          1400: { slidesPerView: 4, spaceBetween: 24 },
      },
  });
});
