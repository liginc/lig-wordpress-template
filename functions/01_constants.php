<?php

$load_release_hash = function () {
    $map = get_template_directory() . '/anticache.json';
    if (!file_exists($map)) {
        return '';
    }
    $content = json_decode(file_get_contents($map));
    if (!is_object($content) || !isset($content->anticache)) {
        return '';
    }

    return $content->anticache;
};
define('ANTICACHE_HASH', $load_release_hash());

/**
 * General Setting
 */
define('HOME_URL', home_url() . '/');

/**
 * ASSETS
 */
define('ASSETS', HOME_URL . 'assets/');
define('IMAGES', ASSETS . 'images/');
define('NO_IMAGE', IMAGES . 'noimage.png');
define('FAVICON', IMAGES . 'favicon.ico');
define('TOUCH_ICON', IMAGES . 'apple-touch-icon-precomposed.png');
define('OGP_IMAGE', IMAGES . 'ogp.png');
define('JS', ASSETS . 'js/');
define('CSS', ASSETS . 'css/');
define('SVG', ASSETS . 'svg/');

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