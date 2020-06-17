<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arTemplateParameters = array(
    "PROFILE_PAGE" => array(
        "NAME" => GetMessage("PROFILE"),
        "TYPE" => "STRING",
        "DEFAULT" => "/personal/profile/"
    )    
);

$arTemplateParameters = array(
   "PROFILE_PAGE" => array(
        "NAME" => GetMessage("PROFILE"),
        "TYPE" => "STRING",
        "DEFAULT" => "/personal/profile/"
    ),
   "REGISTER_URL" => array(
        "NAME" => GetMessage("auth_form_comp_auth"),
        "TYPE" => "STRING",
        "DEFAULT" => "/auth/"
    ),
   "PROFILE_URL" => array(
        "NAME" => GetMessage("AUTH_PROFILE"),
        "TYPE" => "STRING",
        "DEFAULT" => "/personal/"
    )
);
