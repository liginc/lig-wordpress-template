<?php
/**
 * ARGUMENTS
 * $post(WP_Query Object)
 * $modifier(string)
 */
$modifier = get_modifier_class('post-list-', !empty($modifier) ? $modifier : null);
?>
<div class="l-post-list">
    <div class="post-list<?= $modifier ?>">
        <?php
        if ($posts->have_posts()) while ($posts->have_posts()) : $posts->the_post();
            global $post;
            import_part('post-item', ['post' => $post, 'modifier' => 'index']);
        endwhile;
        ?>
    </div>
</div>
