<?php
/*
-ARGUMENTS
$news(WP_Query Object)
$modifier(string)

-USAGE

*/
$modifier = !empty($modifier) ? $modifier : '';
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
