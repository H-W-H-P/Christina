<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CJSCore::Init();
?>
<style>
.error{
	border-bottom: 1px solid red;
}
.errortext{
	color :red;
}
</style>
<script>
$(document).ready(function(){	
$('#sublogin').click(function(){
    var submit = true; 
    var email = $('#formlogin .prop_email');
    var name = $('#formlogin .prop_name');
    
    if(name.val()==''){
    	name.parent().addClass('error'); 
    	name.parent().addClass('wrong');
    }
    else{
    	name.parent().removeClass('error');
    	name.parent().removeClass('wrong');
    }

    if(email.val()==''){
    	email.parent().addClass('error'); 
    	email.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        if(pattern.test(email.val())){
        	email.parent().removeClass('error');
        	email.parent().removeClass('wrong');
        }
        else{
        	email.parent().addClass('error'); 
        	email.parent().addClass('wrong');
        	email.val('');
        	email.attr("placeholder", "Неверный E-Mail");
            submit = false;
        }
    }
                   
    if(submit){
        $('#reslogin').load('/include/login.php',$('#formlogin').serializeArray());
    }
    return false;
});

$('#forgot').click(function(){
    var submit = true; 
    var email = $('#forgotpass .prop_email');
    
    if(email.val()==''){
    	email.parent().addClass('error'); 
    	email.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        if(pattern.test(email.val())){
        	email.parent().removeClass('error');
        	email.parent().removeClass('wrong');
        }
        else{
        	email.parent().addClass('error'); 
        	email.parent().addClass('wrong');
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
<?$yes = "";?>
	

<?if($arResult["FORM_TYPE"] == "login"):?>
<?if(!$yes):?>


<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>


<form class="auth_form" name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$_SERVER['REQUEST_URI']?>" id="formlogin">
<?if($arResult["BACKURL"] <> ''):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
<?foreach ($arResult["POST"] as $key => $value):?>
	<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
<?endforeach?>

	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="AUTH" />
	<div class="registr_form__inputs">
							<div class="input_wr w_ph">
								<input id="login" name="USER_LOGIN" type="text" class="input prop_email" value="<?=$_POST['USER_LOGIN']?>">
								<label class="ph" for="login" class="">E-mail</label>
								<p class="warning">неверный Логин </p>
							</div>
							<div class="input_wr w_ph">
								<input id="pass" name="USER_PASSWORD" type="password" class="input prop_name">
								<label class="ph" for="pass" class="">Пароль </label>
								<p class="warning">неверный Пароль  </p>
							</div>
						</div>
						<button class="btn registr_form__auth_btn" id="sublogin">Войти</button>                       
	</form>
					<div id="result-sendpass" class="forgot">
					<form  action="" id="forgotpass">
						<div class="registr_form__inputs">
							<div class="input_wr w_ph">
								<input id="forgot_pass" name="email" type="email" class="input prop_email">
								<label class="ph" for="forgot_pass" class="">Введите e-mail</label>
								<p class="warning">Неверынй e-mail</p>
							</div>
						</div>
						<button class="btn registr_form__auth_btn" id="forgot">Получить пароль</button>
					</form>
					</div>
					<a href="#" class="registr_form__forget_pass">Забыли пароль?</a>
					<p class="registr_form__text_abs_wr">
						<span>или</span>
					</p>
					<p>Авторизуйтесь через социальную сеть</p>
					<div class="registr_form__socials">
						<a href="#" class="footer__social">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/footer_social2.svg" alt="">
							<img class="hov" src="<?=SITE_TEMPLATE_PATH?>/images/footer_social2_hov.svg" alt="">
						</a>
						<a href="#" class="footer__social">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/footer_social1.svg" alt="">
							<img class="hov" src="<?=SITE_TEMPLATE_PATH?>/images/footer_social1_hov.svg" alt="">
						</a>
					</div>
<?endif?>
<?else:?>
<?

if(stristr($_SERVER['HTTP_REFERER'], 'confirm_code') == true) {
	$urr = explode("?", $_SERVER['HTTP_REFERER']);	
	$red = "/personal/?".$urr[1];
}
else{
	$red = "/personal/";
}

?>
<script>
document.location.href = '<?=$red?>';
</script>
<?//LocalRedirect("/personal/");?>
<?endif?>