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
<?foreach($arResult["ITEMS"] as $arItem):?>

	<div class="block_with_bg" <?if(!empty($arItem['DETAIL_PICTURE']['SRC'])):?>style="background-image: url(<?=$arItem['DETAIL_PICTURE']['SRC']?>);"<?endif?>>
			<div class="part_of_bg" <?if(!empty($arItem['PROPERTIES']['FON']['VALUE'])):?>style="background-color: <?=$arItem['PROPERTIES']['FON']['VALUE']?>"<?endif?>></div>
			<div class="max_width smpl_btn_cont__slider_item">
				<h2 class="smpl_btn_cont__title after_underline">
					<?=$arItem['NAME']?>
				</h2>
				<p class="smpl_btn_cont__desc">
					<?=$arItem['PREVIEW_TEXT']?>
				</p>
				<a href="<?=$arItem['PROPERTIES']['BUTTON']['DESCRIPTION']?>" class="btn smpl_btn_cont__btn"><?=$arItem['PROPERTIES']['BUTTON']['VALUE']?></a>
			</div>
			<?$file = CFile::GetFileArray($arItem['PROPERTIES']['FILE']['VALUE']);
			$img = CFile::ResizeImageGet($file, array('width'=>390, 'height'=>390), BX_RESIZE_IMAGE_EXACT, true);?>
			<img src="<?=$file['SRC']?>" class="smpl_btn_cont__product" alt="<?=$arItem['NAME']?>">
		</div>

<?endforeach;?>

