<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>
<? 
global $USER;
$arBasketItems = array();
$dbBasketItems = CSaleBasket::GetList(
		array(
				"NAME" => "ASC",
				"ID" => "ASC"
		),
		array(
				"FUSER_ID" => CSaleBasket::GetBasketUserID(),
				"LID" => SITE_ID,
				"ORDER_ID" => "NULL",
				"CAN_BUY" => "Y",
		),
		false,
		false,
		array("ID", "CALLBACK_FUNC", "MODULE",
				"PRODUCT_ID", "QUANTITY", "DELAY",
				"CAN_BUY", "PRICE", "WEIGHT")
);
while ($arItems = $dbBasketItems->Fetch())
{
	$arBasketItems[] = $arItems['ID'];
}
?>
<?if(!empty($arBasketItems)):?>
	<?if(empty($_GET['ORDER_ID'])):?>
		<section class="shop">
			<div class="max_width">									
					<div id="result_cart">		
						<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "cart", Array(
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
					</div>
			</div>
		</section>
		
		<?
		$arFilter = array("IBLOCK_ID" => 18, "ACTIVE" => "Y");
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "PROPERTY_ITEMS", "NAME"));
		while($ar_fields = $res->GetNext())
		{	
			$BASKET_DISC = $ar_fields;
		 	break;
		}
		?>
		<?if(!empty($BASKET_DISC['PROPERTY_ITEMS_VALUE'])):?>
		<section class="slider slider_propeel slider_basket">		
			<div class="max_width">
				<h1 class="max_width slider__title title">
					<?=$BASKET_DISC['NAME']?>
				</h1>
				
				<div class="owl-carousel slider__wr">
					<?global $arrFilter;
					$arrFilter = array("ID" => $BASKET_DISC['PROPERTY_ITEMS_VALUE'])?>	
					<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "basket", Array(
						"COMPONENT_TEMPLATE" => ".default",
							"IBLOCK_TYPE" => "1c_catalog",	// Тип инфоблока
							"IBLOCK_ID" => "7",	// Инфоблок
							"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
							"SECTION_CODE" => "",	// Код раздела
							"SECTION_USER_FIELDS" => array(	// Свойства раздела
								0 => "",
								1 => "",
							),
							"FILTER_NAME" => "arrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
							"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
							"SHOW_ALL_WO_SECTION" => "Y",	// Показывать все элементы, если не указан раздел
							"CUSTOM_FILTER" => "",
							"HIDE_NOT_AVAILABLE" => "N",	// Недоступные товары
							"HIDE_NOT_AVAILABLE_OFFERS" => "N",	// Недоступные торговые предложения
							"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
							"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
							"ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
							"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
							"PAGE_ELEMENT_COUNT" => "18",	// Количество элементов на странице
							"LINE_ELEMENT_COUNT" => "3",	// Количество элементов выводимых в одной строке таблицы
							"PROPERTY_CODE" => array(	// Свойства
								0 => "",
								1 => "",
							),
							"PROPERTY_CODE_MOBILE" => "",	// Свойства товаров, отображаемые на мобильных устройствах
							"OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
							"BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
							"TEMPLATE_THEME" => "blue",	// Цветовая тема
							"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",	// Вариант отображения товаров
							"ENLARGE_PRODUCT" => "STRICT",	// Выделять товары в списке
							"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",	// Порядок отображения блоков товара
							"SHOW_SLIDER" => "Y",	// Показывать слайдер для товаров
							"SLIDER_INTERVAL" => "3000",	// Интервал смены слайдов, мс
							"SLIDER_PROGRESS" => "N",	// Показывать полосу прогресса
							"ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
							"LABEL_PROP" => "",	// Свойства меток товара
							"PRODUCT_SUBSCRIPTION" => "Y",	// Разрешить оповещения для отсутствующих товаров
							"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
							"SHOW_OLD_PRICE" => "N",	// Показывать старую цену
							"SHOW_MAX_QUANTITY" => "N",	// Показывать остаток товара
							"SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
							"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
							"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
							"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
							"MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
							"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
							"RCM_TYPE" => "personal",	// Тип рекомендации
							"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],	// Параметр ID продукта (для товарных рекомендаций)
							"SHOW_FROM_SECTION" => "N",	// Показывать товары из раздела
							"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
							"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
							"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
							"SEF_MODE" => "N",	// Включить поддержку ЧПУ
							"AJAX_MODE" => "N",	// Включить режим AJAX
							"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
							"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
							"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
							"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
							"CACHE_TYPE" => "A",	// Тип кеширования
							"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
							"CACHE_GROUPS" => "Y",	// Учитывать права доступа
							"SET_TITLE" => "N",	// Устанавливать заголовок страницы
							"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
							"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
							"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
							"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
							"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
							"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
							"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
							"USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
							"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
							"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
							"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
							"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
							"PRICE_CODE" => array(	// Тип цены
								0 => "BASE",
							),
							"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
							"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
							"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
							"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
							"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
							"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
							"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
							"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
							"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
							"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
							"PRODUCT_PROPERTIES" => "",	// Характеристики товара
							"ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
							"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
							"USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
							"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
							"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
							"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
							"PAGER_TITLE" => "Товары",	// Название категорий
							"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
							"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
							"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
							"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
							"LAZY_LOAD" => "N",	// Показать кнопку ленивой загрузки Lazy Load
							"LOAD_ON_SCROLL" => "N",	// Подгружать товары при прокрутке до конца
							"SET_STATUS_404" => "N",	// Устанавливать статус 404
							"SHOW_404" => "N",	// Показ специальной страницы
							"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
							"COMPATIBLE_MODE" => "Y",	// Включить режим совместимости
							"DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
							"H1" => "Продукты"
						),
						false
					);?>
		
				</div>
				
			</div>
		</section>	
		<?endif?>
	<?endif?>
	
	
	<section class="common basket_form">
		<div class="max_width">
			<?
			global $USER;
			if (!$USER->IsAuthorized()):
			?>
			<p class="basket_form__title"><a href="#" class="auth regTog">Авторизуйтесь</a> или введите данные вручную</p>
			<?endif?>
				<?$APPLICATION->IncludeComponent("christina:sale.order.ajax", "order", Array(
				"COMPONENT_TEMPLATE" => ".default",
					"PAY_FROM_ACCOUNT" => "N",	// Позволять оплачивать с внутреннего счета
					"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",	// Позволять оплачивать с внутреннего счета только в полном объеме
					"ALLOW_AUTO_REGISTER" => "Y",	// Оформлять заказ с автоматической регистрацией пользователя
					"ALLOW_APPEND_ORDER" => "Y",
					"SEND_NEW_USER_NOTIFY" => "Y",	// Отправлять пользователю письмо, что он зарегистрирован на сайте
					"DELIVERY_NO_AJAX" => "N",	// Рассчитывать стоимость доставки сразу
					"SHOW_NOT_CALCULATED_DELIVERIES" => "L",
					"DELIVERY_NO_SESSION" => "Y",	// Проверять сессию при оформлении заказа
					"TEMPLATE_LOCATION" => "popup",	// Шаблон местоположения
					"SPOT_LOCATION_BY_GEOIP" => "Y",
					"DELIVERY_TO_PAYSYSTEM" => "d2p",	// Последовательность оформления
					"SHOW_VAT_PRICE" => "Y",
					"USE_PREPAYMENT" => "N",	// Использовать предавторизацию для оформления заказа (PayPal Express Checkout)
					"COMPATIBLE_MODE" => "Y",
					"USE_PRELOAD" => "Y",
					"ALLOW_USER_PROFILES" => "N",
					"ALLOW_NEW_PROFILE" => "N",	// Разрешить множество профилей покупателей
					"TEMPLATE_THEME" => "site",
					"SHOW_ORDER_BUTTON" => "final_step",
					"SHOW_TOTAL_ORDER_BUTTON" => "N",
					"SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",
					"SHOW_PAY_SYSTEM_INFO_NAME" => "Y",
					"SHOW_DELIVERY_LIST_NAMES" => "Y",
					"SHOW_DELIVERY_INFO_NAME" => "Y",
					"SHOW_DELIVERY_PARENT_NAMES" => "Y",
					"SHOW_STORES_IMAGES" => "Y",	// Показывать изображения складов в окне выбора пункта выдачи
					"SKIP_USELESS_BLOCK" => "Y",
					"BASKET_POSITION" => "after",
					"SHOW_BASKET_HEADERS" => "N",
					"DELIVERY_FADE_EXTRA_SERVICES" => "N",
					"SHOW_COUPONS_BASKET" => "Y",
					"SHOW_COUPONS_DELIVERY" => "Y",
					"SHOW_COUPONS_PAY_SYSTEM" => "Y",
					"SHOW_NEAREST_PICKUP" => "N",
					"DELIVERIES_PER_PAGE" => "9",
					"PAY_SYSTEMS_PER_PAGE" => "9",
					"PICKUPS_PER_PAGE" => "5",
					"SHOW_PICKUP_MAP" => "Y",
					"SHOW_MAP_IN_PROPS" => "N",
					"PICKUP_MAP_TYPE" => "yandex",
					"PROPS_FADE_LIST_1" => "",
					"USER_CONSENT" => "N",
					"USER_CONSENT_ID" => "0",
					"USER_CONSENT_IS_CHECKED" => "Y",
					"USER_CONSENT_IS_LOADED" => "N",
					"ACTION_VARIABLE" => "soa-action",
					"PATH_TO_BASKET" => "",	// Страница корзины
					"PATH_TO_PERSONAL" => "index.php",	// Страница персонального раздела
					"PATH_TO_PAYMENT" => "payment.php",	// Страница подключения платежной системы
					"PATH_TO_AUTH" => "/auth/",	// Страница авторизации
					"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
					"DISABLE_BASKET_REDIRECT" => "N",	// Оставаться на странице, если корзина пуста
					"USE_PHONE_NORMALIZATION" => "Y",
					"PRODUCT_COLUMNS_VISIBLE" => array(
						0 => "PREVIEW_PICTURE",
						1 => "PROPS",
					),
					"ADDITIONAL_PICT_PROP_7" => "-",
					"BASKET_IMAGES_SCALING" => "adaptive",
					"SERVICES_IMAGES_SCALING" => "adaptive",
					"PRODUCT_COLUMNS_HIDDEN" => "",
					"USE_YM_GOALS" => "N",
					"USE_ENHANCED_ECOMMERCE" => "N",
					"USE_CUSTOM_MAIN_MESSAGES" => "N",
					"USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",
					"USE_CUSTOM_ERROR_MESSAGES" => "N"
				),
				false
			);?>
		</div>
	</section>
	<?else:?>
		<section class="shop empty_basket">
			<div class="max_width">		
					<h3 class="basket__low_title empty_basket__title title">Корзина пустая</h3>
			</div>
		</section>
	<?endif?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>