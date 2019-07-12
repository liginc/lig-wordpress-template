<?php
get_header();

$queried_object = get_queried_object();

switch (true) {
    case is_post_type_archive():
        $title = $queried_object->label;
        $slug = $queried_object->name;
        $permalink = get_post_type_archive_link($queried_object->label);
        break;
    case is_tax():
        $title = $queried_object->label;
        $slug = $queried_object->taxonomy;
        $permalink = get_term_link($queried_object->term_id, $queried_object->taxonomy);
        break;
    case is_search():
        $title = $queried_object->s;
        $slug = 'search';
        $permalink = HOME_URL . $_SERVER['REQUEST_URI'];
        break;

}

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
    <div class="l-lower <?= get_modified_class('l-archive', $slug) ?>">
        <section class="<?= get_modified_class('archive', $slug) ?>">
            <?php import_part('lower-header', $lower_header) ?>
            <div class="<?= get_modified_class('l-content_body', $slug) ?>">
                <div class="content_body">
                    <?php
                    if (have_posts()) :
                        import_part('article-list');
                    else:
                        ?>
                        <p>No results...</p>
                    <?php endif; ?>
                </div>
                <?php import_module('common/page-navigation') ?>
            </div>
        </section>
    </div>
<?php
get_footer();

