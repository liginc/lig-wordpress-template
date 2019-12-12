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
 * ( If don't use content image `add_filter( 'thumbnail_use_content_image', '__return_false' );` )
 */
function get_the_eyecatch($post_id = null, $size = 'large', $noimage = false, $only_url = true)
{
    $img_url = apply_filters('get_the_eyecatch', null, $post_id, $size, $noimage, $only_url);

    if (!empty($img_url)) return $img_url;

    if (is_null($post_id)) {
        if (!empty($GLOBALS['post'])) {
            $post_id = $GLOBALS['post']->ID;
        }
    }

    if (!empty($post_id)) {
        $use_content_image = apply_filters('thumbnail_use_content_image', true);
        if (has_post_thumbnail($post_id)) {
            return ($only_url) ? wp_get_attachment_image_url(get_post_thumbnail_id($post_id), $size, true) : wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $size, true);
        } elseif ($use_content_image && $content = parse_blocks(get_post($post_id)->post_content)) {
            foreach ($content as $block) {
                if ($block["blockName"] === "core/image") {
                    if (preg_match('/src="(.+?)"/', $block["innerHTML"], $match)) {
                        return $match[1];
                    }
                }
            }
        }
    }
    if ($noimage) {
        return NO_IMAGE;
    } else {
        return false;
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
function is_blank($flg)
{
    return ($flg) ? ' target="_blank"' : '';
}

/**
 * return ' is-current'
 * $flg Boolean
 */
function is_current($flg)
{
    return ($flg) ? ' is-current' : '';
}

/**
 * Attach modifier class
 */
function get_modified_class($class_name, $modifier)
{
    return (!empty($modifier)) ? $class_name . ' ' . $class_name . '--' . $modifier : $class_name;
}

/**
 * 対象の記事の最初のtermを取得します.
 */
function get_primary_term($post_id, $tax = 'category')
{
    $terms = get_the_terms($post_id, $tax);

    if (!empty($terms[0])) {
        return $terms[0];
    } else {
        return array();
    }
}