<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<p></p>
<?php if ($arParams["SHOW_MAP"] === 'Y'): ?>

    <?php $APPLICATION->IncludeComponent(
        "bitrix:map.yandex.view",
        "",
        [
            "CONTROLS" => ["ZOOM", "TYPECONTROL"],
            "INIT_MAP_TYPE" => "MAP",
            "MAP_DATA" => serialize([
                    'yandex_scale' => 10,
                    'PLACEMARKS' => $arResult['arPlacemarks']
            ]),
            "MAP_HEIGHT" => "500",
            "MAP_ID" => "salon",
            "MAP_WIDTH" => "600",
            "OPTIONS" => ["ENABLE_SCROLL_ZOOM"]
        ]
    );?>
<?php endif; ?>
