<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Наши салоны");?>

<?php $APPLICATION->IncludeComponent(
    "qsoft:stores.list",
    "stores_full",
    array(
        "IBLOCK_TYPE" => "salons",
        "IBLOCK_ID" => "4",
        "ITEMS_COUNT" => "2",
        "SHOW_MAP" => "Y",
        "SORT_BY" => "NAME",
        "SORT_ORDER" => "DESC",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600"
    )
); ?>
        
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

