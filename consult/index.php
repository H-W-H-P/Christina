<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Консультация врача");
?>
	<section class="consult_wr">
		<div class="max_width">
			             
			<?$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "filter-consult", Array(
				"COMPONENT_TEMPLATE" => ".default",
					"IBLOCK_TYPE" => "christina",	// Тип инфоблока
					"IBLOCK_ID" => "6",	// Инфоблок
					"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела инфоблока
					"SECTION_CODE" => "",	// Код раздела
					"FILTER_NAME" => "arrFilter",	// Имя выходящего массива для фильтрации
					"HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
					"TEMPLATE_THEME" => "blue",	// Цветовая тема
					"FILTER_VIEW_MODE" => "vertical",	// Вид отображения
					"POPUP_POSITION" => "left",	// Позиция для отображения всплывающего блока с информацией о фильтрации
					"DISPLAY_ELEMENT_COUNT" => "Y",	// Показывать количество
					"SEF_MODE" => "N",	// Включить поддержку ЧПУ
					"CACHE_TYPE" => "A",	// Тип кеширования
					"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
					"CACHE_GROUPS" => "Y",	// Учитывать права доступа
					"SAVE_IN_SESSION" => "N",	// Сохранять установки фильтра в сессии пользователя
					"PAGER_PARAMS_NAME" => "arrPager",	// Имя массива с переменными для построения ссылок в постраничной навигации
					"PRICE_CODE" => "",	// Тип цены
					"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
					"XML_EXPORT" => "N",	// Включить поддержку Яндекс Островов
					"SECTION_TITLE" => "-",	// Заголовок
					"SECTION_DESCRIPTION" => "-",	// Описание
				),
				false
			);?>
			<?if(!empty($_GET['search'])){
				$arrFilter[] = array("%DETAIL_TEXT" => $_GET['search'][0]);
			}
			if(!empty($_GET['sort'])){
				
				if($_GET['sort'][0] == 'useful'){
					$sort = "PROPERTY_PLUS";
				}
				elseif($_GET['sort'][0] == 'new'){
					$sort = "created_date";
				}
			}
			?>
			<?global $arrFilter;
			$arrFilter[] = array("PROPERTY_PUBLICK_VALUE" => "Y");?>
			<?$APPLICATION->IncludeComponent("bitrix:news.list", "consult", Array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
					"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
					"AJAX_MODE" => "N",	// Включить режим AJAX
					"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
					"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
					"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
					"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
					"CACHE_GROUPS" => "Y",	// Учитывать права доступа
					"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
					"CACHE_TYPE" => "N",	// Тип кеширования
					"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
					"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
					"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
					"DISPLAY_DATE" => "Y",	// Выводить дату элемента
					"DISPLAY_NAME" => "Y",	// Выводить название элемента
					"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
					"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
					"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
					"FIELD_CODE" => array(	// Поля
						0 => "NAME",
						1 => "PREVIEW_TEXT",
						2 => "DETAIL_TEXT",
						3 => "",
					),
					"FILTER_NAME" => "arrFilter",	// Фильтр
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
					"IBLOCK_ID" => "6",	// Код информационного блока
					"IBLOCK_TYPE" => "christina",	// Тип информационного блока (используется только для проверки)
					"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
					"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
					"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
					"NEWS_COUNT" => "20",	// Количество новостей на странице
					"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
					"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
					"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
					"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
					"PAGER_TEMPLATE" => "ajax_consult",	// Шаблон постраничной навигации
					"PAGER_TITLE" => "Новости",	// Название категорий
					"PARENT_SECTION" => "",	// ID раздела
					"PARENT_SECTION_CODE" => "",	// Код раздела
					"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
					"PROPERTY_CODE" => array(	// Свойства
						0 => "PROBLEMS",
						1 => "TEGI",
						2 => "NAME",
						3 => "INFO"
					),
					"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
					"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
					"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
					"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
					"SET_STATUS_404" => "N",	// Устанавливать статус 404
					"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
					"SHOW_404" => "N",	// Показ специальной страницы
					"SORT_BY1" => $sort,	// Поле для первой сортировки новостей
					"SORT_BY2" => $sort,	// Поле для второй сортировки новостей
					"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
					"SORT_ORDER2" => "DESC",	// Направление для второй сортировки новостей
					"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
					"COMPONENT_TEMPLATE" => ".default"
				),
				false
			);?>
			<p class="consultyes" style="display: none;">Заявка успешно отправлена.</p>
			<div id="rescons">
				<?$APPLICATION->IncludeComponent(
						"christina:iblock.element.add.consult",
						"",
						Array(
							"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
							"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
							"CUSTOM_TITLE_DETAIL_PICTURE" => "",
							"CUSTOM_TITLE_DETAIL_TEXT" => "",
							"CUSTOM_TITLE_IBLOCK_SECTION" => "",
							"CUSTOM_TITLE_NAME" => "",
							"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
							"CUSTOM_TITLE_PREVIEW_TEXT" => "",
							"CUSTOM_TITLE_TAGS" => "",
							"DEFAULT_INPUT_SIZE" => "30",
							"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
							"ELEMENT_ASSOC" => "CREATED_BY",
							"GROUPS" => array("2"),
							"IBLOCK_ID" => "6",
							"IBLOCK_TYPE" => "christina",
							"LEVEL_LAST" => "Y",
							"LIST_URL" => "",
							"MAX_FILE_SIZE" => "0",
							"MAX_LEVELS" => "100000",
							"MAX_USER_ENTRIES" => "100000",
							"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
							"PROPERTY_CODES" => array("145","PREVIEW_TEXT","NAME","146"),
							"PROPERTY_CODES_REQUIRED" => array(),
							"RESIZE_IMAGES" => "N",
							"SEF_MODE" => "N",
							"STATUS" => "ANY",
							"STATUS_NEW" => "N",
							"USER_MESSAGE_ADD" => "",
							"USER_MESSAGE_EDIT" => "",
							"USE_CAPTCHA" => "N"
						)
					);?>
			</div>
		</div>
	</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>