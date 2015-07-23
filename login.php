<?PHP
define("LOGIN_PAGE", true);

require_once("common.php");

if (isset($_SESSION['zncweb']['user']))
{
	header("Location: logs.php");
}


if (isset($_POST['login-submit']))
{
	$verify = $zncweb->user->verifyLogin($_POST['username'], $_POST['password']);
	if ($verify)
	{
		$_SESSION['zncweb']['user'] = array();
		$_SESSION['zncweb']['user']['username'] = $verify['username'];
		$_SESSION['zncweb']['user']['user_agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		header("Location: logs.php");
	}
}

$zncweb->tpl->assign("page_title", "Login");
$zncweb->tpl->display("login.tpl");