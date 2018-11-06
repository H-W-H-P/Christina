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
<p class="small_baner__title">Рекомендуем</p>
				<div class="small_baner__item">
					<a href="<?=$arResult['DETAIL_PAGE_URL']?>"><p class="small_baner__name"><?=$arResult['NAME']?></p></a>
					<p class="small_baner__price"><?=$arResult['MIN_PRICE']['VALUE']?> ₽</p>
					<img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="" class="small_baner__img">
					<a href="#" class="small_baner__btn btn" onclick="addcart('<?=$arResult['ID']?>');return false;">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/BasketIcon.svg" alt="">
						<span>Купить</span>
					</a>
				</div>
