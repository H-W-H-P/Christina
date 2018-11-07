<?@require_once 'include/autoload.php';
define("RE_SITE_KEY","6Lf9THkUAAAAAOPDbUrVXIcDiLqiWKgKanlPO63V");
define("RE_SEC_KEY","6Lf9THkUAAAAAJz0jgXAWCDYXaIr0JsVtz3rmnJK");
function pre($arr){
	echo "<pre>";
		print_r($arr);
	echo "</pre>";	
}

AddEventHandler("iblock", "OnAfterIBlockElementAdd", "MyOnAfterIBlockElementAdd");
AddEventHandler("main", "OnAfterUserUpdate", "OnAfterUserUpdateHandler");
AddEventHandler("main", "OnBeforeUserRegister", "OnBeforeUserRegisterHandler");
AddEventHandler("main", "OnAfterUserRegister", "OnAfterUserRegisterHandler");

function OnBeforeUserRegisterHandler(&$arFields)
{
	CModule::IncludeModule("iblock");
	/*if($arFields['UF_MEN'] == 0){
		$arFields['GROUP_ID'] = array("3", "4", "5");
	}
	else{
		$arFields['GROUP_ID'] = array("3", "4", "5", "7");
	}*/
	$arFields["LOGIN"] = $arFields["EMAIL"];
	return $arFields;
}

function OnAfterUserRegisterHandler(&$arFields){
	if($arFields['UF_SUB'] == 1){
    		   
    		   $USER_EMAIL=$arFields["EMAIL"];
			   $USER_ID=$arFields["ID"];
			   if (CModule::IncludeModule("subscribe") && ($USER_ID>0)):  
			
			
			   if ($arrRub = CRubric::GetByID($rassilka)) 
			        { 
			            $arFields2 = Array( 
			                "USER_ID" => $USER_ID, 
			                "FORMAT" => "html", 
			                "EMAIL" => $USER_EMAIL, 
			                "ACTIVE" => "Y", 
			                "CONFIRMED" => "Y", 
 
			                "SEND_CONFIRM" => "N" 
			            ); 

			
			            $subscr = new CSubscription; 
			
			            $res = CSubscription::GetList(Array("ID"=>"ASC"), Array("EMAIL"=>$USER_EMAIL)); 
			            if (!$arrSub = $res->GetNext()) { 
			                $SUB_ID = $subscr->Add($arFields2);
			            }     
			      else
			      {
			            $aSubscrRub = CSubscription::GetRubricArray($arrSub["ID"]);
			            if (!in_array($rassilka,$aSubscrRub)) $aSubscrRub[]=$rassilka; // если нет нашей рассылки, то добавим в список   
			            $arFields2 = Array( 
			               "USER_ID" => $USER_ID, 
			               "FORMAT" => "html", 
			               "EMAIL" => $USER_EMAIL, 
			               "ACTIVE" => "Y", 
			               "CONFIRMED" => "Y", 
			               "RUB_ID" => $aSubscrRub, 
			               "SEND_CONFIRM" => "N" 
			               ); 
			            $subscr = new CSubscription; 
			            $SUB_ID1 = $subscr->Update($arrSub["ID"], $arFields2);  // обновляем подписку
			   
			         }
			            
			        } 
			   endif;
    	}
	global $USER;
		$USER->Authorize($arFields['USER_ID']);
}


function MyOnAfterIBlockElementAdd($arFields){
	if($arFields['IBLOCK_ID'] == 14){
			$arSend = array(
					'NAME' => $arFields['NAME'],
					'PHONE' => $arFields['PROPERTY_VALUES'][115],
					'EMAIL' => $arFields['PROPERTY_VALUES'][114],

			);
			$mail = CEvent::Send('PARTNER','s1',$arSend);
	}
	if($arFields['IBLOCK_ID'] == 19){
			$arSend = array(
					'NAME' => $arFields['NAME'],
					'PHONE' => $arFields['PROPERTY_VALUES'][136],
					'CITY' => $arFields['PROPERTY_VALUES'][137],

			);
			$mail = CEvent::Send('CALLBACK','s1',$arSend);
	}
}

function OnAfterUserUpdateHandler(&$arFields)
    {

    	if($arFields['UF_SUB'] == 1){
    		   
    		   $USER_EMAIL=$arFields["EMAIL"];
			   $USER_ID=$arFields["ID"];
			   if (CModule::IncludeModule("subscribe") && ($USER_ID>0)):  
			
			
			   if ($arrRub = CRubric::GetByID($rassilka)) 
			        { 
			            $arFields2 = Array( 
			                "USER_ID" => $USER_ID, 
			                "FORMAT" => "html", 
			                "EMAIL" => $USER_EMAIL, 
			                "ACTIVE" => "Y", 
			                "CONFIRMED" => "Y", 
 
			                "SEND_CONFIRM" => "N" 
			            ); 

			
			            $subscr = new CSubscription; 
			
			            $res = CSubscription::GetList(Array("ID"=>"ASC"), Array("EMAIL"=>$USER_EMAIL)); 
			            if (!$arrSub = $res->GetNext()) { 
			                $SUB_ID = $subscr->Add($arFields2);
			            }     
			      else
			      {
			            $aSubscrRub = CSubscription::GetRubricArray($arrSub["ID"]);
			            if (!in_array($rassilka,$aSubscrRub)) $aSubscrRub[]=$rassilka; // если нет нашей рассылки, то добавим в список   
			            $arFields2 = Array( 
			               "USER_ID" => $USER_ID, 
			               "FORMAT" => "html", 
			               "EMAIL" => $USER_EMAIL, 
			               "ACTIVE" => "Y", 
			               "CONFIRMED" => "Y", 
			               "RUB_ID" => $aSubscrRub, 
			               "SEND_CONFIRM" => "N" 
			               ); 
			            $subscr = new CSubscription; 
			            $SUB_ID1 = $subscr->Update($arrSub["ID"], $arFields2);  // обновляем подписку
			   
			         }
			            
			        } 
			   endif;
    	}
    	else{
    		CModule::IncludeModule("subscribe");
    		$email = $arFields["EMAIL"]; // адрес, который надо исключить из рассылки
        	$rs=CSubscription::GetByEmail($email);
       	 	$f = $rs->Fetch();
        	CSubscription::Delete($f['ID']); // удаляем адрес из рассылки
    	}
    }
function calculate_age($birthday) {
	$birthday_timestamp = strtotime($birthday);
	$age = date('Y') - date('Y', $birthday_timestamp);
	if (date('md', $birthday_timestamp) > date('md')) {
		$age--;
	}
	return $age;
}
function numberEnd($number, $titles) {
	$cases = array (2, 0, 1, 1, 1, 2);
	return $titles[ ($number%100>4 && $number%100<20)? 2 : $cases[min($number%10, 5)] ];
}					
?>