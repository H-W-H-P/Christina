<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?$APPLICATION->IncludeComponent(
							"christina:main.register",
							"men",
							array(
								"COMPONENT_TEMPLATE" => "",
								"SHOW_FIELDS" => array(
									0 => "EMAIL",
									1 => "NAME",
									2 => "UF_SUB",
									3 => "UF_SMS",
									4 => "LAST_NAME",
									5 => "PERSONAL_PHONE",
									6 => "UF_MEN",
									7 => "UF_CLUB",
									8 => "UF_METRO",
									9 => "PERSONAL_CITY"
								),
								"REQUIRED_FIELDS" => array(
									0 => "EMAIL",
								),
								"AUTH" => "N",
								"USE_BACKURL" => "Y",
								"SUCCESS_PAGE" => "",
								"SET_TITLE" => "N",
								"USER_PROPERTY" => array(
								),
								"USER_PROPERTY_NAME" => ""
								),
								false
							);?>
							
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
	<script type="text/javascript">
	$('.input').each(function( index ) {
		if ($(this).val().length) {
			$(this).addClass('has_cont');
		}
	});	
	$('#example2').html('');
	var verifyCallback = function(response) {
	alert(response);
	};
	var widgetId1;
	var widgetId2;
	var onloadCallback = function() {
	    widgetId2 = grecaptcha.render(document.getElementById('example2'), {
	    	'sitekey' : '<?=RE_SITE_KEY?>'
	    });
	};
	$(document).ready(function () {
		$('.input_drop__toggle').click(function () {
			$(this).closest('.input_drop').toggleClass('open');
			return false;
		});

		$('.input_drop__item').click(function () {
			var dataCont = $(this).data('cont');
			$(this).closest('.input_drop').find('.input_drop__toggle').text(dataCont);
			$(this).closest('.input_drop').find('.input_drop__hdn').val(dataCont);
			$(this).closest('.input_drop').removeClass('open');
			return false;
		});
	});
	</script>