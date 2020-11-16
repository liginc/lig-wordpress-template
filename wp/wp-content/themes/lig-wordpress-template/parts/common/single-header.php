<?php
/**
 * args:
 * 'title' => get_the_title(),
 * 'datetime' => get_the_date('Y-m-d H:i:s'),
 * 'date' => get_the_date('Y.m.d'),
 * 'cat' => get_first_term(get_the_ID(), $post->post_type.'-category'),
 * 'tags' => get_the_terms($post, $post->post_type.'-tag'),
 * 'modifier' => $post->post_type,
 */
?>
<div class="single-header">
    <h1 class="single-header__title"><?= $title ?></h1>
    <time class="single-header__time" datetime="<?= $datetime ?>"><?= $date ?></time>
    <?php
    if ($cat):
        ?>
        <a class="single-header__term utl-term" href="<?= get_term_link($cat) ?>"><?= $cat->name ?></a>
    <?php
    endif;
    ?>
    <?php
    if (!empty($tags)):
        import_part('common/tag-list', ['tags' => $tags, 'modifier' => 'single-' . $post_type]);
    endif;
    ?>
</div>
