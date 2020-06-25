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

<?$ElementID = $APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "news_detail_inner",
    [        
        "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
        'ADD_ELEMENT_CHAIN' => 'Y',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N'
    ],
    $component
);?>
<p><a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"]?>"><?=GetMessage("T_NEWS_DETAIL_BACK")?></a></p>
