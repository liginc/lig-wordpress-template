<?php
/**
 * Register post_type and taxonomy
 */

add_action('init', 'add_post_type_and_taxonomy',1);

function add_post_type_and_taxonomy()
{
    $default_post_type_args = array(
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'author', 'thumbnail'),
    );

    $default_term_args = array(
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
    );

    $args = array_merge($default_post_type_args, array(
        'label' => NAME_NEWS,
        'rewrite' => array('slug' => 'news')
    ));
    register_post_type('news', $args);

    $args = array_merge($default_term_args, array(
        'label' => NAME_NEWS . ' CATEGORY',
        'rewrite' => array('slug' => 'news-category')
    ));
    register_taxonomy('news-category', array('news'), $args);

    $args = array_merge($default_post_type_args, array(
        'label' => NAME_CASE,
        'rewrite' => array('slug' => 'case')
    ));
    register_post_type('case', $args);

    $args = array_merge($default_term_args, array(
        'label' => NAME_CASE . ' CATEGORY',
        'rewrite' => array('slug' => 'case-category')
    ));
    register_taxonomy('case-category', array('case'), $args);

    $args = array_merge($default_post_type_args, array(
        'label' => NAME_RECRUIT,
        'rewrite' => array('slug' => 'recruit')
    ));
    register_post_type('recruit', $args);

    $args = array_merge($default_term_args, array(
        'label' => NAME_RECRUIT . ' CATEGORY',
        'rewrite' => array('slug' => 'recruit-category')
    ));
    register_taxonomy('recruit-category', array('recruit'), $args);
}