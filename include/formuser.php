<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?$APPLICATION->IncludeComponent("bitrix:main.profile", "user", Array(
						"CHECK_RIGHTS" => "N",	// Проверять права доступа
							"SEND_INFO" => "N",	// Генерировать почтовое событие
							"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
							"USER_PROPERTY" => Array(
							"UF_SUB",
							"UF_PUBLICK",
							), 
							"USER_PROPERTY_NAME" => "",	// Название закладки с доп. свойствами
						),
						false
					);?>