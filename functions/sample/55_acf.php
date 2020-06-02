<?php

if (defined('ACF')) {
    //add_action('acf/init', 'display_acf_option_page');
    function display_acf_option_page()
    {

        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(
                [
                    'page_title' => 'サイト設定',
                    'menu_title' => 'サイト設定',
                    'menu_slug' => 'acf-options'
                ]
            );
        }
    }

    //add_action('acf/init', 'display_acf_option_sub_page');
    function display_acf_option_sub_page()
    {
        if (function_exists('acf_add_options_sub_page')) {
            acf_add_options_sub_page(
                [
                    'page_title' => 'サブページ',
                    'menu_title' => 'サブページ',
                    'parent_slug' => 'acf-options',
                ]
            );
        }
    }

    //Set Google map API KEY
    //add_filter('acf/fields/google_map/api', 'set_google_map_api');
    function set_google_map_api($api)
    {
        if (defined('GMAP_API')) $api['key'] = GMAP_API;
        return $api;
    }
}