<?php
$mv = [
    'img' => $post->post_name.'/mv.jpg',
    'jp' => 'お知らせ',
    'en' => get_the_title(),
    'h1' => false,
    'description' => '〇〇のお知らせです。',
    'modifier' => 'page-'.$post->post_name
];

$breadcrumbs = [
    [
        'text' => NAME_HOME,
        'href' => URL_HOME
    ],
    [
        'text' => get_the_title(),
        'href' => null
    ],
];

$page_header = [
    'title' => get_the_title(),
    'modifier' => $post->post_name,
];

get_header();
import_part('mv', $mv);
import_part('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
?>
    <div class="utl-main-layout utl-main-layout--under-layer utl-main-layout--narrow">
        <?= import_part('page-header', $page_header) ?>
        <div class="page-body">
            <?= get_the_thumb_with_srcset_webp($post, 'single-body__thumb') ?>
            <div class="single-body__content utl-content-body">
                <?php
                the_content();
                ?>
            </div>
        </div>
    </div>

<?php
get_footer();