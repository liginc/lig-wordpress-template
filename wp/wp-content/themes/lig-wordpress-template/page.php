<?php
$breadcrumbs = [
    [
        'text' => NAME_HOME,
        'href' => URL_HOME
    ],
    [
        'text' => get_the_title(),
        'href' => null
    ],
];

$page_header = [
    'title' => get_the_title(),
    'modifier' => $post->post_name,
];

get_header();
import_part('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
?>
<?= import_part('page-header', $page_header) ?>
<?= get_the_thumb_with_srcset_webp($post, 'single-body__thumb') ?>
<?php the_content() ?>
<?php
get_footer();