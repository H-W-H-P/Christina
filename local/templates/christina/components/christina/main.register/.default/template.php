<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>
<script>
function scrollToElement(theElement) {
	if (typeof theElement === "string") theElement = document.getElementById(theElement);
	
    var selectedPosX = 0;
    var selectedPosY = 0;
  
    while (theElement != null) {
        selectedPosX += theElement.offsetLeft;
        selectedPosY += theElement.offsetTop;
        theElement = theElement.offsetParent;
    }
                        		      
    window.scrollTo(selectedPosX,selectedPosY);
}
$(document).ready(function(){	
$('#subreg').click(function(){
    var submit = true; 
    var email = $('#formreg .prop_email');
    var lastname = $('#formreg .prop_lastname');
    var name = $('#formreg .prop_name');
    var phone = $('#formreg .prop_phone');
    var pass = $('#formreg .prop_pass');
    var confpass = $('#formreg .prop_confpass');
    
    if(name.val()==''){
    	name.parent().addClass('error'); 
    	name.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	name.parent().removeClass('error');
    	name.parent().removeClass('wrong');
    }

    if(lastname.val()==''){
    	lastname.parent().addClass('error'); 
    	lastname.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	lastname.parent().removeClass('error');
    	lastname.parent().removeClass('wrong');
    }
    
    
    if(phone.val()==''){
    	phone.parent().addClass('error'); 
    	phone.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	phone.parent().removeClass('error');
    	phone.parent().removeClass('wrong');
    }


    if(pass.val()==''){
    	pass.parent().addClass('error'); 
    	pass.parent().addClass('wrong'); 
        submit = false; 
    }
    else{
    	pass.parent().removeClass('error');
    	pass.parent().removeClass('wrong');
    }

    if(confpass.val()==''){
    	confpass.parent().addClass('error'); 
    	confpass.parent().addClass('wrong'); 
        submit = false; 
    }
    else{
    	confpass.parent().removeClass('error');
    	confpass.parent().removeClass('wrong');
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
        	// email.val('');
        	// email.attr("placeholder", "Неверный E-Mail");
            submit = false;
        }
    }

                   
    if(submit){
    	var formData = new FormData($('#formreg')[0]);
        $.ajax({
            url : '/include/register.php',
            type : 'POST',
            processData: false,
            contentType: false,
            cache:false,
            data : formData,
            success : function (msg){
            	$('#resregister').html(msg);
                $('.registr_form').addClass('center');
            }
        });
        
        //$('#resregister').load('/include/register.php',$('#formreg').serializeArray());
    }
    return false;
});
});
</script>




<?if($USER->IsAuthorized()):?>

<p style='font-size: 17px; min-height: 150px'><?echo GetMessage("MAIN_REGISTER_AUTH")?> <br> Перейдите в личный кабинет нажав на <a class="laned" href='/personal/'>ссылку</a></p>

<?else:?>
<?
if (count($arResult["ERRORS"]) > 0):?>
	<div class="form_block" style="text-align: center">
	<?
	ShowError(implode("<br />", $arResult["ERRORS"]));
	?>
	</div>
	<?
elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>
<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?endif?>
<?if (count($arResult["ERRORS"]) > 0){
	?>
	<script>
	scrollToElement('shoerror');
	</script>
	<?
}
else{
	if(!empty($_POST['REGISTER']['EMAIL'])){
		$filter = array("EMAIL" => $_POST['REGISTER']['EMAIL']);
		$rsUsers = CUser::GetList(($by="LAST_NAME"), ($order="asc"), $filter); // выбираем пользователей
		while($rsUsers->NavNext(true, "f_"))
		{?>
			<script type="text/javascript">
				$('#form-confirmation').hide();
				</script>
			<?echo "<p style='font-size: 20px; min-height: 150px'>Вы успешно зарегистрировались! <br> Перейдите в личный кабинет нажав на <a href='/personal/'>ссылку</a></p>";
		}
	}
}?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data" id="formreg">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>
					<div id="form-confirmation">
						<div class="registr_form__inputs">
							<div class="input_wr w_ph">
								<input id="reg__name" name="REGISTER[NAME]" type="text" class="input prop_name" value="<?=$_POST['REGISTER']['NAME']?>">
								<label class="ph" for="reg__name" class="">Имя</label>
								<p class="warning">неверное имя</p>
							</div>
							<div class="input_wr w_ph">
								<input id="reg__surname" name="REGISTER[LAST_NAME]"  type="text" class="input prop_lastname" value="<?=$_POST['REGISTER']['LAST_NAME']?>">
								<label class="ph" for="reg__surname" class="">Фамилия</label>
								<p class="warning">неверная фамилия</p>
							</div>
							<div class="input_wr w_ph">
								<input id="reg__mail" name="REGISTER[EMAIL]" type="text" class="input prop_email" value="<?=$_POST['REGISTER']['EMAIL']?>">
								<label class="ph" for="reg__mail" class="">E-mail</label>
								<p class="warning">неверный e-mail</p>
							</div>
							<div class="input_wr w_ph">
								<input id="reg__tel" name="REGISTER[PERSONAL_PHONE]" type="tel" class="input prop_phone" value="<?=$_POST['REGISTER']['PERSONAL_PHONE']?>">
								<label class="ph" for="reg__tel" class="">Телефон</label>
								<p class="warning">неверный телефон</p>
							</div>
							<div class="input_wr w_ph">
								<input id="reg__new_pass" name="REGISTER[PASSWORD]" class="prop_pass input" type="password">
								<label class="ph" for="reg__new_pass" class="">Пароль </label>
								<p class="warning">Пароль пусто </p>
							</div>
							<div class="input_wr w_ph">
								<input id="reg__check_new_pass" name="REGISTER[CONFIRM_PASSWORD]" type="password" class="input prop_confpass">
								<label class="ph" for="reg__check_new_pass" class="">Повторите пароль </label>
								<p class="warning">Повторите пароль пусто</p>
							</div>
						</div>
						<p>Защита от автоматической регистрации</p>
						<div id="example1"></div>
						<div class="find_md__filters registr_form__reg_checks">
							<input type="checkbox" value="1" name="UF_SUB" id="find_md__filter1-mob">
							<label for="find_md__filter1-mob" class="find_md__filter_text">
								Я хотел бы получать информационные e-mail рассылки
							</label>
							<input type="checkbox" value="1" name="UF_SMS" id="find_md__filter2-mob">
							<label for="find_md__filter2-mob" class="find_md__filter_text">
								 Я хотел бы получать sms-уведомления об акциях
							</label>
						</div>
						<input type="hidden" name="REGISTER[UF_MEN]" value="0"/>
						<button class="btn registr_form__reg_btn" id="subreg">Зарегистрироваться</button>
						<input name="register_submit_button" value="Регистрация" type="hidden">
					</div>


</form>
<?endif?>
