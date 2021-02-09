const KukiCarousel = (() => {
  const DOM = {};
  let customOptions,
    slide,
    options,
    slideWidth,
    fullWidth,
    slidesLength,
    // posInitial,
    posFinal,
    // index = 0,
    posX1 = 0,
    posX2 = 0,
    translateX,
    newX = 0,
    travel = 0;

  const cacheDOM = () => {
    const { containerClass, carouselClass, prevSlide, nextSlide, dotsClass } = options;
    DOM.container = document.getElementsByClassName(`${containerClass}`); // ?

    if (DOM.container.length > 0) {
      DOM.carousel = document.getElementsByClassName(`${carouselClass}`);
      DOM.slides = Array.from(DOM.carousel[0].children);

      DOM.prev = document.getElementsByClassName(`${prevSlide}`);
      DOM.next = document.getElementsByClassName(`${nextSlide}`);

      // DOM.dots = document.getElementsByClassName(`${dotsClass}`);
    }
  };

  const moveToSlide = (targetSlide, arrow) => {

    DOM.carousel[0].classList.add("shifting");

    let currentSlide = document.getElementsByClassName('carousel__item active');
    slide = parseInt(currentSlide[0].dataset.value);

    // For dots
    // if (targetSlide.dataset) {
    //   setClass(targetSlide.dataset.value);
    //   slide = parseInt(targetSlide.dataset.value);
    // } else {
    //   slide = targetSlide;
    // }

    if (arrow === '1') {
      if (slide < slidesLength - 1) {
        slide++
      }
    } else {
      if (slide >= 1) {
        slide--
      }
    }

    setClass(slide);

    if (slide === 0) {
      DOM.carousel[0].style.transform = "translateX(-" + 0 + "px)";
    } else if (slide > 0) {
      travel = slideWidth * slide;
      let maxTravel = fullWidth - DOM.container[0].offsetWidth;

      travel = travel > maxTravel ? maxTravel : travel;

      DOM.carousel[0].style.transform = "translateX(-" + travel + "px)";
    }
  };

  const setClass = (targetSlide) => {
    if (targetSlide === DOM.slides.length) {
      targetSlide = 0;
    }

    if (slide === 0) {
      DOM.prev[0].classList.add('is-hidden');
    } else if (slide > 0 || !(slide = slidesLength - 1)) {
      DOM.prev[0].classList.remove('is-hidden');
      DOM.next[0].classList.remove('is-hidden');

      if (slide === slidesLength - 1) {
        DOM.next[0].classList.add('is-hidden');
      }
    }

    for (let i = 0; i < DOM.slides.length; i++) {
      DOM.slides[i].classList.remove("active");
      // DOM.dots[i].classList.remove("active");
    }

    DOM.slides[targetSlide].classList.add("active");
    // DOM.dots[targetSlide].classList.add("active");

  };

  const setupCarousel = () => {
    slideWidth = DOM.slides[0].offsetWidth;
    slidesLength = DOM.slides.length;

    let style =
      DOM.slides[0].currentStyle || window.getComputedStyle(DOM.slides[0]);

    slideWidth =
      slideWidth + parseFloat(style.marginLeft) + parseFloat(style.marginRight);

    fullWidth = slideWidth * DOM.slides.length;
  };

  const setupEventListeners = () => {
    DOM.slides[0].classList.add("active");
    //DOM.dots[0].classList.add("active");

    DOM.prev[0].classList.add('is-hidden');

    DOM.next[0].addEventListener('click', (e) => {
      moveToSlide(e, '1');
    });

    DOM.prev[0].addEventListener('click', (e) => {
      moveToSlide(e, '0');
    });

    // for (let i = 0; i < DOM.dots.length; i++) {
    //   DOM.dots[i].addEventListener("click", (e) => {
    //     moveToSlide(e.target);
    //     // clearInterval(interval);
    //   });
    // }
  };

  const init = () => {
    const defaults = {
      containerClass: "carousel__slider",
      carouselClass: "carousel__items",
      prevSlide: "carousel__prev",
      nextSlide: "carousel__next",
    };

    options = Object.assign(defaults, customOptions);

    cacheDOM();

    if (DOM.container.length > 0) {
      setupCarousel();
      setupEventListeners();
    }
  }

  return { init };
})();

export default KukiCarousel;
