<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?$APPLICATION->IncludeComponent(
							"christina:main.register",
							"",
							array(
								"COMPONENT_TEMPLATE" => "",
								"SHOW_FIELDS" => array(
									0 => "EMAIL",
									1 => "NAME",
									2 => "UF_SUB",
									3 => "UF_SMS",
									4 => "LAST_NAME",
									5 => "PERSONAL_PHONE",
									6 => "UF_MEN"
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
	$('#example1').html('');
	var verifyCallback = function(response) {
	alert(response);
	};
	var widgetId1;
	var onloadCallback = function() {
	    widgetId1 = grecaptcha.render(document.getElementById('example1'), {
	        'sitekey' : '<?=RE_SITE_KEY?>'
	    });
	};
</script>