<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php if (SITE_TEMPLATE_ID == "roga_i_sila_inner"): ?>
    </section>
    <hr class="bottom_line"/>
<?php endif ?>

</div>
</section>
<div class="d_footer width_960"></div>
<div class="clear"></div>
</div>

<footer class="footer width_960">
    <section class="float_inner bottom_block">
        <?php $APPLICATION->IncludeComponent(
            "qsoft:stores.list",
            "stores_short",
            array(
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "IBLOCK_ID" => "4",
                "IBLOCK_TYPE" => "salons",
                "ITEMS_COUNT" => "2",
                "DETAIL_URL" => "/company/stores/",
                "SORT_BY" => "RAND",
                "SORT_ORDER" => "DESC"
            )
        );
        ?>
        <section class="info_block left_block_shadow">
            <?php $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "menu_footer",
                array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "ROOT_MENU_TYPE" => "bottom",
                    "USE_EXT" => "N"
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

