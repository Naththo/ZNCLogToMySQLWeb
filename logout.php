<?PHP

require_once("common.php");

unset($_SESSION['zncweb']['user']);

header("Location: index.php");

?>