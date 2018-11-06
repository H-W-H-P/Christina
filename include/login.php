<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?$APPLICATION->IncludeComponent("christina:system.auth.form", "", Array(
											"REGISTER_URL" => "register.php",	// Страница регистрации
												"FORGOT_PASSWORD_URL" => "",	// Страница забытого пароля
												"PROFILE_URL" => "profile.php",	// Страница профиля
												"SHOW_ERRORS" => "Y",	// Показывать ошибки
											),
											false
							);?> 