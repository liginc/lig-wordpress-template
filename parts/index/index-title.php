<?php
/**
 * ARGUMENTS
 *
 * $ja(string)
 * $en(string)
 * $modifier(string)
 */
$modifier = get_modifier_class('index-title', !empty($modifier) ? $modifier : null);
?>
<header class="l-index-title">
    <h2 class="index-title<?= $modifier ?>">
        <span class="index-title--ja"><?= $ja ?></span>
        <span class="index-title--en"><?= $en ?></span>
    </h2>
</header>
