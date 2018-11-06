<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="max_width nav">
				

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="nav__item">
			<a class="nav__link active <?if($arItem["TEXT"] == 'у меня есть промокод'):?>promo_link<?endif?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
		</li>
	<?else:?>
		<li class="nav__item">
			<a class="nav__link <?if($arItem["TEXT"] == 'у меня есть промокод'):?>promo_link<?endif?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
		</li>
	<?endif?>
	
<?endforeach?>

</ul>
<?endif?>