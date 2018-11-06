<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->createFrame()->begin("Загрузка навигации");
?>

<?if($arResult["NavPageCount"] > 1):?>

    <?if ($arResult["NavPageNomer"]+1 <= $arResult["nEndPage"]):?>
        <?
            $plus = $arResult["NavPageNomer"]+1;
            $url = $arResult["sUrlPathParams"] . "PAGEN_1=" . $plus
        ?>
		<a href="javascript:void(0);" class="btn news__btn load_more" data-url="<?=$url?>">Показать ещё</a>

    <?else:?>
		
    <?endif?>

<?endif?>

