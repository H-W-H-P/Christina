<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?>

<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "", Array(
							"COMPONENT_TEMPLATE" => "basket",
								"COLUMNS_LIST" => array(
									0 => "NAME",
									1 => "DISCOUNT",
									2 => "WEIGHT",
									3 => "DELETE",
									4 => "DELAY",
									5 => "TYPE",
									6 => "PRICE",
									7 => "QUANTITY",
								),
								"TEMPLATE_THEME" => "blue",	// Цветовая тема
								"PATH_TO_ORDER" => "/cart/order/",	// Страница оформления заказа
								"HIDE_COUPON" => "N",	// Спрятать поле ввода купона
								"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
								"USE_PREPAYMENT" => "N",	// Использовать предавторизацию для оформления заказа (PayPal Express Checkout)
								"QUANTITY_FLOAT" => "N",	// Использовать дробное значение количества
								"CORRECT_RATIO" => "N",	// Автоматически рассчитывать количество товара кратное коэффициенту
								"AUTO_CALCULATION" => "Y",	// Автопересчет корзины
								"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
								"ACTION_VARIABLE" => "basketAction",	// Название переменной действия
								"OFFERS_PROPS" => "",
								"USE_GIFTS" => "Y",	// Показывать блок "Подарки"
								"GIFTS_PLACE" => "BOTTOM",	// Вывод блока "Подарки"
								"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",	// Текст заголовка "Подарки"
								"GIFTS_HIDE_BLOCK_TITLE" => "N",	// Скрыть заголовок "Подарки"
								"GIFTS_TEXT_LABEL_GIFT" => "Подарок",	// Текст метки "Подарка"
								"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
								"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
								"GIFTS_SHOW_OLD_PRICE" => "N",	// Показывать старую цену
								"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",	// Показывать процент скидки
								"GIFTS_SHOW_NAME" => "Y",	// Показывать название
								"GIFTS_SHOW_IMAGE" => "Y",	// Показывать изображение
								"GIFTS_MESS_BTN_BUY" => "Выбрать",	// Текст кнопки "Выбрать"
								"GIFTS_MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
								"GIFTS_PAGE_ELEMENT_COUNT" => "4",	// Количество элементов в строке
								"GIFTS_CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
								"GIFTS_HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
								"USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
							),
							false
						);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>