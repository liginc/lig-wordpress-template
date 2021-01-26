<?php

$article = [
    'taxonomy' => 'news-category',
    'modifier' => 'index-news'
];
$news_more_button = [
    'text' => 'もっと見る',
    'href' => URL_HOME,
    'modifier' => ''
];
get_header();
?>
<?php import_part('article-list',['query' => $wp_query]) ?>
<?php import_part('button', $news_more_button) ?>
<?php
get_footer();