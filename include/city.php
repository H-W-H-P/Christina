<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
global $USER;
if(!$USER->IsAuthorized()){
	$_SESSION['p_city'] = $_POST['id'];
}
else{
	$user = new CUser;
	$fields = Array(
	  "PERSONAL_CITY" => $_POST['id'],
	  );
	$user->Update($USER->GetID(), $fields);
}
?>