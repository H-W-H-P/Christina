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
<?//pre($arResult)?>
<section class="half propeel_half3">

		<div class="max_width">
			<div class="half__block propeel_half3__left">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/product1.png" alt="" class="propeel_half3__img">
			</div>
			<div class="half__block propeel_half3__right">
				<h2 class="propeel_half3__title title"><?=$arResult['NAME']?></h2>
				<p class="propeel_half3__desc"><?=$arResult['PREVIEW_TEXT']?></p>
				<p class="propeel_half3__text"><?=$arResult['DETAIL_TEXT']?></p>
				<p class="propeel_half3__price"><?=$arResult['MIN_PRICE']['VALUE']?> ₽</p>
				<a href="" class="btn propeel_half3__btn" onclick="addcart('<?=$arResult['ID']?>');return false;">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/BasketIcon.svg" alt="">
					<span>В корзину</span>
				</a>
				<a href="<?=$arResult['DETAIL_PAGE_URL']?>" class="propeel_half3__link w_arr">Узнать подробнее</a>
			</div>
		</div>		
	</section>