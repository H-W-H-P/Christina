<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Информация для врачей");
?>
<?
CModule::IncludeModule("iblock");
$arFilter = array("IBLOCK_ID" => 13, "ACTIVE" => "Y", "ID" => 27);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE",
"PROPERTY_TITLE", 
"PROPERTY_LI", 
"PROPERTY_TITLE2", 
"PROPERTY_TAB",
"PROPERTY_TEXT",
"PROPERTY_PICTURE",));
while($ar_fields = $res->GetNext())
	{
		$name = $ar_fields['NAME'];
		$title = $ar_fields['PROPERTY_TITLE_VALUE'];
		$li = $ar_fields['PROPERTY_LI_VALUE'];
		$photo = $ar_fields['PREVIEW_PICTURE'];
		
		$title2 = $ar_fields['PROPERTY_TITLE2_VALUE'];
		$tab = $ar_fields['PROPERTY_TAB_VALUE'];
		$text = $ar_fields['~PROPERTY_TEXT_VALUE'];
		$pict = $ar_fields['PROPERTY_PICTURE_VALUE'];
	}
?>

<section class="partner_head">
		<h1 class="partner_head__title title"><?=$name?></h1>
	</section>	

	<section class="partner_img">
		<div class="max_width">
			<div class="prod_text__img_left">
				<div class="prod_text__abs">
					<h2 class="partner_img__title title"><?=$title?></h2>
					<ul class="text_news__list">
						<?foreach ($li as $val):?>
						<li class="text_news__list_item"><?=$val?></li>
						<?endforeach;?>
					</ul>
				</div>
				<div class="prod_text__img_wr">
					<?$file = CFile::GetFileArray($photo);
					$img = CFile::ResizeImageGet($file, array('width'=>490, 'height'=>535), BX_RESIZE_IMAGE_EXACT, true); ?>
					<img src="<?=$img['src']?>" class="prod_text__img" alt="">
				</div>
			</div>
		</div>
	</section>

	<section class="partner_form">
		<div class="max_width" id="respar">
			<?$APPLICATION->IncludeComponent(
				"christina:iblock.element.add.form",
				"",
				Array(
					"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
					"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
					"CUSTOM_TITLE_DETAIL_PICTURE" => "",
					"CUSTOM_TITLE_DETAIL_TEXT" => "",
					"CUSTOM_TITLE_IBLOCK_SECTION" => "",
					"CUSTOM_TITLE_NAME" => "",
					"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
					"CUSTOM_TITLE_PREVIEW_TEXT" => "",
					"CUSTOM_TITLE_TAGS" => "",
					"DEFAULT_INPUT_SIZE" => "30",
					"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
					"ELEMENT_ASSOC" => "CREATED_BY",
					"GROUPS" => array("2"),
					"IBLOCK_ID" => "14",
					"IBLOCK_TYPE" => "forms",
					"LEVEL_LAST" => "Y",
					"LIST_URL" => "",
					"MAX_FILE_SIZE" => "0",
					"MAX_LEVELS" => "100000",
					"MAX_USER_ENTRIES" => "100000",
					"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
					"PROPERTY_CODES" => array("114","115","NAME"),
					"PROPERTY_CODES_REQUIRED" => array(),
					"RESIZE_IMAGES" => "N",
					"SEF_MODE" => "N",
					"STATUS" => "ANY",
					"STATUS_NEW" => "N",
					"USER_MESSAGE_ADD" => "",
					"USER_MESSAGE_EDIT" => "",
					"USE_CAPTCHA" => "N"
				)
			);?>
		</div>
	</section>

	<section class="columns columns_black partner_columns">
		<h1 class="columns__title title"><?=$title2?></h1>
		<ul class="columns__mob_owl owl-carousel columns__col_wr max_width">
			<?foreach ($tab as $k => $val):?>
			<?$file = CFile::GetFileArray($pict[$k]);
			$img = CFile::ResizeImageGet($file, array('width'=>60, 'height'=>60), BX_RESIZE_IMAGE_EXACT, true); ?>
			<li class="columns__column column">
				<img src="<?=$img['src']?>" alt="" class="column__img">
				<img src="<?=$img['src']?>" alt="" class="column__img column__img_mob">
				<h4 class="column__title"><?=$val?></h4>
				<p class="column__desc"><?=$text[$k]['TEXT']?></p>
				<!-- <a href="" class="column__link w_arr">Узнать подробнее</a> -->
			</li>
			<?endforeach;?>
		</ul>
		<div class="owl-carousel columns__mob_slider_img">
			<?foreach ($pict as $k => $val):?>
			<?$file = CFile::GetFileArray($val);
			$img = CFile::ResizeImageGet($file, array('width'=>60, 'height'=>60), BX_RESIZE_IMAGE_EXACT, true); ?>
			<img src="<?=$img['src']?>" alt="" class="column__img">
			<?endforeach;?>
		</div>

	</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>