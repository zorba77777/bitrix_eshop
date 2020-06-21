<?php

AddEventHandler("main", "OnAfterUserAuthorize", Array("EmailNotification", "OnAfterUserAuthorizeHandler"));

class EmailNotification
{
    public static function OnAfterUserAuthorizeHandler($arUser)
    {
        $arEventFields = array(
            'MAIL_TO'  => $arUser['user_fields']["EMAIL"],
            'LOGIN' => $arUser['user_fields']["LOGIN"],
            'AUTH_DATE'	=> date('Y.d.m H:i:s')
        );
        CEvent::Send('ON_USER_AUTHORIZE', SITE_ID, $arEventFields);
    }
}
