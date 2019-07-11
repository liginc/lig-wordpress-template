<?php
$args = [
    'breadcrumbs' =>
        [
            [
                'href' => HOME_URL,
                'title' => SITE_NAME,
            ],
            [
                'href' => 'dummy link',
                'title' => 'ABOUT',
            ],
        ]
];
get_header();
import_module('common/breadcrumbs');
the_title();
the_content();
import_module('common/pager');
get_footer();
