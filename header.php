<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?= URL_FAVICON ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= URL_TOUCH_ICON ?>">
    <link rel="stylesheet" href="<?= URL_APP_CSS ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?= file_get_contents(get_stylesheet_directory() . '/assets/svg/sprite.svg'); ?>