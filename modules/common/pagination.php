<?php
/**
 * PAGINATION
 */

/*

import_part('/common/pagination');

*/

global $paged, $wp_query;

//max page
$pages = (int)$wp_query->max_num_pages;

//current page
$paged = (empty($paged)) ? 1 : (int)$paged;

/**
 * !!! ONLY DEVELOPING !!!
 * Dummy values.
 * $paged, $pages
 */
$paged = 5;
$pages = 11;

//stop process when there is only one page
if ($pages <= 1) return;

//When hide one ond last number, it should be $rtn = [];.
$default_numbers_pc = [1, $pages];
$default_numbers_sp = [1, $pages];

//range settings
$range_pc = ($paged === 1 || $paged === $pages) ? 2 : 2;
$range_sp = ($paged === 1 || $paged === $pages) ? 2 : 1;

//prev/next button
$prev_button = get_pagination_arrow($paged - 1, 'prev', ($paged !== 1));
$next_button = get_pagination_arrow($paged + 1, 'next', ($paged !== $pages));

//pagination numbers
$numbers_pc = get_pagination_numbers($pages, $paged, $default_numbers_pc, $range_pc);
$numbers_sp = get_pagination_numbers($pages, $paged, $default_numbers_sp, $range_sp);

//display arrow
function get_pagination_arrow($num, $modifier, $flg)
{
    $href = get_pagenum_link($num);
    $arrow = get_svg('sprite-pagination-arrow');
    $rtn = (!$flg) ? '' : <<<EOF
    <span class="pagination__btn-body pagination__btn-body--{$modifier}">
        <a href="{$href}">
            {$arrow}
        </a>
    </span>
EOF;
    return '<div class="pagination__btn">' . $rtn . '</div>';
}

//set pagination numbers
function get_pagination_numbers($pages, $paged, $numbers, $range)
{
    for ($i = max(2, $paged - $range); $i <= min($pages, $paged + $range); $i++) $numbers[] = $i;
    $numbers = array_unique($numbers);
    sort($numbers);
    return $numbers;
}

?>
<div class="l-pagination">

    <div class="l-pagination--pc">
        <nav class="pagination pagination--pc">

            <?= $prev_button ?>

            <ul class="pagination__list">
                <?php
                for ($i = 0; $i < count($numbers_pc); $i++) :
                    $href = get_pagenum_link($numbers_pc[$i]);
                    $current = ($numbers_pc[$i] === $paged) ? ' is-current' : '';
                    ?>
                    <li class="pagination__item">
                        <a class="pagination__item-link<?= $current ?>" href="<?= $href ?>">
                            <?= $numbers_pc[$i]; ?>
                        </a>
                    </li>
                    <?php if (!empty($numbers_pc[$i + 1]) && $numbers_pc[$i + 1] - $numbers_pc[$i] > 1) : ?>
                    <li class="pagination__item">
                        <span class="pagination__item-dot">
                            …
                        </span>
                    </li>
                <?php endif; ?>
                <? endfor; ?>
            </ul>

            <?= $next_button ?>

        </nav>
    </div>

    <div class="l-pagination--sp">
        <nav class="pagination pagination--sp">

            <?= $prev_button ?>

            <ul class="pagination__list">
                <?php
                for ($i = 0; $i < count($numbers_sp); $i++) :
                    $href = get_pagenum_link($numbers_sp[$i]);
                    $current = ($numbers_sp[$i] === $paged) ? ' is-current' : '';
                    ?>
                    <li class="pagination__item">
                        <a class="pagination__item-link<?= $current ?>" href="<?= $href ?>">
                            <?= $numbers_sp[$i]; ?>
                        </a>
                    </li>
                    <?php if (!empty($numbers_sp[$i + 1]) && $numbers_sp[$i + 1] - $numbers_sp[$i] > 1) : ?>
                    <li class="pagination__item pagination__item--dot">
                        <span>
                            …
                        </span>
                    </li>
                <?php endif; ?>
                <? endfor; ?>
            </ul>

            <?= $next_button ?>

        </nav>
    </div>

</div>