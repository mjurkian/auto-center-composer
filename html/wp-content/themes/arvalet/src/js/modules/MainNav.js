/** Internal helper imports here ... */

/**
 * Module description...
 *
 * @returns {{init: init}}
 */
const MainNav = (() => {
  const DOM = {};
  const isMobile = window.matchMedia("only screen and (max-width: 1024px)")
    .matches;
  let buttonReturn;

  const cacheDOM = () => {
    DOM.hamburger = document.getElementsByClassName("navOpen");
    DOM.toggleNav = document.getElementsByClassName("header__nav");
    DOM.subMenuToggles = document.querySelectorAll(
      "#menu-main-menu li.menu-item-has-children > a"
    );
  };

  const toggleNav = () => {
    const menu = DOM.toggleNav[0];
    const hamburger = DOM.hamburger[0];
    const subMenuClasslist = DOM.subMenuToggles[0].nextElementSibling.classList;

    if (!hamburger.classList.contains("open")) {
      hamburger.classList.add("open");
      menu.classList.add("active");
    } else {
      hamburger.classList.remove("open");
      menu.classList.remove("active");

      DOM.subMenuToggles.forEach((item) => {
        if (item.nextElementSibling.classList.contains("open")) {
          item.nextElementSibling.classList.remove("open");
        }
      });
    }
  };

  const createParentElement = (event) => {
    const subMenu = event.currentTarget.nextElementSibling;
    const subMenuChild = subMenu.childNodes[1];

    const mainLi = document.createElement("li");
    mainLi.className += "menu-item__main";
    mainLi.style.left += "20px";
    mainLi.innerHTML =
      '<a href="' + event.target.href + '">' + event.target.innerText + "</a>";

    const returnLi = document.createElement("li");
    returnLi.className += "menu-item__return";
    returnLi.style.left += "20px";
    returnLi.innerHTML = "<button> < RETURN </button>";

    subMenu.insertBefore(returnLi, subMenuChild);
    subMenu.insertBefore(mainLi, subMenuChild);
  };

  const openSubMenu = (event) => {
    event.preventDefault();
    event.currentTarget.nextElementSibling.classList.toggle("open");

    let mainMenu = document.querySelector(".menu-item__main");
    let returnMenu = document.querySelector(".menu-item__return");

    if (mainMenu) {
      mainMenu.parentElement.removeChild(mainMenu);
      returnMenu.parentElement.removeChild(returnMenu);
    }

    createParentElement(event);

    buttonReturn = document.querySelectorAll(
      "#menu-main-menu li.menu-item__return"
    );

    Array.from(buttonReturn).forEach((HTMLNode) => {
      HTMLNode.addEventListener("click", closeSubMenu);
    });
  };

  const closeSubMenu = (event) => {
    event.currentTarget.parentElement.classList.toggle("open");
  };

  const eventListeners = () => {
    if (isMobile) {
      DOM.hamburger[0].addEventListener("click", toggleNav);

      Array.from(DOM.subMenuToggles).forEach((HTMLNode) => {
        HTMLNode.addEventListener("click", openSubMenu);
      });
    }
  };

  const init = () => {
    cacheDOM();
    eventListeners();
  };

  return {
    init,
  };
})();

export default MainNav;
