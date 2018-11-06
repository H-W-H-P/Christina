<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()

$strReturn .= '<ul class="breadcrumbs--list">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	$nextRef = ($index < $itemSize-2 && $arResult[$index+1]["LINK"] <> ""? ' itemref="bx_breadcrumb_'.($index+1).'"' : '');
	$child = ($index > 0? ' itemprop="child"' : '');
	//$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		if($index !== 0 && $index !== 1){
			$strReturn .= '
			<li class="breadcrumbs--list-item is-hidden '.$index.'" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"'.$child.$nextRef.'>
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url" class="breadcrumbs--link">
					'.$title.'
				</a>
			</li>';
			
		}
		elseif($itemSize == $index || ($itemSize-1) == $index){
			$strReturn .= '
			<li class="breadcrumbs--list-item is-hidden '.$index.'" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"'.$child.$nextRef.'>
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url" class="breadcrumbs--link">
					'.$title.'
				</a>
			</li>';
		}
		else{
		$strReturn .= '
			<li class="breadcrumbs--list-item " itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"'.$child.$nextRef.'>
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url" class="breadcrumbs--link">
					'.$title.'
				</a>
			</li>';
		}
		if($index == 1){
				$strReturn .= '<li class="breadcrumbs--list-item">
										
									<a href="#" class="breadcrumbs--link js-bc-show-more">..</a>
 									</li>';
			}
	}
	else
	{
		$strReturn .= '
			<li class="breadcrumbs--list-item">
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'" class="breadcrumbs--link">'.$title.'</a>
			</li>';
	}
}

$strReturn .= '</ul>';

return $strReturn;
