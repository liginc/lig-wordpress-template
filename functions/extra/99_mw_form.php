<?php
/**
 * MW WP Formの各要素を置換する際に使用
 *
 * Usage
 * テーマディレクトリにmw-wp-form/form-fieldsディレクトリを設置
 * 必要な要素のファイル（mwform_selectならselect.php）を作成し、lig_mw_input_html_filter(basename(__FILE__, ".php"), get_defined_vars());の１行を記述
 * classにlig_mw_callback_xxを指定するとコールバック関数が有効化される
 */
function lig_mw_input_html_filter($type, $attr = [])
{
    $path = WP_PLUGIN_DIR . '/mw-wp-form/templates/form-fields/' . $type . '.php';

    if (!array_key_exists('MW_WP_Form', $GLOBALS) || !is_file($path)) return;

    extract($attr);

    if (!empty($fields)) $classes = $fields[0]['class'];

    if (isset($classes)) foreach (explode(' ', $classes) as $class) if (strpos($class, 'lig_mw_callback_') === 0 && function_exists($class)) {
        $callbacks[] = $class;
    }

    ob_start();
    include($path);
    $buffer = ob_get_contents();
    ob_end_clean();

    if (!empty($callbacks)) {
        foreach ($callbacks as $callback) $buffer = $callback($buffer);
    }

    echo $buffer;
}

function lig_mw_callback_required($html)
{
    return preg_replace('/^<(\S+?) /', '<$1 required ', $html);
}