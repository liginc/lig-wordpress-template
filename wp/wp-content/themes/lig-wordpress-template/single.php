<?php
$post_type_object = get_post_type_object($post->post_type);

$breadcrumbs = [
    [
        'text' => NAME_HOME,
        'href' => URL_HOME
    ],
    [
        'text' => $post_type_object->label,
        'href' => get_post_type_archive_link($post->post_type)
    ],
    [
        'text' => get_the_title(),
        'href' => null
    ],
];

$single_header = [
    'title' => get_the_title(),
    'datetime' => get_the_date('Y-m-d H:i:s'),
    'date' => get_the_date('Y.m.d'),
    'cat' => get_first_term(get_the_ID(), $post->post_type . '-category'),
    //'tags' => get_the_terms($post, $post->post_type.'-tag'),
    'modifier' => $post->post_type,
];

get_header();
import_part('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
?>
<?= import_part('single-header', $single_header) ?>
<?= get_the_thumb_with_srcset_webp($post, 'single-body__thumb') ?>
<?php the_content(); ?>
<?= import_part('sns-share') ?>
<?php
get_footer();