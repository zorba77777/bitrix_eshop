<?php 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "DEPTH_LEVEL" => "2",
        "IBLOCK_ID" => "5",
        "IBLOCK_TYPE" => "products",
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "/catalog/",
        "SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#",

    ),
    false
);
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
