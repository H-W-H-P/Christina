<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;


CJSCore::Init(array('clipboard', 'fx'));

Loc::loadMessages(__FILE__);

if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach($arResult['ERRORS']['FATAL'] as $error)
	{
		ShowError($error);
	}
	$component = $this->__component;
	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]))
	{
		$APPLICATION->AuthForm('', false, false, 'N', false);
	}

}
?>
<?if(!empty($arResult['ORDERS'] )):?>
				<h2 class="title common__title">Мои заказы</h2>
				<table class="active__table table">
					<tbody>
						<tr class="table__title">
							<td class="">
								Дата
							</td>
							<td class="">
								Номер заказа
							</td>
							<td class="">
								Сумма
							</td>
							<td class="">
								Начислено бонусов
							</td>
							<td class="">
								Статус
							</td>
						</tr>
						<?foreach ($arResult['ORDERS'] as $order):?>
							<tr>
								<td class="table-op">
									<?=$order['ORDER']['DATE_INSERT']->format($arParams['ACTIVE_DATE_FORMAT'])?>
								</td>
								<td class="table-bold">
									№ <?=$order['ORDER']['ID']?>
								</td>
								<td class="table-bold">
									<?=number_format($order['ORDER']['PRICE'], 0, ',', ' ');?> ₽
								</td>
								<td class="table-op">
									
								</td>
								<td class="table-op">
									<?=$arResult['INFO']['STATUS'][$order['ORDER']['STATUS_ID']]['NAME']?>
									
								</td>
							</tr>
						<?endforeach;?>
					</tbody>
				</table>
				<table class="active__table_mob table">
					<tbody>
						<?foreach ($arResult['ORDERS'] as $order):?>
							<tr>
								<td class="">
									<p class="table-bold">№ <?=$order['ORDER']['ID']?></p>
									<p><?=$order['ORDER']['DATE_INSERT']->format($arParams['ACTIVE_DATE_FORMAT'])?></p>
								</td>
								<td class="">
									<p class="table-bold"><?=number_format($order['ORDER']['PRICE'], 0, ',', ' ');?> ₽</p>
									<p></p>
								</td>
								<td class="">
									<p>Статус</p>
									<p><?=$arResult['INFO']['STATUS'][$order['ORDER']['STATUS_ID']]['NAME']?></p>
								</td>
							</tr>
						<?endforeach;?>
					</tbody>
				</table>
<?endif?>