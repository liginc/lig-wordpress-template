<?php

/**
 * 抜粋の文字数設定.
 *
 * @param unknown_type $length
 *
 * @return number
 */
function set_excerpt_mblength($length)
{
    return 59;
}

//add_filter('excerpt_mblength', 'set_excerpt_mblength');

/**
 * 抜粋の文末変更.
 *
 * @param unknown_type $more
 *
 * @return string
 */
function set_excerpt_more($more)
{
    return '...';
}

//add_filter('excerpt_more', 'set_excerpt_more');
