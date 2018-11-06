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
$('#subcons').click(function(){
    var submit = true; 
    var name = $('#formcons .prop_name');


    if(name.val()==''){
    	name.parent().addClass('error'); 
    	name.parent().addClass('wrong');
        submit = false; 
    }
    else{
    	name.parent().removeClass('error');
    	name.parent().removeClass('wrong');
    }
                      
    if(submit){
    	var formData = new FormData($('#formcons')[0]);
        $.ajax({
            url : '/include/consult.php',
            type : 'POST',
            processData: false,
            contentType: false,
            cache:false,
            data : formData,
            success : function (msg){
            	$('#rescons').html(msg);
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
	<script>
	$(document).ready(function () {

		
		$( ".consultyes" ).trigger( "click" );
	});
	
	</script>
	
<?else:?>
<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" id="formcons" class="common__form consult_write_form">
	<h1 class="consult_form__title title">Задать вопрос</h1>
	<?=bitrix_sessid_post()?>
	<?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>
	<?GLOBAL $USER?>
	<input name="PROPERTY[NAME][0]" type="hidden" class="input " value="<?=$USER->GetFullName()?>">
	<input type="hidden" name="PROPERTY[146][0]" value="<?=$USER->GetID()?>">
	
				<div class="inputs common__inputs">
					<div class="input_wr textarea_wr w_ph">
						<textarea id="surname" name="PROPERTY[PREVIEW_TEXT][0]" type="text" class="input textarea prop_name" valeu="<?=$_POST['PROPERTY']['PREVIEW_TEXT'][0]?>"></textarea>
						<label class="ph" for="surname" class="">Текст вопроса</label>
						<p class="warning">введите вопрос</p>
					</div>
				</div>
				<div class="common__radios">
					<div class="common__radio_wr">
						<div class="radio_wr">
							<label class="">
								<input class="check_hid" name="PROPERTY[145][0]" type="checkbox" value="135" checked="checked">
								<div class="procedures_form__custom_input">
									<div class="procedures_form__custom_input_dot consult_write_form__check">
										<img src="<?=SITE_TEMPLATE_PATH?>/images/check.svg" alt="">
									</div>
								</div>
								<span>Я не против публикации своего вопроса на сайте</span> 
							</label>
						</div>
					</div>
				</div>
				<?global $USER;
				if (!$USER->IsAuthorized()):?>
				<p class="consult_write_form-dis">Чтобы задать вопрос нужно <a href="" class="consult_write_form__link laned">авторизоваться</a> или <a href="" class="consult_write_form__link laned">зарегистрироваться</a></p>
				<?endif?>
				<input type="hidden" name="iblock_submit_cons" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />	
				<div class="form__wr">
					<button id="subcons" class="btn common__btn consult_write_form__btn" <?if (!$USER->IsAuthorized()):?>disabled<?endif?>>Отправить вопрос</button>
				</div>					
	
					
</form>
<?endif?>