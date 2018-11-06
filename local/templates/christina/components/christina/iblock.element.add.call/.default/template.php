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
$('#subcall').click(function(){
    var submit = true; 
    var name = $('#formcall .prop_name');
    var phone = $('#formcall .prop_phone');
    var city = $('#formcall .prop_city');

    
    if(city.val()==''){
    	city.parent().addClass('error'); 
    	city.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	city.parent().removeClass('error');
    	city.parent().removeClass('wrong');
    }

    if(name.val()==''){
    	name.parent().addClass('error'); 
    	name.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	name.parent().removeClass('error');
    	name.parent().removeClass('wrong');
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
    	var formData = new FormData($('#formcall')[0]);
        $.ajax({
            url : '/include/call.php',
            type : 'POST',
            processData: false,
            contentType: false,
            cache:false,
            data : formData,
            success : function (msg){
            	$('#rescall').html(msg);
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
	<p style="text-align: center;">Заявка успешно отправлена.</p>
<?else:?>
<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" id="formcall">
	<?=bitrix_sessid_post()?>
	<?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>
						<div class="registr_form__inputs">
							<div class="input_wr w_ph">
								<input id="lock_name" name="PROPERTY[NAME][0]" type="text" class="input prop_name" value="<?=$_POST['PROPERTY']['NAME'][0]?>">
								<label class="ph" for="lock_name" class="">ФИО</label>
								<p class="warning">неверное ФИО</p>
							</div>
							<div class="input_wr w_ph">
								<input id="lock_tel" name="PROPERTY[136][0]" type="text" class="input prop_phone" value="<?=$_POST['PROPERTY'][136][0]?>">
								<label class="ph" for="lock_tel" class="">Телефон</label>
								<p class="warning">неверный телефон</p>
							</div>
							<div class="input_wr w_ph">
								<input id="lock_text" name="PROPERTY[137][0]" type="text" class="input prop_city" value="<?=$_POST['PROPERTY'][137][0]?>">
								<label class="ph" for="lock_text" class="">Страна и город</label>
								<p class="warning">введите Страну и город</p>
							</div>
						</div>
						<p>Защита от спама</p>
						<div id="example3" style="padding-bottom: 20px;"></div>
						<button class="btn registr_form__reg_btn" id="subcall">Заказать звонок</button>
						<input type="hidden" name="iblock_submit_call" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />		
	
					
</form>
<?endif?>