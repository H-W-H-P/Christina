<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<section class="smpl_news news_page">
		<div class="max_width">
			<div class="smpl_news_article__road">
				<a href="/news/" class="smpl_news_article__link lane_wr">Новости</a>
				<a href="/news/<?=$arResult['CODE']?>/" class="smpl_news_article__link"><?=$arResult['NAME']?></a>
			</div>
			<h1 class="news_page__title title">
				<?=$arResult['NAME']?>
			</h1>
			<p class="news_page__title_date"><?=$arResult['DISPLAY_ACTIVE_FROM']?></p>
		</div>
	</section>

	<section class="text text_news news_page">
		<div class="max_width">
			<div class="news_page__cont">
				<?=$arResult['DETAIL_TEXT']?>
				<?
				$url = "http://".$_SERVER['SERVER_NAME'].$arResult['DETAIL_PAGE_URL'];?>
				<ul class="text_news__socials news_padleft">
					<li>
						<a href="https://www.facebook.com/sharer/sharer.php?u=[<?=$url?>]" class="text_news__social_link">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/fb_b.svg" alt="" class="text_news__social_icon">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/footer_social1.svg" alt="" class="text_news__social_icon hov">
						</a>
					</li>
					<li>
						<a href="http://vk.com/share.php?url=[<?=$url?>]noparse=true" class="text_news__social_link">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/vk_b.svg" alt="" class="text_news__social_icon">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/footer_social2.svg" alt="" class="text_news__social_icon hov">
						</a>
					</li>
					<li>
						<a href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st._surl=[<?=$url?>]" class="text_news__social_link">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/ok_b.svg" alt="" class="text_news__social_icon">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/ok_w.svg" alt="" class="text_news__social_icon hov">
						</a>
					</li>
				</ul>

				<div class="news_slider news_page__slider">
					<?global $arrOther;
					$arrOther = array("!ID" => $arResult['ID'])?>
					<?$APPLICATION->IncludeComponent(
						"bitrix:news.list", 
						"news-other", 
						array(
							"ACTIVE_DATE_FORMAT" => "d.m.Y",
							"ADD_SECTIONS_CHAIN" => "Y",
							"AJAX_MODE" => "N",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "Y",
							"CACHE_FILTER" => "N",
							"CACHE_GROUPS" => "Y",
							"CACHE_TIME" => "36000000",
							"CACHE_TYPE" => "N",
							"CHECK_DATES" => "Y",
							"DETAIL_URL" => "",
							"DISPLAY_BOTTOM_PAGER" => "Y",
							"DISPLAY_DATE" => "Y",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "Y",
							"DISPLAY_PREVIEW_TEXT" => "Y",
							"DISPLAY_TOP_PAGER" => "N",
							"FIELD_CODE" => array(
								0 => "",
								1 => "",
							),
							"FILTER_NAME" => "arrOther",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"IBLOCK_ID" => "5",
							"IBLOCK_TYPE" => "christina",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
							"INCLUDE_SUBSECTIONS" => "Y",
							"MESSAGE_404" => "",
							"NEWS_COUNT" => "20",
							"PAGER_BASE_LINK_ENABLE" => "N",
							"PAGER_DESC_NUMBERING" => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL" => "N",
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_TEMPLATE" => "ajax",
							"PAGER_TITLE" => "Новости",
							"PARENT_SECTION" => "",
							"PARENT_SECTION_CODE" => "",
							"PREVIEW_TRUNCATE_LEN" => "",
							"PROPERTY_CODE" => array(
								0 => "",
								1 => "",
							),
							"SET_BROWSER_TITLE" => "Y",
							"SET_LAST_MODIFIED" => "N",
							"SET_META_DESCRIPTION" => "Y",
							"SET_META_KEYWORDS" => "Y",
							"SET_STATUS_404" => "N",
							"SET_TITLE" => "Y",
							"SHOW_404" => "N",
							"SORT_BY1" => "ACTIVE_FROM",
							"SORT_BY2" => "SORT",
							"SORT_ORDER1" => "DESC",
							"SORT_ORDER2" => "ASC",
							"STRICT_SECTION_CHECK" => "N",
							"COMPONENT_TEMPLATE" => "articles-all"
						),
						false
					);?>

				</div>

			</div>
		</div>
	</section>