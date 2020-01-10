<?php

//add_image_size( 'hoge-thumbnail', 200, 200, false );	// アイキャッチサイズ指定



/**
 * ファイル保存しているカスタムフィールドからファイルリンクを取得する.
 *
 * @param unknown_type $postid 記事ID
 * @param unknown_type $key    ファイルを保持しているカスタムフィールドキー
 */
function get_customfield_filelink($postid, $key)
{
    $files = get_post_meta($postid, $key, false);
    foreach ($files as $file):
        $file = wp_get_attachment_url($file);

    return $file;
    endforeach;
}
