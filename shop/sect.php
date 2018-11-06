<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?>
<?
CModule::IncludeModule("iblock");
$arFilter = array('IBLOCK_ID' => "7", "ACTIVE" => "Y", "CODE" => $_REQUEST['COD']); // выберет потомков без учета активности
   $rsSect = CIBlockSection::GetList(array(),$arFilter, false, array("UF_*"), false);
   while ($arSect = $rsSect->GetNext())
   {
   	//pre($arSect);
       $descr = $arSect['DESCRIPTION'];
       $name = $arSect['NAME'];
       $pokaz = $arSect['UF_POKAZAN'];
       $efect_title = $arSect['UF_EFFECT_TITLE'];
       $efect_text = $arSect['UF_EFFECT_TEXT'];
       $picture = CFile::GetFileArray($arSect['PICTURE']);
       $id_item = $arSect['UF_ITEM'];
       $active = $arSect['UF_ACTIVE'];
       $foto = CFile::GetFileArray($arSect['UF_PHOTOEF']);
       $file = CFile::ResizeImageGet($foto, array('width'=>490, 'height'=>450), BX_RESIZE_IMAGE_EXACT, true);
   }
?>
	<section class="half propeel_half1">
		<div class="half__bg propeel_half1__bg-left"></div>
		<div class="half__bg propeel_half1__bg-right"></div>
		<img src="<?=$picture['SRC']?>" alt="" class="propeel_half1__img">
		<div class="max_width">
			<div class="half__block propeel_half1__left">
				<div class="smpl_news_article__road">
					<a href="/shop/" class="smpl_news_article__link lane_wr">Интернет-магазин</a>
					<a href="" class="smpl_news_article__link"><?=$name?></a>
				</div>
				<h1 class="propeel_half1__title title"><?=$name?></h1>
				<div class="propeel_half1__desc"><?=$descr?></div>
			</div>
			<?if(!empty($pokaz)):?>
			<div class="half__block propeel_half1__right">
				<div class="propeel_half1__circle_wr">
					<h6 class="propeel_half1__right_title">Показания</h6>
					<ul>
						<?foreach ($pokaz as $val):?>
							<li class="propeel_half1__right_item"><?=$val?></li>
						<?endforeach;?>
					</ul>
				</div>
			</div>
			<?endif?>
		</div>		
	</section>
	<?if(!empty($efect_title)):?>
	<section class="half propeel_half2">
		<div class="half__bg propeel_half2__half_bg_left half__bg_left" <?if(!empty($file)):?>style="background-image: url(<?=$file['src']?>)"<?endif?>></div>
		<div class="max_width">
			<div class="half__block propeel_half2__left half__left" >

			</div>
			<div class="half__block propeel_half2__right half__right">
				<h2 class="propeel_half2__title title">Эффект от препаратов серии</h2>
				<ul class="propeel_half2__content">
					<?foreach ($efect_title as $k => $val):?>
					<li class="propeel_half2__item <?if($k == 0):?>opened<?endif?>">
						<a href="#" class="propeel_half2__click w_arr"><?=$val?></a>
						<p class="propeel_half2__text"><?=$efect_text[$k]?> </p>
					</li>
					<?endforeach;?>
				</ul>
			</div>	
		</div>	
	</section>
	<?endif?>
	<?if(!empty($id_item)):?>
	<?$APPLICATION->IncludeComponent("bitrix:catalog.element", "element", Array(
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
			"ELEMENT_ID" => $id_item,	// ID элемента
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
	<?if(!empty($active)):?>
	<section class="circle_wr">
		<div class="circle__wr">
			<div class="circle circle__wr__lay2">
				<div class="circle circle__wr__lay3">
					<div class="circle circle__round">
						<div class="circle_wr__title title">Активные ингредиенты</div>
					</div>
				</div>	
				<?foreach ($active as $k => $act):?>
				<p class="circle_wr__text circle_wr__text<?=$k+1?>"><?=$act?></p>
				<?endforeach;?>			
			</div>
		</div>
	</section>
	<?endif?>

	<section class="slider slider_propeel">		
		<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "main", Array(
			"COMPONENT_TEMPLATE" => ".default",
				"IBLOCK_TYPE" => "1c_catalog",	// Тип инфоблока
				"IBLOCK_ID" => "7",	// Инфоблок
				"SECTION_ID" => "",	// ID раздела
				"SECTION_CODE" => $_REQUEST['COD'],	// Код раздела
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
	</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>