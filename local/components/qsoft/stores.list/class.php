<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock;

class Stores extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        if (empty($arParams["IBLOCK_TYPE"])) {
            $arParams["IBLOCK_TYPE"] = 'salons';
        }

        if ($arParams["IBLOCK_ID"] <= 0) {
            $arParams["IBLOCK_ID"] = 2;
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

        if ($this->startResultCache()) {

            if (!\Bitrix\Main\Loader::includeModule('iblock')) {
                ShowError(\Bitrix\Main\Localization\Loc::GetMessage('IBLOCK_MODULE_NOT_INSTALLED'));
                return;
            }

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
                ['nTopCount' => $this->arParams['ITEMS_COUNT']],
                $select
            );

            $items = [];
            while ($item = $dbItem->GetNext(true, false)) {

                $arButtons = CIBlock::GetPanelButtons(
                    $item["IBLOCK_ID"],
                    $item["ID"],
                    0,
                    ["SECTION_BUTTONS" => false, "SESSID" => false]
                );

                $item["ADD_LINK"] = $arButtons["edit"]["add_element"]["ACTION_URL"];
                $item["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
                $item["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

                $item["ADD_LINK_TEXT"] = $arButtons["edit"]["add_element"]["TEXT"];
                $item["EDIT_LINK_TEXT"] = $arButtons["edit"]["edit_element"]["TEXT"];
                $item["DELETE_LINK_TEXT"] = $arButtons["edit"]["delete_element"]["TEXT"];     

                if ($item['PREVIEW_PICTURE']) {
                    $filter[] = $item['PREVIEW_PICTURE'];
                }

                if ($item["PROPERTY_MAP_VALUE"]) {
                    list($lat, $lon) = explode(',', $item['PROPERTY_MAP_VALUE']);
                    $this->arResult['arPlacemarks'][] = [
                        "LAT" => $lat,
                        "LON" => $lon,
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
                "arPlacemarks"
            ]);

            $this->IncludeComponentTemplate();
        }
    }
}
