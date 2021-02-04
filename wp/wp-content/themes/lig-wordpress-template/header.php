<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="<?= URL_FAVICON ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= URL_TOUCH_ICON ?>">
    <link rel="stylesheet" href="<?= URL_APP_CSS ?>">
    <?php wp_head(); ?>
</head>
<body id="body" <?php body_class(); ?>>
<?= file_get_contents(PATH_SVG_SPRITE); ?>
<?php import_part('header') ?>