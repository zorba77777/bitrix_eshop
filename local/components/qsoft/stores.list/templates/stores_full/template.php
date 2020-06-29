<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if(!empty($arResult)): ?>
    <section class="shops_block">
        <div>
            <?php foreach ($arResult['ITEMS'] as $arItem): ?>
                <?php                

                $this->AddEditAction($arItem['ID'], $arItem['ADD_LINK'], $arItem["ADD_LINK_TEXT"]);
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $arItem["EDIT_LINK_TEXT"]);
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $arItem["DELETE_LINK_TEXT"], ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                ?>
                <figure style="margin-left: 15px" class="shops_block_item shops_block" id="<?=$this->GetEditAreaId($arItem['ID']) ?>">
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
    <div class="clear"></div>
    
<?php endif; ?>
