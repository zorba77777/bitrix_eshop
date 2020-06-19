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
            "MAX_LEVEL" => "1",
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_TYPE" => "A",
            "ROOT_MENU_TYPE" => "bottom",
            "USE_EXT" => "N"
        ),
        false
    ); 
    ?>


    <h1><?php $APPLICATION->ShowTitle(false) ?></h1>
