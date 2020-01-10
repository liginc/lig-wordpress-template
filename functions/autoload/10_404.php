<?php
/**
 * 404 Redirection
 */

add_action('template_redirect', 'redirect_404');
function redirect_404()
{
    global $wp_query;
    switch (true) {
        #case is_post_type_archive('post_type_name'):
        #case is_tax('tax_name'):
        #case is_category():
        #case is_tag():
        #case is_search():
        case is_date():
        case is_attachment():
        case is_author():
            $wp_query->set_404();
            status_header(404);
            break;
    }
}