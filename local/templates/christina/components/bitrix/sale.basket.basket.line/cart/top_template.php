<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>
<?if (!$compositeStub && $arParams['SHOW_AUTHOR'] == 'Y'):?>

		<?if ($USER->IsAuthorized()):
			$name = trim($USER->GetFullName());
			if (! $name)
				$name = trim($USER->GetLogin());
			if (strlen($name) > 15)
				$name = substr($name, 0, 12).'...';
			?>
			<a href="<?=$arParams['PATH_TO_PROFILE']?>"><?=htmlspecialcharsbx($name)?></a>
			&nbsp;
			<a href="?logout=yes"><?=GetMessage('TSB1_LOGOUT')?></a>
		<?else:
			$arParamsToDelete = array(
				"login",
				"login_form",
				"logout",
				"register",
				"forgot_password",
				"change_password",
				"confirm_registration",
				"confirm_code",
				"confirm_user_id",
				"logout_butt",
				"auth_service_id",
				"clear_cache"
			);

			$currentUrl = urlencode($APPLICATION->GetCurPageParam("", $arParamsToDelete));
			if ($arParams['AJAX'] == 'N')
			{
				?><script type="text/javascript"><?=$cartId?>.currentUrl = '<?=$currentUrl?>';</script><?
			}
			else
			{
				$currentUrl = '#CURRENT_URL#';
			}
			?>
			<a href="<?=$arParams['PATH_TO_AUTHORIZE']?>?login=yes&backurl=<?=$currentUrl; ?>"><?=GetMessage('TSB1_LOGIN')?></a>
			&nbsp;
			<a href="<?=$arParams['PATH_TO_REGISTER']?>?register=yes&backurl=<?=$currentUrl; ?>"><?=GetMessage('TSB1_REGISTER')?></a>
		<?endif?>

<?endif?>
		<?
		if (!$arResult["DISABLE_USE_BASKET"])
		{
			?>
						<img src="<?=SITE_TEMPLATE_PATH?>/images/<?=$arParams['IMG']?>" alt="">
						<?if(!empty($arParams['IMG2'])):?>
						<img src="<?=SITE_TEMPLATE_PATH?>/images/<?=$arParams['IMG2']?>" class="hov" alt="">
						<?endif?>
						<span class="basket_number">
							<?if ($arResult['NUM_PRODUCTS'] > 0 )
							{
								echo $arResult['NUM_PRODUCTS'];
							}
							else{
								echo "0";
							}
							?>
						</span>

			<?
		}
		if (!$compositeStub)
		{
			
			/*if ($arParams['SHOW_TOTAL_PRICE'] == 'Y'):?>
			<br>
			
				<?= GetMessage('TSB1_TOTAL_PRICE') ?>
				<? if ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y'):?>
					<strong><?= $arResult['TOTAL_PRICE'] ?></strong>
				<?endif ?>
			
			<?endif;*/?>
			<?
		}
		if ($arParams['SHOW_PERSONAL_LINK'] == 'Y'):?>
			<div style="padding-top: 4px;">
			<span class="icon_info"></span>
			<a href="<?=$arParams['PATH_TO_PERSONAL']?>"><?=GetMessage('TSB1_PERSONAL')?></a>
			</div>
		<?endif?>