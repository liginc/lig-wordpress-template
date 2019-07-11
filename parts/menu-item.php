<?php
/**
 * ARGUMENTS
 *
 * $href(string)
 * $title(string)
 * $current(boolean)
 * $blank(boolean)
 */
$current = is_current($current);
$blank = is_blank($blank);
?>
<li class="menu-item">
    <a class="menu-item-link<?= $current ?>" href="<?= $href ?>" title="<?= $title ?>"<?= $blank ?>>
        <span class="menu-item-text">
            <?= $title ?>
        </span>
    </a>
</li>