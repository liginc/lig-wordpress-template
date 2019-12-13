<?php

/**
 * General Setting
 */
define('HOME_URL', home_url() . '/');
define('SITE_NAME', get_bloginfo('name'));

/**
 * ASSETS
 */
define('ASSETS', 'assets/');
define('IMAGES', ASSETS . 'images/');
define('JS', ASSETS . 'js/');
define('CSS', ASSETS . 'css/');
define('SVG', ASSETS . 'svg/');

define('FAVICON', resolve_uri(IMAGES . 'favicon.ico'));
define('TOUCH_ICON', resolve_uri(IMAGES . 'apple-touch-icon-precomposed.png'));
define('APP_JS', resolve_uri(JS . 'app.js'));
define('APP_CSS', resolve_uri(CSS . 'app.css'));
define('NO_IMAGE', resolve_uri(IMAGES . 'noimage.png'));
define('OGP_IMAGE', resolve_uri(IMAGES . 'ogp.png'));

/**
 * CONTENTS
 */
/*
define('ABOUT', HOME_URL . 'about/');
define('SERVICE', HOME_URL . 'service/');
define('CONTACT', HOME_URL . 'contact/');
define('CONFIRM', CONTACT . 'confirm/');
define('COMPLETE', CONTACT . 'complete/');
*/

/**
 * SNS
 */
/*
define('TWITTER', 'https://twitter.com/');
define('FACEBOOK', 'https://facebook.com/');
define('INSTAGRAM', 'https://instagram.com/');
*/

/**
 * EXTERNAL LINKS
 */
/*
define('', '');
*/