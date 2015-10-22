<?PHP

require_once("common.php");
define("PAGE_TITLE", "Logs");
if (isset($_GET['page']))
{
	$current = $_GET['page'];
}

if (!isset($current))
{
	$current = 0;
}

$zncweb->tpl->assign("olderpage", (($zncweb->site->getTotal() < $CONFIG['site']['total_per_page'] || $zncweb->site->getTotal() / $CONFIG['site']['total_per_page'] < ($current+1)) ? false : $current + 1));
$zncweb->tpl->assign("newerpage", ($current == 0 ? false : $current -1));
$zncweb->tpl->assign("page_title", ($current > 0) ? "Logs | " . $current : "Logs");
$zncweb->tpl->assign("data", $zncweb->site->getRows((!isset($current) || $current == 0 ? false : ($current * $CONFIG['site']['total_per_page']))));
$zncweb->tpl->display("logs.tpl");

?>