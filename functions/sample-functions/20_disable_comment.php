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

;

add_filter('rewrite_rules_array', 'delete_comment_rewrite_rules');
function delete_comment_rewrite_rules($rules)
{
    foreach ([
                 'feed/(feed|rdf|rss|rss2|atom)/?$',
                 '(feed|rdf|rss|rss2|atom)/?$',
                 'embed/?$',
                 'page/?([0-9]{1,})/?$'
             ] as $rule) unset($rules[$rule]);
    return $rules;
}