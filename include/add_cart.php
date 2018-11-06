<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?CModule::IncludeModule('catalog');
CModule::IncludeModule("sale");   
CModule::IncludeModule("iblock");
if(!empty($_POST['quant'])){
	$quant = $_POST['quant'];
}
else{
	$quant = 1;
}
                                

	/*$arFilter = array("IBLOCK_ID" => 5, "ACTIVE" => "Y", "ID" => $_POST['id']);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "PROPERTY_PROVERKA_UPACK"));
	while($ar_fields = $res->GetNext())
	{
	 	$PROV = $ar_fields["PROPERTY_PROVERKA_UPACK_VALUE"];
	}
	
	if(!empty($PROV)){
		$prop = array();
		$ff = Add2BasketByProductID(
		$_POST['id'],
		$_POST['quant'],
		array(),
		array(
	     array("NAME" => "Проверка товара", "CODE" => "UPACK", "VALUE" => $PROV)
	    )
		);
	}
	else{*/
		$prop = array();
		$ff = Add2BasketByProductID(
		$_POST['id'],
		$_POST['quant'],
		array(),
		array(
	    //array("NAME" => "Код товара", "CODE" => "ARTICLE", "VALUE" => $_POST['code'])
	    )
		);
	//}

  ?>
<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "cart", Array(
							"IMG" => "BasketIcon.svg",
							"IMG2" => "BasketIcon_hov.svg"
							),
							false
						);?>
