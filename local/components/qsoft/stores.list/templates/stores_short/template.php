<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if(!empty($arResult)): ?>
    <section class="shops_block">
        <h2 class="inline-block"><?=GetMessage('OUR_STORES')?></h2>
        <span class="dark_grey all_list">&nbsp;/&nbsp;<a href="/company/stores/" class="text_decor_none"><b><?=GetMessage('ALL_STORES')?></b></a></span>
        <div>
            <?php foreach ($arResult['ITEMS'] as $arItem): ?>
                <figure class="shops_block_item">
                    <?php if ($arResult['SRCS'][$arItem['PREVIEW_PICTURE']]) :?>
                        <img src="<?=$arResult['SRCS'][$arItem['PREVIEW_PICTURE']]?>"/>
                    <?php else: ?>
                        <img src="<?=PATH_DEFAULT_PIC?>"/>
                    <?php endif;?>
                    <figcaption class="shops_block_item_description">
                        <h3 class="shops_block_item_name"><?= $arItem['NAME'] ?></h3>
                        <p class="dark_grey"><?= $arItem['PROPERTY_ADDRESS_VALUE'] ?></p>
                        <p class="black"><?= $arItem['PROPERTY_PHONE_VALUE'] ?></p>
                        <p><?=GetMessage('WORK_HOURS')?><br/><?= $arItem['PROPERTY_WORK_HOURS_VALUE'] ?></p>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
