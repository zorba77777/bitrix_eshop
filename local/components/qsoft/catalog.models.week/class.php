<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Loader;
use Bitrix\Catalog\Product\Basket;

class ModelsWeek extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        if (!isset($arParams["CACHE_TIME"]))
            $arParams["CACHE_TIME"] = 3600;

        $arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);

        if (strlen($arParams["IBLOCK_TYPE"]) <= 0)
            $arParams["IBLOCK_TYPE"] = "products";

        $arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);

        if ($arParams['IBLOCK_ID'] <= 0)
            $arParams["IBLOCK_ID"] = "5";

        $arParams["SORT_BY"] = trim($arParams["SORT_BY"]);

        if (strlen($arParams["SORT_BY"]) <= 0)
            $arParams["SORT_BY"] = "RAND";

        if (!preg_match('/^(asc|desc|nulls)(,asc|,desc|,nulls){0,1}$/i', $arParams["SORT_ORDER"]))
            $arParams["SORT_ORDER"] = "DESC";

        $arParams["MODELS_COUNT"] = intval($arParams["MODELS_COUNT"]);

        return $arParams;
    }

    public function executeComponent()
    {
        global $APPLICATION;

        if (!Loader::includeModule('iblock') || !Loader::Includemodule("catalog") || !Loader::IncludeModule("sale")) {
            ShowError(getMessage('ERROR_IB_MODULE_NOT_CONNECTED'));
            return;
        }

        $action = isset($_REQUEST['action']) ? trim($_REQUEST['action']) : '';

        $productId = isset($_REQUEST['id']) ? abs(intval($_REQUEST['id'])) : 0;

        if ($action == "ADD2BASKET" && $productId > 0) {
            $success = Basket::addProduct([
                "PRODUCT_ID" => $productId,
                "QUANTITY" => 1
            ])->isSuccess();

            if ($success) {
                LocalRedirect($APPLICATION->GetCurPageParam('', [
                    'action',
                    'id'
                ]));
            }
        }
        
       if ($this->startResultCache()) {
            $select = [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'PREVIEW_PICTURE',
                'PROPERTY_NEW',
                'PROPERTY_SALE',
                'DETAIL_PAGE_URL',
            ];

            $filter = array (
                "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
                "ACTIVE" => "Y",
                "PROPERTY_MODEL_WEEKS_VALUE" => "Y",
                ">CATALOG_PRICE_1" => 0 
            );

            $navigation = ['nTopCount' => $this->arParams['MODELS_COUNT']];

            $dbItem = CIBlockElement::GetList(
                [$this->arParams['SORT_BY'] => $this->arParams['SORT_ORDER']],
                $filter,
                false,
                $navigation,
                $select
            );

            while ($item = $dbItem->GetNext()) {
                
                    $arButtons = CIBlock::GetPanelButtons(
                    $item["IBLOCK_ID"],
                    $item["ID"],
                    false,
                    ["SECTION_BUTTONS" => false, "SESSID" => false]
                );

                $item["ADD_LINK"] = $arButtons["edit"]["add_element"]["ACTION_URL"];
                $item["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
                $item["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

                $item["ADD_LINK_TEXT"] = $arButtons["edit"]["add_element"]["TEXT"];
                $item["EDIT_LINK_TEXT"] = $arButtons["edit"]["edit_element"]["TEXT"];
                $item["DELETE_LINK_TEXT"] = $arButtons["edit"]["delete_element"]["TEXT"];

                $arPreviewPicture[] = $item["PREVIEW_PICTURE"];
                
                $item['PRICES'] = CCatalogProduct::GetOptimalPrice($item["ID"]);

                $item['CATALOG_QUANTITY'] = CCatalogProduct::GetByID($item["ID"])['QUANTITY'];

                $item["ADD_URL"] = "?action=ADD2BASKET&id=" . $item["ID"];
                
                $this->arResult["ITEMS"][] = $item;
            }

            $arResultPreviewPicture = CFile::GetList("", array("ID" => $arPreviewPicture));

            while ($resultPreviewPicture = $arResultPreviewPicture->GetNext()) {
                $srcArray[$resultPreviewPicture["ID"]] = ["SRC" => "/upload/" . $resultPreviewPicture["SUBDIR"] . "/" . $resultPreviewPicture["FILE_NAME"]];
            }

            foreach ($this->arResult["ITEMS"] as $item => $value) {
                if ($value["PREVIEW_PICTURE"]["SRC"]) {
                    $this->arResult["ITEMS"][$item]["PREVIEW_PICTURE"] = $srcArray[$this->arResult["ITEMS"][$item]["PREVIEW_PICTURE"]];
                } else {
                    $this->arResult["ITEMS"][$item]["PREVIEW_PICTURE"]["SRC"] = PATH_DEFAULT_PIC;
                }
            }

            $this->setResultCacheKeys(array());

            $this->includeComponentTemplate();
        }
        $arButtons = CIBlock::GetPanelButtons(
            $this->arParams['IBLOCK_ID'],
            $this->arResult['ID'],
            0,
            array("SECTION_BUTTONS"=>false)
        );
        if ($APPLICATION->GetShowIncludeAreas()) {
            $this->addIncludeAreaIcons(CIBlock::GetComponentMenu("configure", $arButtons));
        }
    }
}
