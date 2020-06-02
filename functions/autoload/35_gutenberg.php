<?php

/**
 * 色設定を無効化
 */
add_action('after_setup_theme', 'disable_color_picker');
function disable_color_picker()
{
    add_theme_support('editor-color-palette');
    add_theme_support('disable-custom-colors');
}

/**
 * フォントサイズ変更を無効化
 */
add_action('after_setup_theme', 'disable_font_size_changer');
function disable_font_size_changer()
{
    add_theme_support('editor-font-sizes');
    add_theme_support('disable-custom-font-sizes');
}

/**
 * エディタにスタイルを適用
 */
add_action('after_setup_theme', 'custom_gutenberg_style');
function custom_gutenberg_style($stylesheet)
{
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor.css');
}

/**
 * デフォルトスタイル削除
 */
add_filter('block_editor_settings', 'remove_default_editor_style', 10, 2);
function remove_default_editor_style($editor_settings, $post)
{
    unset($editor_settings['styles'][0]);

    return $editor_settings;
}

/**
 * Gutenbergのcss読み込み無効化
 */
add_action('wp_enqueue_scripts', 'disable_block_style', 9999);
add_action('admin_enqueue_scripts', 'disable_block_style', 9999);
function disable_block_style()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}