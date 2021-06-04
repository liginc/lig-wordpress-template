<?php
extract(import_vars_whitelist(get_defined_vars()));
$title_tag = is_front_page() ? 'h1' : 'span';
?>

<header id="header" class="<?= get_modified_class('header', $modifier) ?><?= get_additional_class($additional) ?>">
    <div class="header__main">
        <<?= $title_tag ?> class="header__title">
            <a class="header__title-link" href="<?= URL_HOME ?>">
                <span class="header__title-logo">
                    <?= get_svg_img('logo', ['base64' => true, 'alt' => NAME_SITE]) ?>
                </span>
            </a>
        </<?= $title_tag ?>>
        <?php import_part('header-menu') ?>
        <?php import_part('hamburger') ?>
    </div>
</header>