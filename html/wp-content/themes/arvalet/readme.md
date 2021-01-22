Boilerplate Theme v1
========================================
SETUP
----------------------------------------
Install Dependencies

In CLI / Terminal (phpstorm)

Change directory to theme folder: __cd wp-content\theme\THEMENAME__

Write: __npm install__

Open webpack.config.js and change the Browser Sync proxy (line 44) to the dev URL of your choice (Example: http://hatton-world.local/)


SCRIPTS
----------------------------------------
In CLI / Terminal (phpstorm)

Write: __npm run bulid__

Runs build command to compile SCSS and Javascript.

Write: __npm run watch__

Runs the watch command for changes in the SCSS and Javascript files then compiles them.

Additional: Reloads Browsersync if active


LIBRARIES INSTALLED
----------------------------------------

* Browsersync - https://browsersync.io/
* Compass Mixins - http://compass-style.org/index/mixins/
* Headroom.js -  http://wicky.nillia.ms/headroom.js/
* Lazysizes - http://afarkas.github.io/lazysizes/
* Scroller Triggers - https://terwanerik.github.io/ScrollTrigger/