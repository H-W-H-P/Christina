<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);
?>
<style>
.error{
	border-bottom: 1px solid red;
}
</style>
<script>
$(document).ready(function(){	
$('#subpar').click(function(){
    var submit = true; 
    var name = $('#formpar .prop_name');
    var phone = $('#formpar .prop_phone');
    var email = $('#formpar .prop_email');

    
    if(name.val()==''){
    	name.parent().addClass('error'); 
    	name.parent().addClass('wrong');
        submit = false; 
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
    
    if(phone.val()==''){
    	phone.parent().addClass('error'); 
    	phone.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	phone.parent().removeClass('error');
    	phone.parent().removeClass('wrong');
    }
   

                       
    if(submit){
    	var formData = new FormData($('#formpar')[0]);
        $.ajax({
            url : '/include/partner.php',
            type : 'POST',
            processData: false,
            contentType: false,
            cache:false,
            data : formData,
            success : function (msg){
            	$('#respar').html(msg);
            }
        });
        /*$('#resauto').load('/include/garag.php',$('#formauto').serializeArray());*/
    }
    return false;
});
});
</script>
<?
if (!empty($arResult["ERRORS"])):?>
	<?ShowError(implode("<br />", $arResult["ERRORS"]))?>
<?endif;
if (strlen($arResult["MESSAGE"]) > 0):?>
	<h2 class="title partner_form__title">Оставить заявку</h2>
	<p style="text-align: center;">Заявка успешно отправлена.</p>
<?else:?>
<h2 class="title partner_form__title">Оставить заявку</h2>
<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" class="common__form" id="formpar">
	<?=bitrix_sessid_post()?>
	<?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>
	<div class="inputs common__inputs">
					<div class="input_wr w_ph">
						<input id="surname" name="PROPERTY[NAME][0]" type="text" class="input prop_name">
						<label class="ph" for="surname" class="">Фио</label>
						<p class="warning">неверное Фио</p>
					</div>
					<div class="input_wr w_ph">
						<input id="mail" name="PROPERTY[114][0]" type="email" class="input prop_email">
						<label class="ph" for="mail" class="">E-mail</label>
						<p class="warning">неверный e-mail</p>
					</div>
					<div class="input_wr w_ph">
						<input id="tel" name="PROPERTY[115][0]" type="tel" class="input prop_phone">
						<label class="ph" for="tel" class="">Телефон</label>
						<p class="warning">неверный телефон</p>
					</div>
				</div>
				<button class="btn partner_form__btn" id="subpar">Отправить</button>
				
	<input type="hidden" name="iblock_submit_par" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />
					
</form>
<?endif?>