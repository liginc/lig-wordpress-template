<?php

add_action('init', 'set_up_constants');

function set_up_constants()
{
    /**
     * General Setting
     */
    define('HOME_URL', home_url() . '/');
    define('SITE_NAME', get_bloginfo('name'));

    /**
     * ASSETS
     */
    define('URL_ASSETS', '/assets/');
    define('URL_IMAGES', URL_ASSETS . 'images/');
    define('URL_JS', URL_ASSETS . 'js/');
    define('URL_CSS', URL_ASSETS . 'css/');
    define('URL_SVG', URL_ASSETS . 'svg/');

    define('URL_FAVICON', resolve_uri(URL_IMAGES . 'favicon.ico'));
    define('URL_TOUCH_ICON', resolve_uri(URL_IMAGES . 'apple-touch-icon-precomposed.png'));
    define('URL_APP_JS', resolve_uri(URL_JS . 'app.js'));
    define('URL_APP_CSS', resolve_uri(URL_CSS . 'app.css'));
    define('URL_NO_IMAGE', resolve_uri(URL_IMAGES . 'noimage.png'));

    /**
     * CONTENTS
     */
    /*
    define('URL_ABOUT', HOME_URL . 'about/');
    define('URL_SERVICE', HOME_URL . 'service/');
    define('URL_CONTACT', HOME_URL . 'contact/');
    define('URL_CONFIRM', CONTACT . 'confirm/');
    define('URL_COMPLETE', CONTACT . 'complete/');
    */

    /**
     * SNS
     */
    /*
    define('URL_TWITTER', 'https://twitter.com/');
    define('URL_FACEBOOK', 'https://facebook.com/');
    define('URL_INSTAGRAM', 'https://instagram.com/');
    */

    /**
     * EXTERNAL LINKS
     */
    /*
    define('', '');
    */
}