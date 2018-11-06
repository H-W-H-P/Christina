<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("как это работает");
?>
<?
CModule::IncludeModule("iblock");
$arFilter = array("IBLOCK_ID" => 9, "ACTIVE" => "Y", "ID" => 23);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "NAME" , "PREVIEW_PICTURE","DETAIL_PICTURE",
"PROPERTY_NAME", 
"PROPERTY_PHOTO", 
"PROPERTY_TITILE2", 
"PROPERTY_TEXT2",
"PROPERTY_NAME2",
"PROPERTY_PHOTO2",
"PROPERTY_TEXT_MAIN2",
"PROPERTY_PHOTO_MAIN2",
"PROPERTY_TITILE3",
"PROPERTY_TEXT3",
"PROPERTY_NAME3",
"PROPERTY_PHOTO3",
"PROPERTY_TEXT4",
"PROPERTY_TITLE4",
"PROPERTY_TEXT5",
"PROPERTY_PHOTO_RIGHT",
"PROPERTY_TITLE6",
"PROPERTY_PHOTO6",
"PROPERTY_TEXT6",));
while($ar_fields = $res->GetNext())
	{
		$name = $ar_fields['NAME'];
		$fon1 = CFile::GetFileArray($ar_fields['PREVIEW_PICTURE']);
		$fon2 = CFile::GetFileArray($ar_fields['DETAIL_PICTURE']);
		$title1 = $ar_fields['PROPERTY_NAME_VALUE'];
		$tab_photo1 = $ar_fields['PROPERTY_PHOTO_VALUE'];
		$title2 = $ar_fields['PROPERTY_TITILE2_VALUE'];
		$text2 = $ar_fields['~PROPERTY_TEXT2_VALUE']['TEXT'];
		$title3 = $ar_fields['PROPERTY_NAME2_VALUE'];
		$tab_photo3 = $ar_fields['PROPERTY_PHOTO2_VALUE'];
		$tab_text3 = $ar_fields['~PROPERTY_TEXT_MAIN2_VALUE'];
		$tab_pict3 = $ar_fields['PROPERTY_PHOTO_MAIN2_VALUE'];
		
		$title4 = $ar_fields['PROPERTY_TITILE3_VALUE'];
		$text4 = $ar_fields['~PROPERTY_TEXT3_VALUE']['TEXT'];
		
		$tab_name = $ar_fields['PROPERTY_NAME3_VALUE'];
		$tab_photo4 = $ar_fields['PROPERTY_PHOTO3_VALUE'];
		$tab_text4 = $ar_fields['~PROPERTY_TEXT4_VALUE'];
		
		$title5 = $ar_fields['PROPERTY_TITLE4_VALUE'];
		$text5 = $ar_fields['~PROPERTY_TEXT5_VALUE']['TEXT'];
		$photo = CFile::GetFileArray($ar_fields['PROPERTY_PHOTO_RIGHT_VALUE']);
		
		$title6 = $ar_fields['PROPERTY_TITLE6_VALUE'];
		$text6 = $ar_fields['~PROPERTY_TEXT6_VALUE']['TEXT'];
		$photo2 = CFile::GetFileArray($ar_fields['PROPERTY_PHOTO6_VALUE']);
	}
	?>
<section class="HDIW">
		<div class="navigator HDIW__navigator" <?if(!empty($fon1)):?>style="background: linear-gradient(rgba(217, 238, 252,.5),rgba(217, 238, 252, .5)), url(<?=$fon1['SRC']?>)"<?endif?>>
			<h1 class="navigator__title title"><?=$name?></h1>
			<div class="navigator__menu">
				<?foreach ($title1 as $k => $val):?>
				<?$file = CFile::GetFileArray($tab_photo1[$k])?>
				<a href="#" data-pos=".sc<?=$k+1?>" class="navigator__btn_wr">
					<img src="<?=$file['SRC']?>" class="HDIW__navigator_img" alt="">
					<span class="navigator__btn"><?=$val?></span></a
				>
				<?endforeach;?>
			</div>
		</div>
	</section>

	<section class="scroll scroll_HDIW sc1">
		<div class="max_width">
			<div class="scroll_HDIW__text">
				<h3 class="title scroll_HDIW__title"><?=$title2?></h3>
				<p><?=$text2?></p>
			</div>
			<div class="scroll_HDIW__scr_wr">
				<div class="scroll_HDIW__links">
					<?foreach ($title3 as $k => $val):?>
					<?$file = CFile::GetFileArray($tab_photo3[$k])?>
					<a href="#" class="scroll_HDIW__link <?if($k == 0):?>active<?endif?>">
						<img width="48" src="<?=$file['SRC']?>" class="scroll_HDIW__link_img" alt="">
						<?=$val?>
					</a>
					<?endforeach;?>
				</div>
				<div class="scroll_HDIW__scroll">
					<div class="scroll_HDIW__cont scroll__cont">
						<?foreach ($tab_text3 as $k => $val):?>
						<?$file = CFile::GetFileArray($tab_pict3[$k])?>
						<div class="scroll_HDIW__wr">
							<img src="<?=$file['SRC']?>" alt="" class="scroll_HDIW__img">
							<div class="scroll_HDIW__text_wr">
								<?=$val['TEXT']?>
							</div>
						</div>
						<?endforeach;?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="half half_simple half_simple1 sc2" <?if(!empty($fon2)):?>style="background: linear-gradient(rgba(227, 230, 254,.5),rgba(227, 230, 254, .5)), url(<?=$fon2['SRC']?>) no-repeat; background-size:cover"<?endif?>>
		<div class="max_width">
			<div class="half__block half_simple__left">
				<h2 class="half_simple__title title"><?=$title4?></h2>
				<p class="half_simple__text"><?=$text4?></p>
			</div>
			<div class="half__block half_simple__right">
			</div>	
		</div>	
	</section>

	<section class="half half_black sc3">
		<div class="max_width">
			<?foreach ($tab_name as $k => $val):?>
			<?$file = CFile::GetFileArray($tab_photo4[$k])?>
			<div class="half__block half_black__block<?if($k == 0):?> half_black__left<?else:?> half_black__right<?endif?>">
				<img src="<?=$file['SRC']?>" alt="" class="half_black__img">
				<h4 class="half_black__title"><?=$val?></h4>
				<p class="half_black__text"><?=$tab_text4[$k]['TEXT']?></p>
			</div>
			<?endforeach;?>
		</div>	
	</section>

	<section class="half half_simple half_simple2 sc4">
		<div class="max_width">
			<div class="half__block half_simple__left">
				<h2 class="half_simple__title half_simple2__title title"><?=$title5?></h2>
				<p class="half_simple__text half_simple2__text"><?=$text5?></p>
			</div>
			<div class="half__block half_simple__right half_simple2__right">
				<img src="<?=$photo['SRC']?>" class="half_simple2__img" alt="">
			</div>	
		</div>	
	</section>

	<section class="half half_simple half_simple3">
		<div class="half__bg_left half__bg"></div>
		<div class="half__bg_right half__bg"></div>
		<div class="max_width">
			<div class="half__block half_simple__left half_simple3__left">
				<img src="<?=$photo2['SRC']?>" class="half_simple3__img" alt="">
			</div>
			<div class="half__block half_simple__right half_simple3__right">
				<?=$text6?>
			</div>	
			<h1 class="half__title half_simple3__title title"><?=$title6?></h1>
		</div>	
	</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>