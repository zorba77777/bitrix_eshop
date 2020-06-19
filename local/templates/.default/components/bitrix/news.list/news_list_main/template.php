<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<h2 class="inline-block"><?=GetMessage('NEWS')?></h2>
<span class="all_list">/
	<a href="<?= (!empty($arResult['ITEMS'])) ? $arResult['ITEMS'][0]["LIST_PAGE_URL"] : '#' ?>" class="text_decor_none"><b><?= GetMessage('ALL') ?></b></a>
</span>
<div>

<?php foreach($arResult["ITEMS"] as $key => $arItem):?>
	<figure class="news_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?= $arItem['LIST_PAGE_URL'] . $arItem['CODE'] . '/' ?>">
		<?php if(is_array($arItem["PREVIEW_PICTURE"]) && isset($arItem["PREVIEW_PICTURE"]["SRC"])): ?>
			<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"/>
		<?php else: ?>
			<img src="<?=PATH_DEFAULT_PIC?>"/>
		<?php endif ?>
		</a>
		<figcaption class="news_item_description">
			<h3><a style="text-decoration: none;" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><b><?= $arItem["NAME"]; ?></b></a></h3>
			<div class="news_item_anons">
			<a style="text-decoration: none;" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem["PREVIEW_TEXT"] ?></a>
			</div>
				<div class="news_item_date grey"><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></div>
		</figcaption>
	</figure>

<?php endforeach;?>
</div>
