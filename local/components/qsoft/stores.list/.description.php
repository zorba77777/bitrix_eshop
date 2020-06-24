<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = [
    "NAME" => GetMessage("T_IBLOCK_DESC_LIST"),
    "DESCRIPTION" => GetMessage("T_IBLOCK_DESC_LIST_LIST"),
    "PATH" => [
        "ID" => "content",
        "CHILD" => [
            "ID" => "stores_list",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_LIST"),
            "SORT" => 100,
        ]
    ]
];
?>