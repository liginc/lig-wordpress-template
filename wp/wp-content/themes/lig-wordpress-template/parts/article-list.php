<?php
$query = (!empty($query)) ? $query : $GLOBALS['wp_query'];
?>
<ul class="article-list">
    <?php if ($query->have_post()) while ($query->have_posts()): $query->the_post(); ?>
        <li class="article-list__item">
            <?php
            import_part('article', ['post' => $post]);
            ?>
        </li>
    <?php endwhile; ?>
</ul>