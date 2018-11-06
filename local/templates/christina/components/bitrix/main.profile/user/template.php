<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<style>
.error{
	border-bottom: 1px solid red;
}
</style>
<script>
$(document).ready(function(){	
$('#subuser').click(function(){
    var submit = true; 
    var name = $('#formuser .prop_name');
    var lastname = $('#formuser .prop_lastname');
    var secondname = $('#formuser .prop_secondname');
    var data = $('#formuser .prop_data');
    var phone = $('#formuser .prop_phone');
    var email = $('#formuser .prop_email');

    
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

    if(secondname.val()==''){
    	secondname.parent().addClass('error'); 
    	secondname.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	secondname.parent().removeClass('error');
    	secondname.parent().removeClass('wrong');
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
    
    if(phone.val()==''){
    	phone.parent().addClass('error'); 
    	phone.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	phone.parent().removeClass('error');
    	phone.parent().removeClass('wrong');
    }

    if(data.val()==''){
    	data.parent().addClass('error'); 
    	data.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	data.parent().removeClass('error');
    	data.parent().removeClass('wrong');
    }
   
    $('.input').each(function( index ) {
        if ($(this).val().length) {
            $(this).addClass('has_cont');
        }
    }); 
                       
    if(submit){
    	var formData = new FormData($('#formuser')[0]);
        $.ajax({
            url : '/include/formuser.php',
            type : 'POST',
            processData: false,
            contentType: false,
            cache:false,
            data : formData,
            success : function (msg){
            	$('#resuser').html(msg);
            }
        });
        /*$('#resauto').load('/include/garag.php',$('#formauto').serializeArray());*/
    }
    return false;
});
   
$('.input').each(function( index ) {
    if ($(this).val().length) {
        $(this).addClass('has_cont');
    }
}); 

});
</script>



<h2 class="title common__title">Данные для покупок</h2>
<p class="common__desc">Используется для оформления заказов. Никогда и ни при каких обстоятельствах не передаётся третьим лицам.</p>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<p><?ShowError($arResult["strProfileError"]);?></p>
<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" autocomplete="off" class="common__form" id="formuser">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
<input type="hidden" name="LOGIN" maxlength="50" value="<?=$arResult["arUser"]["EMAIL"]?>">
					<div class="inputs common__inputs">
						<div class="input_wr w_ph">
							<input id="surname" name="LAST_NAME" type="text" class="input prop_lastname" value="<?=$arResult["arUser"]["LAST_NAME"]?>">
							<label class="ph" for="surname" class="">Фамилия</label>
							<p class="warning">неверная фамилия</p>
						</div>
						<div class="input_wr w_ph">
							<input id="name" name="NAME" type="text" class="input prop_name" value="<?=$arResult["arUser"]["NAME"]?>">
							<label class="ph" for="name" class="">Имя</label>
							<p class="warning">неверное имя</p>
						</div>
						<div class="input_wr w_ph">
							<input id="name2" name="SECOND_NAME" type="text" class="input prop_secondname" value="<?=$arResult["arUser"]["SECOND_NAME"]?>"> 
							<label class="ph" for="name2" class="">Отчество</label>
							<p class="warning">неверное отчество</p>
						</div>
						<div class="input_wr w_ph">
							<input id="date" name="PERSONAL_BIRTHDAY" type="text" class="input prop_data" value="<?=$arResult["arUser"]["PERSONAL_BIRTHDAY"]?>">
							<label class="ph" for="date" class="">Дата рождения</label>
							<p class="warning">неверная дата</p>
						</div>
						<div class="input_wr w_ph">
							<input id="mail" name="EMAIL" type="email" class="input prop_email" value="<?=$arResult["arUser"]["EMAIL"]?>">
							<label class="ph" for="mail" class="">E-mail</label>
							<p class="warning">неверный e-mail</p>
						</div>
						<div class="input_wr w_ph">
							<input id="tel" name="PERSONAL_PHONE" type="text" class="input prop_phone" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>">
							<label class="ph" for="tel" class="">Телефон</label>
							<p class="warning">неверный телефон</p>
						</div>
					</div>
					<div class="common__radios">
						<div class="common__radio_wr">
							<p class="common__radio_title">Настройка уведомлений</p>
							<div class="radio_wr">
								<label class="">
									<input type="hidden" value="0" name="UF_SUB">
									<input class="check_hid" type="checkbox" value="1" name="UF_SUB" <?if($arResult["arUser"]["UF_SUB"] == 1):?>checked="checked"<?endif?> >
									<div class="procedures_form__custom_input">
										<div class="procedures_form__custom_input_dot"></div>
									</div>
									<span>Уведомлять меня по почте об акциях и распродажах</span> 
								</label>
							</div>
							<p class="common__radio_title">Публичные данные</p>
							<div class="radio_wr">
								<label class="">
									<input type="hidden" value="0" name="UF_PUBLICK">
									<input class="check_hid" type="checkbox" value="1" name="UF_PUBLICK" <?if($arResult["arUser"]["UF_PUBLICK"] == 1):?>checked="checked"<?endif?>>
									<div class="procedures_form__custom_input">
										<div class="procedures_form__custom_input_dot"></div>
									</div>
									<span>Я не против публикации своих данных</span> 
								</label>
							</div>
						</div>
					</div>
					<div class="form__wr">
						<button class="btn common__btn" id="subuser">Сохранить изменения</button>
					</div>
					<input type="hidden" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">

</form>
