<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php if (SITE_TEMPLATE_ID == "roga_i_sila_inner"): ?>
</section>
<hr class="bottom_line"/>
<?php endif?>

</div>
</section>
<div class="d_footer width_960"></div>
<div class="clear"></div>
</div>
<footer class="footer width_960">
    <section class="float_inner bottom_block">
        <section class="shops_block">
            <h2 class="inline-block">Наши салоны</h2>
            <span class="dark_grey all_list">&nbsp;/&nbsp;<a href="#" class="text_decor_none"><b>Все</b></a></span>
            <div>
                <figure class="shops_block_item">
                    <a href=""><img src="<?= PATH_DEFAULT_JS_CSS ?>images/test_shop_1.png" alt="" title=""/></a>
                    <figcaption class="shops_block_item_description">
                        <h3 class="shops_block_item_name">Салон на братиславской</h3>
                        <p class="dark_grey">Москва, ул. Братиславская, дом 23</p>
                        <p class="black">+7 495 987 65 43</p>
                        <p>Часы работы:<br/> c 9.00 до 21.00</p>
                    </figcaption>
                </figure>
                <figure class="shops_block_item">
                    <a href=""><img src="<?= PATH_DEFAULT_JS_CSS ?>images/test_shop_2.png" alt="" title=""/></a>
                    <figcaption class="shops_block_item_description">
                        <h3 class="shops_block_item_name">Салон на братиславской</h3>
                        <p class="dark_grey">Москва, ул. Братиславская, дом 23</p>
                        <p class="black">+7 495 987 65 43</p>
                        <p>Часы работы:<br/> c 9.00 до 21.00</p>
                    </figcaption>
                </figure>
            </div>
        </section>
        <section class="info_block left_block_shadow">
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "menu_footer",
                array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "bottom",
                    "USE_EXT" => "N",
                    "COMPONENT_TEMPLATE" => "menu_footer"
                )
            ); ?>
        </section>
    </section>
    <div class="footer_inner">
        <a href="http://www.qsoft.ru" target="_blank" class="qsoft grey inline-block">Сделано в</a>
        <div class="copy">&copy; 2013 Рога &amp; Сила. Продажа автомобилей.</div>
    </div>
</footer>
</body>
</html>
