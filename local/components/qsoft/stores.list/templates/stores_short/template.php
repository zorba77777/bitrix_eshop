<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<section class="shops_block">

    <h2 class="inline-block"><?=GetMessage('OUR_SALONS')?></h2>
    <?php if (!empty($arParams['DETAIL_URL'])) :?>
        <span class="dark_grey all_list">
	&nbsp;/&nbsp;
	<a href="<?=$arParams['DETAIL_URL']?>" class="text_decor_none"><b><?=GetMessage('ALL')?></b></a>
</span>
    <?php endif?>

    <div>

        <?php foreach ($arResult['ITEMS'] as $item) :?>
            <figure class="shops_block_item">
                <?php if ($arResult['SRCS'][$item['PREVIEW_PICTURE']]) :?>
                    <img src="<?=$arResult['SRCS'][$item['PREVIEW_PICTURE']]?>"/>
                <?php else: ?>
                    <img src="<?=PATH_DEFAULT_PIC?>"/>
                <?php endif;?>
                <figcaption class="shops_block_item_description">
                    <h3 class="shops_block_item_name"><?=$item['NAME']?></h3>
                    <p class="dark_grey"><?=$item['PROPERTY_ADDRESS_VALUE']?></p>
                    <p class="black"><?=$item['PROPERTY_PHONE_VALUE']?></p>
                    <p><?=GetMessage('WORK_HOURS')?>:<br/><?=$item['PROPERTY_WORK_HOURS_VALUE']?></p>
                </figcaption>
            </figure>
        <?php endforeach?>
    </div>
</section>
