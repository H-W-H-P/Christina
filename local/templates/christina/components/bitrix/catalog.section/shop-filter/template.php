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
<?if(!empty($arResult['ITEMS'])):?>
<section class="shop_results" >
	<div class="max_width">
			<?$count = count($arResult['ITEMS']);?>
			<h2 class="shop_slider__title shop_results__title title">Для вас подобраны <?=$count?> <?=numberEnd($count, array("препарат", "препарата", "препаратов"))?></h2>
		</div>
		<div class="shop_results__wr max_width" >
		<?foreach ($arResult['ITEMS'] as $k => $item):?>
					<div class="slider__prod product__wr">
						<a href="<?=$item['DETAIL_PAGE_URL']?>" class="link_wr_product">
						<?$file = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], array('width'=>150, 'height'=>200), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
						<img src="<?=$file['src']?>" alt="<?=$item['NAME']?>">
						<?if($item['PROPERTIES']['NEW']['VALUE'] == "Y"):?>
						<p class="product_wr__new">
							новинка
						</p>
						<?endif?>
						
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
						<a href="#" class="product__basket" onclick="addcart('<?=$item['ID']?>');return false;">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/BasketIcon.svg" alt="">
						</a>
					</div>
		<?endforeach;?>
	</div>
</section>
<?endif?>
