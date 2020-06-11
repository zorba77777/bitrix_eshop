<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
define("HIDE_SIDEBAR", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");

$APPLICATION->SetTitle("404 ошибка: Страница не найдена");?>

	<div class="bx-404-container">
		<div class="bx-404-text-block">К сожалению, такая страница не найдена. <br>Данная страница была удалена с сайта, либо ее никогда не существовало.</div>
		<div>Вы можете вернуться на <a href="<?=SITE_DIR?>">Главную страницу</a> или воспользоваться <a href="<?=SITE_DIR?>search/">поиском</a>.<br>
		Если Вы хотите что-то сообщить, напишите нам с помощью формы <a href="<?=SITE_DIR?>company/contacts/">формы Обратная связь</a>.</div>
	</div>