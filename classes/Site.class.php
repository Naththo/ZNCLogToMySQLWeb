<?PHP

class Site {

	private $db;
	private $debug = true;
	private $config;

	public function __construct($db, $config)
	{
		$this->db = $db;
		$this->config = $config;
	}

	public function getTotal()
	{
		return $this->db->query("SELECT count(*) FROM chatlogs")->fetchColumn();
	}

	public function getRows($from = 0)
	{
		if ($from === false)
		{
			$sql = "SELECT * FROM chatlogs ORDER BY id DESC LIMIT {$this->config['total_per_page']}";
		} else {
			$from = $from - 1;
			$sql = "SELECT * FROM chatlogs ORDER BY id DESC LIMIT {$from},{$this->config['total_per_page']}";
		}
		$sth = $this->db->prepare($sql);
		$sth->bindParam(1, $from);
		$sth->execute();

		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}