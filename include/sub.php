<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
CModule::IncludeModule("subscribe");
if(!empty($_POST['del'])){
	$subscr = CSubscription::GetList(array("ID"=>"ASC"),array("ACTIVE"=>"Y","EMAIL"=>$_POST['email']));
	while($subscr_arr = $subscr->Fetch()){
    	$ISDUB = $subscr_arr["ID"];
	}

	if ($res = CSubscription::Delete($ISDUB)){
		$fields = Array(
		  "ACTIVE"            => "Y",
		  "UF_SUB"          => 0,
		  );
		  $user = new CUser;
		$user->Update($USER->GetID(), $fields);
    	echo "Вы успешно отписались.";
    	
	}
	else{
		echo "Ошибка в удалении подписки.";
	}
}
else{
	
	$arFields = Array(
        "USER_ID" => ($USER->IsAuthorized()? $USER->GetID():false),
        "FORMAT" => ($FORMAT <> "html"? "text":"html"),
        "EMAIL" => $_POST['email'],
        "ACTIVE" => "Y",
		"CONFIRMED" => "Y", 
		"SEND_CONFIRM" => "N" 
    );
    $subscr = new CSubscription;

    //can add without authorization
    $ID = $subscr->Add($arFields);
    if($ID>0){
        CSubscription::Authorize($ID);
        $user = new CUser;
		$fields = Array(
		  "ACTIVE"            => "Y",
		  "UF_SUB"          => 1,
		  );
		$user->Update($USER->GetID(), $fields);
		$strWarning = 'Вы успешно подписались';
    }
    else{
        $strWarning .= $subscr->LAST_ERROR."<br>";
    }
    
    echo $strWarning;
}
?>