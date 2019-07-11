<?php
/**
 * ARGUMENTS
 *
 * $post(Post Object)
 * $modifier(string)
 */

$modifier = get_modifier_class('post-item', !empty($modifier) ? $modifier : null);

//get posts categories
$cats = get_the_terms($post->ID, 'category');

//set $cat the category which has no parent category
if (!empty($cats)) foreach ($cats as $cat) if ($cat->parent === 0) break;

$href = get_permalink($post->ID);
$title = $post->post_title;
$date = get_the_date('Y.m.d', $post->ID);
$datetime = get_the_date('Y-m-d', $post->ID);
$cat_name = $cat->name;
$thumbnail_url = get_the_eyecatch($post->ID);
?>
<article class="post-item<?= $modifier ?>">
    <a class="post-item-link" href="<?= $href ?>" title="<?= $title ?>">
        <figure class="post-item-thumbnail">
            <img class="post-item-thumbnail__img" src="<?= $thumbnail_url ?>" alt="<?= $title ?>">
        </figure>
        <time class="post-item-date" datetime="<?= $datetime ?>">
            <?= $date ?>
        </time>
        <p class="post-item-category"><?= $cat_name ?></p>
        <h3 class="post-item-title">
            <?= $title ?>
        </h3>
    </a>
</article>
