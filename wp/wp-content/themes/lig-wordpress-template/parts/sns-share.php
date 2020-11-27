<?php
$url = urlencode(get_permalink());
$share = [
    'twitter' => 'https://twitter.com/intent/tweet?url='.$url,
    'facebook' => 'https://www.facebook.com/sharer/sharer.php?u='.$url,
    'linked_in' => 'https://www.linkedin.com/shareArticle?mini=true&url='.$url,
    'hatebu' => 'http://b.hatena.ne.jp/add?mode=confirm&url='.$url,
    'line' => 'https://social-plugins.line.me/lineit/share?url='.$url,
];
?>
<div class="<?= (!empty($modifier)) ? get_modified_class('sns-share',$modifier) : 'sns-share' ?>">
    <div class="sns-share__heading">SHARE BUTTONS</div>
    <ul class="sns-share__list">
        <?php foreach($share as $s => $url): ?>
        <li class="sns-share__item">
            <a class="sns-share__link" href="<?= $url ?>"<?= is_blank(true) ?>>
                <div class="sns-share__svg">
                    <?= get_svg_sprite('icon-'.$s) ?>
                </div>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>