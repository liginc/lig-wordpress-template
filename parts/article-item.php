<?php
/*
-ARGUMENTS
$post(Post Object)
$modifier(string)

-USAGE
*/

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
$modifier = !empty($modifier) ? $modifier : '';
?>
<article class="<?= get_modified_class('article-item', $modifier) ?>">
    <a class="article-item-link" href="<?= $href ?>" title="<?= $title ?>">
        <figure class="article-item-thumbnail">
            <img class="article-item-thumbnail__img" src="<?= $thumbnail_url ?>" alt="<?= $title ?>">
        </figure>
        <time class="article-item-date" datetime="<?= $datetime ?>">
            <?= $date ?>
        </time>
        <p class="article-item-category"><?= $cat_name ?></p>
        <h3 class="article-item-title">
            <?= $title ?>
        </h3>
    </a>
</article>
