<?php

use Bitrix\Main\Page\Asset;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<!DOCTYPE>
<!--[if IE 7]>
<html class="ie7" lang="ru"> <![endif]-->
<!--[if IE 8]>
<html class="ie8> <![endif]-->
<!--[if IE 9]>
<html class="ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="<?= LANGUAGE_ID ?>"> <!--<![endif]-->
<head>
    <?php $APPLICATION->ShowHead(); ?>

    <title><?php $APPLICATION->ShowTitle(false) ?></title>

    <link href="<?= DEFAULT_ASSETS_PATH ?>favicon.ico" rel="shortcut icon" type="image/x-icon"/>

    <?php
    Asset::getInstance()->addJs(DEFAULT_ASSETS_PATH . "js/jquery-1.9.1.min.js");
    Asset::getInstance()->addJs(DEFAULT_ASSETS_PATH . "js/jquery.placeholder.js");
    Asset::getInstance()->addJs(DEFAULT_ASSETS_PATH . "js/bxslider/jquery.bxslider.js");
    Asset::getInstance()->addJs(DEFAULT_ASSETS_PATH . "js/default_script.js");

    Asset::getInstance()->addJs(DEFAULT_ASSETS_PATH . "js/jquery.ui.selectmenu/jquery.ui.core.js");
    Asset::getInstance()->addJs(DEFAULT_ASSETS_PATH . "js/jquery.ui.selectmenu/jquery.ui.widget.js");
    Asset::getInstance()->addJs(DEFAULT_ASSETS_PATH . "js/jquery.ui.selectmenu/jquery.ui.position.js");
    Asset::getInstance()->addJs(DEFAULT_ASSETS_PATH . "js/jquery.ui.selectmenu/jquery.ui.selectmenu.js");

    Asset::getInstance()->addCss(DEFAULT_ASSETS_PATH . "css/base.css");
    Asset::getInstance()->addCss(DEFAULT_ASSETS_PATH . "js/bxslider/jquery.bxslider.css");
    Asset::getInstance()->addCss(DEFAULT_ASSETS_PATH . "js/jquery.ui.selectmenu/jquery.ui.core.css");
    Asset::getInstance()->addCss(DEFAULT_ASSETS_PATH . "js/jquery.ui.selectmenu/jquery.ui.theme.css");
    Asset::getInstance()->addCss(DEFAULT_ASSETS_PATH . "js/jquery.ui.selectmenu/jquery.ui.selectmenu.css");
    ?>
    <!--[if lt IE 9]>
    <script src="<?= DEFAULT_ASSETS_PATH ?>js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
<?php $APPLICATION->ShowPanel(); ?>
<div class="wrapper">
    <div class="base_layer"></div>
    <header class="header">
        <div class="width_960">
            <div class="item-logo">
                <?php if ($APPLICATION->GetCurPage() !== '/'): ?>
                    <a href="/" class="logo inline-block"></a>
                <?php else: ?>
                    <span class="logo inline-block"></span>
                <?php endif ?>
            </div>
            <?php
            $APPLICATION->IncludeComponent(
	"bitrix:system.auth.form", 
	"auth_form_header", 
	array(
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "/personal/",
		"REGISTER_URL" => "/auth/",
                'AUTH_URL' => "/auth/",
		"SHOW_ERRORS" => "N",
		"COMPONENT_TEMPLATE" => "auth_form_header",
		"PROFILE_PAGE" => "/personal/profile/"
	),
	false
);
            ?>
            <div class="basket_block">
                <a href="#" class="basket_product_count inline-block">0</a>
                <a href="#" class="order_button pie">Оформить заказ</a>
            </div>
        </div>
    </header>
    <section class="fixed_block">
        <div class="width_960">
            <form name="search_form" class="search_form pie">
                <div class="search_form_wrapper">
                    <input type="text" placeholder="Поиск по сайту"/>
                    <input type="submit" value=""/>
                </div>
            </form>
            <?php
            $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "catalog_top",
                array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "MAX_LEVEL" => "2",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "ROOT_MENU_TYPE" => "top",
                    "USE_EXT" => "Y"
                )
            );
            ?>
        </div>
    </section>
    <section class="content">
        <div class="work_area width_960">

