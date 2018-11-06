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
$ses = explode(".", $_SESSION['SESS_IP']);
?>
	<h2 class="title common__title">Вопросы косметологу</h2>
	<h4 class="consult_wr__title_small">Всего вопросов <?=count($arResult["ITEMS"])?></h4>
	<div class="consult_wr">				
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="consult_wr__comment comment">
					<p class="comment__name">Вы спросили</p>
					<p class="comment__date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></p>
					<p class="comment__text"><?=$arItem['PREVIEW_TEXT']?></p>
					<?
						global $APPLICATION;
						$like = $APPLICATION->get_cookie("LIKE-".$arItem['ID']."-".$ses[0]);
						$dlike = $APPLICATION->get_cookie("DLIKE-".$arItem['ID']."-".$ses[0]);
						if(empty($arItem['PROPERTIES']['PLUS']['VALUE'])){
							$yes = "";
							$x = 0;
						}
						else{
							$yes = "(".$arItem['PROPERTIES']['PLUS']['VALUE'].")";
							$x = $arItem['PROPERTIES']['PLUS']['VALUE'];
						}
						if(empty($arItem['PROPERTIES']['MINUS']['VALUE'])){
							$no = "";
							$y = 0;
						}
						else{
							$no = "(".$arItem['PROPERTIES']['MINUS']['VALUE'].")";
							$y = $arItem['PROPERTIES']['MINUS']['VALUE'];
						}
						?>					
					<?
					$ocenka = $x/($x+$y)*100;
					?>
					<div class="prod_comments__review comment__answer review">
						<div class="review__top comment__top">
							<span class="review__name"><?=$arItem['PROPERTIES']['NAME']['VALUE']?> отвечает</span>
							<div class="review__rait">
								<?if($ocenka < 10):?>
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<?elseif($ocenka <= 20):?>
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<?elseif($ocenka <= 30):?>
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/half_circle.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<?elseif($ocenka <= 40):?>
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<?elseif($ocenka <= 50):?>
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/half_circle.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<?elseif($ocenka <= 60):?>
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<?elseif($ocenka <= 70):?>
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/half_circle.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<?elseif($ocenka <= 80):?>
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
								<?elseif($ocenka <= 90):?>
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/half_circle.svg" alt="">
								<?elseif($ocenka <= 100):?>
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
								
								<?endif?>
							</div>
						</div>
						<span class="review__info"><?=$arItem['PROPERTIES']['INFO']['VALUE']?></span>
						<span class="review__comment">
							<?=$arItem['DETAIL_TEXT']?>
						</span>
						<div class="review__rating comment__rating" id="reslike-<?=$arItem['ID']?>">
						
							<span>Полезен отзыв?</span>
							<a href="#null" class="review__rating_link" <?if(empty($dlike) || $dlike == "N"):?>onclick="votno('<?=$arItem['ID']?>')"<?endif?>>- <span style="padding-right: 0px;"><?=$no?></span></a>
							<a href="#null" class="review__rating_link" <?if(empty($like) || $like == "N"):?>onclick="votyes('<?=$arItem['ID']?>');"<?endif?>>+ <span style="padding-right: 0px;"><?=$yes?></span></a>
						</div>
					</div>
					<a href="#" class="w_arr consult_wr__trigger consult_wr__trigger-open">Читать полностью</a>
					<a href="#" class="w_arr consult_wr__trigger consult_wr__trigger-close">Скрыть ответ</a>
				</div>
<?endforeach;?>
</div>
<?=$arResult["NAV_STRING"]?>
