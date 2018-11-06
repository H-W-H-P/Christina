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
<div class="shop__picker six_items_wr">
	<?foreach ($arResult['SECTIONS'] as $k => $arSection):?>
	<?$file = CFile::GetFileArray($arSection['UF_IMG'])?>
		<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="six_items_wr__item shop__category six_items_wr__item-top <?if($k == 0 || $k == 5):?>six_items_wr__item-big<?endif?>">
					<img src="<?=$file['SRC']?>" width="176px" alt="<?=$arSection['NAME']?>">
					<span class="shop__picker_name"><?=$arSection['NAME']?></span>
				</a>
	<?endforeach;?>
</div>		