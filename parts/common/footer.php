<?php
$menu = [
    /**
     * template
    [
    'text' => string: $url,
    'href' => string: $href,
    'modifier' => string: $modifier(optional),
    'is-blank' => bool: $is-blank(optional),
    ],
     */
    [
        'text' => NAME_HOME,
        'href' => URL_HOME,
    ],
    [
        'text' => NAME_ABOUT,
        'href' => URL_ABOUT,
    ],
    [
        'text' => NAME_SERVICE,
        'href' => URL_SERVICE,
    ],
    [
        'text' => NAME_NEWS,
        'href' => URL_NEWS,
    ],
    [
        'text' => NAME_CASE,
        'href' => URL_CASE,
    ],
    [
        'text' => NAME_RECRUIT,
        'href' => URL_RECRUIT,
    ],
    [
        'text' => NAME_CONTACT,
        'href' => URL_CONTACT,
    ],
    [
        'text' => NAME_PRIVACY,
        'href' => URL_PRIVACY,
    ],
]
?>
<div id="scroll-top" class="scroll-top utl-main-layout utl-main-layout--wide">
    <a class="scroll-top__link utl-center" href="#body">
                <div class="scroll-top__svg">
                    <?= get_svg_sprite('icon-angle') ?>
                </div>
    </a>
</div>
<footer id="footer" class="footer utl-container">
    <div class="footer__main utl-main-layout utl-main-layout--wide">
        <div class="footer__logo">
            <?= get_svg_sprite('logo') ?>
        </div>
        <div class="footer__sns-menu">
            <?php import_part('common/sns-menu',['modifier' => 'footer__sns-menu']) ?>
        </div>
        <nav class="footer-menu">
            <ul class="footer-menu__list">
                <?php foreach ($menu as $m): ?>
                    <li class="footer-menu__item">
                        <a class="footer-menu__link
                            <?php if (array_key_exists('modifier', $m)) echo get_modified_class('footer-menu__link', $m['modifier']) ?>"
                           href="<?= $m['href'] ?>"
                            <?php if (array_key_exists('is-blank', $m)) echo is_blank($m['is-blank']) ?>
                        >
                                <span class="footer-menu__text">
                                    <?= $m['text'] ?>
                                </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="footer-copy">
            <small class="footer-copy__text">
                &copy; 20xx All Rights Reserved.
            </small>
        </div>
    </div>
</footer>