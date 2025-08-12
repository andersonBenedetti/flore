document.addEventListener("DOMContentLoaded", function () {
  const mainCarousel = new Swiper(".main-carousel", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  const catCarousel = new Swiper(".cat-carousel", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    autoplay: {
      delay: 6000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
      },
      2200: {
        slidesPerView: 4,
      },
    },
  });

  const formatCarousel = new Swiper(".format-carousel", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: {
      el: "#pagination-format",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 1.2,
      },
      1024: {
        slidesPerView: 2.2,
      },
      1800: {
        slidesPerView: 3.2,
      },
      2000: {
        slidesPerView: 4.2,
      },
    },
  });

  const crossSellCarousel = new Swiper(".cross-sell-carousel", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
    },
  });

  const upsellCarousel = new Swiper(".upsell-carousel", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      768: {
        slidesPerView: 3,
      },
    },
  });
});
