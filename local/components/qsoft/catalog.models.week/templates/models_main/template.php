<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!isset($arResult['ITEMS']) || empty($arResult['ITEMS'])) {
    return;
}?>

<h2 class="push_right"><?= GetMessage("MODELS_WEEK") ?></h2>
<section class="product_line" id="<?=$this->GetEditAreaId($arResult['ID']);?>">
    <?php foreach ($arResult['ITEMS'] as $item): ?>
        <?php
        $this->AddEditAction($item['ID'], $item['ADD_LINK'], $item["ADD_LINK_TEXT"]);
        $this->AddEditAction($item['ID'], $item['EDIT_LINK'], $item["EDIT_LINK_TEXT"]);
        $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], $item["DELETE_LINK_TEXT"], ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
        ?>
        <figure class="product_item" id="<?=$this->GetEditAreaId($item['ID']);?>">
            <div class="product_item_pict">
                <a href="<?=$item['DETAIL_PAGE_URL']?>">
                    <img alt="<?=$item['NAME']?>" src="<?=$item['PREVIEW_PICTURE']['SRC']?>" title="<?=$item['NAME']?>">
                </a>
            </div>
            <figcaption>
                <h3><a href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a></h3>
                <?php if ($item['PRICES']["RESULT_PRICE"]["DISCOUNT"]): ?>
                    <span class="product_item_price dark_grey old_price">
						<?= $item['PRICES']["RESULT_PRICE"]["BASE_PRICE"]; ?>
					</span>
                    <p class="product_item_price dark_grey">
                        <?= $item['PRICES']["RESULT_PRICE"]["DISCOUNT_PRICE"] . ' ' . GetMessage('CURRENCY_RUB'); ?>
                    </p>
                <?php else: ?>
                    <p class="product_item_price dark_grey">
                        <?= $item['PRICES']["RESULT_PRICE"]["BASE_PRICE"] . ' ' . GetMessage('CURRENCY_RUB'); ?>
                    </p>
                <?php endif; ?>
                <?php if ($item['CATALOG_QUANTITY']):?>
                    <a class="buy_button inverse inline-block pie" href="<?= $item["ADD_URL"]; ?>">
                        <?= GetMessage('IN_BASKET'); ?>
                    </a>
                <?php else: ?>
                    <p>
                        <?= GetMessage('NOT_AVAILABLE'); ?>
                    </p>
                <?php endif; ?>
            </figcaption>
            <?php if ($item["PROPERTY_SALE_VALUE"]): ?>
                <div class="product_item_label sale"></div>
            <?php elseif ($item["PROPERTY_NEW_VALUE"]): ?>
                <div class="product_item_label new"></div>
            <?php endif; ?>
        </figure>
    <?php endforeach; ?>
</section>
