<?php
$menu = [
    /**
     * template
    [
    'text' => string: $url,
    'href' => string: $href,
    'modifier' => string: $modifier(optional),
    'is-current' => bool: $is-current(optional),
    'is-blank' => bool: $is-blank(optional),
    ],
     */
    [
        'text' => NAME_HOME,
        'href' => URL_HOME,
        'is-current' => is_front_page(),
    ],
    [
        'text' => NAME_ABOUT,
        'href' => URL_ABOUT,
        'is-current' => is_page('about'),
    ],
    [
        'text' => NAME_SERVICE,
        'href' => URL_SERVICE,
        'is-current' => is_page('service'),
    ],
    [
        'text' => NAME_NEWS,
        'href' => URL_NEWS,
        'is-current' => is_post_type_archive('news') || is_tax('news-category') || is_singular('news'),
    ],
    [
        'text' => NAME_CASE,
        'href' => URL_CASE,
        'is-current' => is_post_type_archive('case') || is_tax('case-category') || is_singular('case'),
    ],
    [
        'text' => NAME_RECRUIT,
        'href' => URL_RECRUIT,
        'is-current' => is_post_type_archive('recruit') || is_tax('recruit-category') || is_singular('recruit'),
    ],
    [
        'text' => NAME_CONTACT,
        'href' => URL_CONTACT,
        'is-current' => is_page('contact') || is_page('confirm') || is_page('complete'),
    ],
];

$title_tag = is_front_page() ? 'h1' : 'span';
?>

<header id="header" class="header utl-container">
    <div class="header__main utl-main-layout utl-main-layout--wide">
        <<?= $title_tag ?> class="header-title">
        <a class="header-title__link" href="<?= URL_HOME ?>">
            <img class="header-title__logo" src="<?= resolve_uri('/assets/svg/logo.svg') ?>" alt="<?= NAME_SITE ?>" width="300" height="96" loading="lazy">
        </a>
        </<?= $title_tag ?>>
        <nav id="header-menu" class="header-menu">
            <ul class="header-menu__list">
                <?php foreach ($menu as $m): ?>
                    <li class="header-menu__item">
                        <a class="header-menu__link
                                <?php if (array_key_exists('modifier', $m)) echo get_modified_class('header-menu__link', $m['modifier']) ?>
                                <?php if (array_key_exists('is-current', $m)) echo is_current($m['is-current']) ?>"
                           href="<?= $m['href'] ?>"
                            <?php if (array_key_exists('is-blank', $m)) echo is_blank($m['is-blank']) ?>
                        >
                                    <span class="header-menu__text">
                                        <?= $m['text'] ?>
                                    </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <button id="burger" class="burger utl-only-sp utl-center">
            <div class="burger__main">
                <div class="burger__line burger__line--first"></div>
                <div class="burger__line burger__line--second"></div>
                <div class="burger__line burger__line--third"></div>
            </div>
        </button>
    </div>
</header>