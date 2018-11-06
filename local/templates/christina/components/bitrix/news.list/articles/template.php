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
<div class="news__wr max_width">
	<?foreach($arResult["ITEMS"] as $arItem):?>
			<?$file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>310, 'height'=>230), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news__item_small news_item">
				<img src="<?=$file['src']?>" alt="" class="news_item__img">
				<p class="news_item__title"><?=$arItem['NAME']?></p>
				<p class="news_item__desc"><?=$arItem['PREVIEW_TEXT']?></p>
			</a>
	<?endforeach;?>
</div>
<a href="/articles/" class="btn news_small__btn">Все статьи</a>
