<?php
/**
 * Settings for Yoast SEO Plugin.
 * Yoastに関する設定です
 */

if (defined('WPSEO_FILE')) {
    /**
     * Disable robots auto output
     * robotsを出力させない
     */
    function filter_wpseo_robots($robotsstr)
    {
        return null;
    }
    //add_filter('wpseo_robots', 'filter_wpseo_robots', 10, 1);
}