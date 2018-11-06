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
?>

<?foreach($arResult["ITEMS"] as $k => $arItem):?>
<?

$file = CFile::ResizeImageGet($arResult["ITEMS"][1]['PREVIEW_PICTURE']['ID'], array('width'=>600, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);

?>
	<div class="max_width half_slider__item plus" <?if(!empty($file)):?>style="background-image: url(/local/templates/christina/images/face_halfed_circle.png), url(<?=$file['src']?>)"<?endif?>>
				<div class="half__block half_slider__block half__left">
					<ul>
						<?foreach ($arItem['PROPERTIES']['MINUS']['VALUE'] as $val):?>
						<li class="half_slider__text"><span class="circle_border half_slider__symbol half_slider__symbol_mob"></span><?=$val?><span class="circle_border half_slider__symbol"></span></li>
						<?endforeach;?>
					</ul>
				</div>
				<div class="half__block half_slider__block half__right">
					<ul>
						<?foreach ($arItem['PROPERTIES']['PLUS']['~VALUE'] as $val):?>
						<li class="half_slider__text">
							<span class="circle_border half_slider__symbol"></span>
							<div class="half_slider__text_wr">
								<?=$val['TEXT']?>
							</div>
						</li>
						<?endforeach;?>
					</ul>
				</div>
				<div class="half_slider__mob_contr">
					<a href="#" class="half_slider__contr_minus circle_border"></a>
					<a href="#" class="half_slider__contr_plus circle_border"></a>
				</div>
			</div>
<?endforeach;?>

