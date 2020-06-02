<?php
/**
 * Settings for Yoast SEO Plugin.
 * Yoastに関する設定です
 */

if (defined('WPSEO_FILE')) {

    /**
     * Disable yoast json-ld display
     */
//    add_filter( 'wpseo_json_ld_output', '__return_false' );

    /**
     * Disable robots auto output
     * robotsを出力させない
     */
    //add_filter('wpseo_robots', '__return_false', 10, 1);

    /**
     * Disable Yoast's Comment
     */
    add_action('wp_head', function () {
        ob_start(function ($o) {
            return preg_replace('/^\n?<!--.*?[Y]oast.*?-->\n?$/mi', '', $o);
        });
    }, ~PHP_INT_MAX);

    /**
     * WordPressSEOプラグインのメニュー非表示.
     */
    function lig_wp_remove_wordpress_seo_menu()
    {
        echo '<style type="text/css">';
        echo '#toplevel_page_wpseo_dashboard,#wp-admin-bar-view,#wp-admin-bar-wpseo-menu {';
        echo '  display: none;';
        echo '}';
        echo '</style>';
    }
    //add_action( 'admin_head', 'lig_wp_remove_wordpress_seo_menu', 100);
}