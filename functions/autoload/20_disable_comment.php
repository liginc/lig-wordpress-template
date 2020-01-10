<?php

add_filter('comments_open', '__return_false');

add_action('init', 'remove_comment_rewrite_rule');
function remove_comment_rewrite_rule()
{
    global $wp_rewrite;
    unset($wp_rewrite->comments_base);
    unset($wp_rewrite->comments_pagination_base);
    return $wp_rewrite;
}

add_filter('rewrite_rules_array', 'delete_comment_rewrite_rules');
function delete_comment_rewrite_rules($rules)
{
    foreach ([
                 'comments/feed/(feed|rdf|rss|rss2|atom)/?$',
                 'comments/(feed|rdf|rss|rss2|atom)/?$',
                 'comments/embed/?$',
                 'comments/page/?([0-9]{1,})/?$'
             ] as $rule) if (!empty($rules[$rule])) unset($rules[$rule]);
    return $rules;
}

add_action('admin_menu', 'hide_comment_menus');
function hide_comment_menus()
{
    remove_menu_page('edit-comments.php');
}

/**
 * 記事一覧からコメントカラム削除
 */
add_filter('manage_posts_columns', 'customize_admin_manage_posts_comment_column');
function customize_admin_manage_posts_comment_column($columns)
{
    unset($columns['comments']); //コメントカラムの削除
    return $columns;
}