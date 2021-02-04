<?php
/**
 * 'tags' => array,
 * 'link' => bool,
 * 'modifier' => string,
 */
if (empty($tags)) return;
$link = (empty($link)) ? null : $link;
$modifier = (empty($modifier)) ? null : $modifier;
?>
<div class="<?= get_modified_class('tag-list', $modifier) ?>">
    <ul class="tag-list__list">
        <?php
        foreach ($tags as $tag):
            ?>
            <li class="tag-list__item">
                <?php
                if (!empty($link)) :
                    ?>
                    <a class="tag-list__link" href="<?= get_term_link($tag) ?>">
                        <?= $tag->name ?>
                    </a>
                <?php
                else:
                    ?>
                    <spana class="tag-list__text">
                        <?= $tag->name ?>
                    </spana>
                <?php
                endif;
                ?>
            </li>
        <?php
        endforeach;
        ?>
    </ul>
</div>
