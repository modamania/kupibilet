<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/** @global CMain $APPLICATION */
$APPLICATION->SetTitle("Оплата заказа");

$APPLICATION->IncludeComponent('tim:empty', 'order', array(
	'PAGE' => 'success',
));

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");