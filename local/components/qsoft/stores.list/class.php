<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock;

class Stores extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
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

        return $arParams;
    }

    public function executeComponent()
    {
        global $USER;
        global $APPLICATION;

        $navParam = false;

        if ($this->arParams["ITEMS_COUNT"]) {
            $navParam = [
                "nPageSize" => $this->arParams["ITEMS_COUNT"]
            ];
        }

        $arNavigation = CDBResult::GetNavParams($navParam);

        if ($this->startResultCache(false, $arNavigation)) {

            $select = [
                "ID",
                "IBLOCK_ID",
                "IBLOCK_SECTION_ID",
                "NAME",
                "ACTIVE_FROM",
                "PREVIEW_TEXT",
                "PREVIEW_PICTURE",
                "PROPERTY_WORK_HOURS",
                "PROPERTY_ADDRESS",
                "PROPERTY_PHONE",
            ];

            if ($this->arParams["SHOW_MAP"] == 'Y') {
                $select[] = "PROPERTY_MAP";
            }

            $this->arResult["ITEMS"] = [];

            $dbItem = \CIBlockElement::GetList(
                [$this->arParams["SORT_BY"] => $this->arParams['SORT_ORDER']],
                [
                    'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                    'ACTIVE' => 'Y',
                ],
                false,
                $navParam,
                $select
            );

            $navComponentObject = null;

            $this->arResult["NAV_STRING"] = $dbItem->GetPageNavStringEx(
                $navComponentObject,
                '',
                'nav_template',
                'Y',
                $this
            );

            $items = [];
            while ($item = $dbItem->GetNext(true, false)) {

                if ($item['PREVIEW_PICTURE']) {
                    $filter[] = $item['PREVIEW_PICTURE'];
                }

                if ($item["PROPERTY_MAP_VALUE"]) {
                    $onMap = explode(',', $item["PROPERTY_MAP_VALUE"]);
                    $this->arResult['arPlacemarks'][] = [
                        "LAT" => $onMap[0],
                        "LON" => $onMap[1],
                        "TEXT" => $item["PROPERTY_ADDRESS_VALUE"]
                    ];
                }

                $items[] = $item;
            }

            if (!empty($filter)) {
                $tmp = CFile::GetList(["@ID" => $filter]);

                while ($pict = $tmp->GetNext()) {
                    $this->arResult['SRCS'][$pict['ID']] = CFile::GetFileSrc($pict);
                }
            }

            $this->arResult['ITEMS'] = $items;

            $this->setResultCacheKeys([
                "arPlacemarks",
                "NAV_STRING"
            ]);

            $this->IncludeComponentTemplate();
        }
    }
}
