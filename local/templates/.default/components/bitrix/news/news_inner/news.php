<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponent $component */
/** @var array $arParams */
/** @global CMain $APPLICATION */
$this->setFrameMode(true);
?>

<?php $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "news_list_inner",
    Array(
        "IBLOCK_TYPE" => '1',
        "IBLOCK_ID" => 'news',
        "NEWS_COUNT" => $arParams["NEWS_COUNT"],
        "SORT_BY1" => 'ACTIVE_FROM',
        "SORT_ORDER1" => 'DESC',
        "CHECK_DATES" => 'Y',
        "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        'CACHE_GROUPS' => 'Y',
        'DISPLAY_TOP_PAGER' => 'N',
        'DISPLAY_BOTTOM_PAGER' => 'Y',
        'PAGER_SHOW_ALWAYS' => 'N',
        'SET_STATUS_404' => 'Y',
        'DISPLAY_NAME' => 'Y',
        'DISPLAY_DATE' => 'Y',
        'PREVIEW_TRUNCATE_LEN' => '150',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N'
    ),
    $component
);?>
