<?php
/**
 * BREADCRUMB LIST
 */

/*

$args = [
    'breadcrumbs' =>
        [
            [
                'href' => '',
                'title' => '',
            ],
            [
                'href' => '',
                'title' => '',
            ],
        ]
];

import_part('/common/breadcrumbs',$args);

*/

$items_count = count($breadcrumbs) - 1;
?>
<div class="l-breadcrumbs">
    <nav class="breadcrumbs">
        <ol class="breadcrumbs-list">
            <?php
            foreach ($breadcrumbs as $i => $item) :
                $last = ($i === $items_count) ? true : false;
                ?>
                <li class="breadcrumbs-item<?= ($last) ? ' breadcrumbs-item--last' : '' ?>">
                    <a class="breadcrumbs-link" href="<?= $item['href'] ?>" title="<?= $item['title'] ?>">
                      <span class="breadcrumbs-text">
                        <?= $item['title'] ?>
                      </span>
                    </a>
                    <?php if (!$last) : ?>
                        <span class="breadcrumbs__arrow">
                            <?= get_svg('sprite-breadcrumbs-arrow'); ?>
                        </span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
</div>