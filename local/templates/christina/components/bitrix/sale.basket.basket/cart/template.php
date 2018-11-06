<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var string $templateFolder
 * @var string $templateName
 * @var CMain $APPLICATION
 * @var CBitrixBasketComponent $component
 * @var CBitrixComponentTemplate $this
 * @var array $giftParameters
 */

?>
<script>
function delete_item_cart(id){
	var quant = $('#quant_'+id).val();
	$.ajax({
		type: "POST",
		url: "/include/cart.php",
		data: ( {"delete" : "Y", "id" : id} ),
		success: function(html){
			$('#result_cart').html(html);
			
		}
	});
}

function quantity(id){

	var quant = $('#quant_'+id).val();
	$.ajax({
		type: "POST",
		url: "/include/cart.php",
		data: ( {"id" : id, "quant": quant} ),
		success: function(html){			
			$('#result_cart').html(html);
		}
	});
}
</script>
<?//pre($arResult)?>
<section class="basket">
		<div class="max_width">
			<h1 class="baasket_title title">Оформление заказа</h1>
			<h3 class="basket__low_title title">Корзина</h3>
			<div class="basket_table">
				<div class="basket_table__row basket_table__title">
					<div class="basket_table__l">Продукция</div>
					<div class="basket_table__l-c"></div>
					<div class="basket_table__c"></div>
					<div class="basket_table__c-r">Количество</div>
					<div class="basket_table__r">Сумма</div>
					<div class="basket_table__remove"></div>
				</div>
				<!-- has_pr - class for basket items having free presents -->
				<?foreach ($arResult['ITEMS']['AnDelCanBuy'] as $item):?>
				<?//pre($item)?>
				<div class="basket_table__row has_pr basket_table__bdtp">
					<div class="basket_table__l">
						<?$file = CFile::GetFileArray($item['PREVIEW_PICTURE']);
						$img = CFile::ResizeImageGet($file, array('width'=>200, 'height'=>200), BX_RESIZE_IMAGE_PROPORTIONAL_ALTL, true); ?>
						<img src="<?=$img['src']?>" alt="<?=$item['NAME']?>">
					</div>
					<div class="basket_table__l-c">
						<p class="table-bold">
						<?
						$arFilter = array("IBLOCK_ID" => 7, "ACTIVE" => "Y", "ID" => $item['PRODUCT_ID']);
						$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "PROPERTY_24", "IBLOCK_SECTION_ID"));
						while($ar_fields = $res->GetNext())
						{
							$article = $ar_fields['PROPERTY_24_VALUE'];
						 	$sect_id = $ar_fields['IBLOCK_SECTION_ID'];
						}

						$res = CIBlockSection::GetByID($sect_id);
						if($ar_res = $res->GetNext()){
						  echo $ar_res['NAME'];
						}
						?>
						</p>
						<a href="<?=$item['DETAIL_PAGE_URL']?>">
							<p class="table-op"><?=$item['NAME']?></p>
						</a>
						<p>Артикул: <?=$article?></p>
					</div>
					<div class="basket_table__c"></div>
					
					<div class="basket_table__c-r">
							<div class="prod_inf__counter table-bold">
								<a href="#" data-check="<?=$item['ID']?>" data-sign="-" class="counter__btn">–</a>
								<span data-counter="<?=$item['QUANTITY']?>" class="counter__number counter__btn"><?=$item['QUANTITY']?></span>
								<input type="text" data-check="<?=$item['ID']?>" class="hid_inp" value="<?=$item['QUANTITY']?>">
								<a href="#" data-check="<?=$item['ID']?>" data-sign="+" class="counter__btn">+</a>
							</div>
					</div>
					<div class="basket_table__r table-bold">
						<?=number_format($item['SUM_VALUE'], 0, ',', ' ');?> ₽
					</div>
					<div class="basket_table__remove">						
						<a href="javascript:void(0);" onclick="delete_item_cart('<?=$item['ID']?>')" class="table__remove">
							<span></span>
							<span></span>
						</a>
						<a href="javascript:void(0);" onclick="delete_item_cart('<?=$item['ID']?>')" class="table__remove_mob table__remove w_arr">Удалить</a>
					</div>					
				</div>
				<?endforeach;?>

			</div>
			<div class="basket__summ">
				<span class="op">Общая сумма: </span>
				<?if($arResult['DISCOUNT_PRICE_ALL'] > 0):?>
				<span class="op removed_price"><?=substr($arResult['PRICE_WITHOUT_DISCOUNT'], 0, -4)?> ₽</span>
				<?endif?>
				<span class="bold"><?=number_format($arResult['allSum'], 0, ',', ' ');?> ₽</span>
			</div>
			<a href="#" class="btn basket__btn">Оформить заказ</a>
		</div>
	</section>	
	
	