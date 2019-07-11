<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|'); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo resolve_asset_url('/images/favicon.ico'); ?>">
    <link rel="apple-touch-icon-precomposed"
          href="<?php echo resolve_asset_url('/images/apple-touch-icon-precomposed.png'); ?>">
    <link rel="stylesheet" href="<?php echo resolve_asset_url('/css/style.css'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="l-header">
    <?php import_module('common/header'); ?>
</div>

<main class="main" role="main">
    <div class="l-content">
        <div class="content">