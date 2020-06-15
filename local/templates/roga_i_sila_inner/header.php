<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/templates/roga_i_sila_main/header.php');
?>

<nav class="nav_chain">
    <a href="/">Главная</a>
    <span class="nav_arrow inline-block"></span>
    <span>Легковые</span>
</nav>
<section class="content_area">
    <?php
    $APPLICATION->IncludeComponent(
        "bitrix:menu",
        "menu_left",
        array(
            "ALLOW_MULTI_SELECT" => "N",
            "CHILD_MENU_TYPE" => "left",
            "DELAY" => "N",
            "MAX_LEVEL" => "1",
            "MENU_CACHE_GET_VARS" => array(),
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_TYPE" => "A",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "ROOT_MENU_TYPE" => "bottom",
            "USE_EXT" => "N",
            "COMPONENT_TEMPLATE" => "menu_left"
        ),
        false
    ); 
    ?>


    <h1><?php $APPLICATION->ShowTitle(false) ?></h1>