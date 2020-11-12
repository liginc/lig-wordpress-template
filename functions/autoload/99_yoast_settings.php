<?php
if (defined('WPSEO_FILE')) {
    add_action('init', function () {
        new LIG_YOAST_SETTINGS();
    }, 1);
}