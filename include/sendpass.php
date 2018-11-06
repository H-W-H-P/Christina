<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

/*$recaptcha = new \ReCaptcha\ReCaptcha(RE_SEC_KEY);
$resp = $recaptcha->verify($_REQUEST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
if (!$resp->isSuccess()){
	foreach ($resp->getErrorCodes() as $code) {
			$error .= "Введите капчу <br>";	
			$yes = "1";		
	}
}*/

if(!$yes){
if(isset($_REQUEST['email'])) {
	            	global $USER;
					if(!is_object($USER))
						$USER = new CUser;
	  
	            	$emailTo = htmlspecialcharsbx($_REQUEST['email']);
					$filter = Array("ACTIVE" => "Y", "=EMAIL" => $emailTo);
					$user = CUser::GetList(($by="timestamp_x"), ($order="desc"), $filter)->Fetch();
					if(count($user) > 1) { 
						$password = mb_substr(md5(uniqid(rand(),true)), 0, 8);
	
						$USER->Update($user['ID'], Array("PASSWORD" => $password, "CONFIRM_PASSWORD" => $password));
						//$USER->SendUserInfo($user['ID'], SITE_ID, "Пароль изменён: ". $password);
	
						$rsSites = CSite::GetByID("s1");
						$arSite = $rsSites->Fetch();
	
						$arEventFields = array(
						    "SITE_NAME"		=> $arSite['NAME'],
						    "EMAIL"			=> $emailTo,
						    "PASSWORD"		=> $password,
						    "USER_ID"		=> $user['ID'],
						    "LOGIN"			=> $user['LOGIN'],
						    "NAME"			=> $user['NAME'],
						    "LAST_NAME"		=> $user['LAST_NAME'],
						    "STATUS"		=> ($user['ACTIVE'] == "Y" ? 'Активен' : 'Не активен'),
						);
						
						CEvent::Send('USER_PASS_CHANGED', $arSite, $arEventFields, "N");
						//bxmail('example@mail.ru', 'Восстановление пароля', 'Пароль восстановлен: '. $password);
	
						$error .= "Пароль успешно изменён. <br>На указанную почту выслан новый пароль. <br>";
						$yess = "3";	
					}
					else {
						$error .= "Пользователь с такие e-mail адресом не найден.";	
					}

            }
}
            ?>
            <script>
$(document).ready(function(){	
$('#forgot').click(function(){
    var submit = true; 
    var email = $('#forgotpass .prop_email');
    
    if(email.val()==''){
    	email.addClass('error'); 
        submit = false; 
    }
    else{
    	var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        if(pattern.test(email.val())){
        	email.removeClass('error');
        }
        else{
        	email.addClass('error');
        	email.val('');
        	email.attr("placeholder", "Неверный E-Mail");
            submit = false;
        }
    }
                   
    if(submit){
    	$('#result-sendpass').load('/include/sendpass.php',$('#forgotpass').serializeArray());
    }
    return false;
});
});
</script>

<p style="color: red"><?=$error?></p>
<?if($yess !== '3'):?>
<form class="forgot" action="" id="forgotpass" style="display: block;">
						<div class="registr_form__inputs">
							<div class="input_wr w_ph">
								<input id="forgot_pass" name="email" type="email" class="input prop_email"  value="<?=$_REQUEST['email']?>">
								<label class="ph" for="forgot_pass" class="">Введите e-mail</label>
								<p class="warning">Неверынй e-mail</p>
							</div>
						</div>
						<button class="btn registr_form__auth_btn" id="forgot">Получить пароль</button>
					</form>

<?endif?>