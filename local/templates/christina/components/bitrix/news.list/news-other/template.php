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
<?if(!empty($arResult["ITEMS"])):?>
<h5 class="news_slider__title">Читать также</h5>
<div class="news_slider__wr owl-slider">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news_slider__item">
			<?$file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>200, 'height'=>170), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
							<img src="<?=$file['src']?>" alt="" class="news_slider__img">
							<p class="news_slider__date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></p>
							<p class="news_slider__name"><?=$arItem['NAME']?></p>
							<span class="news_slider___desc"><?=$arItem['PREVIEW_TEXT']?></span>
		</a>
	<?endforeach;?>
</div>
<?endif?>
