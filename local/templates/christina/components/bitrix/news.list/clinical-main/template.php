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
<ul class="columns__mob_owl owl-carousel columns__col_wr max_width">	
	<?foreach($arResult["ITEMS"] as $arItem):?>
			<li class="columns__column column">
				<?$file = CFile::GetFileArray($arItem['PROPERTIES']['FILE1']['VALUE']);
				$file2 = CFile::GetFileArray($arItem['PROPERTIES']['FILE2']['VALUE']);?>
				<img src="<?=$file['SRC']?>" alt="<?=$arItem['NAME']?>" class="column__img">
				<img src="<?=$file2['SRC']?>" alt="<?=$arItem['NAME']?>" class="column__img column__img_mob">
				<h4 class="column__title"><?=$arItem['NAME']?></h4>
				<p class="column__desc"><?=$arItem['PREVIEW_TEXT']?></p>
				<a href="<?=$arItem['PROPERTIES']['URL']['DESCRIPTION']?>" class="column__link w_arr"><?=$arItem['PROPERTIES']['URL']['VALUE']?></a>
			</li>
	<?endforeach;?>
</ul>
<div class="owl-carousel columns__mob_slider_img">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?$file = CFile::GetFileArray($arItem['PROPERTIES']['FILE1']['VALUE']);?>
		<img src="<?=$file['SRC']?>" alt="<?=$arItem['NAME']?>" class="column__img">
	<?endforeach;?>
</div>
