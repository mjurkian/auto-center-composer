const Carousel = (() => {
  const DOM = {};
 // let options;

  const cacheDOM = (customClasses) => {
    const { track, next, prev, dots, nav } = customClasses;

    DOM.track = document.getElementsByClassName(`${track}`);
    if (DOM.track.length > 0) {
      DOM.slides = Array.from(DOM.track[0].children);
      DOM.next = document.getElementsByClassName(`${next}`);
      DOM.prev = document.getElementsByClassName(`${prev}`);
      DOM.nav = document.getElementsByClassName(`${nav}`);
      DOM.dots = document.getElementsByClassName(`${dots}`);
      DOM.slideWidth = DOM.slides[0].getBoundingClientRect().width;
    }
  };

  const setSlidePosition = (slide, index) => {
    slide.style.left = DOM.slideWidth * index + 'px';
  };

  const moveToSlide = (track, currentSlide, targetSlide) => {
    track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
    currentSlide.classList.remove('current-slide');
    targetSlide.classList.add('current-slide');
  };

  const updateNav = (current, target, e) => {
    const prev = current.offsetParent.offsetParent.children[0];
    const next = current.offsetParent.offsetParent.children[1];
    const length = current.offsetParent.previousElementSibling.children[0].children.length;

    current.classList.remove('current-slide');
    target.classList.add('current-slide');

    let number = parseInt(target.dataset.value);

    if (number === 0) {
      prev.classList.add('is-hidden');
      next.classList.remove('is-hidden');
    } else if (number === length -1) {
      prev.classList.remove('is-hidden');
      next.classList.add('is-hidden');
    } else {
      next.classList.remove('is-hidden');
      prev.classList.remove('is-hidden');
    }
  };

  const dotsNav = (e) => {
    const targetContainer = e.target.offsetParent.offsetParent;
    const slides = targetContainer.getElementsByTagName('li');
    const currentTrack = targetContainer.getElementsByTagName('ul');
    const currentSlide = currentTrack[0].getElementsByClassName('current-slide');
    const currentDot = targetContainer.lastElementChild.getElementsByClassName('current-slide');
    const targetIndex = e.target.dataset.value;
    const targetSlide = slides[targetIndex];

    moveToSlide(currentTrack[0], currentSlide[0], targetSlide);
    updateNav(currentDot[0], e.target);
  };

  const nextSlide = (e) => {
    const targetContainer = e.target.offsetParent;
    const currentTrack = targetContainer.getElementsByTagName('ul');
    const currentSlide = currentTrack[0].getElementsByClassName('current-slide');
    const nextSlide = currentSlide[0].nextElementSibling;
    const currentDot = targetContainer.lastElementChild.getElementsByClassName('current-slide');
    const nextDot = currentDot[0].nextElementSibling;

    moveToSlide(currentTrack[0], currentSlide[0], nextSlide, e);
    updateNav(currentDot[0], nextDot, e);
  };

  const prevSlide = (e) => {
    const targetContainer = e.target.offsetParent;
    const currentTrack = targetContainer.getElementsByTagName('ul');
    const currentSlide = currentTrack[0].getElementsByClassName('current-slide');
    const prevSlide = currentSlide[0].previousElementSibling;
    const currentDot = targetContainer.lastElementChild.getElementsByClassName('current-slide');
    const nextDot = currentDot[0].previousElementSibling;

    moveToSlide(currentTrack[0], currentSlide[0], prevSlide);
    updateNav(currentDot[0], nextDot, e);
  };



  const getHeight = () => {
    let highest = 0;
    DOM.slides.forEach(function(item) {
      const itemH = item.firstElementChild.getBoundingClientRect().height;
      highest = itemH > highest ? itemH : highest;
    });
    setHeight(highest);
  };


  const setHeight = (height) => {
     const container = DOM.track[0].parentElement.parentElement;
     container.style.height = height + 130 + 'px';
    // DOM.track[0].style.height = height + 'px';
  };

  const eventListeners = () => {
    DOM.slides[0].classList.add('current-slide');
    DOM.dots[0].classList.add('current-slide');
    DOM.prev[0].classList.add('is-hidden');

    DOM.slides.forEach(setSlidePosition);

    if (DOM.slides[0].classList.contains('testimonial__slider--slide')) {
      getHeight();
      window.addEventListener('resize',  () =>{
        getHeight();
      });
    }


    DOM.next[0].addEventListener('click', (e) => {
      nextSlide(e);
    });

    DOM.prev[0].addEventListener('click', (e) => {
      prevSlide(e);
    });

    for (let i = 0; i < DOM.dots.length; i++) {
      DOM.dots[i].addEventListener('click',  (e) => {
        e.stopPropagation();
        e.preventDefault();
        dotsNav(e);
      });
    }
  };

  const init = (customClasses) => {
     customClasses.forEach(option => {
       cacheDOM(option);
       if (DOM.track.length > 0) {
         eventListeners(option);
       }
     });
  };

  return {
    init
  };
})();

export default Carousel;
