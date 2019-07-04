<?php

/**
 * Hide menu items
 */
function lig_wp_remove_menus()
{
    remove_menu_page('upload.php');
    remove_menu_page('edit-comments.php');
    if (!is_super_admin()) {
        remove_menu_page('tools.php');
        remove_submenu_page('index.php', 'update-core.php');
    }
}

add_action('admin_menu', 'lig_wp_remove_menus');