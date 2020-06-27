<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Рога и Сила - главная страница");

?>
    <section class="content">
        <div class="work_area width_960">
            <?$APPLICATION->IncludeComponent(
	"qsoft:main.banner", 
	".default", 
	array(
		"QUANTITY" => "3",
		"TYPE" => "QSOFT",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	),
	false
);?><br>
            <h2 class="push_right">Модели недели</h2>
            <section class="product_line">
                <figure class="product_item">
                    <div class="product_item_pict">
                        <a href="#">
                            <img src="<?= DEFAULT_ASSETS_PATH ?>images/test_top_week_1.png" alt="BMW X3 2.0d"
                                 title="BMW X3 2.0d"/>
                        </a>
                    </div>
                    <figcaption>
                        <h3><a href="#">BMW X3 2.0d</a></h3>
                        <span class="product_item_price dark_grey old_price">3 230 000 руб.</span>
                        <p class="product_item_price dark_grey">2 230 000 руб.</p>
                        <a class="buy_button inverse inline-block pie" href="#">В корзину</a>
                    </figcaption>
                </figure>
                <figure class="product_item">
                    <div class="product_item_label new"></div>
                    <div class="product_item_pict">
                        <a href="#">
                            <img src="<?= DEFAULT_ASSETS_PATH ?>images/test_top_week_2.png" alt="AUDI A6 3.0 TFSI"
                                 title="AUDI A6 3.0 TFSI"/>
                        </a>
                    </div>
                    <figcaption>
                        <h3><a href="#">AUDI A6 3.0 TFSI</a></h3>
                        <p class="product_item_price dark_grey">2 870 000 руб.</p>
                        <a class="buy_button inverse inline-block pie" href="#">В корзину</a>
                    </figcaption>
                </figure>
                <figure class="product_item">
                    <div class="product_item_label sale"></div>
                    <div class="product_item_pict">
                        <a href="#">
                            <img src="<?= DEFAULT_ASSETS_PATH ?>images/test_top_week_3.png" alt="Mercedes-Benz A200"
                                 title="Mercedes-Benz A200"/>
                        </a>
                    </div>
                    <figcaption>
                        <h3><a href="#">Mercedes-Benz A200</a></h3>
                        <p class="product_item_price dark_grey">1 310 000 руб.</p>
                        <a class="buy_button inverse inline-block pie" href="#">В корзину</a>
                    </figcaption>
                </figure>
                <figure class="product_item">
                    <div class="product_item_pict">
                        <a href="#">
                            <img src="<?= DEFAULT_ASSETS_PATH ?>images/no-image.jpg" alt="BMW Z4 sDrive35i"
                                 title="BMW Z4 sDrive35i"/>
                        </a>
                    </div>
                    <figcaption>
                        <h3><a href="#">BMW Z4 sDrive35i</a></h3>
                        <p class="product_item_price">3 532 000 руб.</p>
                        <a class="buy_button inverse inline-block pie" href="#">В корзину</a>
                    </figcaption>
                </figure>
            </section>
            <section class="news_block inverse">
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "news_list_main",
                    array(
                        "ACTIVE_DATE_FORMAT" => "j M Y",
                        "CACHE_TIME" => "3600",
                        "CACHE_TYPE" => "A",
                        "DETAIL_URL" => "/company/news/#ELEMENT_CODE#/",
                        "IBLOCK_TYPE" => "news",
                        "NEWS_COUNT" => "3",
                        "PREVIEW_TRUNCATE_LEN" => "150",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_ORDER1" => "DESC",
                        "SET_TITLE" => "N"
                    )
                ); ?>
            </section>
        </div>
    </section>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
