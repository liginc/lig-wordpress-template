<?php
/**
 * ARGUMENTS
 *
 * $post(Post Object)
 * $modifier(string)
 */
$modifier = get_modifier_class('news-item', $modifier);

//get posts categories
$cats = get_the_terms($post->ID, 'news-category');

//set $cat the category which has no parent category
if (!empty($cats)) foreach ($cats as $cat) if ($cat->parent === 0) break;

$href = get_permalink($post->ID);
$title = $post->post_title;
$date = get_the_date('Y.m.d', $post->ID);
$datetime = get_the_date('Y-m-d', $post->ID);
$cat_name = $cat->parent;
?>
<article class="news-item<?= $modifier ?>">
    <a class="news-item-link" href="<?= $href ?>" title="<?= $title ?>">
        <time class="news-item-date" datetime="<?= $datetime ?>">
            <?= $date ?>
        </time>
        <p class="news-item-category"><?= $cat_name ?></p>
        <h3 class="news-item-title">
            <?= $title ?>
        </h3>
    </a>
</article>
