<?php
/**
 *  メインクエリーとかクエリー系処理を記載します。
 */
function change_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->is_front_page()) {
        $query->set('posts_per_pages', 3);
        $query->set('post_type', 'news');
    }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );
