<?php
if (empty($breadcrumbs)) return;
?>
<nav class="breadcrumbs">
    <ol class="breadcrumbs__list utl-main-layout">
        <?php
        foreach ($breadcrumbs as $k => $b):
            ?>
            <li class="breadcrumbs__item<?php if (count($breadcrumbs) === $k + 1) echo ' is-last' ?>">
                <?php
                if (count($breadcrumbs) > $k + 1):
                    ?>
                    <a class="breadcrumbs__link" href="<?= $b['href'] ?>">
                        <?= $b['text'] ?>
                    </a>
                <?php
                else:
                    ?>
                    <span class="breadcrumbs__link">
                        <?= $b['text'] ?>
                    </span>
                <?php
                endif;
                ?>
            </li>
        <?php
        endforeach;
        ?>
    </ol>
</nav>
