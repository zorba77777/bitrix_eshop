<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/templates/roga_i_sila_main/header.php');

$APPLICATION->IncludeComponent(
    "bitrix:breadcrumb",
    "breadcrumbs_qsoft",
    array(
        "START_FROM" => "0",
        "PATH" => "",)
) ?>
<section class="content_area">
    <?php
    $APPLICATION->IncludeComponent(
        "bitrix:menu",
        "menu_left",
        array(
            "ALLOW_MULTI_SELECT" => "N",
            "MAX_LEVEL" => "1",
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_TYPE" => "A",
            "ROOT_MENU_TYPE" => "bottom",
            "USE_EXT" => "N"
        )
    )
    ?>


    <h1><?php $APPLICATION->ShowTitle(false) ?></h1>
