<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");

$userName = CUser::GetFullName();
if (!$userName)
	$userName = CUser::GetLogin();
?>
    <script>
	<?if ($userName):?>
	BX.localStorage.set("eshop_user_name", "<?=CUtil::JSEscape($userName)?>", 604800);
	<?else:?>
	BX.localStorage.remove("eshop_user_name");
	<?endif?>

    <? if (
            isset($_REQUEST["backurl"]) &&
            strlen($_REQUEST["backurl"])>0 &&
            preg_match('#^/\w#', $_REQUEST["backurl"]) &&
            $_REQUEST["TYPE"] !== 'REGISTRATION'):?>

    document.location.href = "<?=CUtil::JSEscape($_REQUEST["backurl"])?>";
    <?endif?>

    </script>
<?$APPLICATION->SetTitle("Авторизация"); ?>

<? if($_REQUEST["TYPE"] === 'REGISTRATION'):?>

    <p>«Добро пожаловать!</p>
    <p>Пожалуйста, проверьте Ваш e-mail – мы отправили Вам приветственное письмо.
    Теперь у Вас есть возможность:</p>
    <ul>
        <li>Сохранять в Личном кабинете персональные данные</li>
        <li>Легко отслеживать статус Вашего заказа в режиме online</li>
        <li>В любой момент просмотреть историю Ваших заказов</li>
    </ul>
    Что Вы хотите сделать прямо сейчас?»

<? else: ?>

    <p>Вы уже авторизованы и необходимость в авторизации и/или регистрации повторно отсутствует.</p>
    <p><a href="<?=SITE_DIR?>">Вернуться на главную страницу</a></p>
    <p><br></p>

<? endif; ?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
