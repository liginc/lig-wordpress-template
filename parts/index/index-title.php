<?php
/*
-ARGUMENTS
$ja(string)
$en(string)
$modifier(string)

-USAGE
*/
$modifier = !empty($modifier) ? $modifier : '';
?>
<header class="l-index-title">
    <h2 class="index-title<?= $modifier ?>">
        <span class="index-title--ja"><?= $ja ?></span>
        <span class="index-title--en"><?= $en ?></span>
    </h2>
</header>