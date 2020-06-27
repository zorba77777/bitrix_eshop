<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $frame = $this->createFrame()->begin(""); ?>

<?php if (!empty($arResult)): ?>

    <div class="slider">
        <ul class="bxslider">
            <?php foreach ($arResult['BANNERS'] as $item): ?>
                <li>
                    <div class="banner">
                        <?= $item ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

<?php $frame->end();
