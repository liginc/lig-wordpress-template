<?php
/**
 * args:
 * 'img' => 'news/mv.jpg',
 * 'jp' => '',
 * 'en' => '',
 * 'h1' => true
 * 'description' => '',
 * 'modifier' => ''
 */
$tag = ($h1) ? 'h1' : 'div';
?>
<section class="<?= get_modified_class('mv', $modifier) ?>">
    <div class="mv__main utl-main-layout">
        <<?= $tag ?> class="mv__title">
            <span class="mv__title-jp"><?= $jp ?></span>
            <span class="mv__title-en"><?= $en ?></span>
        </<?= $tag ?>>
        <p class="mv__description"><?= $description ?></p>
    </div>
    <?= srcset($img, $description, 'mv__bg') ?>
</section>
