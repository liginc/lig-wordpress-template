<?php
get_header();

$title = '404 Not Found';
$slug = '404';

$breadcrumbs = [
    [
        'href' => HOME_URL,
        'title' => SITE_NAME,
    ],
    [
        'href' => '',
        'title' => '404 Not Found',
    ],
];

$lower_header = [
    'title' => $title,
    'modifier' => $slug
];

import_module('common/breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
?>
<div class="l-lower l-page<?= get_modified_class('l-page', $slug) ?>">
    <section class="<?= get_modified_class('page', $slug) ?>">
        <?php import_part('lower-header', $lower_header) ?>
        <div class="<?= get_modified_class('l-content_body', $slug) ?>">
            <div class="content_body">
                <p>お探しのページは見つかりませんでした</p>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();
