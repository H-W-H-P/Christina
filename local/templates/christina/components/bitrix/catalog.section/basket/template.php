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
 */

$this->setFrameMode(true);

?>

				<?foreach ($arResult['ITEMS'] as $item):?>
				<?//pre($item['MIN_PRICE'])?>
				<div class="slider__prod product__wr">
					<a href="<?=$item['DETAIL_PAGE_URL']?>" class="link_wr_product">
					<?$file = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], array('width'=>150, 'height'=>200), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
					<img src="<?=$file['src']?>" alt="<?=$item['NAME']?>">
					<!-- <p class="product_wr__new">
						новинка
					</p> -->
					<p class="product_wr__name">
						<?
						$res = CIBlockSection::GetByID($item['IBLOCK_SECTION_ID']);
						if($ar_res = $res->GetNext()){
						  echo $ar_res['NAME'];
						}
						?>
					</p>
					<p class="product_wr__dec">
						<?=$item['NAME']?>
					</p>
					</a>
					<?if($item['DISCOUNT_DIFF'] > 0):?>
					<p class="product__price removed_price">
						<?=$item['MIN_PRICE']['VALUE']?> ₽
					</p>
					<?endif?>
					<p class="product__price">
						<?=$item['MIN_PRICE']['DISCOUNT_VALUE']?> ₽
					</p>
					
					<a href="#" class="product__basket w_arr" onclick="addcartbasket('<?=$item['ID']?>');return false;">
						В корзину
					</a>
				</div>
				<?endforeach;?>
				


