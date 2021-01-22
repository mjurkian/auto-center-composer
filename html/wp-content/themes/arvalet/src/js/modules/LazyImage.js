const LazyImage = (() => {
  let observer;
  const DOM = {};

  const cacheDOM = () => {
    DOM.elements =  document.querySelectorAll(".lazy-image");
  };

  const lazyImage = entries => {
    entries.forEach((entry) => {
      if (entry.isIntersecting > 0) {
        const image = entry.target;

        image.src = image.dataset.src;
        observer.unobserve(image);
      }
    })
  };

  const initObserver = () => {
    const options = {
      threshold: [0.0]
    };

    observer = new IntersectionObserver(lazyImage, options);
    DOM.elements.forEach(element => {
      observer.observe(element);
    });
  };

  const init = () => {
    cacheDOM();
    initObserver();
  };

  return {
    init
  };
})();

export default LazyImage;
