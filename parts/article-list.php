<?php
/*
-ARGUMENTS
$posts(WP_Query Object)
$modifier(string)

-USAGE


 */
$posts = !empty($posts) ? $posts : $GLOBALS['wp_query'];
$modifier = !empty($modifier) ? $modifier : '';
?>
<div class="l-article-list">
    <div class="<?= get_modified_class('article-list', $modifier); ?>">
        <?php
        if ($posts->have_posts()) while ($posts->have_posts()) : $posts->the_post();
            global $post;
            import_part('article-item', ['post' => $post, 'modifier' => $modifier]);
        endwhile;
        ?>
    </div>
</div>
