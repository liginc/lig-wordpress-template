<?php
extract(import_vars_whitelist(get_defined_vars()));
?>
<div id="scroll-top" class="scroll-top">
    <a class="scroll-top__link" href="#body">
        <div class="scroll-top__svg">
            <?= get_svg_sprite('icon-angle') ?>
        </div>
    </a>
</div>
<footer id="footer" class="<?= get_modified_class('footer', $modifier) ?><?= get_additional_class($additional) ?>">
    <div class="footer__main">
        <div class="footer__logo">
            <?= get_svg_sprite('logo') ?>
        </div>
        <div class="footer__sns-menu">
            <?php import_part('sns-menu', ['modifier' => 'footer']) ?>
        </div>
        <?php import_part('footer-menu') ?>
        <div class="footer__copy">
            <small class="footer__copy-text">
                &copy; 20xx All Rights Reserved.
            </small>
        </div>
    </div>
</footer>