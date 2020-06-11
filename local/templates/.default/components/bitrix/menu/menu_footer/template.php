<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php if (!empty($arResult)): ?>
    <h2><?= GetMessage('INFORMATION') ?></h2>
    <nav class="menu_footer grey">
        <ul class="left-menu">

            <?php foreach ($arResult as $arItem): ?>

                <?php 
                $class = ''; 
                
                if ($arItem['LINK'] == $APPLICATION->GetCurPage(false)) {
                    $class .= 'selected ';
                }

                if ($arItem['PARAMS']['style'] == 'red') {
                    $class .= 'red ';
                }     
                ?>


                <li class="<?= $class ?>"><a href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a></li>
            
            <?php endforeach ?>

        </ul>
    </nav>
<?php endif ?>
