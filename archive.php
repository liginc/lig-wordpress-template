<?php
$queried_object = get_queried_object();

$mv = [
    'img' => $post->post_type.'/mv.jpg',
    'jp' => 'お知らせ',
    'en' => $queried_object->label,
    'h1' => true,
    'description' => '〇〇のお知らせです。',
    'modifier' => 'archive-'.$post->post_type
];

$breadcrumbs = [
    [
        'text' => NAME_HOME,
        'href' => URL_HOME
    ],
    [
        'text' => $queried_object->label,
        'href' => get_post_type_archive_link($queried_object->name)
    ],
];
$article = [
    'taxonomy' => $queried_object->name . '-category',
    //'tag_taxonomy' => $queried_object->name . '-tag',
    'modifier' => $queried_object->name
];
get_header();
import_part('common/mv', $mv);
import_part('common/breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
?>
    <div class="utl-main-layout utl-main-layout--under-layer">
        <?php
        if (have_posts()):
            ?>
            <ul class="archive__article-list">
                <?php
                //while (have_posts()): the_post();
                for ($i = 0; $i <= 11; $i++):
                    ?>
                    <li class="archive__article-item">
                        <?php
                        import_part('common/article', $article);
                        ?>
                    </li>
                <?php
                endfor;
                //endwhile;
                ?>
            </ul>
            <?php
            import_part('common/pagination');
        endif;
        ?>
    </div>

<?php
get_footer();