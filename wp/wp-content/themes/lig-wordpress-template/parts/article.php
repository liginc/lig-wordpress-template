<?php

/**
 * args:
 * 'post' => WP_Post object,
 * 'taxonomy' => string(Optional)
 * 'tag_taxonomy' => string(Optional)
 */

$default_vars = [
    'post' => $GLOBALS['post'],
    'taxonomy' => '',
    'tag_taxonomy' => '',
];
extract(import_vars_whitelist(get_defined_vars(), $default_vars));

$title = get_the_title();
$datetime = get_the_date('Y-m-d H:i:s', $post);
$date = get_the_date('Y.m.d', $post);
$href = get_permalink($post);
$excerpt = mb_substr(trim(strip_tags($post->post_content)), 0, 200);

if ($cat) {
    $cat = get_first_term($post->ID, $taxonomy);
}
if ($tag_taxonomy) {
    $tags = get_the_terms($post, $tag_taxonomy);
}

?>
<article class="<?= get_modified_class('article', $modifier) ?><?= get_additional_class($additional) ?>">
    <a class="article__link" href="<?= $href ?>">
        <div class="article__main">
            <h2 class="article__title">
                <?= $title ?>
            </h2>
            <time class="article__time" datetime="<?= $datetime ?>"><?= $date ?></time>
            <?php
            if ($cat) :
            ?>
                <span class="article__term utl-term"><?= $cat->name ?></span>
            <?php
            endif;
            ?>
            <?php
            if ($tags) :
                import_part('tag-list', ['tags' => $tags, 'modifier' => $tag_taxonomy]);
            endif;
            ?>
            <p class="article__excerpt">
                <?= $excerpt ?>
            </p>
        </div>
        <div class="article__thumb">
            <?= get_the_thumb_with_srcset_webp($post, 'article__picture') ?>
        </div>
    </a>
</article>