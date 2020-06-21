<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<?php if ($arResult["FORM_TYPE"] == "login"): ?>

    <nav class="top_menu grey inline-block">
        <a href="<?= $arResult["AUTH_REGISTER_URL"] ?>" class="register"><?= GetMessage("AUTH_REGISTER") ?></a>
        <a href="<?= $arParams["REGISTER_URL"] ?>" class="auth"><?= GetMessage("auth_form_comp_auth") ?></a>
    </nav>

<?php else: ?>

    <nav class="top_menu grey inline-block authorize">
        <span><?= GetMessage("HELLO") ?>, </span>
        <a href="<?= $arParams["PROFILE_PAGE"] ?>"><b class="user_name"><?= $arResult["USER_NAME"] ?> </b></a>
        <a href="<?= $arParams["PROFILE_URL"] ?>"><?= GetMessage("AUTH_PROFILE") ?></a>
        <a class="logout" href="/?logout=yes"><?= GetMessage("AUTH_LOGOUT_BUTTON") ?></a>
    </nav>

<?php endif;
