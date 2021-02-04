<?php
$title_tag = is_front_page() ? 'h1' : 'span';
?>

<header id="header" class="header utl-container">
    <div class="header__main">
        <<?= $title_tag ?> class="header-title">
        <a class="header-title__link" href="<?= URL_HOME ?>">
            <img class="header-title__logo" src="<?= resolve_uri('/assets/svg/logo.svg') ?>" alt="<?= NAME_SITE ?>"
                 width="300" height="96" loading="lazy">
        </a>
    </<?= $title_tag ?>>
    <?php import_part('header-menu') ?>
    <?php import_part('hamburger') ?>
    </div>
</header>