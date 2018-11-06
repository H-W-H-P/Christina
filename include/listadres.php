<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?
CModule::IncludeModule("iblock");
				$arFilter = array("IBLOCK_ID" => 17, "ACTIVE" => "Y", "PROPERTY_USER" => $USER->GetID());
				$res = CIBlockElement::GetList(Array("timestamp_x" => "desc"), $arFilter, false, false, array("NAME", "ID", 
				"PROPERTY_INDEX", 
				"PROPERTY_CITY",
				"PROPERTY_ADRES",
				"PROPERTY_USER",));
				while($ar_fields = $res->GetNext())
				{
				     $adres[] = $ar_fields;
				}
				?>
				<h7 class="common__title_low">Вы указали <?=count($adres)?> адреса</h7>
				<table class="adress__table table">
					<tbody>
						<?foreach ($adres as $val):?>
						<tr>
							<td class="table__left">
								<p data-form="#city" class="table__bold"><?=$val['PROPERTY_CITY_VALUE']?></p>
								<p data-form="#index" class="table__op"><?=$val['PROPERTY_INDEX_VALUE']?></p>
								<p data-form="#adress"><?=$val['PROPERTY_ADRES_VALUE']?></p>
							</td>
							<td class="table__center">
								<a href="#" class="table__link w_arr" onclick="editadres('<?=$val['ID']?>'); return false;">Изменить</a>
							</td>
							<td class="table__right">
								<a href="?deladres=<?=$val['ID']?>" class="table__remove">
									<span></span>
									<span></span>
								</a>
								<a href="?deladres=<?=$val['ID']?>" class="table__remove_mob table__remove w_arr">Удалить</a>
							</td>
						</tr>
						<?endforeach;?>
					</tbody>
				</table>