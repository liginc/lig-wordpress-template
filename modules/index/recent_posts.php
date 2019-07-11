<?php
$index_title = [
    'ja' => 'ブログ',
    'en' => 'BLOG'
];

$recent_posts = new WP_Query(
    [
        'post_type' => 'post',
        'posts_per_page' => 6,
    ]
);

$post_list_args = [
    'posts' => $recent_posts,
    'modifier' => 'index'
];

if (!$recent_posts->have_posts()) return;
?>
<div class="l-recent-posts">
    <section class="recent-posts">
        <?php import_part('index/index-title', $index_title); ?>
        <?php import_part('post-list', $post_list_args); ?>
    </section>
</div>