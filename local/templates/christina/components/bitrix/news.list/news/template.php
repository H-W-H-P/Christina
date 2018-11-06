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
<div class="max_width">
	<a href="/news/" class="uniq_news__link title">
		Новости
		<span class="uniq_news__link_text w_arr">Читать все</span>
	</a>
	<h1 class="uniq_news__title_mob title">Новости</h1>
	<a href="/news/" class="uniq_news__link_mob w_arr">Читать все</a>
</div>	

<div class="owl-carousel uniq_news__owl">
	<?foreach($arResult["ITEMS"] as $arItem):?>
			<div class="uniq_news__owl_item">
				<p class="uniq_news__owl_date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></p>
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="uniq_news__owl_link"><?=$arItem['NAME']?></a>
			</div>
	<?endforeach;?>
		<div class="uniq_news__owl_item"></div>
</div>
<?endif?>
