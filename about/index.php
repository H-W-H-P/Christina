<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О бренде");
?>
<?
CModule::IncludeModule("iblock");
$arFilter = array("IBLOCK_ID" => 10, "ACTIVE" => "Y", "ID" => 24);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "NAME" , "PREVIEW_PICTURE","DETAIL_PICTURE",
"PROPERTY_NAME", 
"PROPERTY_TITLE1", 
"PROPERTY_TEXT1", 
"PROPERTY_TITLE2",
"PROPERTY_TEXT2",
"PROPERTY_TITLE3",
"PROPERTY_BLOQ",
"PROPERTY_TEXT3",
"PROPERTY_TEXT11",
"PROPERTY_PHOTO_DESC",
"PROPERTY_PHOTO_MOB",
"PROPERTY_BLOQ2",
"PROPERTY_FON",
"PROPERTY_TEXT4",
"PROPERTY_TITLE4",
"PROPERTY_TEXT5",
"PROPERTY_TITLE5",
"PROPERTY_TEXT6",
"PROPERTY_TEXT7",
"PROPERTY_PHOTO",
"PROPERTY_TEXT8",
"PROPERTY_TEXT9",
"PROPERTY_TEXT10",
"PROPERTY_PHOTO2",
"PROPERTY_FON2",
));
while($ar_fields = $res->GetNext())
	{
		$name = $ar_fields['NAME'];
		$tab = $ar_fields['PROPERTY_NAME_VALUE'];
		$title1 = $ar_fields['PROPERTY_TITLE3_VALUE'];
		$title11 = $ar_fields['PROPERTY_TITLE1_VALUE'];
		$title12 = $ar_fields['PROPERTY_TITLE2_VALUE'];
		$text1 = $ar_fields['~PROPERTY_TEXT1_VALUE']['TEXT'];
		$text11 = $ar_fields['~PROPERTY_TEXT11_VALUE']['TEXT'];
		$text2 = $ar_fields['~PROPERTY_TEXT2_VALUE']['TEXT'];
		$bloq = $ar_fields['~PROPERTY_BLOQ_VALUE']['TEXT'];
		$text3 = $ar_fields['~PROPERTY_TEXT3_VALUE']['TEXT'];
		$bloq2 = $ar_fields['~PROPERTY_BLOQ2_VALUE']['TEXT'];
		$photo1 = CFile::GetFileArray($ar_fields['PROPERTY_PHOTO_DESC_VALUE']);
		$photo2 = CFile::GetFileArray($ar_fields['PROPERTY_PHOTO_MOB_VALUE']);
		$text4 = $ar_fields['~PROPERTY_TEXT4_VALUE']['TEXT'];
		$photo3 = CFile::GetFileArray($ar_fields['PROPERTY_FON_VALUE']);
		$title4 = $ar_fields['PROPERTY_TITLE4_VALUE'];
		$text5 = $ar_fields['PROPERTY_TEXT5_VALUE'];
		
		$title5 = $ar_fields['PROPERTY_TITLE5_VALUE'];
		$text6 = $ar_fields['~PROPERTY_TEXT6_VALUE']['TEXT'];
		$text7 = $ar_fields['~PROPERTY_TEXT7_VALUE']['TEXT'];
		$photo4 = CFile::GetFileArray($ar_fields['PROPERTY_PHOTO_VALUE']);
		
		$text8 = $ar_fields['~PROPERTY_TEXT8_VALUE']['TEXT'];
		$text9 = $ar_fields['~PROPERTY_TEXT9_VALUE']['TEXT'];
		$text10 = $ar_fields['~PROPERTY_TEXT10_VALUE']['TEXT'];
		$photo5 = CFile::GetFileArray($ar_fields['PROPERTY_PHOTO2_VALUE']);
		
		$fon2 = $ar_fields['PROPERTY_FON2_VALUE'];
	}
?>

<section class="text">
		<div class="navigator text__navigator">
			<h1 class="navigator__title title"><?=$name?></h1>
			<div class="navigator__menu">
				<?foreach ($tab as $k => $val):?>
					<a href="#" data-pos=".text__content_link<?=$k+1?>" class="navigator__btn_wr"><span class="navigator__btn"><?=$val?></span></a>
				<?endforeach;?>
			</div>
		</div>
		<div class="text__content text__content_link1">
			<h2 class="text__title title"><?=$title1?></h2>
			<h5 class="text__low_title"><?=$title11?></h5>
			<span class="text__article"><?=$text1?></span>
			<div class="text__side">
				
				<img src="<?=$photo1['SRC']?>" alt="" class="text__img">
				<img src="<?=$photo2['SRC']?>" alt="" class="text__img text__img_mob">
				<p class="text__bold text__side_article"><?=$bloq2?></p>
			</div>
			<span class="text__article"><?=$text11?></span>
			<h5 class="text__low_title"><?=$title12?></h5>
			<span class="text__article">
				<?=$text2?>
			</span>
			<p class="text__opacity_article"><?=$bloq?></p>
			<span class="text__article"><?=$text3?></span>
			<p class="text__bold text__side_article text__side_article_mob"><?=$bloq2?></p>
		</div>
	</section>

	<section class="ban_center title" style="background: var(--bg-color1) url(<?=$photo3['SRC']?>)">
		<p class="ban_center__text">
			<?=$text4?>
		</p>
	</section>

	<section class="uniq_history text__content_link2" <?if(!empty($fon2)):?>style="background-color: <?=$fon2?>"<?endif?>>		
		<div class="max_width">
			<h1 class="uniq_history__title title"><?=$title4?></h1>
			<div class="owl-carousel uniq_news__owl">
				<?foreach ($text5 as $k => $val):?>
				<?if(!empty($val['TEXT'])):?>
				<div class="uniq_news__owl_item">
					<p class="uniq_news__owl_date"><?=$k+1?></p>
					<a href="#" class="uniq_news__owl_link"><?=$val['TEXT']?></a>
				</div>
				<?endif?>
				<?endforeach;?>

				<div class="uniq_news__owl_item"></div>
			</div>
		</div>	
	</section>

	<section class="text">
		<div class="text__content gray text__content_link3">
			<div class="text__img_wr">
				<h2 class="text__title title"><?=$title5?></h2>
				<span class="text__article"><?=$text6?></span>
				<span class="text__article"><?=$text7?></span>
				<img src="<?=$photo4['SRC']?>" width="594"  alt="" class="text__side_img">
			</div>
			<div class="text__help_wr">
				<div class="max_width non_relative">
					<div class="text__text_wr">
						<span class="text__article"><?=$text8?></span>
						<span class="text__article text__bold"><?=$text9?></span>
						<span class="text__article"><?=$text10?></span>
					</div>
					<img src="<?=$photo5['SRC']?>" width="600"  alt="" class="text__side_img">
				</div>
			</div>	
		</div>
	</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>