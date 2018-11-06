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
<div class="news__items">			
	<?foreach($arResult["ITEMS"] as $k => $arItem):?>
		<div class="<?if($k == 0 && empty($_GET['PAGEN_1'])):?>news__item-big<?else:?>news__item<?endif?> newsajax">
		<?$file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>400, 'height'=>420), BX_RESIZE_IMAGE_EXACT, true); 
		$file2 = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>330, 'height'=>240), BX_RESIZE_IMAGE_EXACT, true);
		?>
		<?if($k == 0 && empty($_GET['PAGEN_1'])):?>
			<img src="<?=$file['src']?>" alt="<?=$arItem['NAME']?>" class="news__img news__img-big">
			<img src="<?=$file2['src']?>" alt="<?=$arItem['NAME']?>" class="news__img news__img_mob">
		<?else:?>
			<img src="<?=$file2['src']?>" alt="<?=$arItem['NAME']?>" class="news__img">
		<?endif?>			
					
					<p class="news__name <?if($k == 0 && empty($_GET['PAGEN_1'])):?>news__name-big<?endif?>"><?=$arItem['NAME']?></p>
					<p class="news__desc <?if($k == 0 && empty($_GET['PAGEN_1'])):?>news__desc-big<?endif?>"><?=$arItem['PREVIEW_TEXT']?></p>
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news__link <?if($k == 0 && empty($_GET['PAGEN_1'])):?>news__link-big<?endif?> w_arr">Узнать подробнее</a>
		</div>
	<?endforeach;?>
</div>
<?=$arResult["NAV_STRING"]?>
