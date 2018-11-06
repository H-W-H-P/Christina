<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<?
CModule::IncludeModule("iblock");
$arFilter = array("IBLOCK_ID" => 12, "ACTIVE" => "Y", "ID" => 26);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "NAME" ,
"PROPERTY_CITY", 
"PROPERTY_ADRESA", 
"PROPERTY_TIME", 
"PROPERTY_PHONE",
"PROPERTY_EMAIL",));
while($ar_fields = $res->GetNext())
	{
		$city = $ar_fields['PROPERTY_CITY_VALUE'];
		$adresa = $ar_fields['PROPERTY_ADRESA_VALUE'];
		$time = $ar_fields['PROPERTY_TIME_VALUE'];
		$phone = $ar_fields['PROPERTY_PHONE_VALUE'];
		$phone_descr = $ar_fields['PROPERTY_PHONE_DESCRIPTION'];
		$email = $ar_fields['PROPERTY_EMAIL_VALUE'];
	}
?>
<section class="contacts_head">
		<h1 class="contacts_head__title title">Контакты</h1>
	</section>		

	<section class="contacts_map contacts scroll scroll_HDIW">
		<div class="max_width">
			<div class="scroll_HDIW__scr_wr">
				<div class="scroll_HDIW__links">
					<?foreach ($city as $k => $val):?>
					<a href="#" <?if($k == 0):?>data-map=".contacts_map__moscow"<?else:?>data-map=".contacts_map__peter"<?endif?> class="scroll_HDIW__link active">
						<?=$val?>
					</a>
					<?endforeach;?>
				</div>
				<div class="scroll_HDIW__scroll">
					<div class="scroll_HDIW__cont scroll__cont">
						<?$i = 0;?>
						<?foreach ($adresa as $k => $val):?>
						<div class="scroll_HDIW__wr">
							<p class="contacts_map__desc"><?=$val?> </p>
							<p class="contacts_map__desc"><?=$time[$k]?></p>
							<div class="contacts_map__wr">
								<a href="tel:<?=$phone[$i]?>" class="contacts_map__link"><?=$phone[$i]?></a>
								<span class="contacts_map__op"><?=$phone_descr[$i]?></span>
							</div>
							<div class="contacts_map__wr contacts_map__desc">
								<a href="tel:<?=$phone[$i+1]?>" class="contacts_map__link"><?=$phone[$i+1]?></a>
							</div>
							<div class="contacts_map__wr">
								<a href="mailto:<?=$email[$k]?>" class="contacts_map__mail laned"><?=$email[$k]?></a>
							</div>
						</div>
						<?$i++;$i++;?>
						<?endforeach;?>
					</div>
				</div>
				<a href="#" class="btn contacts__communicate">Связаться с нами</a>
				<a href="#" class="btn contacts__find">Найти косметолога</a>
				<a href="#" class="contacts__data laned">Ознакомиться с реквизитами</a>
			</div>
			<div class="scroll_HDIW__text">
				<iframe class="contacts_map__moscow" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d577336.7638984495!2d36.82513038949304!3d55.5807480820225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54afc73d4b0c9%3A0x3d44d6cc5757cf4c!2z0JzQvtGB0LrQstCwLCDQoNC-0YHRgdC40Y8!5e0!3m2!1sru!2sby!4v1537189842974" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				<iframe class="contacts_map__peter" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255542.61620286488!2d29.659494418738213!3d59.975650318450356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696378cc74a65ed%3A0x6dc7673fab848eff!2z0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsINCg0L7RgdGB0LjRjw!5e0!3m2!1sru!2sby!4v1537190071350" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>