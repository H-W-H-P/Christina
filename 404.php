<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 Not Found");
?>

<section class="not_found max_width">
		<div class="not_found__wr">
			<h1 class="not_found__title title">Такой страницы нет</h1>
			<div class="not_found__text">Вы можете вернуться на <a class="laned" href="/">главную</a> <br> или изучить <a class="laned"  href="/shop/">наш ассортимент</a></div>
		</div>
	</section>
 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>