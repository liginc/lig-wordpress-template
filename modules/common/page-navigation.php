<?php
/*
-MODULE:PAGE NAVIGATION

-USAGE
import_part('/common/page-navigation');
*/
$prev_post = get_previous_post();
$next_post = get_next_post();

if ( empty($prev_post) && empty($next_post) ) return;
?>
<div class="l-page-navigation">
    <nav class="page-navigation">
        <ul class="page-navigation-list">
            <li class="page-navigation-item page-navigation-item--prev">
                <?php if ( !empty($prev_post)) : ?>
                    <a class="page-navigation-link page-navigation-link" href="<?= get_permalink($prev_post->ID) ?>" title="<?= $prev_post->post_title ?>">
                        <span class="page-navigation-svg">
                            <?= get_svg('sprite-page-navigation-arrow') ?>
                        </span>
                        <span class="page-navigation-text">
                            PREV
                        </span>
                    </a>
                <?php endif; ?>
            </li>
            <li class="page-navigation-item page-navigation-item--next">
                <?php if ( !empty($next_post)) : ?>
                    <a class="page-navigation-link page-navigation-link" href="<?= get_permalink($next_post->ID) ?>" title="<?= $next_post->post_title ?>">
                        <span class="page-navigation-svg">
                            <?= get_svg('sprite-page-navigation-arrow') ?>
                        </span>
                        <span class="page-navigation-text">
                            NEXT
                        </span>
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
</div>
