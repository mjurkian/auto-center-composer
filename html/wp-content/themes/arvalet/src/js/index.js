/**
 * Import vendor modules
 */
import "core-js/stable";
import "regenerator-runtime/runtime";

/** Import polyfills here * */
import "./polyfill/arrayFrom";
import "./polyfill/assign";
import "./polyfill/forEach";

import App from "./modules/App";

(() => {
  App.init();
})();
