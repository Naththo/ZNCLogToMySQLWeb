<?PHP

require_once("common.php");

if (isset($_GET['page']))
{
	$current = $_GET['page'];
}

if (!isset($current))
{
	$current = 0;
}

$zncweb->tpl->assign("olderpage", ($zncweb->site->getTotal() < $CONFIG['site']['total_per_page'] ? false : $current + 1));
$zncweb->tpl->assign("newerpage", ($current == 0 ? false : $current -1));
$zncweb->tpl->assign("page_title", "Lol");
$zncweb->tpl->assign("data", $zncweb->site->getRows((!isset($current) || $current == 0 ? false : ($current * $CONFIG['site']['total_per_page']))));
$zncweb->tpl->display("logs.tpl");

?>