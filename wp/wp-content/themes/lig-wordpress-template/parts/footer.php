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
            <?php import_part('sns-menu',['modifier' => 'footer__sns-menu']) ?>
        </div>
        <?php import_part('footer-menu') ?>
        <div class="footer-copy">
            <small class="footer-copy__text">
                &copy; 20xx All Rights Reserved.
            </small>
        </div>
    </div>
</footer>