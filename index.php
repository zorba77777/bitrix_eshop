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
            <?$APPLICATION->IncludeComponent(
                    "qsoft:catalog.models.week",
                    "models_main",
                    array(
                        'IBLOCK_TYPE' => 'products',
                        'IBLOCK_ID' => '5',
                        'CACHE_TIME' => '3600',
                        'SORT_BY' => 'RAND',
                        'SORT_ORDER' => 'DESC',
                        'MODELS_COUNT' => 4
                    ),
                    false
                );?>
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
