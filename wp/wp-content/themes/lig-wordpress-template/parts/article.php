<?php
/**
 * args:
 * 'post' => WP_Post object,
 * 'taxonomy' => string(Optional)
 * 'tag_taxonomy' => string(Optional)
 * 'modifier => string(Optional)
 */
$post = (!empty($post)) ? $post : $GLOBALS['post'];
$title = get_the_title();
$datetime = get_the_date('Y-m-d H:i:s', $post);
$date = get_the_date('Y.m.d', $post);
$href = get_permalink($post);
$cat = (!empty($taxonomy)) ? get_first_term($post->ID, $taxonomy) : null;
$tags = (!empty($tag_taxonomy)) ? get_the_terms($post, $tag_taxonomy) : null;
$excerpt = mb_substr(trim(strip_tags($post->post_content)), 0, 200);
$modifier = (empty($modifier)) ? null: $modifier;

?>
<article class="<?= get_modified_class('article', $modifier) ?>">
    <a class="article__link" href="<?= $href ?>">
        <div class="article__data">
            <h2 class="article__title">
                <?= $title ?>
            </h2>
            <time class="article__time" datetime="<?= $datetime ?>"><?= $date ?></time>
            <?php
            if ($cat):
                ?>
                <span class="article__term utl-term"><?= $cat->name ?></span>
            <?php
            endif;
            ?>
            <?php
            if (!empty($tags)):
                import_part('tag-list', ['tags' => $tags, 'modifier' => $tag_taxonomy]);
            endif;
            ?>
            <p class="article__excerpt">
                <?= $excerpt ?>
            </p>
        </div>
        <?= get_the_thumb_with_srcset_webp($post, 'article__thumb') ?>
    </a>
</article>
