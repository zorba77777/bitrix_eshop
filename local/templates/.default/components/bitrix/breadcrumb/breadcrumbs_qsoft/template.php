<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

if (empty($arResult))
    return "";

$strReturn .= '<nav class="nav_chain">';

$itemSize = count($arResult);

for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    $arrow = ($index > 0 ? '<span class="nav_arrow inline-block"></span>' : '');

    if ($arResult[$index]["LINK"] && $index != $itemSize - 1) {
        $strReturn .= ' ' . $arrow . '<a href="' . $arResult[$index]["LINK"] . '" title="' . $title . '"><span>' . $title . '</span></a>';
    } else {
        $strReturn .= ' ' . $arrow . '<span>' . $title . '</span>';
    }
}
$strReturn .= '</nav>';

return $strReturn;
