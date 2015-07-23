<?PHP

require_once("common.php");

if (isset($_POST['step']))
{
	$returndata = "";
	switch($_POST['step'])
	{
		case 1:
			$returndata = $install->checkWriteable();
			break;
		case 2:
			$returndata = $install->testDBConnection($_POST['credentials']);
			break;
		case 3:
			$returndata = $install->createTables();
			break;
		case 4:
			$returndata = $install->createUser($_POST['credentials']);
			break;
		default:
			break;
	}
	die(json_encode($returndata, JSON_UNESCAPED_SLASHES));
	header("Content-Type: application/json", true);
}
?>