<?php
/*
-MODULE:HEADER

-USAGE
import_part('/common/header');

-SAMPLE VARIABLES
$menu = [
    [
        'title' => 'TOP',
        'href' => HOME_URL,
        'current' => is_front_page()
    ],
    [
        'title' => 'ABOUT',
        'href' => ABOUT,
        'current' => is_page('about')
    ],
    [
        'title' => 'NEWS',
        'href' => NEWS,
        'current' => is_post_type_archive('news')
    ],
    [
        'title' => 'EXTERNAL LINK',
        'href' => EXTERNAL_LINK,
        'blank' => true,
    ],
];
 */
$menu = [];

?>
<header class="header">
    <h1 class="header__logo">
        <a class="header__logo-link" href="<?= HOME_URL ?>" title="<?= SITE_NAME ?>">
            <span class="header__logo-svg">
                <?= get_svg('sprite-logo'); ?>
            </span>
        </a>
    </h1>
    <div class="l-menu">
        <div class="l-menu-button">
            <button class="menu-button">

            </button>
        </div>
        <nav class="menu">
            <ul class="menu-list">
                <?php foreach ($menu as $item) import_part('menu-item', $item); ?>
            </ul>
        </nav>
    </div>
</header>