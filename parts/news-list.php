<?php
/**
 * ARGUMENTS
 * $news(WP_Query Object)
 * $modifier(string)
 */
$modifier = get_modifier_class('news-list', !empty($modifier) ? $modifier : null);
?>
<div class="l-news-list">
    <div class="news-list<?= $modifier ?>">
        <?php
        if ($news->have_posts()) while ($news->have_posts()) : $news->the_post();
            global $post;
            import_part('news-item', ['post' => $post, 'modifier' => 'index']);
        endwhile;
        ?>
    </div>
</div>
