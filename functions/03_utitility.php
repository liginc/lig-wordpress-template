<?php
/**
 * Enable post thumbnail
 */
add_theme_support('post-thumbnails');

/**
 * encode
 */
function xss($str = null)
{
    return htmlentities($str, ENT_QUOTES, 'UTF-8');
}

/**
 * Get first term object
 */
function get_first_term($post_id, $tax = 'category')
{
    $terms = get_the_terms($post_id, $tax);

    if (!empty($terms[0])) {
        return $terms[0];
    } else {
        return array();
    }
}

/**
 * Get post thumbnail
 */
function get_the_eyecatch($post_id = null, $thumbnail = 'full', $noimage = false, $only_url = true)
{
    if (is_null($post_id)) {
        if (!empty($GLOBALS['post'])) {
            $post_id = $GLOBALS['post']->ID;
        } else {
            if (!$noimage) {
                return false;
            } else {
                return NO_IMAGE;
            }
        }
    }
    if (has_post_thumbnail($post_id)) {
        return ($only_url) ? wp_get_attachment_image_url(get_post_thumbnail_id($post_id), $thumbnail, true) : wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $thumbnail, true);
    } elseif (!$noimage) {
        return false;
    } else {
        return NO_IMAGE;
    }
}