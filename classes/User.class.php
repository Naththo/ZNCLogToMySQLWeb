<?PHP

class User {

	private $saltlength = 25;
	public function verifyLogin($user, $password)
	{
		$db = Database::getDBInstance();

		$query = "SELECT username, user_key, password FROM users WHERE username = ? LIMIT 1";
		$sth = $db->prepare($query);
		$sth->bindParam(1, $user);
		
		$sth->execute();

		$res = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		if (!empty($res))
		{
			if ($res[0]["password"] == password_hash($password, PASSWORD_BCRYPT, array("salt" => $res[0]["user_key"])))
			{
				$query = "UPDATE users SET last_login = ? WHERE username = ?";
				$sth = $db->prepare($query);
				$sth->bindParam(1, time(), PDO::PARAM_STR);
				$sth->bindParam(2, $user);
				$sth->execute();
				return array("username" => $res[0]["username"]);
			}
			else
			{
				return false;
			}
		}
	}

	public function generateSalt()
	{
		if (function_exists("mcrypt_create_iv"))
		{
			$salt = mcrypt_create_iv($this->saltlength, MCRYPT_DEV_URANDOM);
		}
		elseif (function_exists("openssl_random_pseudo_bytes"))
		{
			$cstrong = false;
			do {
				$salt = openssl_random_pseudo_bytes($this->saltlength, $cstrong);
			} while ($cstrong === false);
		}
		else
		{
			// not very secure, last resort
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!\"£$%^&*";
			$size = strlen($chars);
			for ($i = 0; $i < $this->saltlength; $i++)
			{
				$salt .= $chars[rand(0, ($size-1))];
			}
		}
		return $salt;
	}

	public function createPassword($plain)
	{
		$salt = $this->generateSalt();
		$options = [
			"salt" => $salt
		];
		return array("salt" => $salt, "password" => password_hash($plain, PASSWORD_BCRYPT, $options));
	}

	public function createUser($user, $password, $email, $db = "")
	{
		if (empty($db))
		{
			$db = Database::getDBInstance();
		}

		$query = "INSERT INTO users (username, email, password, user_key, created_at) VALUES (?, ?, ?, ?, ?)";
		$sth = $db->prepare($query);
		$sth->bindParam(1, $user);
		$sth->bindParam(2, $email);
		$password = $this->createPassword($password);
		$sth->bindParam(3, $password['password']);
		$sth->bindParam(4, $password['salt']);
		$sth->bindParam(5, time());
		$sth->execute();
	}
}

?>