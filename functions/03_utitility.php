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

/**
 * Include SVG
 */
function get_svg($name)
{
    return '<svg class="svg-sprite svg-' . $name . '" role="img"><use xlink:href="' . get_template_directory_uri() . '/assets/svg/sprite.svg#' . $name . '" xmlns:xlink="http://www.w3.org/1999/xlink"></use></svg>';
}

/**
 * return target="_blank"
 * $flg Boolean
 */
function is_blank($flg) {
    return ($flg) ? ' target="_blank"' : '';
}

/**
 * return ' is-current'
 * $flg Boolean
 */
function is_current($flg) {
    return ($flg) ? ' is-current' : '';
}

/**
 * Attach modifier class
 */
function get_modifier_class($class_name,$modifier) {
    return ( !empty($modifier) ) ? ' '.$class_name.'--'.$modifier : '';
}