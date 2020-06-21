<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php IncludeTemplateLangFile(__FILE__); ?>
<?php if (!empty($arResult)): ?>
    <aside class="left_block">
        <nav>
            <ul class="left_menu">
                <li>
                    <span><?= GetMessage('INFORMATION') ?></span>
                    <ul>
                        <?php foreach ($arResult as $arItem): ?>
                            <li><a <?= ($arItem["SELECTED"]) ? 'class="selected"' : '' ?> href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
<?php endif; ?>

			
