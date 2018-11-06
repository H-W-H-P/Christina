<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?
$ses = explode(".", $_SESSION['SESS_IP']);
CModule::IncludeModule("iblock");
global $APPLICATION;
$like = $APPLICATION->get_cookie("DLIKE-".$_GET['id']."-".$ses[0]);
if($like == "N"){
	$APPLICATION->set_cookie("LIKE-".$_GET['id']."-".$ses[0], "N", time()+60*60*24*30*12);
	$arFilter = array("ACTIVE" => "Y", "ID" => $_GET['id'], "IBLOCK_ID" => 6);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "PROPERTY_MINUS", "PROPERTY_PLUS"));
	while($ar_fields = $res->GetNext())
	{
		$IBLOCK_ID = $ar_fields['IBLOCK_ID'];
	    $REV = $ar_fields['PROPERTY_MINUS_VALUE'];
	    $REVY = $ar_fields['PROPERTY_PLUS_VALUE'];
	}
	$REV = $REV + 1;
	$REVY = $REVY - 1;
	$APPLICATION->set_cookie("DLIKE-".$_GET['id']."-".$ses[0], "Y", time()+60*60*24*30*12);
	CIBlockElement::SetPropertyValuesEx($_GET['id'], $IBLOCK_ID, array("MINUS" => $REV));
	CIBlockElement::SetPropertyValuesEx($_GET['id'], $IBLOCK_ID, array("PLUS" => $REVY));
}
elseif(empty($like)){
	$APPLICATION->set_cookie("LIKE-".$_GET['id']."-".$ses[0], "N", time()+60*60*24*30*12);
	$arFilter = array("ACTIVE" => "Y", "ID" => $_GET['id'] , "IBLOCK_ID" => 6);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array("ID", "IBLOCK_ID", "PROPERTY_MINUS", "PROPERTY_PLUS"));
	while($ar_fields = $res->GetNext())
	{
		$IBLOCK_ID = $ar_fields['IBLOCK_ID'];
	    $REV = $ar_fields['PROPERTY_MINUS_VALUE'];
	    $REVY = $ar_fields['PROPERTY_PLUS_VALUE'];
	}
	$REV = $REV + 1;
	$APPLICATION->set_cookie("DLIKE-".$_GET['id']."-".$ses[0], "Y", time()+60*60*24*30*12);
	CIBlockElement::SetPropertyValuesEx($_GET['id'], $IBLOCK_ID, array("MINUS" => $REV));
}
?>
<span>Полезен отзыв?</span>
<a href="#null" class="review__rating_link">- <span style="padding-right: 0px; "><?if($REV):?>(<?=$REV?>)<?else:?><?endif?></span></a>
<a href="#null" class="review__rating_link" onclick="votyes('<?=$_GET['id']?>')">+ <span style="padding-right: 0px; "><?if($REVY):?>(<?=$REVY?>)<?else:?><?endif?></span></a>
<? 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>
