<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
				<?
				CModule::IncludeModule("iblock");
				$arFilter = array("IBLOCK_ID" => 15, "ACTIVE" => "Y", "PROPERTY_ITEM" => $_POST['id']);
				$res = CIBlockElement::GetList(Array("created_date" => "desc"), $arFilter, false, false, array("ID", "IBLOCK_ID", "NAME", "PROPERTY_USER", "PROPERTY_OCENKA", "PREVIEW_TEXT", "created_date"));
				while($ar_fields = $res->GetNext())
				{
					$reviews[] = $ar_fields;
				}
				?>
				
				<?foreach ($reviews as $rev):?>
				<div class="prod_comments__review review">
					<div class="review__top">
						<span class="review__name"><?=$rev['NAME']?></span>
						<div class="review__rait">
							<?$rev['PROPERTY_OCENKA_VALUE'] = round($rev['PROPERTY_OCENKA_VALUE'])?>
							<?for ($i = 1; $i <= $rev['PROPERTY_OCENKA_VALUE']; $i++):?>
							<img src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon.svg" alt="">
							<?endfor?>
							<?$bbb = 5-$rev['PROPERTY_OCENKA_VALUE']?>
							<?for ($i = 1; $i <= $bbb; $i++):?>
							<img width="8px" height="8px" src="<?=SITE_TEMPLATE_PATH?>/images/rat_icon_empty.svg" alt="">
							<?endfor?>
						</div>
					</div>
					<?
					
					
					global $USER;
					$filter = Array("ID" => $rev['PROPERTY_USER_VALUE']);
					$rsUsers = CUser::GetList(($by = "NAME"), ($order = "desc"), $filter);
					while ($arUser = $rsUsers->Fetch()) {
					  $birth = $arUser['PERSONAL_BIRTHDAY'];
					}
					$dd = explode(".", $birth);
					$datanew = $dd[2]."-".$dd[1]."-".$dd[0];
					?>
					<span class="review__info"><?=calculate_age($datanew)?> лет, Пермь</span>
					<span class="review__comment">
						<?=$rev['PREVIEW_TEXT']?>
					</span>
					<div class="review__rating">
						<span>Полезен отзыв?</span>
						<a href="#" class="review__rating_link" data-sign="-">-</a>
						<a href="#" class="review__rating_link" data-sign="+">+</a>
					</div>
				</div>
				<?endforeach;?>