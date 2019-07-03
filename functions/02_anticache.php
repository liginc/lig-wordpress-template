<?php
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
