<?php
get_header();
the_post();

$title = $post->post_title;
$slug = $post->post_name;
$post_type = $post->post_type;
$permalink = get_the_permalink();

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
<div class="l-lower <?= get_modified_class('l-single',$post_type) ?>">
    <section class="<?= get_modified_class('single',$post_type) ?>">
        <?php import_part('lower-header', $lower_header) ?>
        <div class="<?= get_modified_class('l-content_body',$post_type) ?>">
            <div class="content_body">
                <?php the_content() ?>
            </div>
            <?php import_module('common/page-navigation') ?>
        </div>
    </section>
</div>
<?php
get_footer();