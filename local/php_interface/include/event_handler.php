<?php

AddEventHandler("main", "OnAfterUserAuthorize", Array("EmailNotification", "OnAfterUserAuthorizeHandler"));

class EmailNotification
{
    function OnAfterUserAuthorizeHandler($arUser)
    {
        $lastLogin = (!empty($arUser['user_fields']["LAST_LOGIN"])) ? date("Y.d.m H:i:s", strtotime($arUser['user_fields']["LAST_LOGIN"])) : "";
        $arEventFields = array(
            "EMAIL"  => $arUser['user_fields']["EMAIL"],
            "LOGIN"		=> $arUser['user_fields']["LOGIN"],
            "LAST_LOGIN"	=> $lastLogin
        );
        CEvent::Send("LOGIN", SITE_ID, $arEventFields);
    }
}
