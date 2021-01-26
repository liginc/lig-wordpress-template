<?php
$queried_object = get_queried_object();

$breadcrumbs = [
    [
        'text' => NAME_HOME,
        'href' => URL_HOME
    ],
    [
        'text' => $queried_object->label,
        'href' => get_post_type_archive_link($queried_object->name)
    ],
];
get_header();
import_part('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
?>
<?php import_part('article-list',['query' => $wp_query]) ?>
<?php import_part('pagination') ?>
<?php
get_footer();