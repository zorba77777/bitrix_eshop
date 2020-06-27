<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

if (!\Bitrix\Main\Loader::includeModule('advertising'))
    return;

Loc::loadMessages(__FILE__);

CBitrixComponent::includeComponentClass("bitrix:advertising.banner");

class QsoftAdvertisingBanner extends AdvertisingBanner
{
    public function onPrepareComponentParams($params)
    {
        global $USER;

        if (!$USER->IsAuthorized()) {
            $params['QUANTITY'] = 1;
        }

        return AdvertisingBanner::onPrepareComponentParams($params);
    }
}