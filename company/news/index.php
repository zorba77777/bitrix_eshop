<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
?>
<?php
$APPLICATION->IncludeComponent(
    'bitrix:news',
    'news_inner',
    [
        "IBLOCK_TYPE" => 'news',
        "IBLOCK_ID" => 1,
        'NEWS_COUNT' => 10,
        'USE_SEARCH' => 'N',
        'SEF_MODE' => 'Y',
        "SEF_FOLDER" => "/company/news/",
        "SEF_URL_TEMPLATES" => [
            'news' => '',
            'section' => '',
            "detail" => "#ELEMENT_CODE#/"
        ],
        'DISPLAY_NAME' => 'Y',
        'DISPLAY_DATE' => 'Y',
        'PREVIEW_TRUNCATE_LEN' => '150'
    ]
); ?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
