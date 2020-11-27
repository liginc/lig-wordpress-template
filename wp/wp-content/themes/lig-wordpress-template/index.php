<?php

$article = [
    'taxonomy' => 'news-category',
    'modifier' => 'index-news'
];
$news_more_button = [
    'text' => 'もっと見る',
    'href' => ''/*URL_NEWS*/,
    'modifier' => 'index-news'
];
get_header();
?>
    <div class="index">
        <section class="index-mv">

        </section>
        <?php if (have_posts()) : ?>
            <section class="index-news">
                <div class="index-news__main utl-main-layout">
                    <h2 class="index-news__heading utl-page-heading">NEWS</h2>
                    <ul class="index-news__list">
                        <?php while (have_posts()): the_post(); ?>
                            <li class="index-news__item">
                                <?php
                                import_part('article', $article);
                                ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php import_part('button', $news_more_button) ?>
                </div>
            </section>
        <?php
        endif;
        ?>
    </div>
<?php
get_footer();