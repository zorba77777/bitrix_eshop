<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (empty($arParams["IBLOCK_TYPE"])) {
    ShowError(\Bitrix\Main\Localization\Loc::GetMessage('IBLOCK_TYPE_NOT_INSTALLED'));
    return;
}

if ($arParams["IBLOCK_ID"] <= 0) {
    ShowError(\Bitrix\Main\Localization\Loc::GetMessage('SECTION_IS_NOT_FOUND'));
    return;
}

if (!\Bitrix\Main\Loader::includeModule('iblock')) {
    ShowError(\Bitrix\Main\Localization\Loc::GetMessage('IBLOCK_MODULE_NOT_INSTALLED'));
    return;
}

if ($arParams["ITEMS_COUNT"] <= 0) {
    $arParams["ITEMS_COUNT"] = 2;
}

if (empty($arParams["SORT_BY"])) {
    $arParams["SORT_BY"] = "RAND";
}

if (empty($arParams["SORT_ORDER"])) {
    $arParams["SORT_ORDER"] = "DESC";
}

if ($this->startResultCache()) {

    if (defined('BX_COMP_MANAGED_CACHE') && is_object($GLOBALS['CACHE_MANAGER'])) {
        $GLOBALS['CACHE_MANAGER']->RegisterTag('iblock_id_new');
    }

    $select = [
        "NAME",
        "PREVIEW_PICTURE",
        "PROPERTY_ADDRESS",
        "PROPERTY_PHONE",
        "PROPERTY_WORK_HOURS"
    ];


    $dbItem = \CIBlockElement::GetList(
        [$arParams["SORT_BY"] => $arParams['SORT_ORDER']],
        [
            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
            'ACTIVE' => 'Y',
        ],
        false,
        ['nTopCount' => $arParams['ITEMS_COUNT']],
        $select
    );

    $items = [];
    while ($item = $dbItem->GetNext(true, false)) {
        if ($item['PREVIEW_PICTURE']) {
            $filter[] = $item['PREVIEW_PICTURE'];
        }
        $items[] = $item;
    }

    if (!empty($filter)) {
        $filter = implode(', ', $filter);

        $tmp = CFile::GetList(["@ID" => $filter]);

        while ($pict = $tmp->GetNext()) {
            $arResult['SRCS'][$pict['ID']] = CFile::GetFileSrc($pict);
        }
    }

    $arResult['ITEMS'] = $items;

    $this->includeComponentTemplate();
}
