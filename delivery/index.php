<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка и оплата");
?>
<?
CModule::IncludeModule("iblock");
$arFilter = array("IBLOCK_ID" => 11, "ACTIVE" => "Y", "ID" => 25);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "NAME" ,"PREVIEW_TEXT",
"PROPERTY_TITLE", 
"PROPERTY_NAME", 
"PROPERTY_TEXT1", 
"PROPERTY_TEXT2",
"PROPERTY_NAME2",
"PROPERTY_TEXT3",
"PROPERTY_PICTURE",));
while($ar_fields = $res->GetNext())
{
	$name = $ar_fields['NAME'];
	$title = $ar_fields['PROPERTY_TITLE_VALUE'];
	$tab = $ar_fields['PROPERTY_NAME_VALUE'];
	$text1 = $ar_fields['~PROPERTY_TEXT1_VALUE'];
	$text2 = $ar_fields['~PROPERTY_TEXT2_VALUE'];
	
	$tab2 = $ar_fields['PROPERTY_NAME2_VALUE'];
	$text3 = $ar_fields['~PROPERTY_TEXT3_VALUE'];
	$photo = $ar_fields['PROPERTY_PICTURE_VALUE'];
	$description = $ar_fields['PREVIEW_TEXT'];
}
?>
	<section class="delivery_head">
		<h1 class="delivery_head__title title"><?=$name?></h1>
		<h6 class="delivery_head__title_low"><?=$title?></h6>
	</section>		

	<section class="scroll scroll_HDIW delievery_scroll delivery">
		<div class="max_width">
			<div class="scroll_HDIW__scr_wr">
				<div class="scroll_HDIW__links">
					<?foreach ($tab as $k => $val):?>
					<a href="#" data-map=".contacts_map__moscow" class="scroll_HDIW__link <?if($k ==0):?>active<?endif?>">
						<?=$val?>
					</a>
					<?endforeach;?>
				</div>
				<div class="scroll_HDIW__scroll">
					<div class="scroll_HDIW__cont scroll__cont">
						<div class="scroll_HDIW__wr">
							<ul>
								<?foreach ($text1 as $val):?>
								<li class="delivery__item">
									<?=$val['TEXT']?>
								</li>
								<?endforeach;?>
							</ul>							
						</div>
						<div class="scroll_HDIW__wr">
							<ul>
								<?foreach ($text2 as $val):?>
								<li class="delivery__item">
									<?=$val['TEXT']?>
								</li>
								<?endforeach;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	
	<section class="columns columns_black partner_columns delivery_columns">
		<h1 class="columns__title title">Оплата</h1>
		<ul class="columns__mob_owl owl-carousel columns__col_wr max_width">
			<?foreach ($tab2 as $k => $val):?>
			<?$file = CFile::GetFileArray($photo[$k]);
			$img = CFile::ResizeImageGet($file, array('width'=>60, 'height'=>60), BX_RESIZE_IMAGE_EXACT, true); ?>
			<li class="columns__column column">
				<img src="<?=$img['src']?>" alt="" class="column__img">
				<img src="<?=$img['src']?>" alt="" class="column__img column__img_mob">
				<h4 class="column__title"><?=$val?> </h4>
				<p class="column__desc"><?=$text3[$k]['TEXT']?></p>
				<!-- <a href="" class="column__link w_arr">Узнать подробнее</a> -->
			</li>
			<?endforeach;?>

		</ul>
		<div class="owl-carousel columns__mob_slider_img">
			<?foreach ($photo as $vvv):?>
			<?$file = CFile::GetFileArray($vvv);
			$img = CFile::ResizeImageGet($file, array('width'=>60, 'height'=>60), BX_RESIZE_IMAGE_EXACT, true); ?>
			<img src="<?=$img['src']?>" alt="" class="column__img">
			<?endforeach;?>
		</div>
		<!-- <div class="columns__title_cont left">
			<h1 class="columns__title title">Clinical – научная основа</h1>
		</div>
		<div class="columns__title_cont right">
			<h1 class="columns__title title">Clinical – научная основа</h1>
		</div> -->
	</section>

	<section class="delivery_bot">
		<div class="max_width">
			<p class="delivery_bot__desc"><?=$description?></p>
		</div>
	</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>