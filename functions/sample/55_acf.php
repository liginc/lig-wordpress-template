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

}