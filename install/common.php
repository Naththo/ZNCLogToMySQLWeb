<?PHP
define("IN_INSTALL", true);
session_start();

if (file_exists("lock"))
{
	$tpl->display("install/complete.tpl");
	die();
}

require_once("../classes/3rdparty/smarty/libs/Smarty.class.php");

$tpl = new Smarty();
$tpl->setTemplateDir("../tpl/templates/");
$tpl->setCompileDir("../tpl/templates_compiled");
$tpl->setCacheDir("../tpl/templates_cached");
$tpl->assign("install", true);

require_once("../classes/Database.class.php");
require_once("classes/Install.class.php");
$install = new Install();

if (!isset($_SESSION['zncweb']['install']))
	$_SESSION['zncweb']['install'] = array();

?>