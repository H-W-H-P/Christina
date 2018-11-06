<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>

<?$APPLICATION->IncludeComponent(
						"christina:iblock.element.add.consult",
						"",
						Array(
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
							"GROUPS" => array("2"),
							"IBLOCK_ID" => "6",
							"IBLOCK_TYPE" => "christina",
							"LEVEL_LAST" => "Y",
							"LIST_URL" => "",
							"MAX_FILE_SIZE" => "0",
							"MAX_LEVELS" => "100000",
							"MAX_USER_ENTRIES" => "100000",
							"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
							"PROPERTY_CODES" => array("145","PREVIEW_TEXT","NAME","146"),
							"PROPERTY_CODES_REQUIRED" => array(),
							"RESIZE_IMAGES" => "N",
							"SEF_MODE" => "N",
							"STATUS" => "ANY",
							"STATUS_NEW" => "N",
							"USER_MESSAGE_ADD" => "",
							"USER_MESSAGE_EDIT" => "",
							"USE_CAPTCHA" => "N"
						)
					);?>
<script>
	$(document).ready(function () {
		$('.consultyes').click(function () {
			$('html, body').addClass('answer');
			var _this = '.pop_up__title';
			regPopHeight(_this);
			return false;
		});
		$('.close_reg_form').click(function () {
			$('html, body').removeClass('registration pop_up call_back');
			return false;
		});
		function regPopHeight (_this) {
			var windHeight = $(window).height();
			// var popUpHeight = $('.registr_form').height();
			var popUpHeight = $(_this).closest('.registr_form').height();
			$('.registr_form').removeClass('center');
			if (popUpHeight >= windHeight) {
				$('body, html').height(popUpHeight);
			} else{
				$('body, html').height(windHeight);
				$('.registr_form').addClass('center');
			}
		}
});
	
</script>