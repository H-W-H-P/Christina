<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>

<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "cart", Array(
							"IMG" => "BasketIconWhite.svg"
						),
							false
						);?>
