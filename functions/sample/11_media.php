<?php
/**
 * 記事詳細用
 */

//標準のsrcset埋め込みを外す
remove_filter('the_content', 'wp_make_content_images_responsive');

//initのフックにひっかける
add_action('init', 'lig_custom_madia');
function lig_custom_madia()
{
    //管理画面では動作させない
    if (!is_admin()) add_filter('the_content', 'get_custom_img_display');

    $sizes = RESIZE_IMAGE_SIZES;

    //各サイズごとに1xと2xの画像サイズを登録する（ex:1-thumb,2-thumb）
    foreach ($sizes as $size) {
        add_image_size('1-' . $size, $size, 9999);
        add_image_size('2-' . $size, $size * 2, 9999);
    }
}

//wp_make_content_images_responsiveを置換関数部分以外そのまま利用
function get_custom_img_display($content)
{
    if (!preg_match_all('/<img [^>]+>/', $content, $matches)) {
        return $content;
    }

    $selected_images = array();
    $attachment_ids = array();

    foreach ($matches[0] as $image) {
        if (false === strpos($image, ' srcset=') && preg_match('/wp-image-([0-9]+)/i', $image, $class_id)) {
            $attachment_id = absint($class_id[1]);

            if ($attachment_id) {
                /*
                 * If exactly the same image tag is used more than once, overwrite it.
                 * All identical tags will be replaced later with 'str_replace()'.
                 */
                $selected_images[$image] = $attachment_id;
                // Overwrite the ID when the same image is included more than once.
                $attachment_ids[$attachment_id] = true;
            }
        }
    }

    if (count($attachment_ids) > 1) {
        /*
         * Warm the object cache with post and meta information for all found
         * images to avoid making individual database calls.
         */
        _prime_post_caches(array_keys($attachment_ids), false, true);
    }

    foreach ($selected_images as $image => $attachment_id) {
        $image_meta = wp_get_attachment_metadata($attachment_id);
        $alt = (preg_match('/ alt="(.*?)"/',$image,$matches)) ? $matches[1] : get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
        $content = str_replace($image, set_srcset_and_webp_with_source_tag($image_meta, $alt), $content); //ここ
    }

    return $content;
}

/**
 * 一覧ページなどのサムネイル用
 */
function get_the_thumb_with_srcset_webp($post = null, $mode = 'full')
{
    if (is_null($post)) $post = $GLOBALS['post'];
    $attachment_id = get_post_meta($post->ID, '_thumbnail_id', true);
    if (empty($attachment_id)) return;

    return get_srcset_webp_by_attachement_id($attachment_id, $post->post_title, $mode);
}

/**
 * トップピックアップNews用
 */
function get_top_pickup_thumb_with_srcset_webp($post = null, $mode = 'full')
{
    if (is_null($post)) $post = $GLOBALS['post'];

    if($post->post_type === "news") return srcset('news.jpg');

    $attachment_id = get_post_meta($post->ID, '_thumbnail_id', true);
    if (empty($attachment_id)) return;

    return get_srcset_webp_by_attachement_id($attachment_id, $post->post_title, $mode);
}

/**
 * attachment_idからsourceを取得
 */
function get_srcset_webp_by_attachement_id($attachment_id = null, $alt = '', $mode = 'full')
{
    if (is_null($attachment_id)) return;

    $image_meta = wp_get_attachment_metadata($attachment_id);
    $alt = (!empty($alt)) ? $alt : (!empty ($attachment_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true))) ? $attachment_alt : get_the_title($attachment_id);

    return set_srcset_and_webp_with_source_tag($image_meta, $alt, $mode);
}


/**
 * メインの関数
 */
function set_srcset_and_webp_with_source_tag($image_meta, $alt = '', $mode = 'full')
{
    $mode = constant('IMAGE_SIZES_' . strtoupper($mode));
    $uploads = wp_upload_dir();
    $file_dir = '/' . preg_replace('/\/[^\/]+$/', '', $image_meta['file']) . '/';
    $base_url = $uploads['baseurl'] . $file_dir; //対象ディレクトリのurl
    $base_path = $uploads['basedir'] . $file_dir; //対象URLのパス
    $width = $image_meta['width'];
    $height = $image_meta['height'];

    if (array_key_exists('default', $mode)) {
        $default = $mode['default'];
        unset($mode['default']);
    } else {
        $default = 'original';
    }

    //オリジナルとwebpそれぞれのhtmlを入れる用の変数
    $original = '';
    $webp = '';

    foreach ($mode as $mq => $size) {

        if (!array_key_exists('1-' . $size, $image_meta['sizes'])) continue;

        $original_srcset = '';
        $webp_srcset = '';

        $original_srcset = $base_url . $image_meta['sizes']['1-' . $size]['file'] . ' 1x';
        if (file_exists($base_path . $image_meta['sizes']['1-' . $size]['file'] . '.webp')) {
            $webp_srcset = $base_url . $image_meta['sizes']['1-' . $size]['file'] . '.webp 1x';
        }
        if (array_key_exists('2-' . $size, $image_meta['sizes'])) {
            $original_srcset .= ', ' . $base_url . $image_meta['sizes']['2-' . $size]['file'] . ' 2x';
            if (file_exists($base_path . $image_meta['sizes']['2-' . $size]['file'] . '.webp')) {
                $webp_srcset .= ', ' . $base_url . $image_meta['sizes']['2-' . $size]['file'] . '.webp 2x';
            }
        } else {
            $original_srcset .= ', ' . $uploads['baseurl'] . '/' . $image_meta['file'] . ' 2x';
            if (file_exists($uploads['basedir'] . '/' . $image_meta['file'] . '.webp')) {
                $webp_srcset .= ', ' . $uploads['baseurl'] . '/' . $image_meta['file'] . '.webp 2x';
            }
        }

        //1xと2xをimplodeしたsourceを追加
        if (!empty($original_srcset)) $original .= '<source media="(max-width: ' . $mq . 'px)" srcset="' . $original_srcset . '">';
        //webpもあれば
        if (!empty($webp_srcset)) $webp .= '<source type="image/webp" media="(max-width: ' . $mq . 'px)" srcset="' . $webp_srcset . '">';
    }

    $default_original_srcset = '';
    $default_webp_srcset = '';
    $src = $uploads['baseurl'] . '/' . $image_meta['file'];

    if ($default !== 'original' && array_key_exists('1-' . $default, $image_meta['sizes'])) {

        $width = $image_meta['sizes']['1-' . $default]['width'];
        $height = $image_meta['sizes']['1-' . $default]['height'];

        $default_original_srcset = $base_url . $image_meta['sizes']['1-' . $default]['file'] . ' 1x';
        if (file_exists($base_path . $image_meta['sizes']['1-' . $default]['file'] . '.webp')) {
            $default_webp_srcset = $base_url . $image_meta['sizes']['1-' . $default]['file'] . '.webp 1x';
        }

        if (array_key_exists('2-' . $default, $image_meta['sizes'])) {
            $default_original_srcset .= ', ' . $base_url . $image_meta['sizes']['2-' . $default]['file'] . ' 2x';
            if (file_exists($base_path . $image_meta['sizes']['2-' . $default]['file'] . '.webp')) {
                $default_webp_srcset .= ', ' . $base_url . $image_meta['sizes']['2-' . $default]['file'] . '.webp 2x';
            }
        } else {
            $default_original_srcset .= ', ' . $uploads['baseurl'] . $image_meta['file'] . ' 2x';
            if (file_exists($uploads['basedir'] . '/' . $image_meta['file'] . '.webp')) {
                $default_webp_srcset .= ', ' . $uploads['baseurl'] . '/' . $image_meta['file'] . '.webp';
            }
        }
        $default_original_srcset = ' srcset="' . $default_original_srcset . '"';
        $src = $base_url . $image_meta['sizes']['1-' . $default]['file'];
    } elseif (file_exists($uploads['basedir'] . '/' . $image_meta['file'] . '.webp')) {
        $default_webp_srcset = $uploads['baseurl'] . '/' . $image_meta['file'] . '.webp';
    }

    if (!empty($default_webp_srcset)) $webp .= '<source type="image/webp" srcset="' . $default_webp_srcset . '">';

    $ima_tag = '<img src="' . $src . '"' . $default_original_srcset . ' width="' . $width . '" height="' . $height . '" alt="' . $alt . '" loading="lazy">';

    return '<picture>' . $webp . $original . $ima_tag . '</picture>';
}

/**
 * assts内の画像をpicture化
 */
function srcset($path, $alt = '', $class = '', $mode = 'full')
{
    if (!defined('IMAGE_SIZES_' . strtoupper($mode))) return;
    $image_size = getimagesize(PATH_IMAGES . $path);
    $sizes = RESIZE_IMAGE_SIZES;
    preg_match('/^(.+?)(\..+?)$/', $path, $parsed);
    $files = glob(PATH_IMAGES . $parsed[1] . '*');
    $mode = constant('IMAGE_SIZES_' . strtoupper($mode));
    $original = '';
    $webp = '';
    $default_srcset = [];
    if (array_key_exists('default', $mode) && $mode['default'] !== 'original') {
        foreach ($sizes as $s) {
            if ($s < $mode['default']) continue;
            if (!array_key_exists(1, $default_srcset['original']) && in_array(PATH_IMAGES . $parsed[1] . '-resized-' . $s . $parsed[2], $files)) {
                $default_srcset['original'][1] = resolve_uri(URL_IMAGES . $parsed[1] . '-resized-' . $s . $parsed[2]) . ' 1x';
                $default_srcset['webp'][1] = resolve_uri(URL_IMAGES . $parsed[1] . '-resized-' . $s . ' webp') . ' 1x';
                continue;
            }
            if ($s >= ($mode['default'] * 2) && in_array(PATH_IMAGES . $parsed[1] . '-resized-' . $s . $parsed[2], $files)) {
                $default_srcset['original'][2] = resolve_uri(URL_IMAGES . $parsed[1] . '-resized-' . $s . $parsed[2]) . ' 2x';
                $default_srcset['webp'][2] = resolve_uri(URL_IMAGES . $parsed[1] . '-resized-' . $s . '.webp') . ' 2x';
                break;
            }
            if ($s === end($sizes) && array_key_exists(1, $default_srcset['original'])) {
                $default_srcset['original'][2] = resolve_uri(URL_IMAGES . $path) . ' 2x';
                $default_srcset['webp'][2] = resolve_uri(URL_IMAGES . $parsed[1]) . '.webp 2x';
            }
        }
    }

    if (array_key_exists('default', $mode)) unset($mode['default']);

    foreach ($mode as $k => $v) {
        $original_files = [];
        $webp_files = [];
        foreach ($sizes as $s) {
            if ($s < $v) continue;
            if (!array_key_exists(1, $original_files) && in_array(PATH_IMAGES . $parsed[1] . '-resized-' . $s . $parsed[2], $files)) {
                $original_files[1] = resolve_uri(URL_IMAGES . $parsed[1] . '-resized-' . $s . $parsed[2]) . ' 1x';
                $webp_files[1] = resolve_uri(URL_IMAGES . $parsed[1] . '-resized-' . $s . '.webp') . ' 1x';
                continue;
            }
            if ($s >= ($v * 2) && in_array(PATH_IMAGES . $parsed[1] . '-resized-' . $s . $parsed[2], $files)) {
                $original_files[2] = resolve_uri(URL_IMAGES . $parsed[1] . '-resized-' . $s . $parsed[2]) . ' 2x';
                $webp_files[2] = resolve_uri(URL_IMAGES . $parsed[1] . '-resized-' . $s . '.webp') . ' 2x';
                break;
            }
            if ($s === end($sizes) && array_key_exists(1, $original_files)) {
                $original_files[2] = resolve_uri(URL_IMAGES . $path) . ' 2x';
                $webp_files[2] = resolve_uri(URL_IMAGES . $parsed[1]) . '.webp 2x';
            }
        }
        if (!empty($original_files)) $original .= '<source media="(max-width: ' . $k . 'px)" srcset="' . implode(',', $original_files) . '">';
        if (!empty($webp_files)) $webp .= '<source type="image/webp" media="(max-width: ' . $k . 'px)" srcset="' . implode(',', $webp_files) . '">';

        if ($v === end($mode) && in_array(PATH_IMAGES . $parsed[1] . '.webp', $files)) {
            $webp .= '<source type="image/webp" srcset="' . ((!empty($default_srcset)) ? implode(',', $default_srcset['webp']) : resolve_uri(URL_IMAGES . $parsed[1]) . '.webp') . '">';
        }
    }
    return '<picture>' . $webp . $original . '<img src="' . resolve_uri(URL_IMAGES . $path) . '" class="' . $class . '" alt="' . $alt . '" loading="lazy" ' . $image_size[3] . ((!empty($default_srcset)) ? ' srcset="' . implode(',', $default_srcset['original']) . '"' : '') . '></picture>';
}