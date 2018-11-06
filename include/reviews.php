<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?$APPLICATION->IncludeComponent(
						"christina:iblock.element.add.reviwes", 
						"rev", 
						array(
							"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
							"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
							"CUSTOM_TITLE_DETAIL_PICTURE" => "",
							"CUSTOM_TITLE_DETAIL_TEXT" => "",
							"CUSTOM_TITLE_IBLOCK_SECTION" => "",
							"CUSTOM_TITLE_NAME" => "",
							"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
							"CUSTOM_TITLE_PREVIEW_TEXT" => "",
							"CUSTOM_TITLE_TAGS" => "",
							"DEFAULT_INPUT_SIZE" => "30",
							"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
							"ELEMENT_ASSOC" => "CREATED_BY",
							"GROUPS" => array(
								0 => "2",
							),
							"IBLOCK_ID" => "15",
							"IBLOCK_TYPE" => "christina",
							"LEVEL_LAST" => "Y",
							"LIST_URL" => "",
							"MAX_FILE_SIZE" => "0",
							"MAX_LEVELS" => "100000",
							"MAX_USER_ENTRIES" => "100000",
							"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
							"PROPERTY_CODES" => array(
								0 => "118",
								1 => "119",
								2 => "121",
								3 => "NAME",
								4 => "PREVIEW_TEXT",
								5 => "120",
							),
							"PROPERTY_CODES_REQUIRED" => array(
							),
							"RESIZE_IMAGES" => "N",
							"SEF_MODE" => "N",
							"STATUS" => "ANY",
							"STATUS_NEW" => "N",
							"USER_MESSAGE_ADD" => "",
							"USER_MESSAGE_EDIT" => "",
							"USE_CAPTCHA" => "N",
							"COMPONENT_TEMPLATE" => ".default",
							"ITEM_ID" => $_POST['PROPERTY'][120][0]
						),
						false
					);?> 
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
	<script type="text/javascript">
	if($( ".mark__drag" ).length) {
		$( ".mark__drag" ).draggable({
		  addClasses: false,
		  axis: "x",
		  containment: ".drag_wr",
		  drag: function( event, ui ) {
		  	var tenh = $('.drag_wr').width()/10;
		  	$('.drag_inp__mark').text(Math.round(ui.position.left/tenh)/2);
		  	$('.drag_inp .hid').val(Math.round(ui.position.left/tenh)/2);
		  }
		});
	}
	
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