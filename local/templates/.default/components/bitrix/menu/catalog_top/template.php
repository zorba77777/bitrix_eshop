<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?php if (!empty($arResult)):?>
    <nav class="main_menu">
        <ul>
            <?php
            $previousLevel = 0;
            foreach($arResult as $arItem):?>
            <?php if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
            <?php endif ?>

            <?php if ($arItem["IS_PARENT"]):?>
            <li class="<?=($arItem["SELECTED"]) ? 'submenu current' : 'submenu pie'?>">
                <span><?=$arItem["TEXT"]?></span>
                <div class="submenu_border"></div>
                <ul>
                    <?php else:?>
                        <?php if ($arItem["SELECTED"]):?>
                            <li class="current"><span><?=$arItem["TEXT"]?></span></li>
                        <?php else:?>
                            <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                        <?php endif?>
                    <?php endif?>

                    <?php $previousLevel = $arItem["DEPTH_LEVEL"];?>

                    <?php endforeach ?>

                    <?php if ($previousLevel > 1): ?>
                        <?=str_repeat("</ul></li>", ($previousLevel - 1) );?>
                    <?php endif ?>

                </ul>
    </nav>
<?php endif;
