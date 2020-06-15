<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/templates/roga_i_sila_main/header.php');
?>

<nav class="nav_chain">
    <a href="/">Главная</a>
    <span class="nav_arrow inline-block"></span>
    <span>Легковые</span>
</nav>
<section class="content_area">
    <aside class="left_block">
        <nav>
            <ul class="left_menu">
                <li>
                    <span>Информация</span>
                    <ul>
                        <li><a href="#">О компании</a></li>
                        <li><a href="#" class="selected">Контактная информация</a></li>
                        <li><a href="#">Условия продаж</a></li>
                        <li><a href="#">Финансовый отдел</a></li>
                        <li><a href="#">Для клиентов</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>


    <h1><?php $APPLICATION->ShowTitle(false) ?></h1>