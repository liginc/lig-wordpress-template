<?php

/**
 * Hide dashboard menu items
 */
function lig_wp_remove_menus()
{
    remove_menu_page('upload.php');
    if (!is_super_admin()) {
        remove_menu_page('tools.php');
        remove_submenu_page('index.php', 'update-core.php');
    }
}
add_action('admin_menu', 'lig_wp_remove_menus');

/**
 * Disable quick edit
 */
function hide_quickedit( $actions ) {
    unset( $actions['inline hide-if-no-js'] );
    return $actions;
}
add_filter( 'post_row_actions', 'hide_quickedit' );
add_filter( 'page_row_actions', 'hide_quickedit' );