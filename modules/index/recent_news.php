<?php
$index_title = [
    'ja' => 'お知らせ',
    'en' => 'NEWS'
];

$recent_news = new WP_Query(
    [
        'post_type' => 'news',
        'posts_per_page' => 4,
    ]
);

$news_list_args = [
    'news' => $recent_news,
    'modifier' => 'index'
];

if (!$recent_news->have_posts()) return;
?>
<div class="l-recent-news">
    <section class="recent-news">
        <?php import_part('index/index-title', $index_title); ?>
        <?php import_part('news-list', $news_list_args); ?>
    </section>
</div>