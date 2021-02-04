<?php

$article = [
    'taxonomy' => 'category',
    'tag_taxonomy' => 'post_tag',
    'modifier' => 'index'
];

$more_button = [
    'text' => '次の10件を見る',
    'href' => '#',
    'modifier' => ''
];

get_header();
?>
    <ul class="article-list">
        <?php if (have_posts()) while (have_posts()): the_post(); ?>
            <li class="article-list__item">
                <?php
                import_part('article', array_merge($article, ['post' => $post]));
                ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php import_part('button', $more_button) ?>
<?php
get_footer();