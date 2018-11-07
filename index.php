<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная страница");
?>

<!-- simple-button-content -->
	<section class="smpl_btn_cont owl-carousel">
		<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"slider", 
	array(
		"COMPONENT_TEMPLATE" => "slider",
		"IBLOCK_TYPE" => "christina",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DETAIL_TEXT",
			4 => "DETAIL_PICTURE",
		),
		"PROPERTY_CODE" => array(
			0 => "BUTTON",
			1 => "FILE",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>

	</section>

<!-- 	<section class="big_banner big_banner_2">
		<a href="/shop" class="big_banner_2__wr">
			<div class="big_banner_2__left">
				<h5 class="title big_banner_2__title">
					Идеальный <br> домашний уход
				</h5>
				<p class="big_banner_2__text">для процедур эстетической медицины</p>
				<p class="big_banner_2__text-big">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/360.png" alt="">
				</p>
				<p class="big_banner_2__text">вокруг процедуры</p>
			</div>
			<div class="big_banner_2__center">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/ban_img1.png" alt="">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/ban_img2.png" alt="">
			</div>
			<div class="big_banner_2__right">
				<ul class="big_banner_2__list_wr">
					<li>подготовка к процедурам</li>
					<li>реабилитация после процедур</li>
					<li>поддержание эффекта процедур</li>
				</ul>
			</div>
		</a>
	</section> -->

	<!-- half-button -->
	<section class="half_btn half index_half">
		<div class="half__block half__left">
			<h1 class="half__title_mob half__title">
				Новое поколение косметических средств для усиления и продления эффекта процедур эстетической медицины
			</h1>	
			<form class="half_btn__form procedures_form" action="">
				<div class="procedures_form__grp">
					<p class="procedures_form__text">
						Меня беспокоят
					</p>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="1" checked="checked">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Мимические морщины</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Глубокие морщины и потеря объема</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Гиперпигментация</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Акне и жирность кожи</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Сухость, шелушение, зуд</span> 
						</label>
					</div>
				</div>
			</form>		
			<a href="pages/shop.html" class="btn half__btn_mob">Подобрать продукты</a>
		</div>
		<div class="half__block half__right">
			<p class="procedures_form__text_mob procedures_form__text">
				Мне сделали следующие процедуры
			</p>
			<form class="half_btn__form procedures_form" action="">
				<div class="procedures_form__grp">
					<p class="procedures_form__text">
						Мне сделали процедуры
					</p>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="1" checked="checked">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Филлеры</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Лазеры и другие аппартаные методы</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Лечение акне</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Мезотерапия</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Биоревитализация</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Инъекции ботулотоксина</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Омоложение нитями</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Пилинги</span> 
						</label>
					</div>
					<div class="procedures_form__inline">
						<label class="procedures_form__check_label">
							<input class="procedures_form__check_input" type="checkbox" value="0">
							<div class="procedures_form__custom_input">
								<div class="procedures_form__custom_input_dot"></div>
							</div>
							<span class="colored">Ещё ничего не делали</span> 
						</label>
					</div>
				</div>
			</form>
		</div>
		<h1 class="half__title">
			Новое поколение косметических средств для усиления и продления эффекта процедур эстетической медицины
		</h1>		
		<a href="/shop/" class="btn half__btn">Подобрать продукты</a>
	</section>

	<!-- simple-button -->
	<?
	CModule::IncludeModule("iblock");
	$arFilter = array("IBLOCK_ID" => 8, "ACTIVE" => "Y", "ID" => 21);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "PROPERTY_TITLE", "PROPERTY_BUTTON", "PREVIEW_TEXT", "PREVIEW_PICTURE"));
	while($ar_fields = $res->GetNext())
	{
		$title = $ar_fields['PROPERTY_TITLE_VALUE'];
		$button = $ar_fields['PROPERTY_BUTTON_VALUE'];
		$descr = $ar_fields['PROPERTY_BUTTON_DESCRIPTION'];
		$text = $ar_fields['PREVIEW_TEXT'];
		$picture = CFile::GetFileArray($ar_fields['PREVIEW_PICTURE']);
	}
	?>
	<section class="smpl_btn" <?if(!empty($picture)):?>style="background-image: url(<?=$picture['SRC']?>)"<?endif?>>		
		<div class="max_width">
			
			<h2 class="smpl_btn__title">
				 <?=$title?>
			</h2>
			<p class="smpl_btn__desc">
				<?=$text?>
				
			</p>
			<?if(!empty($button)):?>
				<a href="<?=$descr?>" class="btn smpl_btn_cont__btn"><?=$button?></a>
			<?endif?>
		</div>
	</section>

	<!-- slider -->
	<section class="slider slider_main">	
		<?global $arrFilter;
		$arrFilter = array("PROPERTY_MAIN_VALUE" => "Y")?>	
		<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "main", Array(
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
		<a href="/shop/" class="btn slider__btn">
			Перейти в интернет-магазин
		</a>
	</section>

	<!-- half-slider -->
	<section class="half half_slider">
		<div class="half_slider__owl owl-carousel max_width">
			<?$APPLICATION->IncludeComponent("bitrix:news.list", "do-posle", Array(
				"COMPONENT_TEMPLATE" => ".default",
					"IBLOCK_TYPE" => "christina",	// Тип информационного блока (используется только для проверки)
					"IBLOCK_ID" => "2",	// Код информационного блока
					"NEWS_COUNT" => "20",	// Количество новостей на странице
					"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
					"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
					"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
					"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
					"FILTER_NAME" => "",	// Фильтр
					"FIELD_CODE" => array(	// Поля
						0 => "PREVIEW_PICTURE",
						1 => "",
					),
					"PROPERTY_CODE" => array(	// Свойства
						0 => "MINUS",
						1 => "PLUS",
						2 => "",
						3 => "",
						4 => "",
					),
					"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
					"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
					"AJAX_MODE" => "N",	// Включить режим AJAX
					"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
					"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
					"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
					"CACHE_TYPE" => "A",	// Тип кеширования
					"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
					"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
					"CACHE_GROUPS" => "Y",	// Учитывать права доступа
					"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
					"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
					"SET_TITLE" => "N",	// Устанавливать заголовок страницы
					"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
					"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
					"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
					"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
					"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
					"PARENT_SECTION" => "",	// ID раздела
					"PARENT_SECTION_CODE" => "",	// Код раздела
					"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
					"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
					"DISPLAY_DATE" => "Y",	// Выводить дату элемента
					"DISPLAY_NAME" => "Y",	// Выводить название элемента
					"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
					"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
					"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
					"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
					"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
					"PAGER_TITLE" => "Новости",	// Название категорий
					"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
					"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
					"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
					"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
					"SET_STATUS_404" => "N",	// Устанавливать статус 404
					"SHOW_404" => "N",	// Показ специальной страницы
					"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
				),
				false
			);?>
		</div>
		<h1 class="half_slider__title half__title">
			<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/include/text4.php"
						)
					);?>
			
		</h1>
	</section>

	<!-- columns -->
	<section class="columns columns_black">
		<h1 class="columns__title title">
		<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/include/text5.php"
						)
					);?>
		</h1>
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "clinical-main", Array(
			"COMPONENT_TEMPLATE" => ".default",
				"IBLOCK_TYPE" => "christina",	// Тип информационного блока (используется только для проверки)
				"IBLOCK_ID" => "3",	// Код информационного блока
				"NEWS_COUNT" => "20",	// Количество новостей на странице
				"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
				"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
				"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
				"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
				"FILTER_NAME" => "",	// Фильтр
				"FIELD_CODE" => array(	// Поля
					0 => "",
					1 => "",
				),
				"PROPERTY_CODE" => array(	// Свойства
					0 => "URL",
					1 => "FILE1",
					2 => "FILE2",
					3 => "",
				),
				"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
				"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
				"AJAX_MODE" => "N",	// Включить режим AJAX
				"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
				"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
				"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
				"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
				"CACHE_TYPE" => "A",	// Тип кеширования
				"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
				"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
				"CACHE_GROUPS" => "Y",	// Учитывать права доступа
				"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
				"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
				"SET_TITLE" => "N",	// Устанавливать заголовок страницы
				"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
				"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
				"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
				"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
				"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
				"PARENT_SECTION" => "",	// ID раздела
				"PARENT_SECTION_CODE" => "",	// Код раздела
				"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
				"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
				"DISPLAY_DATE" => "Y",	// Выводить дату элемента
				"DISPLAY_NAME" => "Y",	// Выводить название элемента
				"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
				"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
				"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
				"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
				"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
				"PAGER_TITLE" => "Новости",	// Название категорий
				"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
				"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
				"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
				"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
				"SET_STATUS_404" => "N",	// Устанавливать статус 404
				"SHOW_404" => "N",	// Показ специальной страницы
				"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
			),
			false
		);?>
		<div class="columns__title_cont left">
			<h1 class="columns__title title">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/include/text5.php"
						)
					);?>
			</h1>
		</div>
		<div class="columns__title_cont right">
			<h1 class="columns__title title">
				<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/include/text5.php"
						)
					);?>
			</h1>
		</div>
	</section>

	<!-- news-small -->
	<section class="news news_small">
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "articles", Array(
			"COMPONENT_TEMPLATE" => ".default",
				"IBLOCK_TYPE" => "christina",	// Тип информационного блока (используется только для проверки)
				"IBLOCK_ID" => "4",	// Код информационного блока
				"NEWS_COUNT" => "3",	// Количество новостей на странице
				"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
				"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
				"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
				"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
				"FILTER_NAME" => "",	// Фильтр
				"FIELD_CODE" => array(	// Поля
					0 => "",
					1 => "",
				),
				"PROPERTY_CODE" => array(	// Свойства
					0 => "",
					1 => "",
					2 => "",
					3 => "",
					4 => "",
				),
				"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
				"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
				"AJAX_MODE" => "N",	// Включить режим AJAX
				"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
				"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
				"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
				"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
				"CACHE_TYPE" => "A",	// Тип кеширования
				"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
				"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
				"CACHE_GROUPS" => "Y",	// Учитывать права доступа
				"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
				"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
				"SET_TITLE" => "N",	// Устанавливать заголовок страницы
				"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
				"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
				"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
				"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
				"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
				"PARENT_SECTION" => "",	// ID раздела
				"PARENT_SECTION_CODE" => "",	// Код раздела
				"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
				"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
				"DISPLAY_DATE" => "Y",	// Выводить дату элемента
				"DISPLAY_NAME" => "Y",	// Выводить название элемента
				"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
				"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
				"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
				"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
				"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
				"PAGER_TITLE" => "Новости",	// Название категорий
				"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
				"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
				"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
				"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
				"SET_STATUS_404" => "N",	// Устанавливать статус 404
				"SHOW_404" => "N",	// Показ специальной страницы
				"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
			),
			false
		);?>
	</section>

	<!-- half-button -->
	<!-- <?
	$arFilter = array("IBLOCK_ID" => 8, "ACTIVE" => "Y", "ID" => 22);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "PROPERTY_TITLE", "PROPERTY_BUTTON", "PREVIEW_TEXT", "PREVIEW_PICTURE"));
	while($ar_fields = $res->GetNext())
	{
		$title = $ar_fields['PROPERTY_TITLE_VALUE'];
		$button = $ar_fields['PROPERTY_BUTTON_VALUE'];
		$descr = $ar_fields['PROPERTY_BUTTON_DESCRIPTION'];
		$text = $ar_fields['PREVIEW_TEXT'];
		$picture = CFile::GetFileArray($ar_fields['PREVIEW_PICTURE']);
	}
	?>
	<section class="half_btn half half_btn2" <?if(!empty($picture)):?>style="background-image: url(<?=$picture['SRC']?>)"<?endif?>>
		<div class="half__block half__left">

		</div>
		<div class="half__block half__right">
			<h1 class="half__title">
				<?=$title?>
				
			</h1>
			<p class="half__desc">
				<?=$text?>
				
			</p>
			<?if(!empty($button)):?>
				<a href="<?=$descr?>" class="btn smpl_btn_cont__btn"><?=$button?></a>
			<?endif?>
			
		</div>		
	</section> -->

	<!-- news-bad-section -->
	<section class="uniq_news">
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "news", Array(
			"COMPONENT_TEMPLATE" => "articles",
				"IBLOCK_TYPE" => "christina",	// Тип информационного блока (используется только для проверки)
				"IBLOCK_ID" => "5",	// Код информационного блока
				"NEWS_COUNT" => "10",	// Количество новостей на странице
				"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
				"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
				"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
				"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
				"FILTER_NAME" => "",	// Фильтр
				"FIELD_CODE" => array(	// Поля
					0 => "",
					1 => "",
				),
				"PROPERTY_CODE" => array(	// Свойства
					0 => "",
					1 => "",
				),
				"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
				"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
				"AJAX_MODE" => "N",	// Включить режим AJAX
				"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
				"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
				"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
				"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
				"CACHE_TYPE" => "A",	// Тип кеширования
				"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
				"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
				"CACHE_GROUPS" => "Y",	// Учитывать права доступа
				"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
				"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
				"SET_TITLE" => "N",	// Устанавливать заголовок страницы
				"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
				"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
				"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
				"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
				"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
				"PARENT_SECTION" => "",	// ID раздела
				"PARENT_SECTION_CODE" => "",	// Код раздела
				"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
				"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
				"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
				"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
				"PAGER_TITLE" => "Новости",	// Название категорий
				"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
				"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
				"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
				"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
				"SET_STATUS_404" => "N",	// Устанавливать статус 404
				"SHOW_404" => "N",	// Показ специальной страницы
				"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
			),
			false
		);?>
	</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>