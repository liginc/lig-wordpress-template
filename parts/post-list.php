<?php
/**
 * ARGUMENTS
 * $post(WP_Query Object)
 * $modifier(string)
 */
$modifier = get_modifier_class('post-list-', $modifier);
?>
<div class="l-post-list">
    <div class="post-list<?= $modifier ?>">
        <?php
        if ($post->have_posts()) while ($post->have_posts()) : $post->the_post();
            import_part('post-item', ['post' => $post, 'modifier' => 'index']);
        endwhile;
        ?>
    </div>
</div>
