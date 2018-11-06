<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
	
	<section class="smpl_news_article smpl_btn">
		<div class="max_width">
			<div class="smpl_news_article__road">
				<a href="/articles/" class="smpl_news_article__link lane_wr">Статьи</a>
				<a href="/articles/<?=$arResult['CODE']?>/" class="smpl_news_article__link"><?=$arResult['NAME']?></a>
			</div>
			<h1 class="smpl_news_article__title title">
				<?=$arResult['NAME']?>
			</h1>
		</div>
	</section>

	<section class="text text_news">
		<div class="text_news__top_mob">
			<img src="<?=SITE_TEMPLATE_PATH?>/images/bg6.jpg" alt="">
			<h1 class="title text_news__title"><?=$arResult['NAME']?></h1>
		</div>
		<div class="max_width">
			<div class="text_news__side">
				<p class="text__bold text__side_article"><?=$arResult['PROPERTIES']['CITATA']['~VALUE']['TEXT']?></p>
			</div>
			<div class="text__top_cont">
				<?=$arResult['~DETAIL_TEXT']?>
				<div class="text_news__side">
					<p class="text__bold text__side_article_mob text__side_article"><?=$arResult['PROPERTIES']['CITATA']['~VALUE']['TEXT']?></p>
				</div>
				
			</div>
			<div class="small_baner">
				<?if(!empty($arResult['PROPERTIES']['ITEM1']['VALUE'])):?>
					<?$APPLICATION->IncludeComponent("bitrix:catalog.element", "el-article", Array(
						"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
							"ADD_DETAIL_TO_SLIDER" => "N",	// Добавлять детальную картинку в слайдер
							"ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
							"ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
							"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
							"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
							"ADD_TO_BASKET_ACTION" => array(	// Показывать кнопки добавления в корзину и покупки
								0 => "BUY",
							),
							"ADD_TO_BASKET_ACTION_PRIMARY" => array(	// Выделять кнопки добавления в корзину и покупки
								0 => "BUY",
							),
							"BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
							"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
							"BRAND_USE" => "N",	// Использовать компонент "Бренды"
							"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
							"CACHE_GROUPS" => "Y",	// Учитывать права доступа
							"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
							"CACHE_TYPE" => "A",	// Тип кеширования
							"CHECK_SECTION_ID_VARIABLE" => "N",	// Использовать код группы из переменной, если не задан раздел элемента
							"COMPATIBLE_MODE" => "Y",	// Включить режим совместимости
							"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
							"DETAIL_PICTURE_MODE" => array(	// Режим показа детальной картинки
								0 => "POPUP",
								1 => "MAGNIFIER",
							),
							"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
							"DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
							"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
							"DISPLAY_NAME" => "Y",	// Выводить название элемента
							"DISPLAY_PREVIEW_TEXT_MODE" => "E",	// Показ описания для анонса
							"ELEMENT_CODE" => "",	// Код элемента
							"ELEMENT_ID" => $arResult['PROPERTIES']['ITEM1']['VALUE'],	// ID элемента
							"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",	// Текст заголовка "Подарки"
							"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",	// Скрыть заголовок "Подарки" в детальном просмотре
							"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",	// Количество элементов в блоке "Подарки" в строке в детальном просмотре
							"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",	// Текст метки "Подарка" в детальном просмотре
							"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",	// Текст заголовка "Товары к подарку"
							"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",	// Скрыть заголовок "Товары к подарку" в детальном просмотре
							"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",	// Количество элементов в блоке "Товары к подарку" в строке в детальном просмотре
							"GIFTS_MESS_BTN_BUY" => "Выбрать",	// Текст кнопки "Выбрать"
							"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",	// Показывать процент скидки
							"GIFTS_SHOW_IMAGE" => "Y",	// Показывать изображение
							"GIFTS_SHOW_NAME" => "Y",	// Показывать название
							"GIFTS_SHOW_OLD_PRICE" => "Y",	// Показывать старую цену
							"HIDE_NOT_AVAILABLE_OFFERS" => "N",	// Недоступные торговые предложения
							"IBLOCK_ID" => "7",	// Инфоблок
							"IBLOCK_TYPE" => "1c_catalog",	// Тип инфоблока
							"IMAGE_RESOLUTION" => "16by9",	// Соотношение сторон изображения товара
							"LABEL_PROP" => "",	// Свойство меток товара
							"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",	// URL на страницу, где будет показан список связанных элементов
							"LINK_IBLOCK_ID" => "",	// ID инфоблока, элементы которого связаны с текущим элементом
							"LINK_IBLOCK_TYPE" => "",	// Тип инфоблока, элементы которого связаны с текущим элементом
							"LINK_PROPERTY_SID" => "",	// Свойство, в котором хранится связь
							"MAIN_BLOCK_PROPERTY_CODE" => "",	// Свойства, отображаемые в блоке справа от картинки
							"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
							"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
							"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
							"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
							"MESS_COMMENTS_TAB" => "Комментарии",	// Текст вкладки "Комментарии"
							"MESS_DESCRIPTION_TAB" => "Описание",	// Текст вкладки "Описание"
							"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
							"MESS_PRICE_RANGES_TITLE" => "Цены",	// Название блока c расширенными ценами
							"MESS_PROPERTIES_TAB" => "Характеристики",	// Текст вкладки "Характеристики"
							"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
							"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
							"OFFERS_LIMIT" => "0",	// Максимальное количество предложений для показа (0 - все)
							"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
							"PRICE_CODE" => array(0 => "BASE"),	// Тип цены
							"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
							"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
							"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
							"PRODUCT_INFO_BLOCK_ORDER" => "sku,props",	// Порядок отображения блоков информации о товаре
							"PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",	// Порядок отображения блоков покупки товара
							"PRODUCT_PROPERTIES" => "",	// Характеристики товара
							"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
							"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
							"PRODUCT_SUBSCRIPTION" => "Y",	// Разрешить оповещения для отсутствующих товаров
							"PROPERTY_CODE" => array(	// Свойства
								0 => "",
								1 => "",
							),
							"SECTION_CODE" => "",	// Код раздела
							"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
							"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
							"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
							"SEF_MODE" => "N",	// Включить поддержку ЧПУ
							"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
							"SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
							"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
							"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
							"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
							"SET_STATUS_404" => "N",	// Устанавливать статус 404
							"SET_TITLE" => "N",	// Устанавливать заголовок страницы
							"SET_VIEWED_IN_COMPONENT" => "N",	// Включить сохранение информации о просмотре товара для старых шаблонов
							"SHOW_404" => "N",	// Показ специальной страницы
							"SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
							"SHOW_DEACTIVATED" => "N",	// Показывать деактивированные товары
							"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
							"SHOW_MAX_QUANTITY" => "N",	// Показывать остаток товара
							"SHOW_OLD_PRICE" => "N",	// Показывать старую цену
							"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
							"SHOW_SLIDER" => "N",	// Показывать слайдер для товаров
							"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа элемента
							"TEMPLATE_THEME" => "blue",	// Цветовая тема
							"USE_COMMENTS" => "N",	// Включить отзывы о товаре
							"USE_ELEMENT_COUNTER" => "Y",	// Использовать счетчик просмотров
							"USE_ENHANCED_ECOMMERCE" => "N",	// Включить отправку данных в электронную торговлю
							"USE_GIFTS_DETAIL" => "Y",	// Показывать блок "Подарки" в детальном просмотре
							"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",	// Показывать блок "Товары к подарку" в детальном просмотре
							"USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
							"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
							"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
							"USE_RATIO_IN_RANGES" => "N",	// Учитывать коэффициенты для диапазонов цен
							"USE_VOTE_RATING" => "N",	// Включить рейтинг товара
						),
						false
					);?>
					<?endif?>
			</div>
			<?=$arResult['PROPERTIES']['TEXT2']['~VALUE']['TEXT']?>	
		</div>
		<?if(!empty($arResult['PROPERTIES']['TEXT3']['~VALUE']['TEXT'])):?>
		<div class="text__fullscr_img ban_center">
			<div class="max_width">
				<!-- <span class="news_padleft text__article text_news__article"><?=$arResult['PROPERTIES']['TEXT3']['~VALUE']['TEXT']?></span> -->
				<span class="ban_center__desc"><?=$arResult['PROPERTIES']['TITLE']['VALUE']?></span>
			</div>
		</div>
		<?endif?>
		<div class="max_width">
			<span class="news_padleft text__article text_news__article text_news__article_mob"><?=$arResult['PROPERTIES']['TEXT3']['~VALUE']['TEXT']?></span>
			<div class="small_baner">
				<?if(!empty($arResult['PROPERTIES']['ITEM2']['VALUE'])):?>
					<?$APPLICATION->IncludeComponent("bitrix:catalog.element", "el-article", Array(
						"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
							"ADD_DETAIL_TO_SLIDER" => "N",	// Добавлять детальную картинку в слайдер
							"ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
							"ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
							"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
							"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
							"ADD_TO_BASKET_ACTION" => array(	// Показывать кнопки добавления в корзину и покупки
								0 => "BUY",
							),
							"ADD_TO_BASKET_ACTION_PRIMARY" => array(	// Выделять кнопки добавления в корзину и покупки
								0 => "BUY",
							),
							"BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
							"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
							"BRAND_USE" => "N",	// Использовать компонент "Бренды"
							"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
							"CACHE_GROUPS" => "Y",	// Учитывать права доступа
							"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
							"CACHE_TYPE" => "A",	// Тип кеширования
							"CHECK_SECTION_ID_VARIABLE" => "N",	// Использовать код группы из переменной, если не задан раздел элемента
							"COMPATIBLE_MODE" => "Y",	// Включить режим совместимости
							"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
							"DETAIL_PICTURE_MODE" => array(	// Режим показа детальной картинки
								0 => "POPUP",
								1 => "MAGNIFIER",
							),
							"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
							"DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
							"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
							"DISPLAY_NAME" => "Y",	// Выводить название элемента
							"DISPLAY_PREVIEW_TEXT_MODE" => "E",	// Показ описания для анонса
							"ELEMENT_CODE" => "",	// Код элемента
							"ELEMENT_ID" => $arResult['PROPERTIES']['ITEM2']['VALUE'],	// ID элемента
							"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",	// Текст заголовка "Подарки"
							"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",	// Скрыть заголовок "Подарки" в детальном просмотре
							"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",	// Количество элементов в блоке "Подарки" в строке в детальном просмотре
							"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",	// Текст метки "Подарка" в детальном просмотре
							"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",	// Текст заголовка "Товары к подарку"
							"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",	// Скрыть заголовок "Товары к подарку" в детальном просмотре
							"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",	// Количество элементов в блоке "Товары к подарку" в строке в детальном просмотре
							"GIFTS_MESS_BTN_BUY" => "Выбрать",	// Текст кнопки "Выбрать"
							"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",	// Показывать процент скидки
							"GIFTS_SHOW_IMAGE" => "Y",	// Показывать изображение
							"GIFTS_SHOW_NAME" => "Y",	// Показывать название
							"GIFTS_SHOW_OLD_PRICE" => "Y",	// Показывать старую цену
							"HIDE_NOT_AVAILABLE_OFFERS" => "N",	// Недоступные торговые предложения
							"IBLOCK_ID" => "7",	// Инфоблок
							"IBLOCK_TYPE" => "1c_catalog",	// Тип инфоблока
							"IMAGE_RESOLUTION" => "16by9",	// Соотношение сторон изображения товара
							"LABEL_PROP" => "",	// Свойство меток товара
							"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",	// URL на страницу, где будет показан список связанных элементов
							"LINK_IBLOCK_ID" => "",	// ID инфоблока, элементы которого связаны с текущим элементом
							"LINK_IBLOCK_TYPE" => "",	// Тип инфоблока, элементы которого связаны с текущим элементом
							"LINK_PROPERTY_SID" => "",	// Свойство, в котором хранится связь
							"MAIN_BLOCK_PROPERTY_CODE" => "",	// Свойства, отображаемые в блоке справа от картинки
							"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
							"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
							"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
							"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
							"MESS_COMMENTS_TAB" => "Комментарии",	// Текст вкладки "Комментарии"
							"MESS_DESCRIPTION_TAB" => "Описание",	// Текст вкладки "Описание"
							"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
							"MESS_PRICE_RANGES_TITLE" => "Цены",	// Название блока c расширенными ценами
							"MESS_PROPERTIES_TAB" => "Характеристики",	// Текст вкладки "Характеристики"
							"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
							"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
							"OFFERS_LIMIT" => "0",	// Максимальное количество предложений для показа (0 - все)
							"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
							"PRICE_CODE" => array(0 => "BASE"),	// Тип цены
							"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
							"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
							"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
							"PRODUCT_INFO_BLOCK_ORDER" => "sku,props",	// Порядок отображения блоков информации о товаре
							"PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",	// Порядок отображения блоков покупки товара
							"PRODUCT_PROPERTIES" => "",	// Характеристики товара
							"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
							"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
							"PRODUCT_SUBSCRIPTION" => "Y",	// Разрешить оповещения для отсутствующих товаров
							"PROPERTY_CODE" => array(	// Свойства
								0 => "",
								1 => "",
							),
							"SECTION_CODE" => "",	// Код раздела
							"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
							"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
							"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
							"SEF_MODE" => "N",	// Включить поддержку ЧПУ
							"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
							"SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
							"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
							"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
							"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
							"SET_STATUS_404" => "N",	// Устанавливать статус 404
							"SET_TITLE" => "N",	// Устанавливать заголовок страницы
							"SET_VIEWED_IN_COMPONENT" => "N",	// Включить сохранение информации о просмотре товара для старых шаблонов
							"SHOW_404" => "N",	// Показ специальной страницы
							"SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
							"SHOW_DEACTIVATED" => "N",	// Показывать деактивированные товары
							"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
							"SHOW_MAX_QUANTITY" => "N",	// Показывать остаток товара
							"SHOW_OLD_PRICE" => "N",	// Показывать старую цену
							"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
							"SHOW_SLIDER" => "N",	// Показывать слайдер для товаров
							"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа элемента
							"TEMPLATE_THEME" => "blue",	// Цветовая тема
							"USE_COMMENTS" => "N",	// Включить отзывы о товаре
							"USE_ELEMENT_COUNTER" => "Y",	// Использовать счетчик просмотров
							"USE_ENHANCED_ECOMMERCE" => "N",	// Включить отправку данных в электронную торговлю
							"USE_GIFTS_DETAIL" => "Y",	// Показывать блок "Подарки" в детальном просмотре
							"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",	// Показывать блок "Товары к подарку" в детальном просмотре
							"USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
							"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
							"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
							"USE_RATIO_IN_RANGES" => "N",	// Учитывать коэффициенты для диапазонов цен
							"USE_VOTE_RATING" => "N",	// Включить рейтинг товара
						),
						false
					);?>
					<?endif?>
			</div>
			<div class="text__bot_cont">
				<?=$arResult['PROPERTIES']['TEXT4']['~VALUE']['TEXT']?>
				<?if(!empty($arResult['PROPERTIES']['AUTOR']['VALUE'])):?>
				<span class="news_padleft text_news__author">Автор: <?=$arResult['PROPERTIES']['AUTOR']['VALUE']?></span>
				<?endif?>
				
				
				<?$url = "http://".$_SERVER['SERVER_NAME'].$arResult['DETAIL_PAGE_URL'];?>
				<ul class="text_news__socials news_padleft">
					<li>
						<a href="https://www.facebook.com/sharer/sharer.php?u=[<?=$url?>]" class="text_news__social_link">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/fb_b.svg" alt="" class="text_news__social_icon">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/footer_social1.svg" alt="" class="text_news__social_icon hov">
						</a>
					</li>
					<li>
						<a href="http://vk.com/share.php?url=[<?=$url?>]noparse=true" class="text_news__social_link">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/vk_b.svg" alt="" class="text_news__social_icon">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/footer_social2.svg" alt="" class="text_news__social_icon hov">
						</a>
					</li>
					<li>
						<a href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st._surl=[<?=$url?>]" class="text_news__social_link">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/ok_b.svg" alt="" class="text_news__social_icon">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/ok_w.svg" alt="" class="text_news__social_icon hov">
						</a>
					</li>
				</ul>
			</div>
			<div class="news_slider text_news__slider news_padleft">
				<?global $arrOther;
					$arrOther = array("!ID" => $arResult['ID'])?>
					<?$APPLICATION->IncludeComponent(
						"bitrix:news.list", 
						"news-other", 
						array(
							"ACTIVE_DATE_FORMAT" => "d.m.Y",
							"ADD_SECTIONS_CHAIN" => "Y",
							"AJAX_MODE" => "N",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "Y",
							"CACHE_FILTER" => "N",
							"CACHE_GROUPS" => "Y",
							"CACHE_TIME" => "36000000",
							"CACHE_TYPE" => "N",
							"CHECK_DATES" => "Y",
							"DETAIL_URL" => "",
							"DISPLAY_BOTTOM_PAGER" => "Y",
							"DISPLAY_DATE" => "Y",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "Y",
							"DISPLAY_PREVIEW_TEXT" => "Y",
							"DISPLAY_TOP_PAGER" => "N",
							"FIELD_CODE" => array(
								0 => "",
								1 => "",
							),
							"FILTER_NAME" => "arrOther",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"IBLOCK_ID" => "4",
							"IBLOCK_TYPE" => "christina",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
							"INCLUDE_SUBSECTIONS" => "Y",
							"MESSAGE_404" => "",
							"NEWS_COUNT" => "20",
							"PAGER_BASE_LINK_ENABLE" => "N",
							"PAGER_DESC_NUMBERING" => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL" => "N",
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_TEMPLATE" => "ajax",
							"PAGER_TITLE" => "Новости",
							"PARENT_SECTION" => "",
							"PARENT_SECTION_CODE" => "",
							"PREVIEW_TRUNCATE_LEN" => "",
							"PROPERTY_CODE" => array(
								0 => "",
								1 => "",
							),
							"SET_BROWSER_TITLE" => "Y",
							"SET_LAST_MODIFIED" => "N",
							"SET_META_DESCRIPTION" => "Y",
							"SET_META_KEYWORDS" => "Y",
							"SET_STATUS_404" => "N",
							"SET_TITLE" => "Y",
							"SHOW_404" => "N",
							"SORT_BY1" => "ACTIVE_FROM",
							"SORT_BY2" => "SORT",
							"SORT_ORDER1" => "DESC",
							"SORT_ORDER2" => "ASC",
							"STRICT_SECTION_CHECK" => "N",
							"COMPONENT_TEMPLATE" => "articles-all"
						),
						false
					);?>
			</div>
		</div>
	</section>