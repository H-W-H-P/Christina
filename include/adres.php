<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?
CModule::IncludeModule("iblock");
$el = new CIBlockElement;

$PROP = array();
$PROP[131] = $_POST['number'];
$PROP[132] = $_POST['city'];
$PROP[133] = $_POST['adres'];
$PROP[134] = $USER->GetID();

$arLoadProductArray = Array(
  "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
  "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
  "IBLOCK_ID"      => 17,
  "PROPERTY_VALUES"=> $PROP,
  "NAME"           => $_POST['name'],
  "ACTIVE"         => "Y",            // активен
  );

if($PRODUCT_ID = $el->Add($arLoadProductArray))
  echo "Адрес успешно добавлен";
else
  echo "<p style='color: red'>".$el->LAST_ERROR."</p>";
?>
<script>
				$( document ).ready(function() {
					$('#subadres').click(function(){
					    var submit = true; 
					    var pass0 = $('#form-adres .index');
					    var pass1 = $('#form-adres .city');
					    var pass2 = $('#form-adres .adres');
					    
					    if(pass0.val()==''){
					    	pass0.parent().addClass('error'); 
					    	pass0.parent().addClass('wrong');
					        submit = false; 
					    }
					   	else{
					    	pass0.parent().removeClass('error');
					    	pass0.parent().removeClass('wrong');
					    } 
		
					    if(pass1.val()==''){
					    	pass1.parent().addClass('error'); 
					    	pass1.parent().addClass('wrong');
					        submit = false; 
					    }
					   	else{
					    	pass1.removeClass('error');
					    	pass1.parent().removeClass('wrong');
					    }
					    if(pass2.val()==''){
							pass2.parent().addClass('error'); 
							pass2.parent().addClass('wrong');
					        submit = false; 
					    }
						else{
							pass2.parent().removeClass('error');
							pass2.parent().removeClass('wrong');
					    }
					                
					    if(submit){
					        $('#res-adres').load('/include/adres.php',$('#form-adres').serializeArray());
					    }
					    return false;
					});
				});
				</script>
				<h2 class="title common__title">Добавить новый адрес</h2>
<form id="form-adres">
					<input type="hidden" name="name" value="<?=$USER->GetFullName()?>" >
					<div class="inputs common__inputs adress__inputs">
						<div class="input_wr w_ph">
							<input data-form="#index" id="index" name="number" type="text" class="input index">
							<label class="ph" for="index" class="">Индекс</label>
							<p class="warning">неверный индекс</p>
						</div>
						<div class="input_wr w_ph">
							<input data-form="#city" id="city" name="city" type="text" class="input city">
							<label class="ph" for="city" class="">Город</label>
							<p class="warning">неверный город</p>
						</div>
						<div class="input_wr w_ph">
							<input data-form="#adress" id="adress" name="adres" type="text" class="input adres">
							<label class="ph" for="adress" class="">Адрес</label>
							<p class="warning">неверный Адрес</p>
						</div>
					</div>
					<a href="#" class="btn adress__btn" id="subadres">Добавить</a>
				</form>
<script>

	$.ajax({
		type: "POST",
		url: "/include/listadres.php",
		success: function(html){
			$('#listadres').html(html);
		}
	});

</script>