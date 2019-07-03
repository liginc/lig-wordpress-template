<?php

/**
 * Hide WP version
 */
remove_action('wp_head', 'wp_generator');

/**
 * Disable auto update
 */
define('AUTOMATIC_UPDATER_DISABLED', true);

/**
 * Disable xmlrpc.php
 */
add_filter(‘xmlrpc_enabled’, ‘__return_false’);

function remove_x_pingback($headers) {
    unset($headers[‘X-Pingback’]);
    return $headers;
}
add_filter(‘wp_headers’, ‘remove_x_pingback’);

