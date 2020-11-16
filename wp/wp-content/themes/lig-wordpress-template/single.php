<?php
$post_type_object = get_post_type_object($post->post_type);

$mv = [
    'img' => $post->post_type.'/mv.jpg',
    'jp' => 'お知らせ',
    'en' => $post_type_object->label,
    'h1' => false,
    'description' => '〇〇のお知らせです。',
    'modifier' => 'single-'.$post->post_type
];

$breadcrumbs = [
    [
        'text' => NAME_HOME,
        'href' => URL_HOME
    ],
    [
        'text' => $post_type_object->label,
        'href' => get_post_type_archive_link($post->post_type)
    ],
    [
        'text' => get_the_title(),
        'href' => null
    ],
];

$single_header = [
    'title' => get_the_title(),
    'datetime' => get_the_date('Y-m-d H:i:s'),
    'date' => get_the_date('Y.m.d'),
    'cat' => get_first_term(get_the_ID(), $post->post_type . '-category'),
    //'tags' => get_the_terms($post, $post->post_type.'-tag'),
    'modifier' => $post->post_type,
];

get_header();
import_part('common/mv', $mv);
import_part('common/breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
?>
    <div class="utl-main-layout utl-main-layout--under-layer utl-main-layout--narrow">
        <?= import_part('common/single-header', $single_header) ?>
        <div class="single-body">
            <?= get_the_thumb_with_srcset_webp($post, 'single-body__thumb') ?>
            <div class="single-body__content utl-content-body">
                <?php
                the_content();
                ?>
            </div>
            <?= import_part('common/sns-share') ?>
        </div>
    </div>
<?php
get_footer();