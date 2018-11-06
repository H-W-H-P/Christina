<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
?>
<section class="prod_inf">
		<div class="navigator prod_inf__navigator">
			<div class="max_width">
				<div class="prod_inf__head">
					<div class="prod_inf__left">
						<div class="smpl_news_article__road">
							<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "bread", 
					   	   		Array(),
								false
							);?>  
						</div>
						<div class="prod_inf__abs_wr">
							<h1 class="prod_inf__title bot_after title"><?=$arResult['NAME']?></h1>
							<h1 class="prod_inf__title_mob title"><?=$arResult['NAME']?></h1>
							<?if($arResult['PROPERTIES']['NEW']['VALUE'] == "Y"):?>
							<span class="prod_inf__abs prod_inf__abs-top">новинка</span>
							<?endif?>
							<span class="prod_inf__abs">Скидка</span>
						</div>
						<p class="prod_inf__desc"><?=$arResult['PREVIEW_TEXT']?></p>
						<p class="prod_inf__opac">Артикул: <?=$arResult['PROPERTIES']['CML2_ARTICLE']['VALUE']?></p>
						<div class="prod_inf__counter prod_inf__counter-mob">
							<a href="#" data-sign="-" class="counter__btn">–</a>
							<span data-counter="1" class="counter__number counter__btn">1</span>
							<a href="#" data-sign="+" class="counter__btn">+</a>
						</div>
						<div class="prod_inf__list inf_list">
							<p class="inf_list__title">Решает проблемы</p>
							<ul>
							<?foreach ($arResult['PROPERTIES']['PROBLEMS']['VALUE'] as $val):?>
								<li class="inf_list__item"><?=$val?></li>
							<?endforeach;?>	
							</ul>
						</div>
					</div>
					<div class="prod_inf__right prod_slider">
						<img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="" class="prod_slider__item">
						<?if(!empty($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'])):?>
							<?foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $val):?>
								<?$img = CFile::GetFileArray($val)?>
								<img src="<?=$img['SRC']?>" alt="" class="prod_slider__item">
							<?endforeach;?>
						<?endif?>
					</div>
					<div class="prod_inf__count_wr">
						<div class="prod_inf__counter counter">
							<a href="#" data-sign="-" data-check="prod<?=$arResult['ID']?>" class="counter__btn">–</a>
							<span data-counter="1" class="counter__number counter__btn">1</span>
							<a href="#" data-sign="+" data-check="prod<?=$arResult['ID']?>" class="counter__btn">+</a>
						</div>
						<p class="prod_inf__price"><?=$arResult['MIN_PRICE']['VALUE']?> ₽</p>
						<form action="" class="prod_inf__form">
							<input type="number" data-check="prod<?=$arResult['ID']?>" class="hid_inp" name="quantity" id="quantity">
							<button class="btn prod_inf__btn" onclick="addcart('<?=$arResult['ID']?>');return false;">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/BasketIcon.svg" alt="">
								<img class="hov" src="<?=SITE_TEMPLATE_PATH?>/images/BasketIconWhite.svg" alt="">
								<span>В корзину</span>
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="prod_inf-bdtp">
				<div class="navigator__menu prod_inf__nav max_width">
					<a href="#" data-pos=".prod_text" class="navigator__btn_wr prod_inf__nav_btn_wr">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/prod_icon1.svg" alt="" class="prod_inf__icon">
						<span class="navigator__btn prod_inf__nav_btn">Описание</span></a
					><a href="#" data-pos=".prod_columns" class="navigator__btn_wr prod_inf__nav_btn_wr">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/prod_icon2.svg" alt="" class="prod_inf__icon">
						<span class="navigator__btn prod_inf__nav_btn">применение</span></a
					><a href="#" data-pos=".prod_circle" class="navigator__btn_wr prod_inf__nav_btn_wr">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/prod_icon3.svg" alt="" class="prod_inf__icon">
						<span class="navigator__btn prod_inf__nav_btn">активные ингридиенты</span></a
					><a href="#" data-pos=".prod_page_slider" class="navigator__btn_wr prod_inf__nav_btn_wr">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/prod_icon4.svg" alt="" class="prod_inf__icon">
						<span class="navigator__btn prod_inf__nav_btn">программы ухода</span></a
					><a href="#" data-pos=".prod_comments" class="navigator__btn_wr prod_inf__nav_btn_wr">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/prod_icon5.svg" alt="" class="prod_inf__icon">
						<span class="navigator__btn prod_inf__nav_btn">обзоры продукта</span></a>
				</div>
			</div>
		</div>
	</section>	

	<section class="prod_text">		
		<div class="prod_text__img_left">
			<?if(!empty($arResult['PROPERTIES']['PICTURE1']['VALUE'])):?>
			<div class="prod_text__img_wr">
				<?$file = CFile::GetFileArray($arResult['PROPERTIES']['PICTURE1']['VALUE']);
				$img = CFile::ResizeImageGet($file, array('width'=>500, 'height'=>430), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
				<img src="<?=$img['src']?>" class="prod_text__img"  <?if(!empty($arResult['PROPERTIES']['PICTURE1']['DESCRIPTION'])):?>style="background-color: <?=$arResult['PROPERTIES']['PICTURE1']['DESCRIPTION']?>"<?endif?> alt="">
			</div>
			<?endif?>
			<div class="prod_text__wr">
				<div class="prod_text__abs">
					<h2 class="prod_text__title title bot_after"><?=$arResult['PREVIEW_TEXT']?></h2>
					<p class="prod_text__cont">
						<?=$arResult['DETAIL_TEXT']?>
					</p>
				</div>
			</div>
			<?if(!empty($arResult['PROPERTIES']['PICTURE1']['VALUE'])):?>
			<div class="prod_text__img_wr prod_text__img_wr-tabl">
				<?$file = CFile::GetFileArray($arResult['PROPERTIES']['PICTURE1']['VALUE']);
				$img = CFile::ResizeImageGet($file, array('width'=>500, 'height'=>430), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
				<img src="<?=$img['src']?>" class="prod_text__img" alt="">
			</div>
			<?endif?>
		</div>
		<div class="prod_text__img_right">
			<div class="prod_text__wr">
				<div class="prod_text__abs">
					<h2 class="prod_text__title title bot_after">Для кого</h2>
					<p class="prod_text__cont">					
						Крем подходит для пациентов с первыми признаками возрастных изменений кожи, мимическими морщинами, дряблой кожей, сухостью и стянутостью кожи. Также идеально подходит коже, находящейся на терапии препаратами гиалуроновой кислоты, будь то биоревитализация или контурная пластика.
					</p>
				</div>
			</div>
			<?if(!empty($arResult['PROPERTIES']['PICTURE2']['VALUE'])):?>
			<div class="prod_text__img_wr">
				<?$file = CFile::GetFileArray($arResult['PROPERTIES']['PICTURE2']['VALUE']);
				$img = CFile::ResizeImageGet($file, array('width'=>500, 'height'=>430), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
				<img src="<?=$img['src']?>" class="prod_text__img" alt="">
			</div>
			<?endif?>
		</div>		
	</section>
    <?if(!empty($arResult['PROPERTIES']['TITLE_P']['VALUE'])):?>
	<section class="prod_columns">
		<h1 class="prod_columns__title title">Применение</h1>
		<div class="prod_columns__wr max_width">
			<?foreach ($arResult['PROPERTIES']['TITLE_P']['VALUE'] as $k => $val):?>
			<div class="prod_columns__item">
				<?$file = CFile::GetFileArray($arResult['PROPERTIES']['PICTURE_P']['VALUE'][$k]);
				$img = CFile::ResizeImageGet($file, array('width'=>70, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
				<img src="<?=$img['src']?>" alt="" class="prod_columns__icon">
				<p class="prod_columns__name"><?=$val?></p>
				<p class="prod_columns__desc"><?=$arResult['PROPERTIES']['TEXT_P']['VALUE'][$k]?></p>
			</div>
			<?endforeach;?>
		</div>
	</section>
	<?endif?>
	<?$text = $arResult['PROPERTIES']['COMPOSITION']['VALUE']['TEXT'];
	$text_new = explode(", ", $text);?>
	<section class="circle_wr prod_circle">
		<h1 class="prod_circle__title title">Активные ингредиенты</h1>
		<div class="circle__wr">
			<div class="circle prod__circle circle__wr__lay2">
				<div class="circle prod__circle circle__wr__lay3">
					<div class="circle prod__circle circle__round">
						<img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="" class="prod_circle__image">
					</div>
				</div>	
				<?foreach ($text_new as $k => $val):?>
					<?if($k < 12):?>
						<p class="circle_wr__text circle_wr__text<?=$k+1?>"><?=$val?></p>
					<?endif?>
				<?endforeach;?>
			</div>
		</div>
		<div class="prod_circle__tablet">
			<?foreach ($text_new as $k => $val):?>
			<p class="circle_wr__text"><?=$val?></p>
			<?endforeach;?>
		</div>
	</section>

	<section class="shop_slider sculp-slider prod_page_slider">	
		<div class="max_width">
			<div class="slider shop_slider__wr">
				<div class="owl-carousel slider__wr">
					<div class="slider__prod product__wr">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/prod1.png" alt="">
						<p class="product_wr__new">
							новинка
						</p>
						<p class="product_wr__name">
							ProPeel, resurfacer
						</p>
						<p class="product_wr__dec">
							Сывортка для усиления действия пилинга
						</p>
						<p class="product__price">
							1578 ₽
						</p>
						<a href="#" class="product__basket">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/BasketIcon.svg" alt="">
						</a>
					</div>
					<div class="slider__prod product__wr">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/prod1.png" alt="">
						<p class="product_wr__new">
							новинка
						</p>
						<p class="product_wr__name">
							ProPeel, resurfacer
						</p>
						<p class="product_wr__dec">
							Сывортка для усиления действия пилинга
						</p>
						<p class="product__price">
							1578 ₽
						</p>
						<a href="#" class="product__basket">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/BasketIcon.svg" alt="">
						</a>
					</div>
					<div class="slider__prod product__wr">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/prod1.png" alt="">
						<p class="product_wr__new">
							новинка
						</p>
						<p class="product_wr__name">
							ProPeel, resurfacer
						</p>
						<p class="product_wr__dec">
							Сывортка для усиления действия пилинга
						</p>
						<p class="product__price">
							1578 ₽
						</p>
						<a href="#" class="product__basket">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/BasketIcon.svg" alt="">
						</a>
					</div>
					<div class="slider__prod product__wr">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/prod1.png" alt="">
						<p class="product_wr__new">
							новинка
						</p>
						<p class="product_wr__name">
							ProPeel, resurfacer
						</p>
						<p class="product_wr__dec">
							Сывортка для усиления действия пилинга
						</p>
						<p class="product__price">
							1578 ₽
						</p>
						<a href="#" class="product__basket">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/BasketIcon.svg" alt="">
						</a>
					</div>
				</div>				
			</div>
			<div class="shop_slider__about">
				<h2 class="shop_slider__title title">Программа ухода</h2>
				<p class="shop_slider__desc">Поддержание результатов инъекций ГК, уменьшение выраженности морщин.</p>
				<p class="shop_slider__desc">Препараты ProSculpt повышают эффективность процедур эстетической медицины и способствуют поддержанию результатов в течение длительного времени. Они укрепляют кожу, улучшают текстуру, омолаживают и поддерживают её здоровый внешний вид.</p>
				<a href="product.html" class="shop_slider__link w_arr">Подробнее о программе</a>
			</div>	
		</div>
	</section>

	<section class="prod_comments half">
		<div class="prod_comments__left_bg"></div>
		<div class="prod_comments__right_bg"></div>
		<div class="max_width">
			
			<div class="half__block prod_comments__right">
				<h2 class="prod_comments__title title">Обзоры продукта</h2>
				<div class="prod_comments__slider">
					<?foreach ($arResult['PROPERTIES']['ARTICLES']['VALUE'] as $val):?>
					<?
					$res = CIBlockElement::GetByID($val);
					if($ar_res = $res->GetNext()){
					  $name = $ar_res['NAME'];
					  $picture = CFile::GetFileArray($ar_res['PREVIEW_PICTURE']);
					  $text = $ar_res['PREVIEW_TEXT'];
					  $url = $ar_res['DETAIL_PAGE_URL'];
					}
					?>
					<a href="<?=$url?>" class="prod_comments__item">
						<img src="<?=$picture['SRC']?>" alt="<?=$name?>" class="news_slider__img">
						<p class="news_slider__name"><?=$name?></p>
						<span class="news_slider___desc"><?=$text?></span>
					</a>
					<?endforeach;?>
				</div>				
			</div>
			<div class="half__block prod_comments__left">
				
				<?
				$ii = 0;
				$arFilter = array("IBLOCK_ID" => 15, "ACTIVE" => "Y", "PROPERTY_ITEM" => $arResult['ID']);
				$res = CIBlockElement::GetList(Array("created_date" => "desc"), $arFilter, false, false, array("ID", "IBLOCK_ID", "NAME", "PROPERTY_USER", "PROPERTY_OCENKA", "PREVIEW_TEXT", "created_date"));
				while($ar_fields = $res->GetNext())
				{
					if($ii <= 1){
						$reviews[] = $ar_fields;
					}
					$revcount[] = $ar_fields;
					$rev +=$ar_fields['PROPERTY_OCENKA_VALUE'];
					$ii++;
				}
				?>
				<h6 class="prod_comments__rating">Общая оценка <?=round($rev/count($revcount))?></h6>
				<p class="prod_comments__reviews_numb">Всего <?=count($revcount)?> отзывов</p>
				<div id="revall">
				<?foreach ($reviews as $rev):?>
				<div class="prod_comments__review review">
					<div class="review__top">
						<span class="review__name"><?=$rev['NAME']?></span>
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
					<?
					
					
					global $USER;
					$filter = Array("ID" => $rev['PROPERTY_USER_VALUE']);
					$rsUsers = CUser::GetList(($by = "NAME"), ($order = "desc"), $filter);
					while ($arUser = $rsUsers->Fetch()) {
					  $birth = $arUser['PERSONAL_BIRTHDAY'];
					}
					$dd = explode(".", $birth);
					$datanew = $dd[2]."-".$dd[1]."-".$dd[0];
					?>
					<span class="review__info"><?=calculate_age($datanew)?> лет, Пермь</span>
					<span class="review__comment">
						<?=$rev['PREVIEW_TEXT']?>
					</span>
					<div class="review__rating">
						<span>Полезен отзыв?</span>
						<a href="#" class="review__rating_link" data-sign="-">-</a>
						<a href="#" class="review__rating_link" data-sign="+">+</a>
					</div>
				</div>
				<?endforeach;?>
				<?if(!empty($reviews) && $ii > 2):?>
				<a href="#" class="prod_comments__link w_arr" onclick="revall('<?=$arResult['ID']?>');return false;">Читать все</a>
				<?endif?>
				</div>
				
				<?
				global $USER;
				if ($USER->IsAuthorized()):
				?>
				<a href="#" class="btn prod_comments__btn">Написать отзыв</a>
				<?else:?>
				<a href="#" class="btn regTog">Написать отзыв</a>
				<?endif?>
			</div>
		</div>
	</section>
	
	<?
	global $USER;
	if ($USER->IsAuthorized()):
	?>
	
	<div class="popup_op_wrapper">
		<div class="registr_form">
			<div class="registr_form__bg">
				<div class="registr_form__head">
					<h3 class="pop_up__title title">Написать отзыв</h3>
				</div>
				<a href="#" class="close_reg_form">
					<span></span>
					<span></span>
				</a>
			</div>
			<div class="registr_form__content">
				<div class="person_item registr_form__promo active" id="resrev">
					<?$APPLICATION->IncludeComponent(
						"christina:iblock.element.add.reviwes", 
						"rev", 
						array(
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
							"GROUPS" => array(
								0 => "2",
							),
							"IBLOCK_ID" => "15",
							"IBLOCK_TYPE" => "christina",
							"LEVEL_LAST" => "Y",
							"LIST_URL" => "",
							"MAX_FILE_SIZE" => "0",
							"MAX_LEVELS" => "100000",
							"MAX_USER_ENTRIES" => "100000",
							"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
							"PROPERTY_CODES" => array(
								0 => "118",
								1 => "119",
								2 => "121",
								3 => "NAME",
								4 => "PREVIEW_TEXT",
								5 => "120",
							),
							"PROPERTY_CODES_REQUIRED" => array(
							),
							"RESIZE_IMAGES" => "N",
							"SEF_MODE" => "N",
							"STATUS" => "ANY",
							"STATUS_NEW" => "N",
							"USER_MESSAGE_ADD" => "",
							"USER_MESSAGE_EDIT" => "",
							"USE_CAPTCHA" => "N",
							"COMPONENT_TEMPLATE" => ".default",
							"ITEM_ID" => $arResult['ID']
						),
						false
					);?> 
				</div>
			</div>
		</div>
	</div>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback2&render=explicit" async defer></script>
	<script type="text/javascript">
	$('#example1').html('');
	var verifyCallback = function(response) {
	alert(response);
	};
	var widgetId1;
	var onloadCallback2 = function() {
	    <?/*widgetId2 = grecaptcha.render(document.getElementById('example2'), {
	    	'sitekey' : '<?=RE_SITE_KEY?>'
	    });*/?>
	    widgetId1 = grecaptcha.render(document.getElementById('example1'), {
	        'sitekey' : '<?=RE_SITE_KEY?>'
	    });
	};
	</script>
	<?endif?>