<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$cntBasketItems = CSaleBasket::GetList(
   array(),
   array( 
      "FUSER_ID" => CSaleBasket::GetBasketUserID(),
      "LID" => SITE_ID,
      "ORDER_ID" => "NULL"
   ), 
   array()
);

$APPLICATION->SetPageProperty('BASKET_COUNT', $cntBasketItems);
