<?php
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$request = Bitrix\Main\Application::getInstance()->getContext()->getRequest(); ?>

<?php if ($request['TYPE'] == 'REGISTRATION'): ?>

    <?php $APPLICATION->SetTitle("Благодарим Вас за регистрацию в интернет-магазине «Рога и сила»!"); ?>
    <p>Пожалуйста, проверьте Ваш e-mail – мы отправили Вам приветственное письмо.
        Теперь у Вас есть возможность:</p>
    <ul>
        <li>Сохранять в Личном кабинете персональные данные</li>
        <li>Легко отслеживать статус Вашего заказа в режиме online</li>
        <li>В любой момент просмотреть историю Ваших заказов</li>
    </ul>
    Что Вы хотите сделать прямо сейчас?»

<?php elseif ($request["backurl"]):

    $backUrl = $request["backurl"];
    if (is_string($backUrl) && strpos($backUrl, "/") == 0) {
        LocalRedirect($backUrl);
    } else {
        LocalRedirect("/");
    }
    ?>

<?php else: ?>
    <p>Вы уже авторизованы, действий по авторизации или регистрации не требуется</p>

<?php endif;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
