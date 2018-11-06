<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

foreach ($arResult['ITEMS'] as $item){
	if(!empty($item['IBLOCK_SECTION_ID'])){
	$arResult['ITEMSNEW'][$item['IBLOCK_SECTION_ID']][] = $item;
	}
}