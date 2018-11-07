<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" type="image/x-icon">
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle();?></title>
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/styles/main.css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/styles/jquery.mCustomScrollbar.css">
	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/libraries/jquery.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/libraries/owl.carousel.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/libraries/jquery-ui.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/libraries/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/libraries/jquery.mask.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/main.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/all.js"></script>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
	    (function (d, w, c) {
	        (w[c] = w[c] || []).push(function() {
	            try {
	                w.yaCounter51036008 = new Ya.Metrika2({
	                    id:51036008,
	                    clickmap:true,
	                    trackLinks:true,
	                    accurateTrackBounce:true,
	                    webvisor:true
	                });
	            } catch(e) { }
	        });

	        var n = d.getElementsByTagName("script")[0],
	            s = d.createElement("script"),
	            f = function () { n.parentNode.insertBefore(s, n); };
	        s.type = "text/javascript";
	        s.async = true;
	        s.src = "https://mc.yandex.ru/metrika/tag.js";

	        if (w.opera == "[object Opera]") {
	            d.addEventListener("DOMContentLoaded", f, false);
	        } else { f(); }
	    })(document, window, "yandex_metrika_callbacks2");
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/51036008" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128922873-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-128922873-1');
	</script>
</head>
<body>
	<div id="preloader">
		<div id="loader"></div>
	</div>
	<?$APPLICATION->ShowPanel();?>
	<header class="header">
		<div class="header__underline_wr">
			<?$APPLICATION->IncludeComponent("bitrix:menu", "top2_menu", Array(
				"COMPONENT_TEMPLATE" => ".default",
					"ROOT_MENU_TYPE" => "topone",	// Тип меню для первого уровня
					"MENU_CACHE_TYPE" => "N",	// Тип кеширования
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
					"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
					"MAX_LEVEL" => "1",	// Уровень вложенности меню
					"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
					"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
				),
				false
			);?>
		</div>
		<div class="header__menu max_width">
			<div class="header__left">
				<div class="header__left-top">
					<a href="tel:8 (800) 555-83-37" class="header__number">8 (800) 555-83-37</a>
					<span class="header_color">Пн–Вс: 11:00 – 22:00</span>
				</div>
				<div class="header__left-bot">
					<a href="#" class="call_icon">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/purple_Black_icon.svg" alt="">
					</a>
					<a href="#" class="call_icon">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/WhatsApp.svg" alt="">
					</a>
					<span class="underline_header">перезвоните мне</span>
				</div>
			</div>
			<div class="header__right">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/token.svg" alt="">
				<?CModule::IncludeModule("iblock");
				$arFilter = array("IBLOCK_ID" => 16, "ACTIVE" => "Y");
				$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "NAME"));
				while($ar_fields = $res->GetNext())
				{
				 $citys[] = $ar_fields;
				}
				
				if(!$USER->IsAuthorized() && !empty($_SESSION['p_city'])){
					$cityd = $_SESSION['p_city'];
				}
				elseif($USER->IsAuthorized()){
					$cUser = new CUser;
					$arFilter = array(
						"ID" => $USER->GetID(),
					);
					$userParams = array(
			    		'SELECT' => array("UF_*"),
					);
					$dbUsers = $cUser->GetList($sort_by, $sort_ord, $arFilter,  $userParams);
					while ($arUser = $dbUsers->Fetch()) 
					{
						$cityd = $arUser['PERSONAL_CITY'];
					}
					
					if(empty($cityd)){
						$cityd = 'Москва';
					}
				}
				else{
					$cityd = 'Москва';
				}
				?>
				<span class="header_color">
					ваш город: 
				</span>
				<!-- <a href="#" class="header_color underline_header">
					москва
				</a> -->
				<div class="input_drop drop_city">
					<a href="#" class="input_drop__toggle"><?=$cityd?></a>
					<div class="input_drop__down">
						<?foreach ($citys as $city):?>
						<a href="#" data-cont="<?=$city['NAME']?>" class="input_drop__item" onclick="city($(this).data('cont'));"><?=$city['NAME']?></a>
						<?endforeach;?>
						<div class="input_drop__op"></div>
					</div>	
					<select class="mob_sel" name="" id="" onchange="city($(this).val());">
						<?foreach ($citys as $city):?>
						<option value="<?=$city['NAME']?>"><?=$city['NAME']?></option>
						<?endforeach;?>
					</select>			
				</div>
				<div class="header__right_btns">
					<div class="header__search_wr">
						<form action="/search/" method="get">
						<a class="header__search_toggle" href="#">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/SearchIcon.svg" alt="">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/SearchIcon_hov.svg" class="hov" alt="">
						</a>
						
						<input type="text" placeholder="Найти" class="header__search" name="q" value="<?=$_GET['q']?>">
						<a href="#" class="close_reg_form header__search_close">
							<span></span>
							<span></span>
						</a>
						</form>
					</div>
					<?
					global $USER;
					if ($USER->IsAuthorized()):
					?>
					<a href="/personal/">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/UserIcon.svg" alt="">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/UserIcon_hov.svg" class="hov" alt="">
					</a>
					<?else:?>
					<a class="regTog" href="">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/UserIcon.svg" alt="">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/UserIcon_hov.svg" class="hov" alt="">
					</a>
					<?endif?>
					<a href="/basket/" class="rescart">
						<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "cart", Array(
							"IMG" => "BasketIcon.svg",
							"IMG2" => "BasketIcon_hov.svg"
							),
							false
						);?>
					</a>
				</div>
			</div>
		</div>
		<a href="/" class="header__logo">
			<!-- <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.svg" alt=""> -->
			360° вокруг процедуры
		</a>
		<a href="/" class="header__logo_mob"></a>
		<div class="navigation_wr">
			<a class="navigation_wr__toggler burgerbutton">
				<span></span>
				<span></span>
				<span></span>
			</a>
			<?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
				"COMPONENT_TEMPLATE" => ".default",
					"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
					"MENU_CACHE_TYPE" => "N",	// Тип кеширования
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
					"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
					"MAX_LEVEL" => "1",	// Уровень вложенности меню
					"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
					"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
				),
				false
			);?>
			
			<?$APPLICATION->IncludeComponent("bitrix:menu", "mob", Array(
				"COMPONENT_TEMPLATE" => ".default",
					"ROOT_MENU_TYPE" => "topone",	// Тип меню для первого уровня
					"MENU_CACHE_TYPE" => "N",	// Тип кеширования
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
					"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
					"MAX_LEVEL" => "1",	// Уровень вложенности меню
					"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
					"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
				),
				false
			);?>
			<div class="header__mob_btns">
				<!-- <a href="">
					<img src="../images/SearchIconWhite.svg" alt="">
				</a> -->
				<div class="header__search_wr">
					<form action="/search/" method="get">
					<a class="header__search_toggle" href="#">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/SearchIconWhite.svg" alt="">
					</a>
					<input type="text" placeholder="Найти" class="header__search" name="q" value="<?=$_GET['q']?>">
					<a href="#" class="close_reg_form header__search_close">
						<span></span>
						<span></span>
					</a>
					</form>
				</div>
				<a class="regTog" href="">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/UserIconWhite.svg" alt="">
				</a>
				<a href="/basket/" class="rescart2">
						<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "cart", Array(
							"IMG" => "BasketIconWhite.svg"
						),
							false
						);?>
				</a>
			</div>
		</div>
	</header>