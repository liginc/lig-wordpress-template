<?php
/**
 * WordPress SEOプラグイン利用時に使用する関数です。
 * 静的ページのmetaタグ関連を設定します。
 * 使用する際はデフォルトで指定するキーワード、タイトル、ディスクリプションを必ず記載してください。
 *
 * @param unknown_type $title
 * @param unknown_type $args
 */
function _set_static_meta($title, $args = array())
{
    global $seo_title, $seo_metadesc, $seo_key;

    $seo_title = $title;

    add_filter('wpseo_title', $title);

    if (isset($args['metadesc'])) {
        $seo_metadesc = $args['metadesc'];
    } else {
        //デフォルトのディスクリプション
        $seo_metadesc = 'ダミーディスクリプション';
    }

    if (isset($args['key'])) {
        $seo_key = $args['key'];
    } else {
        //デフォルトのキーワード
        $seo_key = 'ダミーキーワード';
    }

    add_filter('wpseo_metadesc', $seo_metadesc);
    add_filter('wpseo_metakey', $seo_key);
}

