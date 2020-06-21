<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = array(
    "PARAMETERS" => array(
        "IBLOCK_TYPE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IBLOCK_TYPE"),
            "TYPE" => "STRING",
            "DEFAULT" => "salons"
        ),
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IBLOCK_ID"),
            "TYPE" => "STRING",
            "DEFAULT" => '4'
        ),
        "ITEMS_COUNT" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("ITEMS_COUNT"),
            "TYPE" => "STRING",
            "DEFAULT" => "2",
        ),
        "CACHE_TIME" => array("DEFAULT" => 3600),
        "SORT_BY" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SORT_BY"),
            "TYPE" => "STRING",
            "DEFAULT" => 'ASC'
        ),
        "SORT_ORDER" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SORT_ORDER"),
            "TYPE" => "LIST",
            "VALUES" => ['ASC' => GetMessage("SORT_ASC"), 'DESC' => GetMessage("SORT_DESC")],
            "DEFAULT" => 'ASC'
        )
    )
);
