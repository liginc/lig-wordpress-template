<?php

/**
 * アセットディレクトリ配下の指定された $subpath の完全URLを生成します.
 *
 * @param string $subpath
 *
 * @return string
 */
function resolve_asset_url($subpath = '')
{
    return esc_url(add_anticache(rtrim(get_template_directory_uri(), '/').'/assets/'.ltrim($subpath, '/')));
}

/**
 * 指定された $path の完全URLを生成します.
 *
 * @param string $path
 *
 * @return string
 */
function resolve_url($path = '')
{
    return esc_url(get_home_url(null, $path));
}

/**
 * 特定の $post_type のアーカイブページURLを取得します。
 *
 * @param $post_type
 *
 * @return string
 */
function resolve_archive_url($post_type)
{
    if (false === $url = get_post_type_archive_link($post_type)) {
        throw new BadMethodCallException("Unsupported/unarchivable post_type [$post_type]");
    }

    return $url;
}

/**
 * 静的ファイルのキャッシュ対策としてファイルにクエリパラメータを追記して返します.
 *
 * @param [string] $file
 *
 * @return string
 */
function add_anticache($file)
{
    // anticache.jsonがある場合
    if ('' !== (string) ANTICACHE_HASH) {
        // svg fragment identifierの可能性を考慮
        $parts = explode('#', $file);
        $fragment = '';
        // #が含まれている場合
        if (false !== strpos($file, '#')) {
            $fragment = "#{$parts[1]}";
        }
        // ?が含まれていない場合
        if (false === strpos($parts[0], '?')) {
            $delimeter = '?';
        } else {
            $delimeter = '&';
        }
        $file = "{$parts[0]}{$delimeter}_=".ANTICACHE_HASH.$fragment;
    }

    return $file;
}
