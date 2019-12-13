<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?= FAVICON ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= TOUCH_ICON ?>">
    <link rel="stylesheet" href="<?= APP_CSS ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>