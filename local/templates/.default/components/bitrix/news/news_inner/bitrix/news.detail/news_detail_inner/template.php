<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="news-detail">
	<?php if($arParams["DISPLAY_PICTURE"]!="N"):
	    if (is_array($arResult["DETAIL_PICTURE"])):?>
            <img 
                class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>" title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                />
        <?php else:?>
            <img
                    class="detail_picture" border="0" src="<?=PATH_DEFAULT_PIC?>" width="150" height="150" alt="<?='no-image'?>" title="<?='no-image'?>"
            />
        <?php endif;?>
	<?php endif?>
	<?php if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
    <?php endif;?><br />

	<?php if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?php echo $arResult["DETAIL_TEXT"];?>
	<?php else:?>
		<?php echo $arResult["PREVIEW_TEXT"];?>
	<?php endif?>
	<div style="clear:both"></div>
</div>
