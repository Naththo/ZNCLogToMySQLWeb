<?PHP

require_once("common.php");

if (!isset($_GET['step']))
{
	$tpl->assign("step", 0);
	$_SESSION['zncweb']['install']['install_step'] = 0;
	$tpl->display("install/landing_content.tpl");
}
else
{
	if (!isset($_SESSION['zncweb']['install']['install_step']))
	{
		die("Not set");
	} elseif ($_SESSION['zncweb']['install']['install_step'] + 1 != $_GET['step']) {
		die("On: " . $_GET['step'] . ", last registered: " . $_SESSION['zncweb']['install']['install_step']);
	}

	$tpl->assign("step", $_GET['step']);

	switch ($_GET['step'])
	{
		case 1:
			$tpl->display("install/step_1.tpl");
			break;
		case 2:
			$tpl->display("install/step_2.tpl");
			break;
		case 3:
			$tpl->display("install/step_3.tpl");
			break;
		case 4:
			$tpl->display("install/step_4.tpl");
			break;
		case 5:
			$tpl->display("install/complete.tpl");
			$install->complete();
			break;
		default:
			header("Location: index.php");
	}
}
?>