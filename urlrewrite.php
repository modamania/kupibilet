<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/personal/order/payment/success/(.*)/(.*)#",
		"RULE" => "id=\$1",
		"ID" => "",
		"PATH" => "/personal/order/payment/success/index.php",
	),
	array(
		"CONDITION" => "#^/bitrix/services/ymarket/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/services/ymarket/index.php",
	),
	array(
		"CONDITION" => "#^/event/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/event/index.php",
	),
	array(
		"CONDITION" => "#^/halls/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/halls/index.php",
	),
	array(
		"CONDITION" => "#^#",
		"RULE" => "",
		"ID" => "tim:events",
		"PATH" => "/event/index.php",
	),
);

?>