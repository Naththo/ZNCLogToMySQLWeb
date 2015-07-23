<?PHP

class Install {

	private $db;

	public function checkWriteable()
	{
		$tocheck = array("../inc", "../tpl/templates_compiled", "../install");
		foreach ($tocheck as $check)
		{
			if (!is_writable($check))
			{
				$errors[] = $check;
			}
		}
		
		if (isset($errors))
		{
			return array("errors" => $errors);
		} else {
			$_SESSION['zncweb']['install']['install_step']++;
			return array("success" => "success");
		}
	}

	public function testDBConnection($credentials)
	{
		if (filter_var($credentials['serverhost'], FILTER_VALIDATE_IP))
		{
			if (!gethostbyaddr($credentials['serverhost']))
			{
				return array("errors" => array("Could not resolve server host"));
			}
		} else {
			if (gethostbyname($credentials['serverhost']) == $credentials['serverhost'])
			{
				return array("errors" => array("Could not resolve server host"));
			}			
		}

		try {
			$dbh = new PDO("mysql:host={$credentials['serverhost']};dbname={$credentials['dbname']}", $credentials['username'], $credentials['password']);
		} catch (PDOException $e) {
			return array("errors" => array($e->getMessage()));
		}
		$_SESSION['zncweb']['install']['install_step']++;
		$this->createConfigFile($credentials);
		return array("success" => "success");
	}

	private function createConfigFile($credentials)
	{
		$f = fopen("../inc/config.php", "w");
		fwrite($f, "<?PHP\n\n");
		foreach ($credentials as $credentialname => $credential)
		{
			if ($credentialname == "serverhost")
			{
				$credentialname = "host";
			}
			fwrite($f, '$CONFIG[\'database\'][\''. $credentialname .'\'] = "' . $credential .'";' . "\n");
		}
		fwrite($f, "\n" . '$CONFIG[\'site\'][\'total_per_page\'] = 50;' . "\n");
		fwrite($f, "\n?>");
		fclose($f);
	}

	public function getDBInstance()
	{
		if ($this->db)
		{
			return;
		}
		require_once("../inc/config.php");
		try {
			$this->db = new PDO("mysql:host={$CONFIG['database']['host']};dbname={$CONFIG['database']['dbname']}", $CONFIG['database']['username'], $CONFIG['database']['password']);
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function createTables()
	{
		$this->getDBInstance();
		require_once("tables.php");
		$error = false;
		foreach ($tables as $table)
		{
			if (!$this->db->query($table))
			{
				$error = true;
				break;
			}
		}

		if (!$error)
		{
			$_SESSION['zncweb']['install']['install_step']++;
			return array("success" => "success");
		}

		return array("errors" => array("Unable to create the table"));
	}

	function createUser($credentials)
	{
		$this->getDBInstance();
		require_once("../classes/User.class.php");
		$user = new User();

		$user->createUser($credentials['username'], $credentials['password'], $credentials['emailaddr'], $this->db);
		$_SESSION['zncweb']['install']['install_step']++;
		return array("success" => "success");
	}

	function complete()
	{
		$f = fopen("lock", "w");
		fclose($f);
		unset($_SESSION['zncweb']['install']);
	}
}

?>