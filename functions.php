<?php
/**
 *  Auto load helper functions
 */
foreach (glob(TEMPLATEPATH . '/functions/autoload/*.php') as $file) {
    require_once $file;
}
