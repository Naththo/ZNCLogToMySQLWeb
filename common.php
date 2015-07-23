<?PHP
session_start();

if (!isset($_SESSION['zncweb']))
{
	$_SESSION['zncweb'] = array();
}

require_once("classes/3rdparty/smarty/libs/Smarty.class.php");

$zncweb = new StdClass();
$zncweb->tpl = new Smarty();
$zncweb->tpl->setTemplateDir("./tpl/templates/");
$zncweb->tpl->setCompileDir("./tpl/templates_compiled");
$zncweb->tpl->setCacheDir("./tpl/templates_cached");

if (!file_exists("inc/config.php"))
{
	$zncweb->tpl->assign("page_title", "Lol");
	$zncweb->tpl->display("head.tpl");
}

require_once("./inc/config.php");
require_once("./classes/Database.class.php");
$zncweb->database = new Database($CONFIG['database']);

require_once("./classes/Site.class.php");
$zncweb->site = new Site($zncweb->database->getDBInstance(), $CONFIG['site']);

require_once("./classes/User.class.php");
$zncweb->user = new User();


if (!isset($_SESSION['zncweb']['user']) && !defined("LOGIN_PAGE"))
{
	header("Location: login.php");
	die("wat");
}

if ((isset($_SESSION['zncweb']['user']['user_agent'])) && $_SESSION['zncweb']['user']['user_agent'] !== md5($_SERVER['HTTP_USER_AGENT']))
{
	unset($_SESSION['zncweb']['user']);
	if (!defined("LOGIN_PAGE"))
		header("Location: login.php");
	die();
}


?>