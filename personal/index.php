<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Персональный раздел");
?>
<?
global $USER;
if(!$USER->IsAuthorized()){
	LocalRedirect("/", '301 Moved permanently');
}
?>

<?
global $USER;
$arGroups = CUser::GetUserGroup($USER->GetID());
if(in_array(7, $arGroups)){
	$view = "person_md";
}
else{
	$view = "";
}
if(!empty($_GET['del'])){
	CModule::IncludeModule("iblock");
	CIBlockElement::Delete($_GET['del']);
}
?>
	<section class="person <?=$view?>" id="email">
		<div class="navigator person__navigator">
			<h1 class="navigator__title person__title title">Личный кабинет</h1>
			<div class="max_width person_abs">
				<a href="?logout=yes" class="person_exit">
					<span>Выйти</span>
					<img src="<?=SITE_TEMPLATE_PATH?>/images/exit.svg" alt="">
				</a>
			</div>
			<?if(empty($view)):?>
			<div class="navigator__menu">
				<a href="#" data-pos=".common" class="perNavBtn active navigator__btn_wr"><span class="navigator__btn">Личная информация</span></a
				><a href="#" data-pos=".adress" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Адреса</span></a
				><a href="#" data-pos=".password" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Смена пароля</span></a
				><a href="#" data-pos=".order" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Мои заказы</span></a
				><a href="#" data-pos=".tests" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Пройденные тесты</span></a
				><a href="#" data-pos=".answers" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">вопросы косметологу</span></a
				><a href="#" data-pos=".reviews" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Мои отзывы</span></a
				><a href="#" data-pos=".subs" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Мои подписки</span></a>
			</div>
			<?elseif($view == 'person_md'):?>
			<div class="navigator__menu">
				<a href="#" data-pos=".common" class="perNavBtn active navigator__btn_wr"><span class="navigator__btn">Личная информация</span></a
				><a href="#" data-pos=".adress" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Адреса</span></a
				><a href="#" data-pos=".password" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Смена пароля</span></a
				><a href="#" data-pos=".order" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Мои заказы</span></a
				><a href="#" data-pos=".reviews" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Мои отзывы</span></a
				><a href="#" data-pos=".subs" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Мои подписки</span></a
				><a href="#" data-pos=".patients" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">Заказы пациентов</span></a
				><a href="#" data-pos=".answers" class="perNavBtn navigator__btn_wr"><span class="navigator__btn">выдать промокод</span></a>
			</div>
			<?endif?>
		</div>
	</section>
	
	<div class="wrapper">
		<section class="common active person_item">
			<div class="max_width" id="resuser">
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
			</div>
		</section>
		<?
		if(!empty($_GET['deladres'])){
			CModule::IncludeModule("iblock");
			CIBlockElement::Delete($_GET['deladres']);
		}
		?>
		<section class="adress person_item">
			<div class="max_width">
				<h2 class="title common__title">Адреса</h2>
				<?
				$arFilter = array("IBLOCK_ID" => 17, "ACTIVE" => "Y", "PROPERTY_USER" => $USER->GetID());
				$res = CIBlockElement::GetList(Array("timestamp_x" => "desc"), $arFilter, false, false, array("NAME", "ID", 
				"PROPERTY_INDEX", 
				"PROPERTY_CITY",
				"PROPERTY_ADRES",
				"PROPERTY_USER",));
				while($ar_fields = $res->GetNext())
				{
				     $adres[] = $ar_fields;
				}
				?>
				<div id="listadres">
				<h7 class="common__title_low">Вы указали <?=count($adres)?> адреса</h7>
				<table class="adress__table table">
					<tbody>
						<?foreach ($adres as $val):?>
						<tr>
							<td class="table__left">
								<p data-form="#city" class="table__bold"><?=$val['PROPERTY_CITY_VALUE']?></p>
								<p data-form="#index" class="table__op"><?=$val['PROPERTY_INDEX_VALUE']?></p>
								<p data-form="#adress"><?=$val['PROPERTY_ADRES_VALUE']?></p>
							</td>
							<td class="table__center">
								<a href="#" class="table__link w_arr" onclick="editadres('<?=$val['ID']?>'); return false;">Изменить</a>
							</td>
							<td class="table__right">
								<a href="?deladres=<?=$val['ID']?>" class="table__remove">
									<span></span>
									<span></span>
								</a>
								<a href="?deladres=<?=$val['ID']?>" class="table__remove_mob table__remove w_arr">Удалить</a>
							</td>
						</tr>
						<?endforeach;?>
					</tbody>
				</table>
				</div>
				<script>
				$( document ).ready(function() {
					$('#subadres').click(function(){
					    var submit = true; 
					    var pass0 = $('#form-adres .index');
					    var pass1 = $('#form-adres .city');
					    var pass2 = $('#form-adres .adres');
					    
					    if(pass0.val()==''){
					    	pass0.parent().addClass('error'); 
					    	pass0.parent().addClass('wrong');
					        submit = false; 
					    }
					   	else{
					    	pass0.parent().removeClass('error');
					    	pass0.parent().removeClass('wrong');
					    } 
		
					    if(pass1.val()==''){
					    	pass1.parent().addClass('error'); 
					    	pass1.parent().addClass('wrong');
					        submit = false; 
					    }
					   	else{
					    	pass1.removeClass('error');
					    	pass1.parent().removeClass('wrong');
					    }
					    if(pass2.val()==''){
							pass2.parent().addClass('error'); 
							pass2.parent().addClass('wrong');
					        submit = false; 
					    }
						else{
							pass2.parent().removeClass('error');
							pass2.parent().removeClass('wrong');
					    }
					                
					    if(submit){
					        $('#res-adres').load('/include/adres.php',$('#form-adres').serializeArray());
					    }
					    return false;
					});
				});
				</script>
				
				<div id="res-adres">
				<h2 class="title common__title">Добавить новый адрес</h2>
				<form id="form-adres">
					<input type="hidden" name="name" value="<?=$USER->GetFullName()?>" >
					<div class="inputs common__inputs adress__inputs">
						<div class="input_wr w_ph">
							<input data-form="#index" id="index" name="number" type="text" class="input index">
							<label class="ph" for="index" class="">Индекс</label>
							<p class="warning">неверный индекс</p>
						</div>
						<div class="input_wr w_ph">
							<input data-form="#city" id="city" name="city" type="text" class="input city">
							<label class="ph" for="city" class="">Город</label>
							<p class="warning">неверный город</p>
						</div>
						<div class="input_wr w_ph">
							<input data-form="#adress" id="adress" name="adres" type="text" class="input adres">
							<label class="ph" for="adress" class="">Адрес</label>
							<p class="warning">неверный Адрес</p>
						</div>
					</div>
					<a href="#" class="btn adress__btn" id="subadres">Добавить</a>
				</form>
				</div>
			</div>
		</section>
		
		
		<script>
		$( document ).ready(function() {
			$('#sub-pass').click(function(){
			    var submit = true; 
			    var pass0 = $('#form-pass .pass0');
			    var pass1 = $('#form-pass .pass1');
			    var pass2 = $('#form-pass .pass2');
			    
			    if(pass0.val()==''){
			    	pass0.parent().addClass('error'); 
			        submit = false; 
			    }
			   	else{
			    	pass0.parent().removeClass('error');
			    } 

			    if(pass1.val()==''){
			    	pass1.parent().addClass('error'); 
			        submit = false; 
			    }
			   	else{
			    	pass1.removeClass('error');
			    }
			    if(pass2.val()==''){
					pass2.parent().addClass('error'); 
			        submit = false; 
			    }
				else{
					pass2.parent().removeClass('error');
			    }
			                
			    if(submit){
			        $('#res-pass').load('/include/pass.php',$('#form-pass').serializeArray());
			    }
			    return false;
			});
		});
		</script>
		<section class="password person_item">
			<div class="max_width" >
				<h2 class="title common__title">Смена пароля</h2>
				<p id="res-pass" style="color: red;"></p>
				<form action="/include/pass.php" id="form-pass">
				<div class="inputs common__inputs adress__inputs">
					<div class="input_wr w_ph">
						<input id="oldPass" type="text" class="input pass0" name="passold">
						<label class="ph" for="oldPass" class="">Ваш старый пароль</label>
					</div>
					<div class="input_wr w_ph">
						<input id="newPass" type="text" class="input pass1" name="passone" id="password">
						<label class="ph" for="newPass" class="">Новый пароль</label>
					</div>
					<div class="input_wr w_ph">
						<input id="newPassx2" type="text" class="input pass1" name="passtwo" id="new-password">
						<label class="ph" for="newPassx2" class="">Повторите новый пароль</label>
					</div>
				</div>
				</form>
				<button class="btn password__btn common__btn" id="sub-pass">Сохранить изменения</button>
			</div>
		</section>
		
		<script>
		$( document ).ready(function() {
			$('#subtwo').click(function(){
			    $('#rezsub').load('/include/sub.php',$('#form-sub').serializeArray());
			    return false;
			});
		});
		</script>
		
		
		<section class="person_item reviews">
			<div class="max_width">
				<?
				CModule::IncludeModule("iblock");
				$arFilter = array("IBLOCK_ID" => 15, "ACTIVE" => "Y", "PROPERTY_USER" => $USER->GetID());
				$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "DATE_CREATE", "PROPERTY_ITEM", "IBLOCK_ID", "NAME", "PROPERTY_USER", "PROPERTY_OCENKA", "PREVIEW_TEXT", "created_date", "created"));
				while($ar_fields = $res->GetNext())
				{
					$reviews[] = $ar_fields;
					$rev +=$ar_fields['PROPERTY_OCENKA_VALUE'];
				}
				?>
				<h2 class="title common__title">Мои отзывы</h2>
				<?if(!empty($reviews)):?>
				<h7 class="common__title_low">Вы оставили <?=count($reviews)?> отзыва</h7>
				<table class="adress__table reviews__table table">
					<tbody>
						<?foreach ($reviews as $rev):?>
						<tr>
							<td class="table__left">
								<div class="review__top comment__top">
									<span class="review__name"><?=$rev['NAME']?> отвечает</span>
									<div class="review__rait">
										<?$rev['PROPERTY_OCENKA_VALUE'] = round($rev['PROPERTY_OCENKA_VALUE'])?>
										<?for ($i = 1; $i <= $rev['PROPERTY_OCENKA_VALUE']; $i++):?>
										<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
										<?endfor?>
										<?$bbb = 5-$rev['PROPERTY_OCENKA_VALUE']?>
										<?for ($i = 1; $i <= $bbb; $i++):?>
										<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
										<?endfor?>
									</div>
								</div>
								<p class="table__op">Отзыв оставлен <?=$rev['DATE_CREATE']?></p>
								<p><?=$rev['PREVIEW_TEXT']?></p>
							</td>
							<td class="table__center">
								<?$res = CIBlockElement::GetByID($rev['PROPERTY_ITEM_VALUE']);
								if($ar_res = $res->GetNext()){
								  $urlrev = $ar_res['DETAIL_PAGE_URL'];
								}?>
								<a href="<?=$urlrev?>" class="table__link w_arr">Посмотреть</a>
							</td>
							<td class="table__right">
								<a href="?del=<?=$rev['ID']?>" class="table__remove">
									<span></span>
									<span></span>
								</a>
							</td>
						</tr>
						<?endforeach;?>
					</tbody>
				</table>
				<?endif?>
			</div>
		</section>
		
		<section class="person_item order">
			<div class="max_width">
			
				<?$APPLICATION->IncludeComponent(
					"bitrix:sale.personal.order",
					"",
				Array()
				);?>
				
			</div>
		</section>
		
		<section class="person_item answers">
			<div class="max_width">
				<?global $arrFilter;
				$arrFilter[] = array("PROPERTY_USER" => $USER->GetID());?>
				<?$APPLICATION->IncludeComponent("bitrix:news.list", "consult-lk", Array(
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
			</div>
		</section>
		
		
		
		
		<section class="person_item subs">
			<div class="max_width">
				<h2 class="title common__title">Мои подписки</h2>
				<h7 class="common__title_low">Будьте в курсе последних новостей и событий</h7>				
				<p class="common__desc">Наша e-mail рассылка отправляется один раз в неделю. Подписавшись, Вы всегда будете в курсе последних событий, акций, интересных новостей и статей по уходу за кожей. Это бесплатно! От рассылки всегда можно отписаться.</p>
				<p id="rezsub"></p>
				<form id="form-sub">
				<input type="hidden" name="email" value="<?=$USER->GetEmail()?>">
				
				<?
				CModule::IncludeModule("subscribe");
				$subscr = CSubscription::GetList(array("ID"=>"ASC"),array("ACTIVE"=>"Y","EMAIL"=>$USER->GetEmail()));
				while($subscr_arr = $subscr->Fetch()){
    				$ISDUB = $subscr_arr["ID"];
				}
				?>
				<?if(!empty($ISDUB)):?>
				<input type="hidden" name="del" value="Y">
				<a href="#" class="btn subs__btn" id="subtwo">Отписаться</a>
				<?else:?>
				<a href="#" class="btn subs__btn" id="subtwo">Подписаться</a>
				<?endif?>
				</form>
			</div>
		</section>
	</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>