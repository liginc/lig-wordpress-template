<?php
/**
 * args:
 * 'text' => 'もっと見る',
 * 'href' => URL_HOME,
 * 'is_blank' => bool,
 * 'modifier' => ''
 */
https://github.com/liginc/lig-wordpress-template/pull/53 = (empty($is_blank)) ? "": $is_blank;
$modifier = (empty($modifier)) ? "": $modifier;
?>
<div class="<?= get_modified_class('button', $modifier) ?>">
    <a class="button__link" href="<?= $href ?>"<?= is_blank($is_blank) ?>>
        <span class="button__text">
            <?= $text ?>
        </span>
    </a>
</div>