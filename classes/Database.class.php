<?PHP

class Database {

	private $connected;
	private static $db;

	public function __construct($dbinfo = "")
	{
		if (!empty($dbinfo) && !$this->connected)
		{
			$this->connect($dbinfo);
		}
	}

	private function connect($dbinfo)
	{
		try {
			self::$db = new PDO("mysql:host={$dbinfo['host']};dbname={$dbinfo['dbname']}", $dbinfo['username'], $dbinfo['password']);
		} catch (PDOException $e)
		{
			throw new Exception($e->getMessage());
		}
	}

	public function getDBInstance()
	{
		return self::$db;
	}
}