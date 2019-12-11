<?php
get_header();
the_post();

$title = $post->post_title;
$slug = $post->post_name;
$permalink = get_the_permalink();
$modifier = !empty($modifier) ? $modifier : '';

$breadcrumbs = [
    [
        'href' => HOME_URL,
        'title' => SITE_NAME,
    ],
    [
        'href' => $permalink,
        'title' => $title,
    ],
];

$lower_header = [
    'title' => $title,
    'modifier' => $slug
];

import_module('common/breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
?>
<div class="l-lower <?= get_modified_class('l-page',$slug) ?>">
    <section class="<?= get_modified_class('page',$slug) ?>">
        <?php import_part('lower-header', $lower_header) ?>
        <div class="<?= get_modified_class('l-content_body',$slug) ?>">
            <div class="content_body">
                <?php the_content() ?>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();