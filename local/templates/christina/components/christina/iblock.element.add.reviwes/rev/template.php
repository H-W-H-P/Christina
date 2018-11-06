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
$('#subrev').click(function(){
    var submit = true; 
    var name = $('#formrev .prop_name');
    var text = $('#formrev .prop_text');
    var email = $('#formrev .prop_email');

    
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
    
    if(text.val()==''){
    	text.parent().addClass('error'); 
    	text.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	text.parent().removeClass('error');
    	text.parent().removeClass('wrong');
    }
   

                       
    if(submit){
    	var formData = new FormData($('#formrev')[0]);
        $.ajax({
            url : '/include/reviews.php',
            type : 'POST',
            processData: false,
            contentType: false,
            cache:false,
            data : formData,
            success : function (msg){
            	$('#resrev').html(msg);
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
	<p style="text-align: center;">Отзыв успешно отправлен.</p>
<?else:?>
<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" id="formrev">
	<?=bitrix_sessid_post()?>
	<?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>
	<?global $USER;?>
	<input type="hidden" name="PROPERTY[120][0]" value="<?=$arParams["ITEM_ID"]?>" />
	<input type="hidden" name="PROPERTY[121][0]" value="<?=$USER->GetID()?>" />
						<div class="registr_form__inputs">
							<div class="input_wr w_ph">
								<input id="reg__name" name="PROPERTY[NAME][0]" type="text" class="input prop_name" value="<?=$USER->GetFullName()?>">
								<label class="ph" for="reg__name" class="">ФИО</label>
								<p class="warning">неверное ФИО</p>
							</div>
							<div class="input_wr w_ph">
								<input id="reg__mail" name="PROPERTY[118][0]" type="text" class="input prop_email" value="<?=$USER->GetEmail()?>">
								<label class="ph" for="reg__mail" class="">E-mail</label>
								<p class="warning">неверный e-mail</p>
							</div>
							<div class="input_wr w_ph textarea_wr">
								<textarea name="PROPERTY[PREVIEW_TEXT][0]" class="input textarea prop_text" id="mess" cols="30" rows="10"
								value="<?=$_POST['PROPERTY']['PREVIEW_TEXT']?>"
								></textarea>
								<label class="ph" for="mess" class="">Отзыв</label>
								<p class="warning">введите Отзыв</p>
							</div>
							<div class="input_wr drag_inp w_ph">
								<!-- <input id="reg__mail" name="mail" type="text" class="input"> -->
								<input type="number" class="hid" name="PROPERTY[119][0]">
								<!-- <label class="ph" for="reg__mail" class="">Ваша оценка препарата</label> -->
								<p>Ваша оценка препарата <span class="drag_inp__mark">4</span></p>
								<div class="drag_wr mark">
									<a href="#" class="mark__drag"></a>
								</div>
								<p class="warning">поставьте оценку</p>
							</div>
						</div>
						<p>Защита от спама</p>
						<div id="example1" style="margin-bottom: 19px;"></div>
						<button class="btn registr_form__reg_btn" id="subrev">Отправить</button>
						<input type="hidden" name="iblock_submit_rev" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />
					
</form>
<?endif?>