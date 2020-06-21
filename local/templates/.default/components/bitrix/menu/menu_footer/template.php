<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php if (!empty($arResult)): ?>
    <h2><?= GetMessage('INFORMATION') ?></h2>
    <nav class="menu_footer grey">
        <ul class="left-menu">

            <?php foreach ($arResult as $arItem): ?>

			<li>
				<a <?= ($arItem['PARAMS']['style'] == 'red') ? 'style="color: red"' : ''?> 
				<?= ($arItem["SELECTED"]) ? 'class="selected"' : '' ?> href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a>
			</li>

            <?php endforeach ?>

        </ul>
    </nav>
<?php endif ?>