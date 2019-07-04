<?php
/**
 * Define theme version
 */
define('THEME_VERSION', wp_get_theme()->get('Version'));

/*
 * functionsフォルダにあるファイルをすべて読み込む
*/
foreach (glob(TEMPLATEPATH . '/functions/*.php') as $file) {
    require_once $file;
}
