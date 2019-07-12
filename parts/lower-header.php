<?php
/*
-ARGUMENTS
$title(string)
$modifier(string)

-USAGE

$lower_header = [
    'title' => $title,
    'modifier' => $slug
];

import_part('lower-header', $lower_header);

*/
$modifier = !empty($modifier) ? $modifier : '';
?>
<header class="<?= get_modified_class('lower-header', $modifier) ?>">
    <h1 class="lower-header-title">
        <?= $title ?>
    </h1>
</header>
