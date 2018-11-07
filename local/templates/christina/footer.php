<!-- footer -->
	<footer>
		<div class="consult">
			<div class="max_width">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/QuestionIcon.svg" alt="" class="consult__icon">
				<p class="consult__info">
					Если вы не уверены в правильности выбора товара, то вы всегда можете воспользоваться помощью наших профессиональных консультантов. Как по телефону, так и онлайн на сайте.
				</p>
				<!-- <a href="/consult/" class="consult__btn btn">Обратиться к консультанту</a> -->
			</div>
		</div>
		<!-- <div class="bot_nav">
			<ul class="bot_nav__list max_width">
				<li class="bot_nav__list_item">
					<dt><a href="" class="bot_nav__link">Prolift</a></dt>
					<dd><a href="" class="bot_nav__link">Мелкие морщины</a></dd>
					<dd><a href="" class="bot_nav__link">Мимические морщины</a></dd>
					<dd><a href="" class="bot_nav__link">Инъекции ботулотоксина</a></dd>
				</li>
				<li class="bot_nav__list_item">
					<dt><a href="" class="bot_nav__link">Prosculpt</a></dt>
					<dd><a href="" class="bot_nav__link">Глубокие морщины</a></dd>
					<dd><a href="" class="bot_nav__link">Потеря объема и упругости кожи</a></dd>
					<dd><a href="" class="bot_nav__link">Контурная пластика</a></dd>
					<dd><a href="" class="bot_nav__link">Филлеры</a></dd>
				</li>
				<li class="bot_nav__list_item">
					<dt><a href="" class="bot_nav__link">Probright</a></dt>
					<dd><a href="" class="bot_nav__link">Гиперпигментация</a></dd>
					<dd><a href="" class="bot_nav__link">Пигментные пятна</a></dd>
					<dd><a href="" class="bot_nav__link">Фотоповреждение</a></dd>
					<dd><a href="" class="bot_nav__link">Неровный тон лица</a></dd>
					<dd><a href="" class="bot_nav__link">Постакне</a></dd>
					<dd><a href="" class="bot_nav__link">Фотоомоложение</a></dd>
					<dd><a href="" class="bot_nav__link">Пилинги <br> Лазерные процедуры</a></dd>
					<dd><a href="" class="bot_nav__link">Процедуры по осветлению кожи</a></dd>
				</li>
				<li class="bot_nav__list_item">
					<dt><a href="" class="bot_nav__link">Proclear</a></dt>
					<dd><a href="" class="bot_nav__link">Акне</a></dd>
					<dd><a href="" class="bot_nav__link">Постакне</a></dd>
					<dd><a href="" class="bot_nav__link">Проблемная кожа</a></dd>
					<dd><a href="" class="bot_nav__link">Жирная кожа</a></dd>
					<dd><a href="" class="bot_nav__link">PRP – плазмотерапия</a></dd>
					<dd><a href="" class="bot_nav__link">Фотолечение <br> Лазерные процедуры</a></dd>
					<dd><a href="" class="bot_nav__link">Лечение наружными средствами</a></dd>
					<dd><a href="" class="bot_nav__link">Системные ретинойды (роаккутан)</a></dd>
				</li>
				<li class="bot_nav__list_item">
					<dt><a href="" class="bot_nav__link">Procare</a></dt>
					<dd><a href="" class="bot_nav__link">Умывание</a></dd>
					<dd><a href="" class="bot_nav__link">Пилинг</a></dd>
					<dd><a href="" class="bot_nav__link">Эксфолиация</a></dd>
					<dd><a href="" class="bot_nav__link">Ежедневный уход</a></dd>
					<dd><a href="" class="bot_nav__link">Крем для глаз</a></dd>
					<dd><a href="" class="bot_nav__link">Тональный крем</a></dd>
				</li>
				<li class="bot_nav__list_item">
					<dt><a href="" class="bot_nav__link">Propeel</a></dt>
					<dd><a href="" class="bot_nav__link">Увлажнение</a></dd>
					<dd><a href="" class="bot_nav__link">Проблемная кожа</a></dd>
					<dd><a href="" class="bot_nav__link">Мимические морщины</a></dd>
				</li>
			</ul>
		</div> -->
		<div class="footer">
			<div class="max_width">
				<div class="footer__left">
					<p class="footer__spam_title">Получайте свежие и выгодные предложения от Christina Clinical:</p>
					<?
					global $USER;
					if ($USER->IsAuthorized()):
					?>
					<a href="/personal/#email" class="footer__spam_btn">Подписка на рассылку</a>
					<?else:?>
					<a href="" class="footer__spam_btn regTog">Подписка на рассылку</a>
					<?endif?>
					<div class="footer__data">
						<p>© 2010—2017</p>
						<p>ООО «Кристина Клиникал»</p>
						<p>ОГРН: 2563456354635</p>
						<p>г. Москва, ул. Большая Филевская, 16</p>
						<p class="footer__dev">Разработано <a href="https://catzwolf.ru/" target="_blank" class="dev"><img src="<?=SITE_TEMPLATE_PATH?>/images/dev.svg" alt=""></a></p>
					</div>
				</div>
				<div class="footer__right">
					<div class="footer__socials">
						<p class="footer__socials_title">Присоединяйтесь:</p>
						<a href="https://www.instagram.com/christinaclinical.ru/" target="_blank" class="footer__social">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/insta.svg" alt="">
							<img class="hov" src="<?=SITE_TEMPLATE_PATH?>/images/insta-black.svg" alt="">
						</a>
						<a href="https://vk.com/christinaclinicalru" target="_blank" class="footer__social">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/footer_social2.svg" alt="">
							<img class="hov" src="<?=SITE_TEMPLATE_PATH?>/images/footer_social2_hov.svg" alt="">
						</a>
						<a href="https://www.facebook.com/ChristinaClinical/" target="_blank" class="footer__social">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/footer_social1.svg" alt="">
							<img class="hov" src="<?=SITE_TEMPLATE_PATH?>/images/footer_social1_hov.svg" alt="">
						</a>
					</div>
					<div class="footer__desc">
						Вся информация на сайте носит исключительно справочный характер, и не является публичной офертой. Информация о товарах, их характеристиках и комплектации может как содержать ошибки, так и быть изменена производителем без предварительного уведомления, и не может быть основанием для предъявления каких-либо претензий. Пожалуйста, уточняйте существенные для Вас характеристики и компоненты комплектации товаров при получении. Все цены указаны в рублях со всеми налогами.
					</div>
					<div class="footer__data footer__data_mob">
						<p>© 2010—2017</p>
						<p>ООО «Кристина Клиникал»</p>
						<p>ОГРН: 2563456354635</p>
						<p>г. Москва, ул. Большая Филевская, 16</p>
						<p class="footer__dev">Разработано HWHP</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?
	global $USER;
	if (!$USER->IsAuthorized()):
	?>
	<div class="registr_op_wrapper">
		<div class="registr_form">
			<div class="registr_form__bg">
				<div class="registr_form__head">
					<a href="#" data-pos=".registr_form__auth" class="regBtn perNavBtn active">Авторизация</a
					><a href="#" data-pos=".registr_form__reg" class="regBtn perNavBtn">Регистрация</a
					><a href="#" data-pos=".registr_form__reg_md" class="regBtn perNavBtn">Регистрация врача</a>
				</div>
				<a href="#" class="close_reg_form">
					<span></span>
					<span></span>
				</a>
			</div>
			<div class="registr_form__content">
				
				<div class="person_item registr_form__auth active" id="reslogin">
					<?$APPLICATION->IncludeComponent("christina:system.auth.form", "", Array(
											"REGISTER_URL" => "register.php",	// Страница регистрации
												"FORGOT_PASSWORD_URL" => "",	// Страница забытого пароля
												"PROFILE_URL" => "profile.php",	// Страница профиля
												"SHOW_ERRORS" => "Y",	// Показывать ошибки
											),
											false
							);?> 

				</div>
				<div class="person_item registr_form__reg" id="resregister">
					<?$APPLICATION->IncludeComponent(
							"christina:main.register",
							"",
							array(
								"COMPONENT_TEMPLATE" => "",
								"SHOW_FIELDS" => array(
									0 => "EMAIL",
									1 => "NAME",
									2 => "UF_SUB",
									3 => "UF_SMS",
									4 => "LAST_NAME",
									5 => "PERSONAL_PHONE",
									6 => "UF_MEN"
								),
								"REQUIRED_FIELDS" => array(
									0 => "EMAIL",
								),
								"AUTH" => "N",
								"USE_BACKURL" => "Y",
								"SUCCESS_PAGE" => "",
								"SET_TITLE" => "N",
								"USER_PROPERTY" => array(
								),
								"USER_PROPERTY_NAME" => ""
								),
								false
							);?>
					
					
				</div>
				<div class="person_item registr_form__reg_md" id="resregister2">
					<?$APPLICATION->IncludeComponent(
							"christina:main.register",
							"men",
							array(
								"COMPONENT_TEMPLATE" => "",
								"SHOW_FIELDS" => array(
									0 => "EMAIL",
									1 => "NAME",
									2 => "UF_SUB",
									3 => "UF_SMS",
									4 => "LAST_NAME",
									5 => "PERSONAL_PHONE",
									6 => "UF_MEN",
									7 => "UF_CLUB",
									8 => "UF_METRO",
									9 => "PERSONAL_CITY"
								),
								"REQUIRED_FIELDS" => array(
									0 => "EMAIL",
								),
								"AUTH" => "N",
								"USE_BACKURL" => "Y",
								"SUCCESS_PAGE" => "",
								"SET_TITLE" => "N",
								"USER_PROPERTY" => array(
								),
								"USER_PROPERTY_NAME" => ""
								),
								false
							);?>
				</div>
			</div>
		</div>
	</div>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
	<script type="text/javascript">
	$('#example1').html('');
	$('#example2').html('');
	var verifyCallback = function(response) {
	alert(response);
	};
	var widgetId1;
	var widgetId2;
	var onloadCallback = function() {
	    widgetId2 = grecaptcha.render(document.getElementById('example2'), {
	    	'sitekey' : '<?=RE_SITE_KEY?>'
	    });
	    widgetId1 = grecaptcha.render(document.getElementById('example1'), {
	        'sitekey' : '<?=RE_SITE_KEY?>'
	    });
	};
	</script>
	<?else:?>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback3&render=explicit" async defer></script>
	<script type="text/javascript">
	$('#example3').html('');
	var verifyCallback = function(response) {
	alert(response);
	};
	var widgetId3;
	var onloadCallback3 = function() {
	    widgetId3 = grecaptcha.render(document.getElementById('example3'), {
	        'sitekey' : '<?=RE_SITE_KEY?>'
	    });
	};
	</script>
	<?endif?>
	
	<div class="popup_op_wrapper call_back_form promoPopUp">
		<div class="registr_form">
			<div class="registr_form__bg">
				<div class="registr_form__head">
					<h3 class="pop_up__title title">Промокод</h3>
				</div>
				<a href="#" class="close_reg_form">
					<span></span>
					<span></span>
				</a>
			</div>
			<div class="registr_form__content">
				<div class="person_item registr_form__promo active">
					<div class="promoPopUp__text">
						Если у вас есть промокод просто введите его в корзине при оформлении заказа и получите скидку на покупку
					</div>
					<a href="/shop/" class="btn promoPopUp__btn">Перейти к покупкам</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="popup_op_wrapper call_back_form">
		<div class="registr_form">
			<div class="registr_form__bg">
				<div class="registr_form__head">
					<h3 class="pop_up__title title">Обратный звонок</h3>
				</div>
				<a href="#" class="close_reg_form">
					<span></span>
					<span></span>
				</a>
			</div>
			<div class="registr_form__content">
				<div class="person_item registr_form__promo active" id="rescall">
					<?$APPLICATION->IncludeComponent(
						"christina:iblock.element.add.call",
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
							"IBLOCK_ID" => "19",
							"IBLOCK_TYPE" => "forms",
							"LEVEL_LAST" => "Y",
							"LIST_URL" => "",
							"MAX_FILE_SIZE" => "0",
							"MAX_LEVELS" => "100000",
							"MAX_USER_ENTRIES" => "100000",
							"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
							"PROPERTY_CODES" => array("136","137","NAME"),
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
		</div>
	</div>

	<div class="basket_warn">
		Товар был добавлен в корзину
	</div>
	
	
	
	<div class="popup_op_wrapper anwer_form promoPopUp">
		<div class="registr_form">
			<div class="registr_form__bg">
				<div class="registr_form__head">
					<h3 class="pop_up__title title">Ваш вопрос принят</h3>
				</div>
				<a href="#" class="close_reg_form">
					<span></span>
					<span></span>
				</a>
			</div>
			<div class="registr_form__content">
				<div class="person_item registr_form__promo active">
					<div class="promoPopUp__text">
						Ваш вопрос принят. В ближайшее время на него ответит косметолог
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- <div id="preloader">
		<div id="loader"></div>
	</div> -->
</body>
</html>